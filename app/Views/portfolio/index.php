<?= $this->extend('layouts/app_layout') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">Halo, Saya <?= esc($ownerName) ?></h1>
        <p class="lead mb-4"><?= esc($aboutText) ?></p>
        <a href="#portfolio" class="btn btn-light btn-lg">Lihat Portfolio</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Tentang Saya</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Skills</h4>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle text-primary"></i> PHP & CodeIgniter</li>
                    <li><i class="bi bi-check-circle text-primary"></i> JavaScript & jQuery</li>
                    <li><i class="bi bi-check-circle text-primary"></i> HTML5 & CSS3</li>
                    <li><i class="bi bi-check-circle text-primary"></i> Bootstrap 5</li>
                    <li><i class="bi bi-check-circle text-primary"></i> MySQL & SQLite</li>
                </ul>
            </div>
            <div class="col-md-6">
                <p><?= esc($aboutText) ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <h2 class="text-center mb-5">Layanan Saya</h2>
        <div class="row">
            <?php if (empty($services)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card card-hover h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-code-slash display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Web Development</h5>
                            <p class="card-text">Pembuatan website custom sesuai kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-hover h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-phone display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Responsive Design</h5>
                            <p class="card-text">Website yang tampil sempurna di semua perangkat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-hover h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-tools display-4 text-primary mb-3"></i>
                            <h5 class="card-title">Maintenance</h5>
                            <p class="card-text">Perawatan dan update website secara berkala.</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card card-hover h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-<?= esc($service['icon'] ?? 'star') ?> display-4 text-primary mb-3"></i>
                                <h5 class="card-title"><?= esc($service['title']) ?></h5>
                                <p class="card-text"><?= esc($service['description']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Portfolio</h2>
        <div class="row">
            <?php if (empty($projects)): ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada project yang ditampilkan.</p>
                </div>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card card-hover h-100">
                            <?php if (!empty($project['image_url'])): ?>
                                <img src="<?= esc($project['image_url']) ?>" class="card-img-top" alt="<?= esc($project['title']) ?>" style="height: 200px; object-fit: cover;">
                            <?php else: ?>
                                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-image text-white display-4"></i>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($project['title']) ?></h5>
                                <p class="text-muted small"><?= esc($project['category'] ?? 'Uncategorized') ?></p>
                                <p class="card-text"><?= esc(substr($project['description'] ?? '', 0, 100)) ?>...</p>
                                <?php if (!empty($project['link'])): ?>
                                    <a href="<?= esc($project['link']) ?>" target="_blank" class="btn btn-sm btn-primary">Lihat Project</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Resume Section -->
<section id="resume">
    <div class="container">
        <h2 class="text-center mb-5">Resume</h2>
        <div class="row">
            <div class="col-md-6">
                <h4><i class="bi bi-briefcase text-primary"></i> Pengalaman</h4>
                <div class="timeline">
                    <div class="mb-4">
                        <h5>Web Developer</h5>
                        <p class="text-muted">2020 - Sekarang</p>
                        <p>Mengembangkan aplikasi web menggunakan PHP dan CodeIgniter.</p>
                    </div>
                    <div class="mb-4">
                        <h5>Freelancer</h5>
                        <p class="text-muted">2018 - 2020</p>
                        <p>Mengerjakan berbagai project website untuk klien.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4><i class="bi bi-mortarboard text-primary"></i> Pendidikan</h4>
                <div class="timeline">
                    <div class="mb-4">
                        <h5>Teknik Informatika</h5>
                        <p class="text-muted">2014 - 2018</p>
                        <p>Lulus dengan predikat cum laude.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Blog Terbaru</h2>
        <div class="row">
            <?php if (empty($blogs)): ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada artikel blog.</p>
                </div>
            <?php else: ?>
                <?php foreach (array_slice($blogs, 0, 3) as $blog): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($blog['title']) ?></h5>
                                <p class="text-muted small"><?= date('d M Y', strtotime($blog['created_at'])) ?></p>
                                <p class="card-text"><?= esc(substr(strip_tags($blog['content'] ?? ''), 0, 100)) ?>...</p>
                                <a href="<?= base_url('blog/' . $blog['slug']) ?>" class="btn btn-sm btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('blog') ?>" class="btn btn-primary">Lihat Semua Blog</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">Testimonials</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-quote display-4 text-primary mb-3"></i>
                        <p class="card-text">"Pelayanan sangat memuaskan, website yang dibuat sesuai dengan ekspektasi."</p>
                        <h6 class="card-title">- Client A</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-quote display-4 text-primary mb-3"></i>
                        <p class="card-text">"Professional dan on-time delivery. Highly recommended!"</p>
                        <h6 class="card-title">- Client B</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-quote display-4 text-primary mb-3"></i>
                        <p class="card-text">"Hasil kerja yang sangat baik, komunikasi juga lancar."</p>
                        <h6 class="card-title">- Client C</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Hubungi Saya</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('contact') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

