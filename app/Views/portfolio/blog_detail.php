<?= $this->extend('layouts/app_layout') ?>

<?= $this->section('content') ?>

<section class="py-5" style="margin-top: 76px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="<?= base_url('blog') ?>" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Kembali ke Blog
                </a>
                <article>
                    <h1><?= esc($blog['title']) ?></h1>
                    <p class="text-muted"><?= date('d M Y', strtotime($blog['created_at'])) ?></p>
                    <hr>
                    <div class="content">
                        <?= $blog['content'] ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

