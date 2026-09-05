<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Debug log
        log_message('debug', 'AuthGuard check - Has user_id: ' . ($session->has('user_id') ? 'YES' : 'NO'));
        
        if (!$session->has('user_id')) {
            log_message('info', 'AuthGuard: Redirecting to login - No user_id in session');
            return redirect()->to(base_url('auth/login'));
        }
        
        log_message('debug', 'AuthGuard: Access granted - User ID: ' . $session->get('user_id'));
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}

