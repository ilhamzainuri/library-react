<?php
// Cek hPanel Hostinger > Databases > MySQL Databases
$host = "localhost"; 
$user = "u831910518_admin"; // Ganti dengan Username MySQL di hPanel
$pass = "Zoid0104";        // Pastikan password ini sesuai dengan yang dibuat di hPanel
$db   = "u831910518_db_perpus"; // Ganti dengan Nama Database di hPanel

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    // Untuk keamanan, saat sudah live jangan tampilkan detail error ke user
    // Tapi untuk debug sekarang, kita biarkan dulu
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Set charset agar karakter khusus (seperti emoji atau simbol) tidak rusak
$conn->set_charset("utf8mb4");
?>