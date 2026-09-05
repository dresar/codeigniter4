<?php
/**
 * Test Login Langsung - Bypass Form
 */
require __DIR__ . '/vendor/autoload.php';

define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'codeigniter4' . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);
define('APPPATH', __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('WRITEPATH', __DIR__ . DIRECTORY_SEPARATOR . 'writable' . DIRECTORY_SEPARATOR);

echo "=== TEST LOGIN DIRECT ===\n\n";

// Test 1: Cek database
$pdo = new PDO('sqlite:writable/database.db');
$stmt = $pdo->query("SELECT * FROM users WHERE username = 'admin'");
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo "✅ User ditemukan\n";
    echo "   ID: " . $user['id'] . "\n";
    echo "   Username: " . $user['username'] . "\n";
    
    // Test password
    if (password_verify('admin123', $user['password'])) {
        echo "   ✅ Password 'admin123' BENAR\n\n";
    } else {
        echo "   ❌ Password 'admin123' SALAH\n";
        echo "   Mengupdate password...\n";
        $newHash = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->execute([$newHash, 'admin']);
        echo "   ✅ Password diupdate\n\n";
    }
} else {
    echo "❌ User tidak ditemukan!\n";
    exit(1);
}

// Test 2: Cek session folder
echo "2. Cek Session:\n";
$sessionPath = WRITEPATH . 'session';
if (is_dir($sessionPath)) {
    echo "   ✅ Session folder ada\n";
    if (is_writable($sessionPath)) {
        echo "   ✅ Session folder dapat ditulis\n";
    } else {
        echo "   ❌ Session folder TIDAK dapat ditulis\n";
        chmod($sessionPath, 0777);
        echo "   ✅ Permission diubah\n";
    }
} else {
    echo "   ❌ Session folder tidak ada - Membuat...\n";
    mkdir($sessionPath, 0777, true);
    echo "   ✅ Session folder dibuat\n";
}

echo "\n=== KESIMPULAN ===\n";
echo "Database dan session folder sudah benar.\n";
echo "Masalah mungkin di:\n";
echo "1. Form tidak submit dengan benar\n";
echo "2. CSRF token issue\n";
echo "3. Session tidak tersimpan setelah login\n";
echo "4. Redirect tidak bekerja\n";
echo "\nCoba akses: http://localhost:8080/test-login\n";
echo "Ini akan test login langsung tanpa form.\n";

