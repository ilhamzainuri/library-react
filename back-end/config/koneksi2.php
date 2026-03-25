<?php
$host     = "localhost";
$user     = "u831910518_admin";
$password = "Zoid0104";
$database = "u831910518_db_perpus";


$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
