<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Settings</h2>

<form action="<?= base_url('admin/settings') ?>" method="post">
    <?= csrf_field() ?>
    
    <h5 class="mb-3">General Settings</h5>
    <div class="mb-3">
        <label for="site_title" class="form-label">Site Title</label>
        <input type="text" class="form-control" id="site_title" name="site_title" value="<?= esc($settings['site_title'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label for="site_description" class="form-label">Site Description</label>
        <textarea class="form-control" id="site_description" name="site_description" rows="2"><?= esc($settings['site_description'] ?? '') ?></textarea>
    </div>
    
    <hr class="my-4">
    <h5 class="mb-3">Owner Information</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="owner_name" class="form-label">Owner Name</label>
                <input type="text" class="form-control" id="owner_name" name="owner_name" value="<?= esc($settings['owner_name'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="owner_title" class="form-label">Owner Title/Position</label>
                <input type="text" class="form-control" id="owner_title" name="owner_title" value="<?= esc($settings['owner_title'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="owner_bio" class="form-label">Owner Bio</label>
        <textarea class="form-control" id="owner_bio" name="owner_bio" rows="3"><?= esc($settings['owner_bio'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label for="about_text" class="form-label">About Text</label>
        <textarea class="form-control" id="about_text" name="about_text" rows="5"><?= esc($settings['about_text'] ?? '') ?></textarea>
    </div>
    
    <hr class="my-4">
    <h5 class="mb-3">Contact Information</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc($settings['email'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($settings['phone'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" rows="2"><?= esc($settings['address'] ?? '') ?></textarea>
    </div>
    
    <hr class="my-4">
    <h5 class="mb-3">Social Media</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="social_facebook" class="form-label">Facebook URL</label>
                <input type="url" class="form-control" id="social_facebook" name="social_facebook" value="<?= esc($settings['social_facebook'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="social_twitter" class="form-label">Twitter URL</label>
                <input type="url" class="form-control" id="social_twitter" name="social_twitter" value="<?= esc($settings['social_twitter'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="social_instagram" class="form-label">Instagram URL</label>
                <input type="url" class="form-control" id="social_instagram" name="social_instagram" value="<?= esc($settings['social_instagram'] ?? '') ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="social_linkedin" class="form-label">LinkedIn URL</label>
                <input type="url" class="form-control" id="social_linkedin" name="social_linkedin" value="<?= esc($settings['social_linkedin'] ?? '') ?>">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="social_github" class="form-label">GitHub URL</label>
        <input type="url" class="form-control" id="social_github" name="social_github" value="<?= esc($settings['social_github'] ?? '') ?>">
    </div>
    
    <hr class="my-4">
    <h5 class="mb-3">Footer & SEO</h5>
    <div class="mb-3">
        <label for="footer_text" class="form-label">Footer Text</label>
        <input type="text" class="form-control" id="footer_text" name="footer_text" value="<?= esc($settings['footer_text'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label for="meta_keywords" class="form-label">Meta Keywords</label>
        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?= esc($settings['meta_keywords'] ?? '') ?>" placeholder="keyword1, keyword2, keyword3">
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Meta Description</label>
        <textarea class="form-control" id="meta_description" name="meta_description" rows="2"><?= esc($settings['meta_description'] ?? '') ?></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan Settings</button>
</form>

<?= $this->endSection() ?>

