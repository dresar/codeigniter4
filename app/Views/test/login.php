<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Login Direct</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background: #f5f5f5; }
        .step-card { margin-bottom: 15px; }
        .step-success { border-left: 4px solid #28a745; }
        .step-error { border-left: 4px solid #dc3545; }
        .step-info { border-left: 4px solid #17a2b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3>🧪 Test Login Direct (Tanpa Form)</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger">
                                <strong>❌ Error:</strong> <?= $error ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success">
                                <strong>✅ Login Berhasil!</strong> Redirect ke dashboard...
                            </div>
                        <?php endif; ?>
                        
                        <h5>Langkah-langkah Test:</h5>
                        <div class="mt-3">
                            <?php foreach ($steps as $step): ?>
                                <div class="card step-card <?= $step['status'] === 'success' ? 'step-success' : ($step['status'] === 'error' ? 'step-error' : 'step-info') ?>">
                                    <div class="card-body">
                                        <strong>Step <?= $step['step'] ?>: <?= $step['name'] ?></strong>
                                        <p class="mb-0 mt-2"><?= $step['message'] ?></p>
                                        <?php if ($step['status'] === 'success'): ?>
                                            <span class="badge bg-success">✅ Success</span>
                                        <?php elseif ($step['status'] === 'error'): ?>
                                            <span class="badge bg-danger">❌ Error</span>
                                        <?php else: ?>
                                            <span class="badge bg-info">ℹ️ Info</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if (isset($redirect_url)): ?>
                            <div class="mt-4">
                                <a href="<?= $redirect_url ?>" class="btn btn-primary btn-lg w-100">
                                    Go to Dashboard →
                                </a>
                                <script>
                                    setTimeout(function() {
                                        window.location.href = '<?= $redirect_url ?>';
                                    }, 3000);
                                </script>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mt-4">
                            <a href="<?= base_url('auth/login') ?>" class="btn btn-secondary">Kembali ke Login Page</a>
                            <a href="<?= base_url('test-login') ?>" class="btn btn-info">Refresh Test</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

