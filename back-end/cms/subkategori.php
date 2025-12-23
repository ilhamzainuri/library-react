<?php
include '../config/koneksi2.php';


if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_subkategori'];
    $kategoriId = $_POST['kategoriId'];

    mysqli_query($koneksi, "INSERT INTO subkategori (kategoriId, nama_subkategori) 
    VALUES ('$kategoriId', '$nama')");
    header("Location: subkategori.php");
    exit;
}

$editMode = false;
$editData = null;

if (isset($_GET['edit'])) {
    $editMode = true;
    $id = $_GET['edit'];
    $q = mysqli_query($koneksi, "SELECT * FROM subkategori WHERE id_subkategori='$id'");
    $editData = mysqli_fetch_assoc($q);
}

if (isset($_POST['update'])) {
    $id = $_POST['id_subkategori'];
    $nama = $_POST['nama_subkategori'];
    $kategoriId = $_POST['kategoriId'];

    mysqli_query($koneksi, "
        UPDATE subkategori 
        SET kategoriId='$kategoriId', nama_subkategori='$nama'
        WHERE id_subkategori='$id'
    ");
    header("Location: subkategori.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM subkategori WHERE id_subkategori='$id'");
    header("Location: subkategori.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Subkategori</title>
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

        .btn-red {
            background: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .form-box {
            background: #fff;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-top: 10px;
            max-width: 600px;
        }

        .hidden {
            display: none;
        }

        input,
        select {
            width: 98%;
            padding: 10px;
            margin: 7px 0 18px;
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
            <i class="fa fa-tag"></i> Data Subkategori
        </h1>

        <button class="btn" onclick="toggleForm()">+ Tambah Subkategori</button>

        <div id="formTambah" class="form-box <?= $editMode ? '' : 'hidden' ?>">
            <h3><?= $editMode ? 'Edit Subkategori' : 'Tambah Subkategori' ?></h3>

            <form method="POST">
                <?php if ($editMode): ?>
                    <input type="hidden" name="id_subkategori" value="<?= $editData['id_subkategori'] ?>">
                <?php endif; ?>

                Pilih Kategori:
                <select name="kategoriId" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php
                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                    while ($k = mysqli_fetch_assoc($kat)) {
                        $selected = ($editMode && $editData['kategoriId'] == $k['kategoriId']) ? 'selected' : '';
                        echo "<option value='{$k['kategoriId']}' $selected>{$k['nama_kategori']}</option>";
                    }
                    ?>
                </select>

                Nama Subkategori:
                <input type="text" name="nama_subkategori" required
                    value="<?= $editMode ? $editData['nama_subkategori'] : '' ?>">

                <button type="submit" name="<?= $editMode ? 'update' : 'simpan' ?>" class="btn">
                    <?= $editMode ? 'Update' : 'Simpan' ?>
                </button>
                <a href="subkategori.php" class="btn-red btn">Batal</a>
            </form>
        </div>

        <!-- TABEL -->
        <table>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Subkategori</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "
                    SELECT subkategori.*, kategori.nama_kategori 
                    FROM subkategori
                    JOIN kategori ON kategori.kategoriId = subkategori.kategoriId
                    ORDER BY id_subkategori DESC
                ");

            while ($r = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($r['nama_kategori']); ?></td>
                    <td><?= htmlspecialchars($r['nama_subkategori']); ?></td>
                    <td class="aksi-btn">
                        <a href="subkategori.php?edit=<?= $r['id_subkategori']; ?>"
                            class="btn-aksi btn-edit">
                            <i class="fa fa-pen"></i> Edit
                        </a>

                        <a href="subkategori.php?hapus=<?= $r['id_subkategori']; ?>"
                            class="btn-aksi btn-hapus"
                            onclick="return confirm('Hapus subkategori ini?')">
                            <i class="fa fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </div>

    <script>
        function toggleForm() {
            document.getElementById('formTambah').classList.toggle('hidden');
        }
    </script>

</body>

</html>