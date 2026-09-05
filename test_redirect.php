<?php
/**
 * Test Redirect dan Session
 */
require __DIR__ . '/vendor/autoload.php';

define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define('APPPATH', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('WRITEPATH', __DIR__ . DIRECTORY_SEPARATOR . 'writable' . DIRECTORY_SEPARATOR);

echo "=== TEST REDIRECT & SESSION ===\n\n";

// Test 1: Cek base URL
$config = new \Config\App();
echo "1. Base URL Config:\n";
echo "   " . $config->baseURL . "\n\n";

// Test 2: Cek session config
$sessionConfig = new \Config\Session();
echo "2. Session Config:\n";
echo "   Driver: " . $sessionConfig->driver . "\n";
echo "   Save Path: " . $sessionConfig->savePath . "\n";
echo "   Cookie Name: " . $sessionConfig->cookieName . "\n\n";

// Test 3: Cek routes
echo "3. Routes:\n";
echo "   Login: /auth/login\n";
echo "   Dashboard: /admin/dashboard\n\n";

// Test 4: Cek database user
echo "4. Database User:\n";
try {
    $pdo = new PDO('sqlite:writable/database.db');
    $stmt = $pdo->query("SELECT id, username FROM users WHERE username = 'admin'");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        echo "   ✅ User admin ditemukan (ID: " . $user['id'] . ")\n";
    } else {
        echo "   ❌ User admin tidak ditemukan\n";
    }
} catch (Exception $e) {
    echo "   ❌ Error: " . $e->getMessage() . "\n";
}

echo "\n=== KESIMPULAN ===\n";
echo "Jika semua ✅, maka:\n";
echo "1. Login seharusnya berhasil\n";
echo "2. Redirect ke /admin/dashboard seharusnya bekerja\n";
echo "3. Session seharusnya tersimpan\n";
echo "\nJika masih error, cek:\n";
echo "- Log file: writable/logs/log-*.php\n";
echo "- Browser console (F12)\n";
echo "- Network tab untuk melihat redirect\n";

