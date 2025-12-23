<?php
include '../config/koneksi2.php';
date_default_timezone_set('Asia/Jakarta');

$query = mysqli_query($koneksi, "
    SELECT 
        b.judul,
        b.penulis,
        b.jumlah_halaman,
        b.format,
        b.penerbit,
        b.tahun_terbit,
        b.eISBN,
        b.jumlah_buku,
        k.nama_kategori,
        s.nama_subkategori,
        r.nomor_rak
    FROM buku b
    JOIN kategori k ON b.kategoriId = k.kategoriId
    JOIN subkategori s ON b.id_subkategori = s.id_subkategori
    JOIN rak r ON b.rakId = r.rakId
    ORDER BY b.judul ASC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .header p {
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 13px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 10px;
            vertical-align: top;
        }

        th {
            background: #f2f2f2;
            text-align: center;
        }

        td {
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
        }

        .back-button {
            margin-top: 30px;
            text-align: center;
        }

        .back-button a {
            text-decoration: none;
            background: #007bff;
            color: #fff;
            padding: 10px 22px;
            border-radius: 5px;
            font-weight: bold;
        }

        @media print {
            .back-button {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Laporan Data Buku Perpustakaan</h2>
    <p>Tanggal Cetak: <?= date('d-m-Y H:i:s') ?></p>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Kategori</th>
        <th>Subkategori</th>
        <th>Rak</th>
        <th>Halaman</th>
        <th>Format</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Jumlah</th>
    </tr>

    <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
        <tr>
            <td style="text-align:center;"><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['judul']) ?></td>
            <td><?= htmlspecialchars($row['penulis']) ?></td>
            <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($row['nama_subkategori']) ?></td>
            <td style="text-align:center;"><?= $row['nomor_rak'] ?></td>
            <td style="text-align:center;"><?= $row['jumlah_halaman'] ?></td>
            <td style="text-align:center;"><?= $row['format'] ?></td>
            <td><?= htmlspecialchars($row['penerbit']) ?></td>
            <td style="text-align:center;"><?= $row['tahun_terbit'] ?></td>
            <td style="text-align:center;"><?= $row['jumlah_buku'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<div class="footer">
    <p>Laporan ini dicetak melalui Sistem Informasi Perpustakaan</p>
</div>

<div class="back-button">
    <a href="buku.php">← Kembali ke Data Buku</a>
</div>

<script>
    window.print();
</script>

</body>
</html>