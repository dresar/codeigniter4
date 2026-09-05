<?php
/**
 * Check if server is running
 */
$ports = [8000, 8080];
$host = '127.0.0.1';

echo "=== CHECK SERVER STATUS ===\n\n";

foreach ($ports as $port) {
    $url = "http://{$host}:{$port}";
    echo "Checking port {$port}...\n";
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($httpCode > 0) {
        echo "   ✅ Port {$port} is RUNNING (HTTP {$httpCode})\n";
        echo "   URL: {$url}\n";
    } else {
        echo "   ❌ Port {$port} is NOT RUNNING\n";
        if ($error) {
            echo "   Error: {$error}\n";
        }
    }
    echo "\n";
}

echo "=== INSTRUCTIONS ===\n";
echo "1. Jika port tidak berjalan, jalankan:\n";
echo "   php spark serve --port=8080\n";
echo "\n";
echo "2. Atau double-click: START_SERVER_8080.bat\n";
echo "\n";
echo "3. Setelah server berjalan, akses:\n";
echo "   http://localhost:8080/auth/login\n";

