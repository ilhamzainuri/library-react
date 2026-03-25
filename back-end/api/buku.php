<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include "../config/koneksi.php";

$sql = "
SELECT 
    b.bukuId,
    b.judul,
    b.penulis,
    b.penerbit,
    b.tahun_terbit,
    b.jumlah_halaman,
    b.jumlah_buku,
    b.gambar,
    b.sinopsis,
    b.eISBN,
    k.nama_kategori,
    s.nama_subkategori,
    r.nomor_rak
FROM buku b
LEFT JOIN kategori k ON b.kategoriId = k.kategoriId
LEFT JOIN subkategori s ON b.id_subkategori = s.id_subkategori
LEFT JOIN rak r ON b.rakId = r.rakId
ORDER BY b.bukuId DESC
";

$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $row["status"] = ($row["jumlah_buku"] > 0) ? "Tersedia" : "Habis";
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
