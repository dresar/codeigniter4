<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'client_name'     => 'Budi Santoso',
                'client_position' => 'CEO',
                'client_company'  => 'PT. Toko Online',
                'client_image'    => 'https://via.placeholder.com/150/007bff/ffffff?text=BS',
                'testimonial'     => 'Pelayanan sangat memuaskan, website yang dibuat sesuai dengan ekspektasi. Tim sangat profesional dan responsif dalam menangani setiap kebutuhan kami.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order'           => 1,
                'created_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'client_name'     => 'Siti Nurhaliza',
                'client_position' => 'Marketing Manager',
                'client_company'  => 'CV. Perusahaan Maju',
                'client_image'    => 'https://via.placeholder.com/150/28a745/ffffff?text=SN',
                'testimonial'     => 'Professional dan on-time delivery. Highly recommended! Website yang dibuat sangat user-friendly dan meningkatkan conversion rate kami secara signifikan.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order'           => 2,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'client_name'     => 'Ahmad Fauzi',
                'client_position' => 'Founder',
                'client_company'  => 'Startup Tech',
                'client_image'    => 'https://via.placeholder.com/150/ffc107/000000?text=AF',
                'testimonial'     => 'Hasil kerja yang sangat baik, komunikasi juga lancar. Website yang dibuat sesuai dengan timeline dan budget yang disepakati.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order'           => 3,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
        ];

        $this->db->table('testimonials')->insertBatch($testimonials);
    }
}

