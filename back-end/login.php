<?php
session_start();
require_once "./config/koneksi.php";

/* ================= CAPTCHA GENERATOR ================= */
if (!isset($_SESSION['captcha_answer'])) {
    $num1 = rand(1, 9);
    $num2 = rand(1, 9);
    $_SESSION['captcha_question'] = "$num1 + $num2";
    $_SESSION['captcha_answer']   = $num1 + $num2;
}

$error = null;

/* ================= LOGIN PROCESS ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $captcha  = trim($_POST['captcha']);

    /* CAPTCHA VALIDATION */
    if ($captcha != $_SESSION['captcha_answer']) {
        $error = "Captcha salah. Silakan coba lagi.";
    } else {

        // hapus captcha setelah digunakan
        unset($_SESSION['captcha_answer']);
        unset($_SESSION['captcha_question']);

        // QUERY USER
        $stmt = $conn->prepare(
            "SELECT * FROM useracc WHERE username=? AND password=? LIMIT 1"
        );
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            $_SESSION['userId']   = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];

            // REDIRECT
            if ($user['role'] === 'admin') {
                header("Location: ./cms/admin.php");
            } else {
                header("Location: ./index.php");
            }
            exit;
        } else {
            $error = "Username atau password salah.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('./images/bg1.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .login-box {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px;
      background: rgba(255, 255, 255, 0.55);
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<div class="login-box">
  <h3 class="text-center mb-4">Login</h3>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= $error; ?></div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required autofocus>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">
        Berapa hasil dari <b><?= $_SESSION['captcha_question']; ?></b> ?
      </label>
      <input type="number" name="captcha" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>

    <div class="mt-3 text-center">
      <a href="http://localhost:5173/">⬅ Back to Home</a>
    </div>
  </form>
</div>

</body>
</html>
