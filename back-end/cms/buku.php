<?php
include '../config/koneksi2.php';

if (isset($_POST['simpan'])) {

    if ($_FILES['gambar']['size'] > 10485760) {
        echo "<script>alert('Ukuran gambar maksimal 10MB!'); window.location='buku.php';</script>";
        exit;
    }

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $format = $_POST['format'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $eISBN = $_POST['eISBN'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $kategoriId = $_POST['kategoriId'];
    $subkategoriId = $_POST['id_subkategori'];
    $rakId = $_POST['rakId'];
    $sinopsis = $_POST['sinopsis'];

    $gambarName = "";
    if (!empty($_FILES['gambar']['name'])) {
        $fileName = time() . "_" . $_FILES['gambar']['name'];
        $target = "../uploads/" . $fileName;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $gambarName = $fileName;
    }

    mysqli_query($koneksi, "INSERT INTO buku 
        (judul, penulis, jumlah_halaman, format, penerbit, tahun_terbit, eISBN, jumlah_buku,
        kategoriId, id_subkategori, rakId, sinopsis, gambar)
        VALUES (
        '$judul','$penulis','$jumlah_halaman','$format','$penerbit','$tahun','$eISBN',
        '$jumlah_buku','$kategoriId','$subkategoriId','$rakId','$sinopsis','$gambarName'
        )");

    header("Location: buku.php");
    exit;
}



$editMode = false;
$editData = null;

if (isset($_GET['edit'])) {
    $editMode = true;
    $id = $_GET['edit'];
    $q = mysqli_query($koneksi, "SELECT * FROM buku WHERE bukuId='$id'");
    $editData = mysqli_fetch_assoc($q);
}



if (isset($_POST['update'])) {

    if ($_FILES['gambar']['size'] > 10485760) {
        echo "<script>alert('Ukuran gambar maksimal 10MB!'); window.location='buku.php';</script>";
        exit;
    }

    $id = $_POST['bukuId'];

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $format = $_POST['format'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];
    $eISBN = $_POST['eISBN'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $kategoriId = $_POST['kategoriId'];
    $subkategoriId = $_POST['id_subkategori'];
    $rakId = $_POST['rakId'];
    $sinopsis = $_POST['sinopsis'];

    if (!empty($_FILES['gambar']['name'])) {
        $fileName = time() . "_" . $_FILES['gambar']['name'];
        $target = "../uploads/" . $fileName;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $gambarName = $fileName;
    } else {
        $gambarName = $_POST['gambar_lama'];
    }

    mysqli_query($koneksi, "UPDATE buku SET 
        judul='$judul', penulis='$penulis', jumlah_halaman='$jumlah_halaman', format='$format',
        penerbit='$penerbit', tahun_terbit='$tahun', eISBN='$eISBN', jumlah_buku='$jumlah_buku',
        kategoriId='$kategoriId', id_subkategori='$subkategoriId', rakId='$rakId',
        sinopsis='$sinopsis', gambar='$gambarName'
        WHERE bukuId='$id'");

    header("Location: buku.php");
    exit;
}



if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM buku WHERE bukuId='$id'");
    header("Location: buku.php");
    exit;
}

// ================= SEARCH & FILTER =================
$keyword        = $_GET['keyword'] ?? '';
$filterKategori = $_GET['filter_kategori'] ?? '';
$filterSub      = $_GET['filter_subkategori'] ?? '';

$where = [];

if ($keyword != '') {
    $where[] = "(b.judul LIKE '%$keyword%' OR b.penulis LIKE '%$keyword%')";
}
if ($filterKategori != '') {
    $where[] = "b.kategoriId = '$filterKategori'";
}
if ($filterSub != '') {
    $where[] = "b.id_subkategori = '$filterSub'";
}

$whereSQL = count($where) ? "WHERE " . implode(" AND ", $where) : "";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .content {
            padding: 20px;
            font-family: Arial;
        }

        .btn {
            background: #007bff;
            padding: 8px 14px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn:hover {
            background: #005ad6;
        }

        .btn-red {
            background: #dc3545;
        }

        .btn-red:hover {
            background: #b92d3a;
        }

        .form-box {
            background: #ffffff;
            padding: 25px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            max-width: 900px;
        }

        .hidden {
            display: none;
        }

        label {
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 98%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            min-height: 200px;
            resize: vertical;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background: #f5f7fa;
        }

        tr:hover {
            background: #eef5ff;
        }

        .gambar-buku {
            width: 60px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #bbb;
        }

        /* Kolom aksi */
        td.aksi-btn {
            text-align: center;
            padding: 10px;
            white-space: nowrap;
            vertical-align: middle;
            height: 130px;
        }

        .aksi-btn {
            display: inline-flex;
            gap: 6px;
            align-items: center;
        }


        .btn-aksi {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            line-height: 1.2;
            white-space: nowrap;
            vertical-align: middle;
        }

        /* EDIT */
        .btn-edit {
            background: #f8ba01;
            color: #ffffff;
            /* PUTIH */
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        /* HAPUS */
        .btn-hapus {
            background: #dc3545;
            color: #ffffff;
            margin-left: 6px;
        }

        .btn-hapus:hover {
            background: #b92d3a;
        }

     
        .btn-cetak {
            background: #198754;
        }

        .btn-cetak:hover {
            background: #157347;
            box-shadow: 0 6px 14px rgba(25, 135, 84, 0.35);
        }

        /* Efek klik */
        .btn-cetak:active {
            transform: translateY(0);
            box-shadow: 0 3px 8px rgba(25, 135, 84, 0.25);
        }

        /* MODAL */
        .modal-bg {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-box {
            background: white;
            padding: 20px;
            width: 500px;
            border-radius: 8px;
            max-height: 80vh;
            overflow-y: auto;
        }

        /* ================= FILTER SEARCH ================= */
        .filter-box {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            gap: 12px;
            align-items: center;
        }

        .filter-item label {
            font-weight: bold;
            display: block;
            margin-bottom: 4px;
        }

        .filter-btn-group {
            display: flex;
            gap: 8px;
            align-items: flex-start;
            margin-top: 13px;
        }

        .btn-search {
            background: #085edfff;
        }

        .btn-search:hover {
            background: #1518a0ff;
        }


        @media (max-width: 768px) {
            .filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-btn-group {
                width: 100%;
                margin-top: 0;
            }

            .filter-btn-group .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="content">
        <h1 style="display:flex; align-items:center; gap:10px;">
            <i class="fa fa-book"></i> Data Buku
        </h1>

        <div style="display:flex; gap:10px; margin-bottom:15px;">
            <button class="btn" onclick="toggleForm()">
                <i class="fa fa-plus"></i> Tambah Buku
            </button>

            <a href="cetak_buku_pdf.php" target="_blank" class="btn btn-cetak">
                <i class="fa fa-print"></i> Cetak
            </a>
        </div>

        <div id="formTambah" class="form-box <?= $editMode ? '' : 'hidden' ?>">
            <h3><?= $editMode ? 'Edit Buku' : 'Tambah Buku' ?></h3>

            <form method="POST" enctype="multipart/form-data">

                <?php if ($editMode): ?>
                    <input type="hidden" name="bukuId" value="<?= $editData['bukuId'] ?>">
                    <input type="hidden" name="gambar_lama" value="<?= $editData['gambar'] ?>">
                <?php endif; ?>

                Judul:
                <input type="text" name="judul" required value="<?= $editMode ? $editData['judul'] : '' ?>"><br><br>

                Penulis:
                <input type="text" name="penulis" required value="<?= $editMode ? $editData['penulis'] : '' ?>"><br><br>

                Jumlah Halaman:
                <input type="number" name="jumlah_halaman" required value="<?= $editMode ? $editData['jumlah_halaman'] : '' ?>"><br><br>

                Format:
                <input type="text" name="format" required value="<?= $editMode ? $editData['format'] : '' ?>"><br><br>

                Penerbit:
                <input type="text" name="penerbit" required value="<?= $editMode ? $editData['penerbit'] : '' ?>"><br><br>

                Tahun Terbit:
                <input type="number" name="tahun_terbit" required value="<?= $editMode ? $editData['tahun_terbit'] : '' ?>"><br><br>

                eISBN:
                <input type="text" name="eISBN" required value="<?= $editMode ? $editData['eISBN'] : '' ?>"><br><br>

                Jumlah Buku:
                <input type="number" name="jumlah_buku" required value="<?= $editMode ? $editData['jumlah_buku'] : '' ?>"><br><br>

                Kategori:
                <select name="kategoriId" id="kategori" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($k = mysqli_fetch_assoc($kategori)) {
                        $sel = ($editMode && $k['kategoriId'] == $editData['kategoriId']) ? 'selected' : '';
                        echo "<option value='{$k['kategoriId']}' $sel>{$k['nama_kategori']}</option>";
                    }
                    ?>
                </select><br><br>


                Subkategori:
                <select name="id_subkategori" id="subkategori" required>
                    <option value="">-- Pilih Kategori dulu --</option>

                    <?php
                    $sub = mysqli_query($koneksi, "SELECT * FROM subkategori");
                    while ($s = mysqli_fetch_assoc($sub)) {
                        $sel = ($editMode && $s['id_subkategori'] == $editData['id_subkategori']) ? 'selected' : '';
                        echo "<option value='{$s['id_subkategori']}' $sel>{$s['nama_subkategori']}</option>";
                    }
                    ?>
                </select><br><br>


                Rak:
                <select name="rakId" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $rak = mysqli_query($koneksi, "SELECT * FROM rak");
                    while ($r = mysqli_fetch_assoc($rak)) {
                        $sel = ($editMode && $r['rakId'] == $editData['rakId']) ? 'selected' : '';
                        echo "<option value='{$r['rakId']}' $sel>{$r['nomor_rak']}</option>";
                    }
                    ?>
                </select><br><br>

                Sinopsis:
                <textarea name="sinopsis" required><?= $editMode ? $editData['sinopsis'] : '' ?></textarea><br><br>

                Upload Gambar Buku (Max 10MB):
                <input type="file" name="gambar"><br>

                <?php if ($editMode && $editData['gambar']): ?>
                    <img src="../uploads/<?= $editData['gambar'] ?>" width="80" style="margin-top:10px;">
                <?php endif; ?>

                <br><br>

                <button type="submit" name="<?= $editMode ? 'update' : 'simpan' ?>" class="btn">
                    <?= $editMode ? 'Update' : 'Simpan' ?>
                </button>

                <a href="buku.php" class="btn btn-red">Batal</a>

            </form>
        </div>

        <form method="GET" class="filter-box">
            <div class="filter-grid">

                <div class="filter-item">
                    <label>Cari Judul / Penulis</label>
                    <input type="text" name="keyword" placeholder="Ketik judul atau penulis"
                        value="<?= htmlspecialchars($keyword) ?>">
                </div>

                <div class="filter-item">
                    <label>Kategori</label>
                    <select name="filter_kategori" id="filter_kategori">
                        <option value="">-- Semua --</option>
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($k = mysqli_fetch_assoc($kat)) {
                            $sel = ($filterKategori == $k['kategoriId']) ? 'selected' : '';
                            echo "<option value='{$k['kategoriId']}' $sel>{$k['nama_kategori']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="filter-item">
                    <label>Subkategori</label>
                    <select name="filter_subkategori" id="filter_subkategori">
                        <option value="">-- Semua --</option>
                        <?php
                        if ($filterKategori != '') {
                            $sub = mysqli_query($koneksi, "SELECT * FROM subkategori WHERE kategoriId='$filterKategori'");
                            while ($s = mysqli_fetch_assoc($sub)) {
                                $sel = ($filterSub == $s['id_subkategori']) ? 'selected' : '';
                                echo "<option value='{$s['id_subkategori']}' $sel>{$s['nama_subkategori']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="filter-btn-group">
                    <button type="submit" class="btn btn-search">
                        <i class="fa fa-search"></i> Cari
                    </button>

                    <a href="buku.php" class="btn btn-red">
                        <i class="fa fa-rotate-left"></i> Reset
                    </a>
                </div>

            </div>
        </form>

        <!-- TABEL -->
        <table>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Sinopsis</th>
                <th>Penulis</th>
                <th>Halaman</th>
                <th>Format</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>eISBN</th>
                <th>Jml Buku</th>
                <th>Kategori</th>
                <th>Subkategori</th>
                <th>Rak</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $sql = "SELECT 
            b.*, 
            k.nama_kategori,
            s.nama_subkategori,
            r.nomor_rak
            FROM buku b
            JOIN kategori k ON b.kategoriId = k.kategoriId
            JOIN subkategori s ON b.id_subkategori = s.id_subkategori
            JOIN rak r ON b.rakId = r.rakId
            $whereSQL";

            $result = mysqli_query($koneksi, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $gambar = $row['gambar']
                        ? "../uploads/{$row['gambar']}"
                        : "../uploads/default.png";

                    // Ringkasan sinopsis
                    $ringkas = substr($row['sinopsis'], 0, 40) . "...";

                    // FIX UTAMA AGAR SEMUA SINOPSIS BISA DIBUKA
                    // termasuk yang mengandung ENTER, petik, dll.
                    $sinopsisSafe = json_encode($row['sinopsis']);

                    echo "
            <tr>
                <td>$no</td>
                <td><img src='$gambar' class='gambar-buku'></td>

                <td>{$row['judul']}</td>

                <td>
                    $ringkas<br>
                    <button class='btn'
                        style='padding:4px 8px; font-size:11px; margin-top:4px;'
                        onclick='lihatSinopsis($sinopsisSafe)'>
                        Lihat Semua
                    </button>
                </td>

                <td>{$row['penulis']}</td>
                <td>{$row['jumlah_halaman']}</td>
                <td>{$row['format']}</td>
                <td>{$row['penerbit']}</td>
                <td>{$row['tahun_terbit']}</td>
                <td>{$row['eISBN']}</td>
                <td>{$row['jumlah_buku']}</td>
                <td>{$row['nama_kategori']}</td>
                <td>{$row['nama_subkategori']}</td>
                <td>{$row['nomor_rak']}</td>

                <td class='aksi-btn'>
                    <a href='buku.php?edit={$row['bukuId']}'
                    class='btn-aksi btn-edit'>
                        <i class='fa fa-pen'></i> Edit
                    </a>

                    <a href='buku.php?hapus={$row['bukuId']}'
                    class='btn-aksi btn-hapus'
                    onclick=\"return confirm('Hapus data ini?')\">
                        <i class='fa fa-trash'></i> Hapus
                    </a>
                </td>
            </tr>
            ";

                    $no++;
                }
            } else {
                echo "<tr><td colspan='15'>Tidak ada data buku.</td></tr>";
            }
            ?>
        </table>


        <!-- MODAL SINOPSIS -->
        <div id="modalSinopsis" class="modal-bg">
            <div class="modal-box">
                <h3>Sinopsis Lengkap</h3>
                <p id="isiSinopsis"></p>
                <br>
                <button onclick="tutupModal()" class="btn btn-red">Tutup</button>
            </div>
        </div>


        <script>
            function toggleForm() {
                document.getElementById("formTambah").classList.toggle("hidden");
            }

            function lihatSinopsis(teks) {
                document.getElementById("modalSinopsis").style.display = "flex";
                document.getElementById("isiSinopsis").innerText = teks;
            }

            function tutupModal() {
                document.getElementById("modalSinopsis").style.display = "none";
            }
        </script>
        <script>
            document.getElementById("kategori").addEventListener("change", function() {
                var kategoriId = this.value;

                // Reset subkategori
                var subSelect = document.getElementById("subkategori");
                subSelect.innerHTML = "<option value=''>Loading...</option>";

                // AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "get_subkategori.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        subSelect.innerHTML = xhr.responseText;
                    }
                };
                xhr.send("kategoriId=" + kategoriId);
            });
        </script>

        <script>
            document.getElementById("filter_kategori").addEventListener("change", function() {
                var kategoriId = this.value;
                var sub = document.getElementById("filter_subkategori");

                sub.innerHTML = "<option value=''>Loading...</option>";

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "get_subkategori.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        sub.innerHTML = "<option value=''>-- Semua --</option>" + xhr.responseText;
                    }
                };
                xhr.send("kategoriId=" + kategoriId);
            });
        </script>

</body>

</html>