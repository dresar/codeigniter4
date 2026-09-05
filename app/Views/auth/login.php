<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card shadow">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">
                            <i class="bi bi-shield-lock"></i> Admin Login
                        </h2>

                        <?php 
                        $error = session()->getFlashdata('error');
                        if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>❌ Error:</strong> <?= esc($error) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                        // DEBUG: Tampilkan semua info debug
                        try {
                            $request = service('request');
                            $debugInfo = [
                                'session_id' => session_id(),
                                'has_user_id' => session()->has('user_id'),
                                'user_id' => session()->get('user_id'),
                                'username' => session()->get('username'),
                                'logged_in' => session()->get('logged_in'),
                                'all_session' => session()->get(),
                                'all_flashdata' => session()->getFlashdata(),
                                'old_input' => old(),
                                'request_method' => $request->getMethod(),
                                'base_url' => base_url(),
                                'current_url' => current_url(),
                            ];
                        } catch (\Exception $e) {
                            $debugInfo = [
                                'error' => 'Error getting debug info: ' . $e->getMessage(),
                                'session_id' => session_id(),
                                'base_url' => base_url(),
                            ];
                        }
                        ?>
                        <div class="alert alert-info" style="font-size: 11px;">
                            <strong>🔍 DEBUG INFO:</strong>
                            <details>
                                <summary>Klik untuk melihat detail debug</summary>
                                <pre style="font-size: 10px; max-height: 300px; overflow-y: auto;"><?= htmlspecialchars(json_encode($debugInfo, JSON_PRETTY_PRINT)) ?></pre>
                            </details>
                        </div>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('auth/login') ?>" method="post" id="loginForm" onsubmit="return handleFormSubmit(event)">
                            <?= csrf_field() ?>
                            <input type="hidden" id="csrf_token" value="<?= csrf_hash() ?>">
                            
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required autofocus>
                                <small class="text-muted" id="username-debug"></small>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <small class="text-muted">Default: admin / admin123</small>
                                <small class="text-muted d-block" id="password-debug"></small>
                            </div>
                            
                            <div id="submit-status" class="mb-2" style="display: none;">
                                <div class="alert alert-warning">
                                    <small>⏳ Mengirim data...</small>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-2" id="submit-btn">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                            <button type="button" class="btn btn-outline-success w-100" id="demoLoginBtn" onclick="fillDemoLogin()">
                                <i class="bi bi-lightning-charge-fill"></i> Demo Login (Auto Fill & Submit)
                            </button>
                        </form>
                        
                        <div class="mt-3">
                            <details>
                                <summary style="cursor: pointer; color: #666; font-size: 12px;">🔍 Debug Console</summary>
                                <div id="debug-console" style="background: #f8f9fa; padding: 10px; border-radius: 5px; font-size: 11px; max-height: 200px; overflow-y: auto; margin-top: 10px;">
                                    <div>Menunggu aksi...</div>
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Debug Console Function
        function debugLog(message, type = 'info') {
            const console = document.getElementById('debug-console');
            const timestamp = new Date().toLocaleTimeString();
            const colors = {
                'info': '#17a2b8',
                'success': '#28a745',
                'error': '#dc3545',
                'warning': '#ffc107'
            };
            const color = colors[type] || colors.info;
            console.innerHTML += `<div style="color: ${color}; margin-bottom: 5px;">[${timestamp}] ${message}</div>`;
            console.scrollTop = console.scrollHeight;
            
            // Also log to browser console
            if (type === 'error') {
                console.error(message);
            } else {
                console.log(message);
            }
        }
        
        // Handle Form Submit
        function handleFormSubmit(event) {
            debugLog('=== FORM SUBMIT DIMULAI ===', 'info');
            
            const form = document.getElementById('loginForm');
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const csrfTokenInput = document.querySelector('input[name="<?= csrf_token() ?>"]');
            const csrfToken = csrfTokenInput ? csrfTokenInput.value : (document.getElementById('csrf_token') ? document.getElementById('csrf_token').value : 'MISSING');
            
            // Debug info
            debugLog('Form Action: ' + form.action, 'info');
            debugLog('Method: ' + form.method, 'info');
            debugLog('Username: ' + username, 'info');
            debugLog('Password: ' + (password ? '***' + password.length + ' chars' : 'EMPTY'), 'info');
            debugLog('CSRF Token: ' + (csrfToken && csrfToken !== 'MISSING' ? csrfToken.substring(0, 20) + '...' : 'MISSING'), 'info');
            
            // Show submit status
            document.getElementById('submit-status').style.display = 'block';
            document.getElementById('submit-btn').disabled = true;
            document.getElementById('submit-btn').innerHTML = '<span class="spinner-border spinner-border-sm"></span> Loading...';
            
            // Validate
            if (!username || !password) {
                debugLog('❌ VALIDASI GAGAL: Username atau password kosong!', 'error');
                event.preventDefault();
                document.getElementById('submit-status').style.display = 'none';
                document.getElementById('submit-btn').disabled = false;
                document.getElementById('submit-btn').innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Login';
                return false;
            }
            
            debugLog('✅ Validasi berhasil, mengirim form...', 'success');
            
            // Let form submit naturally
            return true;
        }
        
        function fillDemoLogin() {
            debugLog('=== DEMO LOGIN DIMULAI ===', 'info');
            
            // Auto fill username dan password
            document.getElementById('username').value = 'admin';
            document.getElementById('password').value = 'admin123';
            
            // Update debug display
            document.getElementById('username-debug').textContent = '✓ Filled: admin';
            document.getElementById('password-debug').textContent = '✓ Filled: admin123 (6 chars)';
            
            debugLog('Form diisi dengan: admin / admin123', 'success');
            debugLog('Username field: ' + document.getElementById('username').value, 'info');
            debugLog('Password field: ' + (document.getElementById('password').value ? '***' : 'EMPTY'), 'info');
            
            // Auto submit form setelah 500ms (memberi waktu untuk user melihat field terisi)
            setTimeout(function() {
                debugLog('Mengirim form dalam 3...', 'warning');
                setTimeout(function() {
                    debugLog('Mengirim form dalam 2...', 'warning');
                    setTimeout(function() {
                        debugLog('Mengirim form dalam 1...', 'warning');
                        setTimeout(function() {
                            debugLog('🚀 SUBMITTING FORM NOW...', 'success');
                            document.getElementById('loginForm').submit();
                        }, 1000);
                    }, 1000);
                }, 1000);
            }, 500);
        }
        
        // Debug: Cek apakah ada error di console
        window.addEventListener('load', function() {
            debugLog('✅ Halaman login dimuat', 'success');
            debugLog('Form action: ' + document.getElementById('loginForm').action, 'info');
            debugLog('Base URL: <?= base_url() ?>', 'info');
            debugLog('Current URL: <?= current_url() ?>', 'info');
            
            // Monitor form changes
            document.getElementById('username').addEventListener('input', function() {
                debugLog('Username changed: ' + this.value, 'info');
            });
            
            document.getElementById('password').addEventListener('input', function() {
                debugLog('Password changed: ' + (this.value ? '***' + this.value.length + ' chars' : 'EMPTY'), 'info');
            });
            
            // Monitor form submit
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                debugLog('Form submit event triggered', 'info');
            });
        });
        
        // Monitor network requests
        if (window.performance && window.performance.getEntriesByType) {
            window.addEventListener('load', function() {
                setTimeout(function() {
                    const entries = performance.getEntriesByType('navigation');
                    entries.forEach(function(entry) {
                        debugLog('Page Load: ' + entry.type + ' - ' + Math.round(entry.duration) + 'ms', 'info');
                    });
                }, 1000);
            });
        }
    </script>
</body>
</html>

