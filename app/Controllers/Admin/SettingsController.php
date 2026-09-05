<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class SettingsController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $settings = $this->settingModel->first();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'site_title'        => $this->request->getPost('site_title'),
                'site_description'  => $this->request->getPost('site_description'),
                'owner_name'        => $this->request->getPost('owner_name'),
                'owner_title'       => $this->request->getPost('owner_title'),
                'owner_bio'         => $this->request->getPost('owner_bio'),
                'about_text'        => $this->request->getPost('about_text'),
                'email'             => $this->request->getPost('email'),
                'phone'             => $this->request->getPost('phone'),
                'address'           => $this->request->getPost('address'),
                'social_facebook'   => $this->request->getPost('social_facebook'),
                'social_twitter'    => $this->request->getPost('social_twitter'),
                'social_instagram'  => $this->request->getPost('social_instagram'),
                'social_linkedin'   => $this->request->getPost('social_linkedin'),
                'social_github'     => $this->request->getPost('social_github'),
                'footer_text'       => $this->request->getPost('footer_text'),
                'meta_keywords'     => $this->request->getPost('meta_keywords'),
                'meta_description'  => $this->request->getPost('meta_description'),
            ];

            if ($settings) {
                $this->settingModel->update($settings['id'], $data);
            } else {
                $this->settingModel->insert($data);
            }

            return redirect()->to('/admin/settings')->with('success', 'Settings berhasil diupdate!');
        }

        $data = [
            'title'    => 'Settings',
            'settings' => $settings,
        ];

        return view('admin/settings', $data);
    }
}

