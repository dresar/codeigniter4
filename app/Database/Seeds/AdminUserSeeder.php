<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'admin',
            'email'      => 'admin@portfolio.com',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'full_name'  => 'Administrator',
            'role'       => 'admin',
            'status'     => 'active',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}

