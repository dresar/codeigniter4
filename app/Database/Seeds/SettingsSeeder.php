<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'site_title'        => 'Portfolio Saya - Web Developer & Designer',
            'site_description' => 'Portfolio profesional untuk showcase project dan skill dalam web development',
            'owner_name'        => 'Nama Anda',
            'owner_title'       => 'Full Stack Web Developer',
            'owner_bio'         => 'Saya adalah seorang Full Stack Web Developer dengan pengalaman lebih dari 5 tahun dalam mengembangkan aplikasi web modern menggunakan berbagai teknologi terdepan.',
            'about_text'        => 'Saya adalah seorang developer yang passionate dalam membuat aplikasi web yang menarik dan fungsional. Dengan keahlian dalam PHP, JavaScript, dan berbagai framework modern, saya siap membantu mewujudkan ide Anda menjadi aplikasi web yang powerful dan user-friendly.',
            'email'             => 'contact@portfolio.com',
            'phone'             => '+62 812-3456-7890',
            'address'           => 'Jakarta, Indonesia',
            'social_facebook'   => 'https://facebook.com/yourprofile',
            'social_twitter'    => 'https://twitter.com/yourprofile',
            'social_instagram'  => 'https://instagram.com/yourprofile',
            'social_linkedin'   => 'https://linkedin.com/in/yourprofile',
            'social_github'     => 'https://github.com/yourprofile',
            'footer_text'       => '© 2024 Portfolio Saya. All rights reserved.',
            'meta_keywords'     => 'web developer, portfolio, codeigniter, php developer, full stack developer',
            'meta_description'  => 'Portfolio profesional web developer dengan showcase project dan skill dalam pengembangan aplikasi web modern',
        ];

        $this->db->table('settings')->insert($data);
    }
}

