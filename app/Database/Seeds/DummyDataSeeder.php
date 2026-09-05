<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Tidak menggunakan transaction untuk menghindari rollback

        // 1. Users - Pastikan user admin ada
        $adminExists = $this->db->table('users')->where('username', 'admin')->countAllResults();
        if ($adminExists == 0) {
            $this->db->table('users')->insert([
                'username'   => 'admin',
                'email'      => 'admin@portfolio.com',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'full_name'  => 'Administrator',
                'role'       => 'admin',
                'status'     => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            echo "✓ User admin dibuat\n";
        } else {
            // Update password jika sudah ada
            $this->db->table('users')->where('username', 'admin')->update([
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
            ]);
            echo "✓ User admin password diupdate\n";
        }

        // 2. Settings
        $settingsExists = $this->db->table('settings')->countAllResults();
        if ($settingsExists == 0) {
            $this->db->table('settings')->insert([
                'site_title'        => 'Portfolio Saya - Web Developer & Designer',
                'site_description' => 'Portfolio profesional untuk showcase project dan skill dalam web development',
                'owner_name'        => 'John Doe',
                'owner_title'       => 'Full Stack Web Developer',
                'owner_bio'         => 'Saya adalah seorang Full Stack Web Developer dengan pengalaman lebih dari 5 tahun dalam mengembangkan aplikasi web modern menggunakan berbagai teknologi terdepan seperti PHP, JavaScript, Python, dan framework modern.',
                'about_text'        => 'Saya adalah seorang developer yang passionate dalam membuat aplikasi web yang menarik dan fungsional. Dengan keahlian dalam PHP, JavaScript, dan berbagai framework modern, saya siap membantu mewujudkan ide Anda menjadi aplikasi web yang powerful dan user-friendly.',
                'email'             => 'contact@portfolio.com',
                'phone'             => '+62 812-3456-7890',
                'address'           => 'Jakarta, Indonesia',
                'social_facebook'   => 'https://facebook.com/johndoe',
                'social_twitter'    => 'https://twitter.com/johndoe',
                'social_instagram'  => 'https://instagram.com/johndoe',
                'social_linkedin'   => 'https://linkedin.com/in/johndoe',
                'social_github'     => 'https://github.com/johndoe',
                'footer_text'       => '© 2024 Portfolio Saya. All rights reserved.',
                'meta_keywords'     => 'web developer, portfolio, codeigniter, php developer, full stack developer',
                'meta_description'  => 'Portfolio profesional web developer dengan showcase project dan skill dalam pengembangan aplikasi web modern',
            ]);
            echo "✓ Settings dibuat\n";
        }

        // 3. Projects - 10 Projects
        $projects = [
            [
                'title'            => 'E-Commerce Website',
                'slug'             => 'ecommerce-website',
                'category'         => 'Web Development',
                'tags'             => 'PHP, CodeIgniter, MySQL, Bootstrap, JavaScript',
                'description'      => 'Website e-commerce lengkap dengan sistem pembayaran dan manajemen produk',
                'full_description' => 'Website e-commerce yang dikembangkan menggunakan CodeIgniter 4 dengan fitur lengkap seperti manajemen produk, keranjang belanja, sistem pembayaran, dan dashboard admin. Website ini responsive dan user-friendly dengan desain modern.',
                'image_url'        => 'https://via.placeholder.com/800x600/007bff/ffffff?text=E-Commerce+Website',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/007bff/ffffff?text=E-Commerce',
                'link'             => 'https://example.com/ecommerce',
                'github_link'      => 'https://github.com/example/ecommerce',
                'client_name'      => 'PT. Toko Online',
                'project_date'     => '2024-01-15',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 250,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-30 days')),
            ],
            [
                'title'            => 'Company Profile Website',
                'slug'             => 'company-profile-website',
                'category'         => 'Web Design',
                'tags'             => 'HTML, CSS, JavaScript, Bootstrap, Responsive',
                'description'      => 'Website company profile modern dengan desain yang menarik',
                'full_description' => 'Website company profile dengan desain modern dan responsive. Dilengkapi dengan animasi smooth dan user experience yang optimal. Website ini menggunakan teknologi terbaru untuk performa yang cepat.',
                'image_url'        => 'https://via.placeholder.com/800x600/28a745/ffffff?text=Company+Profile',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/28a745/ffffff?text=Profile',
                'link'             => 'https://example.com/company',
                'github_link'      => null,
                'client_name'      => 'CV. Perusahaan Maju',
                'project_date'     => '2024-02-20',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 180,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-25 days')),
            ],
            [
                'title'            => 'Blog Platform',
                'slug'             => 'blog-platform',
                'category'         => 'Web Development',
                'tags'             => 'PHP, MySQL, JavaScript, AJAX, CMS',
                'description'      => 'Platform blog dengan fitur CMS lengkap',
                'full_description' => 'Platform blog yang dikembangkan dengan fitur CMS lengkap, manajemen artikel, kategori, tag, dan komentar. Dilengkapi dengan editor WYSIWYG dan sistem pencarian yang powerful.',
                'image_url'        => 'https://via.placeholder.com/800x600/ffc107/000000?text=Blog+Platform',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/ffc107/000000?text=Blog',
                'link'             => 'https://example.com/blog',
                'github_link'      => 'https://github.com/example/blog',
                'client_name'      => 'Personal Project',
                'project_date'     => '2024-03-10',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 120,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-20 days')),
            ],
            [
                'title'            => 'Restaurant Management System',
                'slug'             => 'restaurant-management-system',
                'category'         => 'Web Application',
                'tags'             => 'PHP, CodeIgniter, MySQL, jQuery',
                'description'      => 'Sistem manajemen restoran dengan fitur order dan inventory',
                'full_description' => 'Aplikasi web untuk manajemen restoran lengkap dengan sistem pemesanan online, manajemen menu, inventory, laporan penjualan, dan dashboard analytics.',
                'image_url'        => 'https://via.placeholder.com/800x600/dc3545/ffffff?text=Restaurant+System',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/dc3545/ffffff?text=Restaurant',
                'link'             => 'https://example.com/restaurant',
                'github_link'      => 'https://github.com/example/restaurant',
                'client_name'      => 'Resto Sejahtera',
                'project_date'     => '2024-04-05',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 95,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-15 days')),
            ],
            [
                'title'            => 'School Management System',
                'slug'             => 'school-management-system',
                'category'         => 'Web Application',
                'tags'             => 'PHP, Laravel, MySQL, Vue.js',
                'description'      => 'Sistem manajemen sekolah dengan fitur lengkap',
                'full_description' => 'Aplikasi web untuk manajemen sekolah dengan fitur manajemen siswa, guru, jadwal, nilai, dan laporan. Dilengkapi dengan dashboard untuk admin, guru, dan siswa.',
                'image_url'        => 'https://via.placeholder.com/800x600/17a2b8/ffffff?text=School+System',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/17a2b8/ffffff?text=School',
                'link'             => 'https://example.com/school',
                'github_link'      => 'https://github.com/example/school',
                'client_name'      => 'SMA Negeri 1',
                'project_date'     => '2024-05-12',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 75,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-10 days')),
            ],
            [
                'title'            => 'Hotel Booking System',
                'slug'             => 'hotel-booking-system',
                'category'         => 'Web Application',
                'tags'             => 'PHP, CodeIgniter, MySQL, Bootstrap',
                'description'      => 'Sistem booking hotel dengan payment gateway',
                'full_description' => 'Aplikasi web untuk booking hotel dengan fitur pencarian kamar, booking online, payment gateway, dan manajemen reservasi. Dilengkapi dengan admin panel yang lengkap.',
                'image_url'        => 'https://via.placeholder.com/800x600/6f42c1/ffffff?text=Hotel+Booking',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/6f42c1/ffffff?text=Hotel',
                'link'             => 'https://example.com/hotel',
                'github_link'      => null,
                'client_name'      => 'Hotel Grand',
                'project_date'     => '2024-06-01',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 150,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'title'            => 'Portfolio Website',
                'slug'             => 'portfolio-website',
                'category'         => 'Web Design',
                'tags'             => 'HTML, CSS, JavaScript, Bootstrap',
                'description'      => 'Website portfolio modern dan responsive',
                'full_description' => 'Website portfolio dengan desain modern, responsive, dan animasi yang menarik. Dilengkapi dengan section showcase project, skills, dan contact form.',
                'image_url'        => 'https://via.placeholder.com/800x600/20c997/ffffff?text=Portfolio',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/20c997/ffffff?text=Portfolio',
                'link'             => 'https://example.com/portfolio',
                'github_link'      => 'https://github.com/example/portfolio',
                'client_name'      => 'Freelance Client',
                'project_date'     => '2024-06-15',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 60,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
            [
                'title'            => 'Inventory Management',
                'slug'             => 'inventory-management',
                'category'         => 'Web Application',
                'tags'             => 'PHP, CodeIgniter, MySQL, DataTables',
                'description'      => 'Sistem manajemen inventory dengan laporan lengkap',
                'full_description' => 'Aplikasi web untuk manajemen inventory dengan fitur stock management, supplier management, purchase order, sales, dan laporan lengkap.',
                'image_url'        => 'https://via.placeholder.com/800x600/fd7e14/ffffff?text=Inventory',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/fd7e14/ffffff?text=Inventory',
                'link'             => 'https://example.com/inventory',
                'github_link'      => 'https://github.com/example/inventory',
                'client_name'      => 'PT. Distribusi',
                'project_date'     => '2024-07-01',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 45,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'title'            => 'Event Management System',
                'slug'             => 'event-management-system',
                'category'         => 'Web Application',
                'tags'             => 'PHP, Laravel, MySQL, Vue.js',
                'description'      => 'Sistem manajemen event dengan ticketing',
                'full_description' => 'Aplikasi web untuk manajemen event dengan fitur pembuatan event, ticketing online, payment gateway, dan manajemen peserta.',
                'image_url'        => 'https://via.placeholder.com/800x600/e83e8c/ffffff?text=Event+System',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/e83e8c/ffffff?text=Event',
                'link'             => 'https://example.com/event',
                'github_link'      => 'https://github.com/example/event',
                'client_name'      => 'Event Organizer',
                'project_date'     => '2024-07-10',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 110,
                'created_at'       => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title'            => 'Landing Page Design',
                'slug'             => 'landing-page-design',
                'category'         => 'Web Design',
                'tags'             => 'HTML, CSS, JavaScript, Bootstrap, Animation',
                'description'      => 'Landing page modern dengan animasi menarik',
                'full_description' => 'Landing page dengan desain modern, animasi smooth, dan conversion optimization. Dilengkapi dengan form lead generation dan integration dengan email marketing.',
                'image_url'        => 'https://via.placeholder.com/800x600/6610f2/ffffff?text=Landing+Page',
                'thumbnail_url'    => 'https://via.placeholder.com/400x300/6610f2/ffffff?text=Landing',
                'link'             => 'https://example.com/landing',
                'github_link'      => null,
                'client_name'      => 'Startup Company',
                'project_date'     => '2024-07-15',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 85,
                'created_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        // Hapus data lama dan insert baru
        $this->db->table('projects')->where('id >=', 1)->delete();
        $this->db->table('projects')->insertBatch($projects);
        echo "✓ 10 Projects dibuat\n";

        // 4. Services - 6 Services
        $services = [
            [
                'icon'              => 'code-slash',
                'title'             => 'Web Development',
                'description'       => 'Pembuatan website custom sesuai kebutuhan Anda dengan teknologi terdepan dan best practices. Dari website sederhana hingga aplikasi web kompleks.',
                'short_description' => 'Pembuatan website custom dengan teknologi modern',
                'price'             => null,
                'duration'          => '2-4 minggu',
                'features'          => 'Responsive Design, SEO Friendly, Fast Loading, Secure, Modern UI/UX, Cross Browser Compatible',
                'order_index'       => 1,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'phone',
                'title'             => 'Responsive Design',
                'description'       => 'Website yang tampil sempurna di semua perangkat mulai dari desktop, tablet, hingga smartphone. Memastikan user experience yang optimal di semua device.',
                'short_description' => 'Website responsive untuk semua perangkat',
                'price'             => null,
                'duration'          => '1-2 minggu',
                'features'          => 'Mobile First, Cross Browser Compatible, Touch Friendly, Fast Performance, Adaptive Layout',
                'order_index'       => 2,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'tools',
                'title'             => 'Website Maintenance',
                'description'       => 'Perawatan dan update website secara berkala untuk menjaga performa dan keamanan. Termasuk backup, security update, dan performance optimization.',
                'short_description' => 'Perawatan dan update website berkala',
                'price'             => null,
                'duration'          => 'Ongoing',
                'features'          => 'Regular Updates, Security Patches, Backup, Performance Monitoring, Bug Fixes, Content Updates',
                'order_index'       => 3,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'palette',
                'title'             => 'UI/UX Design',
                'description'       => 'Desain interface yang menarik dan user experience yang optimal untuk meningkatkan engagement dan conversion rate.',
                'short_description' => 'Desain UI/UX yang menarik dan user-friendly',
                'price'             => null,
                'duration'          => '1-3 minggu',
                'features'          => 'User Research, Wireframing, Prototyping, Design System, Usability Testing, User Flow',
                'order_index'       => 4,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'database',
                'title'             => 'Database Design',
                'description'       => 'Desain dan optimasi database untuk performa yang optimal. Termasuk normalization, indexing, dan query optimization.',
                'short_description' => 'Desain dan optimasi database',
                'price'             => null,
                'duration'          => '1-2 minggu',
                'features'          => 'Database Design, Normalization, Indexing, Query Optimization, Backup Strategy',
                'order_index'       => 5,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'icon'              => 'cloud',
                'title'             => 'Cloud Deployment',
                'description'       => 'Deployment aplikasi ke cloud dengan konfigurasi optimal untuk scalability dan reliability.',
                'short_description' => 'Deployment aplikasi ke cloud',
                'price'             => null,
                'duration'          => '3-5 hari',
                'features'          => 'Cloud Setup, SSL Configuration, Domain Setup, CDN, Monitoring, Auto Scaling',
                'order_index'       => 6,
                'status'            => 'active',
                'created_at'        => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('services')->where('id >=', 1)->delete();
        $this->db->table('services')->insertBatch($services);
        echo "✓ 6 Services dibuat\n";

        // 5. Blogs - 8 Blogs
        $blogs = [
            [
                'title'            => 'Tips Memilih Framework PHP yang Tepat',
                'slug'             => 'tips-memilih-framework-php-yang-tepat',
                'excerpt'          => 'Panduan lengkap untuk memilih framework PHP yang sesuai dengan kebutuhan project Anda. Pelajari perbandingan Laravel, CodeIgniter, Symfony, dan framework lainnya.',
                'content'          => '<p>Memilih framework PHP yang tepat adalah langkah penting dalam pengembangan aplikasi web. Artikel ini akan membahas berbagai framework PHP populer seperti Laravel, CodeIgniter, Symfony, dan lainnya, serta tips untuk memilih yang sesuai dengan kebutuhan project Anda.</p><p>Setiap framework memiliki kelebihan dan kekurangan masing-masing. Laravel dikenal dengan ecosystem yang lengkap dan dokumentasi yang sangat baik. CodeIgniter lebih ringan dan mudah dipelajari, cocok untuk project kecil hingga menengah. Sementara Symfony sangat powerful untuk aplikasi enterprise dengan arsitektur yang sangat fleksibel.</p><p>Faktor yang perlu dipertimbangkan dalam memilih framework termasuk ukuran project, tim development, deadline, dan budget. Untuk project kecil, CodeIgniter atau framework ringan lainnya mungkin lebih cocok. Untuk project besar dengan tim yang berpengalaman, Laravel atau Symfony bisa menjadi pilihan yang tepat.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/007bff/ffffff?text=PHP+Framework',
                'category'          => 'Programming',
                'tags'             => 'PHP, Framework, Web Development, Programming, Laravel, CodeIgniter',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 350,
                'meta_keywords'    => 'PHP framework, Laravel, CodeIgniter, web development, programming',
                'meta_description' => 'Panduan lengkap memilih framework PHP yang tepat untuk project Anda',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-30 days')),
            ],
            [
                'title'            => 'Best Practices untuk Web Security',
                'slug'             => 'best-practices-untuk-web-security',
                'excerpt'          => 'Pelajari cara mengamankan website Anda dari berbagai ancaman keamanan dengan best practices yang terbukti efektif. Dari input validation hingga secure authentication.',
                'content'          => '<p>Keamanan website adalah aspek yang sangat penting dalam pengembangan web. Artikel ini akan membahas berbagai best practices untuk mengamankan website, mulai dari input validation, SQL injection prevention, XSS protection, hingga penggunaan HTTPS dan secure authentication.</p><p>Selalu validasi input dari user, gunakan prepared statements untuk database queries, sanitize output untuk mencegah XSS, dan pastikan menggunakan HTTPS untuk transmisi data sensitif. Implementasikan juga rate limiting untuk mencegah brute force attack dan gunakan password hashing yang kuat seperti bcrypt atau argon2.</p><p>Regular security audit dan update juga sangat penting. Pastikan semua dependencies selalu up-to-date dan lakukan penetration testing secara berkala untuk menemukan vulnerability sebelum attacker menemukannya.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/28a745/ffffff?text=Web+Security',
                'category'          => 'Security',
                'tags'             => 'Security, Web Development, Best Practices, PHP Security',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 280,
                'meta_keywords'    => 'web security, security best practices, secure coding, PHP security',
                'meta_description' => 'Best practices untuk mengamankan website dari berbagai ancaman',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-25 days')),
            ],
            [
                'title'            => 'Mengoptimalkan Performa Website',
                'slug'             => 'mengoptimalkan-performa-website',
                'excerpt'          => 'Tips dan trik untuk meningkatkan kecepatan dan performa website Anda. Pelajari teknik optimasi seperti caching, minification, dan CDN.',
                'content'          => '<p>Performa website sangat mempengaruhi user experience dan SEO. Artikel ini akan membahas berbagai teknik optimasi seperti minification, caching, image optimization, CDN, dan lazy loading.</p><p>Optimasi database queries, gunakan caching untuk mengurangi load server, kompres gambar, dan manfaatkan CDN untuk distribusi konten yang lebih cepat. Implementasikan juga lazy loading untuk images dan defer JavaScript untuk meningkatkan initial page load time.</p><p>Monitor performa website secara berkala menggunakan tools seperti Google PageSpeed Insights, GTmetrix, atau WebPageTest. Identifikasi bottleneck dan optimasi secara bertahap untuk mendapatkan hasil yang optimal.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/ffc107/000000?text=Performance',
                'category'          => 'Optimization',
                'tags'             => 'Performance, Optimization, Web Development, Speed',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 195,
                'meta_keywords'    => 'website optimization, performance, speed optimization, web performance',
                'meta_description' => 'Tips mengoptimalkan performa dan kecepatan website',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-20 days')),
            ],
            [
                'title'            => 'Mengenal RESTful API',
                'slug'             => 'mengenal-restful-api',
                'excerpt'          => 'Panduan lengkap tentang RESTful API, dari konsep dasar hingga implementasi praktis. Pelajari cara membuat API yang baik dan benar.',
                'content'          => '<p>RESTful API adalah arsitektur untuk membangun web services yang menggunakan HTTP methods untuk operasi CRUD. Artikel ini akan membahas konsep dasar REST, HTTP methods, status codes, dan best practices dalam membuat RESTful API.</p><p>Gunakan HTTP methods dengan benar: GET untuk membaca data, POST untuk membuat data baru, PUT untuk update seluruh resource, PATCH untuk partial update, dan DELETE untuk menghapus data. Gunakan status codes yang sesuai seperti 200 untuk success, 201 untuk created, 400 untuk bad request, 404 untuk not found, dan 500 untuk server error.</p><p>Implementasikan juga authentication yang aman, rate limiting, versioning, dan dokumentasi yang lengkap. Gunakan format JSON untuk response dan pastikan error handling yang baik.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/17a2b8/ffffff?text=RESTful+API',
                'category'          => 'API',
                'tags'             => 'API, REST, Web Development, Backend',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 220,
                'meta_keywords'    => 'RESTful API, API development, web services, backend',
                'meta_description' => 'Panduan lengkap tentang RESTful API dan implementasinya',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-15 days')),
            ],
            [
                'title'            => 'Responsive Design dengan Bootstrap 5',
                'slug'             => 'responsive-design-dengan-bootstrap-5',
                'excerpt'          => 'Pelajari cara membuat website responsive menggunakan Bootstrap 5. Dari grid system hingga utility classes yang powerful.',
                'content'          => '<p>Bootstrap 5 adalah framework CSS yang powerful untuk membuat website responsive dengan cepat. Artikel ini akan membahas grid system, components, utilities, dan best practices dalam menggunakan Bootstrap 5.</p><p>Gunakan grid system Bootstrap untuk membuat layout yang responsive. Pahami breakpoints dan gunakan dengan tepat. Manfaatkan juga utility classes untuk spacing, colors, typography, dan lainnya untuk development yang lebih cepat.</p><p>Customize Bootstrap sesuai kebutuhan dengan menggunakan SASS variables. Jangan lupa untuk optimize CSS dengan menghapus components yang tidak digunakan untuk mengurangi file size.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/6f42c1/ffffff?text=Bootstrap+5',
                'category'          => 'Frontend',
                'tags'             => 'Bootstrap, CSS, Responsive Design, Frontend',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 165,
                'meta_keywords'    => 'Bootstrap 5, responsive design, CSS framework, frontend',
                'meta_description' => 'Panduan menggunakan Bootstrap 5 untuk responsive design',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-10 days')),
            ],
            [
                'title'            => 'Database Normalization',
                'slug'             => 'database-normalization',
                'excerpt'          => 'Pahami konsep database normalization untuk membuat struktur database yang efisien dan menghindari data redundancy.',
                'content'          => '<p>Database normalization adalah proses mengorganisir data dalam database untuk menghindari redundancy dan inconsistency. Artikel ini akan membahas normal forms (1NF, 2NF, 3NF, BCNF) dan contoh praktis implementasinya.</p><p>First Normal Form (1NF) mengharuskan setiap kolom hanya berisi atomic values. Second Normal Form (2NF) mengharuskan tabel sudah dalam 1NF dan semua non-key attributes fully dependent pada primary key. Third Normal Form (3NF) mengharuskan tidak ada transitive dependency.</p><p>Normalization membantu mengurangi data redundancy, meningkatkan data integrity, dan memudahkan maintenance. Namun, terkadang denormalization diperlukan untuk meningkatkan performa query.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/dc3545/ffffff?text=Database',
                'category'          => 'Database',
                'tags'             => 'Database, Normalization, SQL, Data Modeling',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 140,
                'meta_keywords'    => 'database normalization, SQL, data modeling, database design',
                'meta_description' => 'Panduan database normalization untuk struktur database yang efisien',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-7 days')),
            ],
            [
                'title'            => 'Git Workflow untuk Team Development',
                'slug'             => 'git-workflow-untuk-team-development',
                'excerpt'          => 'Pelajari workflow Git yang efektif untuk development dalam tim. Dari branching strategy hingga code review process.',
                'content'          => '<p>Git workflow yang baik sangat penting untuk development dalam tim. Artikel ini akan membahas berbagai workflow seperti Git Flow, GitHub Flow, dan GitLab Flow, serta best practices untuk collaboration.</p><p>Gunakan branching strategy yang jelas seperti feature branches untuk development, develop branch untuk integration, dan main/master branch untuk production. Implementasikan juga code review process dan CI/CD untuk quality assurance.</p><p>Commit messages yang jelas dan descriptive sangat penting. Gunakan conventional commits format untuk consistency. Lakukan regular merge dan rebase untuk menjaga branch tetap up-to-date.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/20c997/ffffff?text=Git+Workflow',
                'category'          => 'DevOps',
                'tags'             => 'Git, Version Control, DevOps, Team Collaboration',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 1,
                'views'            => 180,
                'meta_keywords'    => 'Git workflow, version control, DevOps, team collaboration',
                'meta_description' => 'Panduan Git workflow untuk development dalam tim',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'title'            => 'Modern JavaScript ES6+ Features',
                'slug'             => 'modern-javascript-es6-features',
                'excerpt'          => 'Pelajari fitur-fitur modern JavaScript ES6+ yang membuat coding lebih mudah dan powerful. Dari arrow functions hingga async/await.',
                'content'          => '<p>ES6+ membawa banyak fitur baru yang membuat JavaScript lebih powerful dan mudah digunakan. Artikel ini akan membahas arrow functions, destructuring, spread operator, template literals, promises, async/await, dan banyak lagi.</p><p>Arrow functions membuat syntax lebih concise dan memiliki lexical this binding. Destructuring memudahkan extract values dari objects dan arrays. Spread operator memudahkan copy dan merge arrays/objects.</p><p>Async/await membuat asynchronous code lebih readable dan mudah di-debug dibandingkan callback atau promises. Gunakan fitur-fitur modern ini untuk membuat code yang lebih clean dan maintainable.</p>',
                'featured_image'   => 'https://via.placeholder.com/800x400/fd7e14/ffffff?text=JavaScript+ES6',
                'category'          => 'Programming',
                'tags'             => 'JavaScript, ES6, Programming, Frontend',
                'author'           => 'Admin',
                'status'           => 'published',
                'featured'         => 0,
                'views'            => 125,
                'meta_keywords'    => 'JavaScript ES6, modern JavaScript, programming, frontend',
                'meta_description' => 'Panduan fitur-fitur modern JavaScript ES6+',
                'created_at'       => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ];

        $this->db->table('blogs')->where('id >=', 1)->delete();
        $this->db->table('blogs')->insertBatch($blogs);
        echo "✓ 8 Blogs dibuat\n";

        // 6. Testimonials - 6 Testimonials
        $testimonials = [
            [
                'client_name'     => 'Budi Santoso',
                'client_position' => 'CEO',
                'client_company'  => 'PT. Toko Online',
                'client_image'    => 'https://via.placeholder.com/150/007bff/ffffff?text=BS',
                'testimonial'     => 'Pelayanan sangat memuaskan, website yang dibuat sesuai dengan ekspektasi. Tim sangat profesional dan responsif dalam menangani setiap kebutuhan kami. Website e-commerce yang dibuat sangat membantu meningkatkan penjualan online kami.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order_index'     => 1,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-30 days')),
            ],
            [
                'client_name'     => 'Siti Nurhaliza',
                'client_position' => 'Marketing Manager',
                'client_company'  => 'CV. Perusahaan Maju',
                'client_image'    => 'https://via.placeholder.com/150/28a745/ffffff?text=SN',
                'testimonial'     => 'Professional dan on-time delivery. Highly recommended! Website yang dibuat sangat user-friendly dan meningkatkan conversion rate kami secara signifikan. Support setelah launch juga sangat baik.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order_index'     => 2,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-25 days')),
            ],
            [
                'client_name'     => 'Ahmad Fauzi',
                'client_position' => 'Founder',
                'client_company'  => 'Startup Tech',
                'client_image'    => 'https://via.placeholder.com/150/ffc107/000000?text=AF',
                'testimonial'     => 'Hasil kerja yang sangat baik, komunikasi juga lancar. Website yang dibuat sesuai dengan timeline dan budget yang disepakati. Sangat puas dengan hasilnya dan akan menggunakan jasa lagi untuk project selanjutnya.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order_index'     => 3,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-20 days')),
            ],
            [
                'client_name'     => 'Dewi Lestari',
                'client_position' => 'Owner',
                'client_company'  => 'Resto Sejahtera',
                'client_image'    => 'https://via.placeholder.com/150/dc3545/ffffff?text=DL',
                'testimonial'     => 'Sistem manajemen restoran yang dibuat sangat membantu operasional kami. Interface yang user-friendly dan fitur yang lengkap membuat pekerjaan menjadi lebih efisien. Terima kasih banyak!',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 1,
                'order_index'     => 4,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-15 days')),
            ],
            [
                'client_name'     => 'Rudi Hermawan',
                'client_position' => 'IT Manager',
                'client_company'  => 'PT. Distribusi',
                'client_image'    => 'https://via.placeholder.com/150/17a2b8/ffffff?text=RH',
                'testimonial'     => 'Sistem inventory management yang dibuat sangat membantu dalam mengelola stock barang. Laporan yang detail dan real-time membuat decision making menjadi lebih cepat dan akurat.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 0,
                'order_index'     => 5,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-10 days')),
            ],
            [
                'client_name'     => 'Lisa Wijaya',
                'client_position' => 'Event Coordinator',
                'client_company'  => 'Event Organizer',
                'client_image'    => 'https://via.placeholder.com/150/6f42c1/ffffff?text=LW',
                'testimonial'     => 'Sistem event management dengan ticketing online sangat memudahkan kami dalam mengelola event. Proses booking yang mudah dan payment gateway yang terintegrasi membuat customer experience menjadi lebih baik.',
                'rating'          => 5,
                'status'          => 'published',
                'featured'        => 0,
                'order_index'     => 6,
                'created_at'      => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
        ];

        // Hapus testimonials lama
        $this->db->query("DELETE FROM testimonials");
        $this->db->table('testimonials')->insertBatch($testimonials);
        echo "✓ 6 Testimonials dibuat\n";

        // 7. Messages - 5 Sample Messages
        $messages = [
            [
                'name'       => 'Andi Pratama',
                'email'      => 'andi@example.com',
                'phone'      => '+62 812-1111-2222',
                'subject'    => 'Inquiry tentang Web Development',
                'message'    => 'Saya tertarik dengan jasa web development yang Anda tawarkan. Apakah bisa membuat website e-commerce? Berapa estimasi biaya dan waktu pengerjaannya?',
                'status'     => 'unread',
                'ip_address' => '192.168.1.100',
                'created_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'name'       => 'Bella Sari',
                'email'      => 'bella@example.com',
                'phone'      => '+62 812-2222-3333',
                'subject'    => 'Request Quotation',
                'message'    => 'Saya ingin membuat website company profile untuk perusahaan kami. Mohon kirimkan quotation dan portfolio yang relevan. Terima kasih.',
                'status'     => 'read',
                'read_at'    => date('Y-m-d H:i:s', strtotime('-4 days')),
                'ip_address' => '192.168.1.101',
                'created_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
            ],
            [
                'name'       => 'Cahya Putra',
                'email'      => 'cahya@example.com',
                'phone'      => '+62 812-3333-4444',
                'subject'    => 'Konsultasi Project',
                'message'    => 'Saya memiliki project website yang cukup kompleks. Apakah bisa melakukan konsultasi terlebih dahulu? Saya ingin diskusi tentang requirement dan teknologi yang akan digunakan.',
                'status'     => 'unread',
                'ip_address' => '192.168.1.102',
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
            [
                'name'       => 'Diana Kusuma',
                'email'      => 'diana@example.com',
                'phone'      => '+62 812-4444-5555',
                'subject'    => 'Maintenance Website',
                'message'    => 'Website kami perlu maintenance dan update. Apakah Anda menyediakan jasa maintenance website? Berapa biaya per bulannya?',
                'status'     => 'read',
                'read_at'    => date('Y-m-d H:i:s', strtotime('-2 days')),
                'replied'    => 1,
                'replied_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'ip_address' => '192.168.1.103',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'name'       => 'Eko Wijaya',
                'email'      => 'eko@example.com',
                'phone'      => '+62 812-5555-6666',
                'subject'    => 'Kerjasama Project',
                'message'    => 'Saya tertarik untuk bekerjasama dalam project website. Apakah Anda menerima project freelance? Mohon informasikan rate dan availability Anda.',
                'status'     => 'unread',
                'ip_address' => '192.168.1.104',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ];

        // Hapus messages lama
        $this->db->query("DELETE FROM messages");
        $this->db->table('messages')->insertBatch($messages);
        echo "✓ 5 Messages dibuat\n";

        echo "\n✅ Semua data dummy berhasil dibuat!\n";
        echo "\n📊 Summary:\n";
        echo "  - Users: 1 (admin)\n";
        echo "  - Projects: 10\n";
        echo "  - Services: 6\n";
        echo "  - Blogs: 8\n";
        echo "  - Testimonials: 6\n";
        echo "  - Messages: 5\n";
        echo "\n🔑 Login dengan:\n";
        echo "  Username: admin\n";
        echo "  Password: admin123\n";
    }
}

