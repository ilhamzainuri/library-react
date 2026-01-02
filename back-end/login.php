<?php
session_start();
require_once "./config/koneksi.php";

/* ================= CAPTCHA ================= */

function generateCaptcha() {
    $num1 = rand(1, 9);
    $num2 = rand(1, 9);
    $_SESSION['captcha_question'] = "$num1 + $num2";
    $_SESSION['captcha_answer']   = $num1 + $num2;
}

if (!isset($_SESSION['captcha_answer'])) {
    generateCaptcha();
}


$error = null;

/* ================= LOGIN ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $captcha  = trim($_POST['captcha']);

    // CAPTCHA SALAH
    if ($captcha != ($_SESSION['captcha_answer'] ?? null)) {
        $error = "Captcha salah. Silakan coba lagi.";
        generateCaptcha();

    } else {

        $stmt = $conn->prepare(
            "SELECT * FROM useracc WHERE username=? AND password=? LIMIT 1"
        );
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // LOGIN BERHASIL
        if ($user) {

            unset($_SESSION['captcha_answer'], $_SESSION['captcha_question']);

            $_SESSION['userId']    = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];

            header("Location: " . ($user['role'] === 'admin'
                ? "./cms/admin.php"
                : "./index.php"));
            exit;

        } 
        // USERNAME / PASSWORD SALAH
        else {
            $error = "Username atau password salah.";
            generateCaptcha(); 
        }
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login | Perpustakaan</title>

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- BOOTSTRAP ICONS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
  min-height: 100vh;
  background: linear-gradient(rgba(0,0,0,.65), rgba(0,0,0,.65)),
              url('./images/bg1.jpg') center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* GLASS CARD */
.login-card {
  position: relative;
  width: 100%;
  max-width: 420px;
  padding: 32px;
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);
  border-radius: 18px;
  border: 1px solid rgba(255,255,255,0.25);
  box-shadow: 0 8px 32px rgba(0,0,0,0.4);
  color: #fff;
}

.login-card h3 {
  font-weight: 700;
  color: #fff;
}

.form-label {
  color: #e5e7eb;
}

.form-control {
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.3);
  color: #fff;
}

.form-control:focus {
  background: rgba(255,255,255,0.25);
  color: #fff;
  border-color: #0d6efd;
  box-shadow: none;
}

.input-group-text {
  background: rgba(255,255,255,0.2);
  border: 1px solid rgba(255,255,255,0.3);
  color: #fff;
  cursor: pointer;
}

.btn-login {
  font-weight: 600;
  padding: 10px;
  border-radius: 10px;
}

a {
  color: #93c5fd;
}
a:hover {
  color: #bfdbfe;
}
</style>
</head>

<body>

<div class="login-card">

  <h3 class="text-center mb-4">
    <i class="bi bi-book-half text-primary"></i>
    Login Perpustakaan
  </h3>

  <?php if ($error && !str_contains($error, 'Captcha')): ?>
    <div class="alert alert-danger d-flex align-items-center">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>
      <?= $error; ?>
    </div>
  <?php endif; ?>

  <form method="post">

    <!-- USERNAME -->
    <div class="mb-3">
      <label class="form-label">Username</label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-person-fill"></i>
        </span>
        <input type="text" name="username" class="form-control" required autofocus>
      </div>
    </div>

    <!-- PASSWORD -->
    <div class="mb-3">
      <label class="form-label">Password</label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-lock-fill"></i>
        </span>
        <input type="password" name="password" id="password" class="form-control" required>
        <span class="input-group-text" id="togglePassword">
          <i class="bi bi-eye-fill" id="eyeIcon"></i>
        </span>
      </div>
    </div>

    <!-- CAPTCHA -->
    <div class="mb-4">
      <label class="form-label">
        <i class="bi bi-patch-question-fill"></i>
        <?= $_SESSION['captcha_question'] ?? 'Captcha error'; ?> =

      </label>
      <div class="input-group">
        <span class="input-group-text">
          <i class="bi bi-calculator-fill"></i>
        </span>
        <input type="number" name="captcha" class="form-control" required>
      </div>
    </div>

    <button type="submit" class="btn btn-primary w-100 btn-login">
      <i class="bi bi-box-arrow-in-right me-1"></i>
      Login
    </button>

    <div class="text-center mt-3">
      <a href="http://localhost:5173/">
        <i class="bi bi-arrow-left-circle"></i> Kembali ke Home
      </a>
    </div>
  </form>
</div>

<!-- TOAST CAPTCHA -->
<?php if ($error && str_contains($error, 'Captcha')): ?>
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="captchaToast" class="toast text-bg-danger border-0">
    <div class="d-flex">
      <div class="toast-body">
        <i class="bi bi-shield-exclamation me-2"></i>
        <?= $error ?>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// TOGGLE PASSWORD
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", () => {
  const type = passwordInput.type === "password" ? "text" : "password";
  passwordInput.type = type;
  eyeIcon.classList.toggle("bi-eye-fill");
  eyeIcon.classList.toggle("bi-eye-slash-fill");
});
</script>

<?php if ($error && str_contains($error, 'Captcha')): ?>
<script>
const toastEl = document.getElementById("captchaToast");
if (toastEl) {
  new bootstrap.Toast(toastEl, { delay: 3000 }).show();
}
</script>
<?php endif; ?>

</body>
</html>
