<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Edit Blog</h2>

<form action="<?= base_url('admin/blogs/edit/' . $blog['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="title" name="title" value="<?= esc($blog['title']) ?>" required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?= esc($blog['category'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= esc($blog['author'] ?? 'Admin') ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="excerpt" class="form-label">Excerpt (Ringkasan)</label>
        <textarea class="form-control" id="excerpt" name="excerpt" rows="2"><?= esc($blog['excerpt'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
        <textarea class="form-control" id="content" name="content" rows="15" required><?= esc($blog['content']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
        <input type="text" class="form-control" id="tags" name="tags" value="<?= esc($blog['tags'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label for="featured_image" class="form-label">Featured Image URL</label>
        <input type="url" class="form-control" id="featured_image" name="featured_image" value="<?= esc($blog['featured_image'] ?? '') ?>">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="published" <?= ($blog['status'] ?? '') == 'published' ? 'selected' : '' ?>>Published</option>
                    <option value="draft" <?= ($blog['status'] ?? '') == 'draft' ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" <?= ($blog['featured'] ?? 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="featured">Featured Post</label>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="meta_keywords" class="form-label">Meta Keywords</label>
        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?= esc($blog['meta_keywords'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Meta Description</label>
        <textarea class="form-control" id="meta_description" name="meta_description" rows="2"><?= esc($blog['meta_description'] ?? '') ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/blogs') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
