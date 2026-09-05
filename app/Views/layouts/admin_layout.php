<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin') ?> - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255,255,255,.1);
        }
        .main-content {
            min-height: calc(100vh - 56px);
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Admin Panel</span>
            <div>
                <span class="text-white me-3"><?= esc(session()->get('username')) ?></span>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0 sidebar">
                <nav class="nav flex-column p-3">
                    <a class="nav-link <?= uri_string() == 'admin/dashboard' ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                    <a class="nav-link <?= strpos(uri_string(), 'admin/projects') !== false ? 'active' : '' ?>" href="<?= base_url('admin/projects') ?>">
                        <i class="bi bi-folder"></i> Portfolio
                    </a>
                    <a class="nav-link <?= strpos(uri_string(), 'admin/blogs') !== false ? 'active' : '' ?>" href="<?= base_url('admin/blogs') ?>">
                        <i class="bi bi-journal-text"></i> Blog
                    </a>
                    <a class="nav-link <?= uri_string() == 'admin/settings' ? 'active' : '' ?>" href="<?= base_url('admin/settings') ?>">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                    <a class="nav-link <?= uri_string() == 'admin/messages' ? 'active' : '' ?>" href="<?= base_url('admin/messages') ?>">
                        <i class="bi bi-inbox"></i> Inbox
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>

