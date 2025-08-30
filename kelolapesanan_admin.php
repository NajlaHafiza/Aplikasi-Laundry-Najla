<?php
$conn = new mysqli("localhost", "root", "", "laundry_db");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pesanan</title>
    <link rel="stylesheet" type="text/css" href="style_kelolapesanan.css">
</head>
<body>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $conn->query("UPDATE orders SET status='$status' WHERE id=$id");
    echo "Status berhasil diupdate!<br>";
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $conn->query("DELETE FROM orders WHERE id=$id");
    echo "Pesanan berhasil dihapus!<br>";
}

$result = $conn->query("SELECT * FROM orders");
while($row = $result->fetch_assoc()){
    echo "<form method='POST' style='margin-bottom:15px;'>";
    echo "Pesanan #".$row['id']." - ".$row['nama_pelanggan']." - Status: ".$row['status']."<br>";
    echo "<input type='hidden' name='id' value='".$row['id']."'>";
    echo "<select name='status'>
            <option ".($row['status']=="Menunggu Konfirmasi"?"selected":"").">Menunggu Konfirmasi</option>
            <option ".($row['status']=="Sedang Diproses"?"selected":"").">Sedang Diproses</option>
            <option ".($row['status']=="Selesai"?"selected":"").">Selesai</option>
            <option ".($row['status']=="Siap Diambil"?"selected":"").">Siap Diambil</option>
          </select>";
    echo " <button type='submit' name='update'>Update</button>";
    echo " <button type='submit' name='delete' onclick='return confirm(\"Yakin mau hapus pesanan ini?\");'>Hapus</button>";
    echo "</form><hr>";
}

echo "<a href='admin_dashboard.php'>Kembali ke Beranda</a>";
?>

</body>
</html>
