<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogsSeeder extends Seeder
{
    public function run()
    {
        $blogs = [
            [
                'title'            => 'Tips Memilih Framework PHP yang Tepat',
                'slug'             => 'tips-memilih-framework-php-yang-tepat',
                'excerpt'          => 'Panduan lengkap untuk memilih framework PHP yang sesuai dengan kebutuhan project Anda.',
                'content'          => '<p>Memilih framework PHP yang tepat adalah langkah penting dalam pengembangan aplikasi web. Artikel ini akan membahas berbagai framework PHP populer seperti Laravel, CodeIgniter, Symfony, dan lainnya, serta tips untuk memilih yang sesuai dengan kebutuhan project Anda.</p><p>Setiap framework memiliki kelebihan dan kekurangan masing-masing. Laravel dikenal dengan ecosystem yang lengkap, CodeIgniter lebih ringan dan mudah dipelajari, sementara Symfony sangat powerful untuk aplikasi enterprise.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/007bff/ffffff?text=PHP+Framework',
                'category'          => 'Programming',
                'tags'             => 'PHP, Framework, Web Development, Programming',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 250,
                'meta_keywords'    => 'PHP framework, Laravel, CodeIgniter, web development',
                'meta_description' => 'Panduan lengkap memilih framework PHP yang tepat untuk project Anda',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'title'            => 'Best Practices untuk Web Security',
                'slug'             => 'best-practices-untuk-web-security',
                'excerpt'          => 'Pelajari cara mengamankan website Anda dari berbagai ancaman keamanan dengan best practices yang terbukti efektif.',
                'content'          => '<p>Keamanan website adalah aspek yang sangat penting dalam pengembangan web. Artikel ini akan membahas berbagai best practices untuk mengamankan website, mulai dari input validation, SQL injection prevention, XSS protection, hingga penggunaan HTTPS dan secure authentication.</p><p>Selalu validasi input dari user, gunakan prepared statements untuk database queries, sanitize output untuk mencegah XSS, dan pastikan menggunakan HTTPS untuk transmisi data sensitif.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/28a745/ffffff?text=Web+Security',
                'category'          => 'Security',
                'tags'             => 'Security, Web Development, Best Practices',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 180,
                'meta_keywords'    => 'web security, security best practices, secure coding',
                'meta_description' => 'Best practices untuk mengamankan website dari berbagai ancaman',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
            [
                'title'            => 'Mengoptimalkan Performa Website',
                'slug'             => 'mengoptimalkan-performa-website',
                'excerpt'          => 'Tips dan trik untuk meningkatkan kecepatan dan performa website Anda.',
                'content'          => '<p>Performa website sangat mempengaruhi user experience dan SEO. Artikel ini akan membahas berbagai teknik optimasi seperti minification, caching, image optimization, CDN, dan lazy loading.</p><p>Optimasi database queries, gunakan caching untuk mengurangi load server, kompres gambar, dan manfaatkan CDN untuk distribusi konten yang lebih cepat.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/ffc107/000000?text=Performance',
                'category'          => 'Optimization',
                'tags'             => 'Performance, Optimization, Web Development',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 95,
                'meta_keywords'    => 'website optimization, performance, speed optimization',
                'meta_description' => 'Tips mengoptimalkan performa dan kecepatan website',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ];

        $this->db->table('blogs')->insertBatch($blogs);
    }
}

