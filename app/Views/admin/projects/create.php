<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Tambah Project</h2>

<form action="<?= base_url('admin/projects/create') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Web Development">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
        <input type="text" class="form-control" id="tags" name="tags" placeholder="PHP, CodeIgniter, Bootstrap">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Short Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi singkat project"></textarea>
    </div>
    <div class="mb-3">
        <label for="full_description" class="form-label">Full Description</label>
        <textarea class="form-control" id="full_description" name="full_description" rows="5" placeholder="Deskripsi lengkap project"></textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="client_name" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="client_name" name="client_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="link" class="form-label">Project Link</label>
                <input type="url" class="form-control" id="link" name="link" placeholder="https://example.com">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="github_link" class="form-label">GitHub Link</label>
                <input type="url" class="form-control" id="github_link" name="github_link" placeholder="https://github.com/...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="project_date" class="form-label">Project Date</label>
                <input type="date" class="form-control" id="project_date" name="project_date">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1">
                    <label class="form-check-label" for="featured">Featured Project</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('admin/projects') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>

