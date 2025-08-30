<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user'; 

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        header("Location: indeks.php");
        exit();
    } else {
        echo "Gagal mendaftar: " . mysqli_error($conn); // Tampilkan error
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style_register.css">
</head>
<body>
    <div class="login-box">
    <h2>Daftar Akun Baru</h2>
    <form method="post" action="">
    <div class="input-group">
    <label>Username:</label>
        <input type="text" id="username" name="username" placeholder="Ketik username Anda" required><br><br>

        <label>Password:</label>
        <div class="password-wrapper">
            <input type="password" id="password" name="password" placeholder="Ketik password Anda" required>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit" name="register">Daftar</button>
    </form>

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