<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class MessagesController extends BaseController
{
    protected $messageModel;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Inbox',
            'messages' => $this->messageModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        return view('admin/messages', $data);
    }

    public function delete($id)
    {
        if ($this->messageModel->delete($id)) {
            return redirect()->to('/admin/messages')->with('success', 'Pesan berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus pesan!');
        }
    }
}

