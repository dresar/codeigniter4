<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Inbox</h2>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($messages)): ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada pesan.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?= $message['id'] ?></td>
                        <td><?= esc($message['name']) ?></td>
                        <td><?= esc($message['email']) ?></td>
                        <td><?= esc(substr($message['message'], 0, 50)) ?>...</td>
                        <td><?= date('d M Y H:i', strtotime($message['created_at'])) ?></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#messageModal<?= $message['id'] ?>">
                                <i class="bi bi-eye"></i>
                            </button>
                            <a href="<?= base_url('admin/messages/delete/' . $message['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="messageModal<?= $message['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Pesan dari <?= esc($message['name']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Email:</strong> <?= esc($message['email']) ?></p>
                                    <p><strong>Tanggal:</strong> <?= date('d M Y H:i', strtotime($message['created_at'])) ?></p>
                                    <hr>
                                    <p><?= nl2br(esc($message['message'])) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>

