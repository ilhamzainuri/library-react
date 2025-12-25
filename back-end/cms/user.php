<?php
include '../config/koneksi2.php';


if (isset($_POST['simpan'])) {

    $nama = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "
        INSERT INTO useracc (name, username, email, password, phone, role)
        VALUES ('$nama', '$username', '$email', '$password', '$phone', '$role')
    ");

    header("Location: user.php");
    exit;
}

$editMode = false;
$editData = null;

if (isset($_GET['edit'])) {
    $editMode = true;
    $id = $_GET['edit'];

    $q = mysqli_query($koneksi, "SELECT * FROM useracc WHERE userId='$id'");
    $editData = mysqli_fetch_assoc($q);
}

if (isset($_POST['update'])) {

    $id = $_POST['userId'];
    $nama = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "
        UPDATE useracc SET 
            name='$nama',
            username='$username',
            email='$email',
            password='$password',
            phone='$phone',
            role='$role'
        WHERE userId='$id'
    ");

    header("Location: user.php");
    exit;
}


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM useracc WHERE userId='$id'");
    header("Location: user.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .content {
            padding: 20px;
            font-family: Arial;
        }

        .btn {
            background: #007bff;
            padding: 8px 14px;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-red {
            background: #dc3545;
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
            <i class="fa fa-users"></i> Data User
        </h1>

        <button class="btn" onclick="toggleForm()">+ Tambah User</button>

        <div id="formTambah" class="form-box <?= $editMode ? '' : 'hidden' ?>">
            <h3><?= $editMode ? 'Edit User' : 'Tambah User' ?></h3>

            <form method="POST">

                <?php if ($editMode): ?>
                    <input type="hidden" name="userId" value="<?= $editData['userId'] ?>">
                <?php endif; ?>

                Nama:
                <input type="text" name="name" required value="<?= $editMode ? $editData['name'] : '' ?>">

                Username:
                <input type="text" name="username" required value="<?= $editMode ? $editData['username'] : '' ?>">

                Email:
                <input type="email" name="email" required value="<?= $editMode ? $editData['email'] : '' ?>">

                Password:
                <input type="text" name="password" required value="<?= $editMode ? $editData['password'] : '' ?>">

                Phone:
                <input type="text" name="phone" required value="<?= $editMode ? $editData['phone'] : '' ?>">

                Role:
                <select name="role" required>
                    <option value="">-- Pilih Role --</option>

                    <?php
                    $roles = ['admin'];
                    foreach ($roles as $r) {
                        $sel = ($editMode && $editData['role'] == $r) ? 'selected' : '';
                        echo "<option value='$r' $sel>$r</option>";
                    }
                    ?>
                </select>

                <button type="submit" name="<?= $editMode ? 'update' : 'simpan' ?>" class="btn">
                    <?= $editMode ? 'Update' : 'Simpan' ?>
                </button>

                <a href="user.php" class="btn-red btn">Batal</a>
            </form>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;
            $q = mysqli_query($koneksi, "SELECT * FROM useracc ORDER BY userId DESC");

            while ($r = mysqli_fetch_assoc($q)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($r['name']); ?></td>
                    <td><?= htmlspecialchars($r['username']); ?></td>
                    <td><?= htmlspecialchars($r['email']); ?></td>
                    <td><?= htmlspecialchars($r['phone']); ?></td>
                    <td><?= htmlspecialchars($r['role']); ?></td>
                    <td class="aksi-btn">
                        <a href="user.php?edit=<?= $r['userId']; ?>"
                            class="btn-aksi btn-edit">
                            <i class="fa fa-pen"></i> Edit
                        </a>

                        <a href="user.php?hapus=<?= $r['userId']; ?>"
                            class="btn-aksi btn-hapus"
                            onclick="return confirm('Hapus user ini?')">
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