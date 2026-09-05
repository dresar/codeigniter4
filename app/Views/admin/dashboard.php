<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Dashboard</h2>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Projects</h5>
                <h2><?= $totalProjects ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Total Blogs</h5>
                <h2><?= $totalBlogs ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Total Messages</h5>
                <h2><?= $totalMessages ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Recent Projects</h5>
            </div>
            <div class="card-body">
                <?php if (empty($recentProjects)): ?>
                    <p class="text-muted">Belum ada project.</p>
                <?php else: ?>
                    <ul class="list-group">
                        <?php foreach ($recentProjects as $project): ?>
                            <li class="list-group-item">
                                <strong><?= esc($project['title']) ?></strong>
                                <br>
                                <small class="text-muted"><?= date('d M Y', strtotime($project['created_at'])) ?></small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Recent Messages</h5>
            </div>
            <div class="card-body">
                <?php if (empty($recentMessages)): ?>
                    <p class="text-muted">Belum ada pesan.</p>
                <?php else: ?>
                    <ul class="list-group">
                        <?php foreach ($recentMessages as $message): ?>
                            <li class="list-group-item">
                                <strong><?= esc($message['name']) ?></strong> - <?= esc($message['email']) ?>
                                <br>
                                <small class="text-muted"><?= date('d M Y', strtotime($message['created_at'])) ?></small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

