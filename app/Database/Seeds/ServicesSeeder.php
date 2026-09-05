<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'icon'              => 'code-slash',
                'title'             => 'Web Development',
                'description'       => 'Pembuatan website custom sesuai kebutuhan Anda dengan teknologi terdepan dan best practices.',
                'short_description' => 'Pembuatan website custom dengan teknologi modern',
                'price'             => null,
                'duration'          => '2-4 minggu',
                'features'          => 'Responsive Design, SEO Friendly, Fast Loading, Secure, Modern UI/UX',
                'order'             => 1,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'phone',
                'title'             => 'Responsive Design',
                'description'       => 'Website yang tampil sempurna di semua perangkat mulai dari desktop, tablet, hingga smartphone.',
                'short_description' => 'Website responsive untuk semua perangkat',
                'price'             => null,
                'duration'          => '1-2 minggu',
                'features'          => 'Mobile First, Cross Browser Compatible, Touch Friendly, Fast Performance',
                'order'             => 2,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'tools',
                'title'             => 'Website Maintenance',
                'description'       => 'Perawatan dan update website secara berkala untuk menjaga performa dan keamanan.',
                'short_description' => 'Perawatan dan update website berkala',
                'price'             => null,
                'duration'          => 'Ongoing',
                'features'          => 'Regular Updates, Security Patches, Backup, Performance Monitoring, Bug Fixes',
                'order'             => 3,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'palette',
                'title'             => 'UI/UX Design',
                'description'       => 'Desain interface yang menarik dan user experience yang optimal untuk meningkatkan engagement.',
                'short_description' => 'Desain UI/UX yang menarik dan user-friendly',
                'price'             => null,
                'duration'          => '1-3 minggu',
                'features'          => 'User Research, Wireframing, Prototyping, Design System, Usability Testing',
                'order'             => 4,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('services')->insertBatch($services);
    }
}

