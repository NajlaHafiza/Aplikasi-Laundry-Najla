<!DOCTYPE html>
<html>
<head>
    <title>Status Pesanan</title>
    <link rel="stylesheet" href="style_status.css">
</head>
<body>
    <div class="container">
    <h2>Cek Status Pesanan Anda</h2>

    <!-- Form untuk cari pesanan -->
    <form method="GET" action="">
        <label for="no_hp">Masukkan Nomor HP:</label>
        <input type="text" name="no_hp" id="no_hp" required>
        <button type="submit">Cek</button>
    </form>
    <br>

    <?php
    // koneksi database
    $conn = new mysqli("localhost", "root", "", "laundry_db");

    if (isset($_GET['no_hp'])) {
        $no_hp = $_GET['no_hp'];
        $result = $conn->query("SELECT * FROM orders WHERE no_hp = '$no_hp'");

        if ($result->num_rows > 0) {
            echo "<h3>Pesanan untuk No HP: $no_hp</h3>";
            echo "<table border='1' cellpadding='8'>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Berat</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>";
            while ($order = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $order['id'] . "</td>
                        <td>" . $order['nama_pelanggan'] . "</td>
                        <td>" . $order['service_id'] . "</td>
                        <td>" . $order['berat_kg'] . " kg</td>
                        <td>Rp " . $order['total_harga'] . "</td>
                        <td>" . $order['status'] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada pesanan ditemukan untuk nomor HP ini.</p>";
        }
    }
    ?>

    <br><br>
    <a href="indeks.php">
        <button>Kembali ke Beranda</button>
    </a>
</body>
</html>
