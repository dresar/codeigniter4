<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Edit Project</h2>

<form action="<?= base_url('admin/projects/edit/' . $project['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($project['title']) ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?= esc($project['category'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
        <input type="text" class="form-control" id="tags" name="tags" value="<?= esc($project['tags'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Short Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?= esc($project['description'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label for="full_description" class="form-label">Full Description</label>
        <textarea class="form-control" id="full_description" name="full_description" rows="5"><?= esc($project['full_description'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <?php if (!empty($project['image_url'])): ?>
            <div class="mb-2">
                <img src="<?= esc($project['image_url']) ?>" alt="" style="max-width: 200px;" class="img-thumbnail">
            </div>
        <?php endif; ?>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="link" class="form-label">Project Link</label>
                <input type="url" class="form-control" id="link" name="link" value="<?= esc($project['link'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="github_link" class="form-label">GitHub Link</label>
                <input type="url" class="form-control" id="github_link" name="github_link" value="<?= esc($project['github_link'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="client_name" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="client_name" name="client_name" value="<?= esc($project['client_name'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="project_date" class="form-label">Project Date</label>
                <input type="date" class="form-control" id="project_date" name="project_date" value="<?= esc($project['project_date'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="published" <?= ($project['status'] ?? '') == 'published' ? 'selected' : '' ?>>Published</option>
                    <option value="draft" <?= ($project['status'] ?? '') == 'draft' ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" <?= ($project['featured'] ?? 0) ? 'checked' : '' ?>>
            <label class="form-check-label" for="featured">Featured Project</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/projects') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>

