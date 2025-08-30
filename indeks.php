<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Laundry</title>
    <link rel="stylesheet" href="style_indeks.css">
</head>
<body>

<header>
    <h1>Selamat Datang di Situs Laundry</h1>
</header>
<nav>
    <?php if ($role == 'admin'): ?>
        <a href="kelola_pesanan.php">Kelola Pesanan</a>
        <a href="laporan.php">Laporan</a>
    <?php else: ?>
        <a href="indeks.php">Beranda</a>
        <a href="order_form.php">Pesan Laundy</a>
        <a href="status.php">Status Pemesanan</a>
        <a href="logout.php">Logout</a>
    <?php endif; ?>
</nav>
<main>
    <div class="card">
        <h2>Halo, <?php echo htmlspecialchars($username); ?>! Ingin pesan layanan kami?</h2>      
    </div>
</main>

</body>
</html>