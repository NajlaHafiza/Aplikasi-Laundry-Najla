<?php
session_start();
include 'koneksi.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: indeks.php");
        }
        exit();
    } else {
        $error = "⚠️ Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="login-box">
        <h2>Login Untuk Masuk</h2>

        <!-- tampilkan error tanpa geser box -->
        <?php if (!empty($error)) : ?>
            <p style="color: red; font-size: 14px;"><?= $error ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Ketik username Anda" required><br><br>

                <label>Password:</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Ketik password Anda" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
                <br><br>

                <button type="submit" name="login">Masuk</button>
            </div>
        </form>

        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const icon = document.querySelector(".toggle-password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.textContent = "👀";
            } else {
                passwordInput.type = "password";
                icon.textContent = "👁️";
            }
        }
    </script>
</body>
</html>
