<?php
$host = "localhost";   // Server database
$user = "root";        // Username default XAMPP
$pass = "";            // Password default kosong di XAMPP
$db   = "laundry_db";  // Nama database yang tadi dibuat

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// echo "Koneksi berhasil"; // Bisa dipakai untuk test
?>
