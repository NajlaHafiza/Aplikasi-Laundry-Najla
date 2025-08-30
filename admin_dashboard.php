<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style_dashadmin.css">
</head>
<body>
    
<header>
    <h1>Dashboard Admin</h1>

</header>
<nav>
    <a href="admin_dashboard.php">Beranda</a>
    <a href="kelolapesanan_admin.php">Kelola Pesanan</a>
    <a href="laporanpesanan_admin.php">Laporan</a>
    <a href="logout.php">Logout</a>
</nav>
<main>
    <div class="card">
        <h2>Halo, Admin <?php echo $_SESSION['username']; ?>.</h2>      
    </div>
</main>
</body>
</html>