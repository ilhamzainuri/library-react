<?php
$host     = "localhost";
$user     = "admin";
$password = "Zoid0104";
$database = "db_perpus";


$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
