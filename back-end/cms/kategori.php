<?php
include '../config/koneksi2.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    header("Location: kategori.php");
    exit;
}

$editMode = false;
$editData = null;

if (isset($_GET['edit'])) {
    $editMode = true;
    $id = $_GET['edit'];
    $q = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategoriId='$id'");
    $editData = mysqli_fetch_assoc($q);
}


if (isset($_POST['update'])) {
    $id = $_POST['kategoriId'];
    $nama = $_POST['nama_kategori'];

    mysqli_query($koneksi, "
        UPDATE kategori SET nama_kategori='$nama'
        WHERE kategoriId='$id'
    ");

    header("Location: kategori.php");
    exit;
}


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM kategori WHERE kategoriId='$id'");
    header("Location: kategori.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Kategori</title>
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
            background: #fff;
            padding: 25px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            max-width: 600px;
        }

        .hidden {
            display: none;
        }

        input {
            width: 98%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
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
        }

        tr:nth-child(even) {
            background: #f5f7fa;
        }

        tr:hover {
            background: #eef5ff;
        }

        /* Kolom aksi jadi center */
        td.aksi-btn {
            text-align: center;
            vertical-align: middle;
        }

        .aksi-btn a {
            text-decoration: none;
            color: #fff;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-aksi {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit {
            background: #f8ba01ff;
            color: #000;
        }

        .btn-edit:hover {
            background: #e0a800;
        }

        .btn-hapus {
            background: #dc3545;
        }

        .btn-hapus:hover {
            background: #b92d3a;
        }
    </style>
</head>

<body>

    <?php include 'sidebar.php'; ?>

    <div class="content">
        <h1 style="display:flex; align-items:center; gap:10px;">
            <i class="fa fa-tags"></i> Data Kategori
        </h1>

        <button class="btn" onclick="toggleForm()">+ Tambah Kategori</button>

        <div id="formTambah" class="form-box <?= $editMode ? '' : 'hidden' ?>">
            <h3><?= $editMode ? 'Edit Kategori' : 'Tambah Kategori' ?></h3>

            <form method="POST">

                <?php if ($editMode): ?>
                    <input type="hidden" name="kategoriId" value="<?= $editData['kategoriId'] ?>">
                <?php endif; ?>

                Nama Kategori:
                <input type="text" name="nama_kategori" required
                    value="<?= $editMode ? $editData['nama_kategori'] : '' ?>">

                <button type="submit" name="<?= $editMode ? 'update' : 'simpan' ?>" class="btn">
                    <?= $editMode ? 'Update' : 'Simpan' ?>
                </button>

                <a href="kategori.php" class="btn btn-red">Batal</a>
            </form>
        </div>

        <!-- TABEL -->
        <table>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $result = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategoriId DESC");

            while ($r = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($r['nama_kategori']); ?></td>
                    <td class="aksi-btn">
                        <a href="kategori.php?edit=<?= $r['kategoriId']; ?>"
                            class="btn-aksi btn-edit">
                            <i class="fa fa-pen"></i> Edit
                        </a>

                        <a href="kategori.php?hapus=<?= $r['kategoriId']; ?>"
                            class="btn-aksi btn-hapus"
                            onclick="return confirm('Hapus kategori ini?')">
                            <i class="fa fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>

    <script>
        function toggleForm() {
            document.getElementById("formTambah").classList.toggle("hidden");
        }
    </script>

</body>

</html>