<?= $this->extend('layouts/app_layout') ?>

<?= $this->section('content') ?>

<section class="py-5" style="margin-top: 76px;">
    <div class="container">
        <h1 class="mb-5">Blog</h1>
        <div class="row">
            <?php if (empty($blogs)): ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada artikel blog.</p>
                </div>
            <?php else: ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($blog['title']) ?></h5>
                                <p class="text-muted small"><?= date('d M Y', strtotime($blog['created_at'])) ?></p>
                                <p class="card-text"><?= esc(substr(strip_tags($blog['content'] ?? ''), 0, 150)) ?>...</p>
                                <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

