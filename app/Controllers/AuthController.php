<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        // Jika sudah login, redirect ke dashboard
        if (session()->has('user_id')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        if ($this->request->getMethod() === 'post') {
            $username = trim($this->request->getPost('username') ?? '');
            $password = $this->request->getPost('password') ?? '';

            // Log attempt
            log_message('info', 'Login attempt - Username: ' . $username);

            // Debug: Log semua input
            log_message('debug', 'POST Data - Username: [' . $username . '], Password length: ' . strlen($password));
            
            // Validasi input
            if (empty($username) || empty($password)) {
                log_message('warning', 'Login failed - Empty username or password');
                $errorMsg = 'Username dan password harus diisi!';
                session()->setFlashdata('error', $errorMsg);
                return redirect()->to(base_url('auth/login'))->withInput();
            }

            try {
                // Cari user di database
                $user = $this->userModel->where('username', $username)->first();

                if (!$user) {
                    log_message('warning', 'Login failed - User not found: ' . $username);
                    $errorMsg = 'Username tidak ditemukan!';
                    session()->setFlashdata('error', $errorMsg);
                    return redirect()->to(base_url('auth/login'))->withInput();
                }

                // Verifikasi password
                $passwordValid = password_verify($password, $user['password']);
                
                if (!$passwordValid) {
                    log_message('warning', 'Login failed - Invalid password for user: ' . $username);
                    $errorMsg = 'Password salah!';
                    session()->setFlashdata('error', $errorMsg);
                    return redirect()->to(base_url('auth/login'))->withInput();
                }

                log_message('info', 'Password verified successfully for user: ' . $username);

                // Set session
                $sessionData = [
                    'user_id'   => (int)$user['id'],
                    'username'  => $user['username'],
                    'logged_in' => true,
                ];
                
                session()->set($sessionData);
                
                // Force session write - penting untuk memastikan session tersimpan
                session()->markAsFlashdata('_ci_old_input');
                
                // Verifikasi session tersimpan
                $sessionCheck = session()->has('user_id');
                log_message('info', 'Session check after set: ' . ($sessionCheck ? 'TRUE' : 'FALSE'));
                
                if (!$sessionCheck) {
                    log_message('error', 'Login failed - Session not saved for user: ' . $username);
                    $errorMsg = 'Gagal membuat session! Cek permission folder writable/session/';
                    session()->setFlashdata('error', $errorMsg);
                    return redirect()->to(base_url('auth/login'))->withInput();
                }

                log_message('info', 'Login successful - User ID: ' . $user['id'] . ', Username: ' . $user['username'] . ', Session ID: ' . session_id());

                // Redirect ke dashboard dengan base_url untuk memastikan URL benar
                $dashboardUrl = base_url('admin/dashboard');
                log_message('info', 'Redirecting to: ' . $dashboardUrl);
                
                return redirect()->to($dashboardUrl)->with('success', 'Login berhasil! Selamat datang, ' . $user['username'] . '!');
                
            } catch (\Exception $e) {
                log_message('error', 'Login error: ' . $e->getMessage() . ' | Trace: ' . $e->getTraceAsString());
                $errorMsg = 'Terjadi kesalahan saat login: ' . $e->getMessage();
                session()->setFlashdata('error', $errorMsg);
                return redirect()->to(base_url('auth/login'))->withInput();
            }
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login')->with('success', 'Logout berhasil!');
    }
}

