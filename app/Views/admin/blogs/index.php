<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Blog</h2>
    <a href="<?= base_url('admin/blogs/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Tambah Blog
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($blogs)): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada blog.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?= $blog['id'] ?></td>
                        <td><?= esc($blog['title']) ?></td>
                        <td><?= esc($blog['slug']) ?></td>
                        <td><?= date('d M Y', strtotime($blog['created_at'])) ?></td>
                        <td>
                            <a href="<?= base_url('admin/blogs/edit/' . $blog['id']) ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="<?= base_url('admin/blogs/delete/' . $blog['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
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

