<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\ProjectModel;
use App\Models\ServiceModel;
use App\Models\BlogModel;
use App\Models\MessageModel;

class PortfolioController extends BaseController
{
    protected $settingModel;
    protected $projectModel;
    protected $serviceModel;
    protected $blogModel;
    protected $messageModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->projectModel = new ProjectModel();
        $this->serviceModel = new ServiceModel();
        $this->blogModel = new BlogModel();
        $this->messageModel = new MessageModel();
    }

    public function index()
    {
        $settings = $this->settingModel->first();
        $projects = $this->projectModel->orderBy('created_at', 'DESC')->findAll();
        $services = $this->serviceModel->findAll();
        $blogs = $this->blogModel->orderBy('created_at', 'DESC')->limit(6)->findAll();

        $data = [
            'title'      => 'Home',
            'siteTitle'  => $settings['site_title'] ?? 'Portfolio Saya',
            'ownerName'  => $settings['owner_name'] ?? 'Nama Anda',
            'aboutText'  => $settings['about_text'] ?? '',
            'footerText' => $settings['footer_text'] ?? '',
            'projects'   => $projects,
            'services'  => $services,
            'blogs'     => $blogs,
        ];

        return view('portfolio/index', $data);
    }

    public function blog()
    {
        $settings = $this->settingModel->first();
        $blogs = $this->blogModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title'      => 'Blog',
            'siteTitle'  => $settings['site_title'] ?? 'Portfolio Saya',
            'footerText' => $settings['footer_text'] ?? '',
            'blogs'      => $blogs,
        ];

        return view('portfolio/blog', $data);
    }

    public function blogDetail($slug)
    {
        $settings = $this->settingModel->first();
        $blog = $this->blogModel->where('slug', $slug)->first();

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'      => $blog['title'],
            'siteTitle'  => $settings['site_title'] ?? 'Portfolio Saya',
            'footerText' => $settings['footer_text'] ?? '',
            'blog'       => $blog,
        ];

        return view('portfolio/blog_detail', $data);
    }

    public function contact()
    {
        $settings = $this->settingModel->first();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'name'       => $this->request->getPost('name'),
                'email'      => $this->request->getPost('email'),
                'message'    => $this->request->getPost('message'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if ($this->messageModel->insert($data)) {
                return redirect()->to('/#contact')->with('success', 'Pesan berhasil dikirim!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengirim pesan!');
            }
        }

        $data = [
            'title'      => 'Contact',
            'siteTitle'  => $settings['site_title'] ?? 'Portfolio Saya',
            'footerText' => $settings['footer_text'] ?? '',
        ];

        return view('portfolio/contact', $data);
    }
}

