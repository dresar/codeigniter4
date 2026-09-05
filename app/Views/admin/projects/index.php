<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Portfolio</h2>
    <a href="<?= base_url('admin/projects/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Project
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($projects)): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada project.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td><?= $project['id'] ?></td>
                        <td><?= esc($project['title']) ?></td>
                        <td><?= esc($project['category'] ?? '-') ?></td>
                        <td>
                            <?php if (!empty($project['image_url'])): ?>
                                <img src="<?= esc($project['image_url']) ?>" alt="" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d M Y', strtotime($project['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/projects/edit/' . $project['id']) ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= base_url('admin/projects/delete/' . $project['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

