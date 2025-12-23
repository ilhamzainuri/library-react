<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

require_once "../config/koneksi.php";

/*
 RESPONSE:
 [
   {
     "kategoriId": 1,
     "nama_kategori": "Saintek",
     "subkategori": [
       { "id": 1, "nama_subkategori": "Komputer" },
       { "id": 2, "nama_subkategori": "Fisika" }
     ]
   }
 ]
*/

$data = [];

// Ambil semua kategori
$qKategori = $conn->query("
  SELECT kategoriId, nama_kategori
  FROM kategori
  ORDER BY nama_kategori ASC
");

while ($kategori = $qKategori->fetch_assoc()) {

  // Ambil subkategori berdasarkan kategoriId
  $stmt = $conn->prepare("
    SELECT id_subkategori, nama_subkategori
    FROM subkategori
    WHERE kategoriId = ?
    ORDER BY nama_subkategori ASC
  ");

  $stmt->bind_param("i", $kategori['kategoriId']);
  $stmt->execute();
  $subResult = $stmt->get_result();

  $subkategori = [];
  while ($sub = $subResult->fetch_assoc()) {
    $subkategori[] = [
      "id_subkategori" => (int)$sub['id_subkategori'],
      "nama_subkategori" => $sub['nama_subkategori']
    ];
  }

  $data[] = [
    "kategoriId" => (int)$kategori['kategoriId'],
    "nama_kategori" => $kategori['nama_kategori'],
    "subkategori" => $subkategori
  ];
}

echo json_encode($data, JSON_PRETTY_PRINT);
