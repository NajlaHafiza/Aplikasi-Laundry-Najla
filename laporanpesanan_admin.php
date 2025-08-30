<?php
$conn = new mysqli("localhost", "root", "", "laundry_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Laundry</title>
    <link rel="stylesheet" href="style_laporanpesanan.css">
</head>
<body>
    <h2>Laporan Data Laundry</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>No. Telepon</th>
            <th>Tanggal Masuk</th>
            <th>Status</th>
            <th>Total Harga</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders");
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nama_pelanggan']."</td>";
            echo "<td>".$row['no_hp']."</td>";
            echo "<td>".$row['created_at']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td>".$row['total_harga']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="admin_dashboard.php">Kembali ke Beranda</a>
</body>
</html>