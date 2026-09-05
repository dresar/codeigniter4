<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;

class BlogsController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manage Blog',
            'blogs' => $this->blogModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/blogs/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $title = $this->request->getPost('title');
            $slug = url_title($title, '-', true);

            $data = [
                'title'            => $title,
                'slug'             => $slug,
                'excerpt'          => $this->request->getPost('excerpt'),
                'content'          => $this->request->getPost('content'),
                'featured_image'   => $this->request->getPost('featured_image'),
                'category'         => $this->request->getPost('category'),
                'tags'             => $this->request->getPost('tags'),
                'author'           => $this->request->getPost('author') ?: 'Admin',
                'status'           => $this->request->getPost('status') ?: 'published',
                'featured'         => $this->request->getPost('featured') ? 1 : 0,
                'meta_keywords'    => $this->request->getPost('meta_keywords'),
                'meta_description' => $this->request->getPost('meta_description'),
                'created_at'       => date('Y-m-d H:i:s'),
            ];

            if ($this->blogModel->insert($data)) {
                return redirect()->to('/admin/blogs')->with('success', 'Blog berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('error', 'Gagal menambahkan blog!');
            }
        }

        $data = [
            'title' => 'Tambah Blog',
        ];

        return view('admin/blogs/create', $data);
    }

    public function edit($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($this->request->getMethod() === 'post') {
            $title = $this->request->getPost('title');
            $slug = url_title($title, '-', true);

            $data = [
                'title'            => $title,
                'slug'             => $slug,
                'excerpt'          => $this->request->getPost('excerpt'),
                'content'          => $this->request->getPost('content'),
                'featured_image'   => $this->request->getPost('featured_image'),
                'category'         => $this->request->getPost('category'),
                'tags'             => $this->request->getPost('tags'),
                'author'           => $this->request->getPost('author') ?: 'Admin',
                'status'           => $this->request->getPost('status') ?: 'published',
                'featured'         => $this->request->getPost('featured') ? 1 : 0,
                'meta_keywords'    => $this->request->getPost('meta_keywords'),
                'meta_description' => $this->request->getPost('meta_description'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ];

            if ($this->blogModel->update($id, $data)) {
                return redirect()->to('/admin/blogs')->with('success', 'Blog berhasil diupdate!');
            } else {
                return redirect()->back()->with('error', 'Gagal mengupdate blog!');
            }
        }

        $data = [
            'title' => 'Edit Blog',
            'blog'  => $blog,
        ];

        return view('admin/blogs/edit', $data);
    }

    public function delete($id)
    {
        if ($this->blogModel->delete($id)) {
            return redirect()->to('/admin/blogs')->with('success', 'Blog berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus blog!');
        }
    }
}

