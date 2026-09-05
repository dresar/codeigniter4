<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\BlogModel;
use App\Models\MessageModel;

class DashboardController extends BaseController
{
    protected $projectModel;
    protected $blogModel;
    protected $messageModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->blogModel = new BlogModel();
        $this->messageModel = new MessageModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'totalProjects' => $this->projectModel->countAllResults(),
            'totalBlogs'    => $this->blogModel->countAllResults(),
            'totalMessages' => $this->messageModel->countAllResults(),
            'recentProjects' => $this->projectModel->orderBy('created_at', 'DESC')->limit(5)->findAll(),
            'recentMessages' => $this->messageModel->orderBy('created_at', 'DESC')->limit(5)->findAll(),
        ];

        return view('admin/dashboard', $data);
    }
}

