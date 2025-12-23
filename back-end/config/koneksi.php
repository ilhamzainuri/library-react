<?php
$conn = new mysqli("localhost", "root", "", "db_perpus");

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
