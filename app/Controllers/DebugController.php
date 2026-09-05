<?php

namespace App\Controllers;

use App\Models\UserModel;

class DebugController extends BaseController
{
    public function login()
    {
        $data = [];
        
        // Test 1: Cek database
        try {
            $userModel = new UserModel();
            $user = $userModel->where('username', 'admin')->first();
            
            if ($user) {
                $data['user_found'] = true;
                $data['user_id'] = $user['id'];
                $data['username'] = $user['username'];
                
                // Test password
                $data['password_test'] = password_verify('admin123', $user['password']);
            } else {
                $data['user_found'] = false;
            }
        } catch (\Exception $e) {
            $data['db_error'] = $e->getMessage();
        }
        
        // Test 2: Cek session
        $data['session_path'] = WRITEPATH . 'session';
        $data['session_exists'] = is_dir($data['session_path']);
        $data['session_writable'] = is_writable($data['session_path']);
        $data['current_session'] = session()->has('user_id') ? 'Logged in' : 'Not logged in';
        
        // Test 3: Cek config
        $data['base_url'] = base_url();
        $data['current_url'] = current_url();
        
        // Test 4: Cek log files
        $logPath = WRITEPATH . 'logs';
        $logFiles = glob($logPath . '/log-*.php');
        if (!empty($logFiles)) {
            $latestLog = max($logFiles);
            $data['latest_log'] = basename($latestLog);
            $data['log_content'] = file_get_contents($latestLog);
        }
        
        return view('debug/login', $data);
    }
}

