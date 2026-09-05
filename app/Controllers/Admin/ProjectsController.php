<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;

class ProjectsController extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Manage Portfolio',
            'projects' => $this->projectModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/projects/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('image');
            $imageUrl = '';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads/projects', $newName);
                $imageUrl = base_url('uploads/projects/' . $newName);
            }

            $title = $this->request->getPost('title');
            $slug = url_title($title, '-', true);
            
            $data = [
                'title'            => $title,
                'slug'             => $slug,
                'category'         => $this->request->getPost('category'),
                'tags'             => $this->request->getPost('tags'),
                'description'      => $this->request->getPost('description'),
                'full_description' => $this->request->getPost('full_description'),
                'image_url'        => $imageUrl,
                'thumbnail_url'    => $imageUrl,
                'link'             => $this->request->getPost('link'),
                'github_link'      => $this->request->getPost('github_link'),
                'client_name'      => $this->request->getPost('client_name'),
                'project_date'     => $this->request->getPost('project_date'),
                'status'           => $this->request->getPost('status') ?: 'published',
                'featured'         => $this->request->getPost('featured') ? 1 : 0,
                'created_at'       => date('Y-m-d H:i:s'),
            ];

            if ($this->projectModel->insert($data)) {
                return redirect()->to('/admin/projects')->with('success', 'Project berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('error', 'Gagal menambahkan project!');
            }
        }

        $data = [
            'title' => 'Tambah Project',
        ];

        return view('admin/projects/create', $data);
    }

    public function edit($id)
    {
        $project = $this->projectModel->find($id);

        if (!$project) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('image');
            $imageUrl = $project['image_url'];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads/projects', $newName);
                $imageUrl = base_url('uploads/projects/' . $newName);
            }

            $title = $this->request->getPost('title');
            $slug = url_title($title, '-', true);
            
            $data = [
                'title'            => $title,
                'slug'             => $slug,
                'category'         => $this->request->getPost('category'),
                'tags'             => $this->request->getPost('tags'),
                'description'      => $this->request->getPost('description'),
                'full_description' => $this->request->getPost('full_description'),
                'image_url'        => $imageUrl,
                'thumbnail_url'    => $imageUrl,
                'link'             => $this->request->getPost('link'),
                'github_link'      => $this->request->getPost('github_link'),
                'client_name'      => $this->request->getPost('client_name'),
                'project_date'     => $this->request->getPost('project_date'),
                'status'           => $this->request->getPost('status') ?: 'published',
                'featured'         => $this->request->getPost('featured') ? 1 : 0,
                'updated_at'       => date('Y-m-d H:i:s'),
            ];

            if ($this->projectModel->update($id, $data)) {
                return redirect()->to('/admin/projects')->with('success', 'Project berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengupdate project!');
            }
        }

        $data = [
            'title'   => 'Edit Project',
            'project' => $project,
        ];

        return view('admin/projects/edit', $data);
    }

    public function delete($id)
    {
        if ($this->projectModel->delete($id)) {
            return redirect()->to('/admin/projects')->with('success', 'Project berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus project!');
        }
    }
}

