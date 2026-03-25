<?php
$conn = new mysqli("localhost", "admin", "Zoid0104", "db_perpus");

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
