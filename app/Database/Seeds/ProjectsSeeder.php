<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        $projects = [
            [
                'title'            => 'E-Commerce Website',
                'slug'              => 'ecommerce-website',
                'category'          => 'Web Development',
                'tags'              => 'PHP, CodeIgniter, MySQL, Bootstrap',
                'description'       => 'Website e-commerce lengkap dengan sistem pembayaran dan manajemen produk',
                'full_description'  => 'Website e-commerce yang dikembangkan menggunakan CodeIgniter 4 dengan fitur lengkap seperti manajemen produk, keranjang belanja, sistem pembayaran, dan dashboard admin. Website ini responsive dan user-friendly.',
                'image_url'         => 'https://via.placeholder.com/800x600/007bff/ffffff?text=E-Commerce+Website',
                'thumbnail_url'     => 'https://via.placeholder.com/400x300/007bff/ffffff?text=E-Commerce',
                'link'              => 'https://example.com/ecommerce',
                'github_link'       => 'https://github.com/example/ecommerce',
                'client_name'       => 'PT. Toko Online',
                'project_date'      => '2024-01-15',
                'status'            => 'published',
                'featured'          => 1,
                'views'             => 150,
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'title'            => 'Company Profile Website',
                'slug'              => 'company-profile-website',
                'category'          => 'Web Design',
                'tags'              => 'HTML, CSS, JavaScript, Bootstrap',
                'description'       => 'Website company profile modern dengan desain yang menarik',
                'full_description'  => 'Website company profile dengan desain modern dan responsive. Dilengkapi dengan animasi smooth dan user experience yang optimal.',
                'image_url'         => 'https://via.placeholder.com/800x600/28a745/ffffff?text=Company+Profile',
                'thumbnail_url'     => 'https://via.placeholder.com/400x300/28a745/ffffff?text=Profile',
                'link'              => 'https://example.com/company',
                'github_link'       => null,
                'client_name'       => 'CV. Perusahaan Maju',
                'project_date'      => '2024-02-20',
                'status'            => 'published',
                'featured'          => 1,
                'views'             => 120,
                'created_at'        => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title'            => 'Blog Platform',
                'slug'              => 'blog-platform',
                'category'          => 'Web Development',
                'tags'              => 'PHP, MySQL, JavaScript, AJAX',
                'description'       => 'Platform blog dengan fitur CMS lengkap',
                'full_description'  => 'Platform blog yang dikembangkan dengan fitur CMS lengkap, manajemen artikel, kategori, tag, dan komentar. Dilengkapi dengan editor WYSIWYG dan sistem pencarian.',
                'image_url'         => 'https://via.placeholder.com/800x600/ffc107/000000?text=Blog+Platform',
                'thumbnail_url'     => 'https://via.placeholder.com/400x300/ffc107/000000?text=Blog',
                'link'              => 'https://example.com/blog',
                'github_link'       => 'https://github.com/example/blog',
                'client_name'       => 'Personal Project',
                'project_date'      => '2024-03-10',
                'status'            => 'published',
                'featured'          => 0,
                'views'             => 80,
                'created_at'        => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
        ];

        $this->db->table('projects')->insertBatch($projects);
    }
}

