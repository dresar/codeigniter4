<?php

namespace App\Controllers;

use App\Models\UserModel;

class TestLoginController extends BaseController
{
    public function index()
    {
        // Simulasi login langsung tanpa form
        $username = 'admin';
        $password = 'admin123';
        
        $data = [
            'title' => 'Test Login Direct',
            'steps' => [],
            'success' => false,
            'error' => null
        ];
        
        try {
            // Step 1: Cek user di database
            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();
            
            $data['steps'][] = [
                'step' => 1,
                'name' => 'Cek User di Database',
                'status' => $user ? 'success' : 'error',
                'message' => $user ? 'User ditemukan (ID: ' . $user['id'] . ')' : 'User tidak ditemukan!'
            ];
            
            if (!$user) {
                $data['error'] = 'User tidak ditemukan!';
                return view('test/login', $data);
            }
            
            // Step 2: Verifikasi password
            $passwordValid = password_verify($password, $user['password']);
            
            $data['steps'][] = [
                'step' => 2,
                'name' => 'Verifikasi Password',
                'status' => $passwordValid ? 'success' : 'error',
                'message' => $passwordValid ? 'Password BENAR' : 'Password SALAH!'
            ];
            
            if (!$passwordValid) {
                $data['error'] = 'Password salah!';
                return view('test/login', $data);
            }
            
            // Step 3: Set session
            $sessionData = [
                'user_id'   => (int)$user['id'],
                'username'  => $user['username'],
                'logged_in' => true,
            ];
            
            session()->set($sessionData);
            
            $data['steps'][] = [
                'step' => 3,
                'name' => 'Set Session',
                'status' => 'success',
                'message' => 'Session data diset'
            ];
            
            // Step 4: Verifikasi session tersimpan
            $sessionCheck = session()->has('user_id');
            
            $data['steps'][] = [
                'step' => 4,
                'name' => 'Verifikasi Session Tersimpan',
                'status' => $sessionCheck ? 'success' : 'error',
                'message' => $sessionCheck ? 'Session tersimpan (User ID: ' . session()->get('user_id') . ')' : 'Session TIDAK tersimpan!'
            ];
            
            if ($sessionCheck) {
                $data['success'] = true;
                $data['steps'][] = [
                    'step' => 5,
                    'name' => 'Login Berhasil!',
                    'status' => 'success',
                    'message' => 'Anda akan di-redirect ke dashboard dalam 3 detik...'
                ];
                
                // Auto redirect setelah 3 detik
                $data['redirect_url'] = base_url('admin/dashboard');
            } else {
                $data['error'] = 'Session tidak tersimpan!';
            }
            
        } catch (\Exception $e) {
            $data['error'] = 'Error: ' . $e->getMessage();
            $data['steps'][] = [
                'step' => 0,
                'name' => 'Exception',
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        
        return view('test/login', $data);
    }
}

