<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "laundry_db");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama_pelanggan'];
$no_hp = $_POST['no_hp'];
$service_id = $_POST['service_id'];
$berat = $_POST['berat_kg'];

// Ambil harga layanan
$result = $conn->query("SELECT harga_per_kg FROM services WHERE id = $service_id");
$row = $result->fetch_assoc();
$harga_per_kg = $row['harga_per_kg'];

// Hitung total
$total_harga = $berat * $harga_per_kg;

// Simpan ke database orders
$sql = "INSERT INTO orders (nama_pelanggan, no_hp, service_id, berat_kg, total_harga)
        VALUES ('$nama', '$no_hp', '$service_id', '$berat', '$total_harga')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman konfirmasi dengan membawa ID order
    $last_id = $conn->insert_id;
    header("Location: succes_order.php?id=" . $last_id);
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>