<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debug Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background: #f5f5f5; }
        .debug-card { margin-bottom: 20px; }
        .status-ok { color: #28a745; }
        .status-error { color: #dc3545; }
        pre { background: #f8f9fa; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">🔍 Debug Login</h1>
        
        <!-- Test 1: Database -->
        <div class="card debug-card">
            <div class="card-header bg-primary text-white">
                <h5>1. Database Test</h5>
            </div>
            <div class="card-body">
                <?php if (isset($db_error)): ?>
                    <p class="status-error">❌ Error: <?= $db_error ?></p>
                <?php elseif (isset($user_found) && $user_found): ?>
                    <p class="status-ok">✅ User ditemukan</p>
                    <ul>
                        <li>ID: <?= $user_id ?></li>
                        <li>Username: <?= $username ?></li>
                        <li>Password Test (admin123): 
                            <?php if ($password_test): ?>
                                <span class="status-ok">✅ BENAR</span>
                            <?php else: ?>
                                <span class="status-error">❌ SALAH</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                <?php else: ?>
                    <p class="status-error">❌ User tidak ditemukan</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Test 2: Session -->
        <div class="card debug-card">
            <div class="card-header bg-info text-white">
                <h5>2. Session Test</h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>Session Path: <code><?= $session_path ?></code></li>
                    <li>Session Folder Exists: 
                        <?php if ($session_exists): ?>
                            <span class="status-ok">✅</span>
                        <?php else: ?>
                            <span class="status-error">❌</span>
                        <?php endif; ?>
                    </li>
                    <li>Session Folder Writable: 
                        <?php if ($session_writable): ?>
                            <span class="status-ok">✅</span>
                        <?php else: ?>
                            <span class="status-error">❌</span>
                        <?php endif; ?>
                    </li>
                    <li>Current Session: <strong><?= $current_session ?></strong></li>
                </ul>
            </div>
        </div>
        
        <!-- Test 3: Config -->
        <div class="card debug-card">
            <div class="card-header bg-success text-white">
                <h5>3. Configuration</h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>Base URL: <code><?= $base_url ?></code></li>
                    <li>Current URL: <code><?= $current_url ?></code></li>
                </ul>
            </div>
        </div>
        
        <!-- Test 4: Log Files -->
        <div class="card debug-card">
            <div class="card-header bg-warning text-dark">
                <h5>4. Latest Log File</h5>
            </div>
            <div class="card-body">
                <?php if (isset($latest_log)): ?>
                    <p>File: <code><?= $latest_log ?></code></p>
                    <h6>Log Content (Last 50 lines):</h6>
                    <pre><?= htmlspecialchars(implode("\n", array_slice(explode("\n", $log_content), -50))) ?></pre>
                <?php else: ?>
                    <p>Tidak ada log file</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="card debug-card">
            <div class="card-header bg-dark text-white">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary">Go to Login Page</a>
                <a href="<?= base_url('debug/login') ?>" class="btn btn-secondary">Refresh Debug</a>
            </div>
        </div>
    </div>
</body>
</html>

