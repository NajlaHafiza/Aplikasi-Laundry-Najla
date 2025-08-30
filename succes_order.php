<?php
$conn = new mysqli("localhost", "root", "", "laundry_db");

$id = $_GET['id'];
$result = $conn->query("SELECT o.*, s.nama_service 
                        FROM orders o
                        JOIN services s ON o.service_id = s.id
                        WHERE o.id = $id");
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Berhasil</title>
    <link rel="stylesheet" href="style_succesorder.css">
</head>
<body>
    <div class="container">
    <h2>Pesanan Berhasil!</h2>
    <p>Terima kasih, pesanan Anda telah kami terima.</p>

    <h3>Detail Pesanan:</h3>
    <ul>
        <li>Nama: <?= $order['nama_pelanggan'] ?></li>
        <li>No. HP: <?= $order['no_hp'] ?></li>
        <li>Layanan: <?= $order['nama_service'] ?></li>
        <li>Berat: <?= $order['berat_kg'] ?> kg</li>
        <li>Total Harga: Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></li>
    </ul>

    <a href="order_form.php">Pesan Lagi</a> |
    <a href="status.php">Status Pemesanan</a> |
    <a href="indeks.php">Kembali ke Beranda</a>
</body>
</html>