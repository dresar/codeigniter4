<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Portfolio') ?> - <?= esc($siteTitle ?? 'Portfolio Saya') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        section {
            padding: 80px 0;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0;
        }
        .card-hover {
            transition: transform 0.3s;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>"><?= esc($siteTitle ?? 'Portfolio') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#home') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#about') ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#services') ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#portfolio') ?>">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#resume') ?>">Resume</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#blog') ?>">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#testimonials') ?>">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('#contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0"><?= esc($footerText ?? '© 2024 Portfolio Saya. All rights reserved.') ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>

