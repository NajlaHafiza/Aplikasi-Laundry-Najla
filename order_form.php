<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan Laundry</title>
    <link rel="stylesheet" href="style_order.css">
    <script>
        function hitungTotal() {
            let selectService = document.getElementById("service_id");
            let selectedOption = selectService.options[selectService.selectedIndex];
            
            // Ambil harga dari atribut data-harga
            let hargaPerKg = parseInt(selectedOption.getAttribute("data-harga"));
            let berat = parseFloat(document.getElementById("berat_kg").value);

            if (!isNaN(hargaPerKg) && !isNaN(berat)) {
                let total = hargaPerKg * berat;
                document.getElementById("total_harga").innerText = "Rp " + total.toLocaleString();
            } else {
                document.getElementById("total_harga").innerText = "-";
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
    <form action="proses_pesan.php" method="POST">
    <<h2>Pemesanan Laundry</h2>
        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" placeholder="Ketik nama Anda" required><br><br>

        <label>No. HP:</label><br>
        <input type="text" name="no_hp" placeholder="Ketik no. hp Anda" required><br><br>

        <label>Pilih Layanan:</label><br>
        <select name="service_id" id="service_id" onchange="hitungTotal()" required>
            <?php
            // ambil data service dari database
            $conn = new mysqli("localhost", "root", "", "laundry_db");
            $result = $conn->query("SELECT * FROM services");
            while($row = $result->fetch_assoc()){
                echo "<option value='".$row['id']."' data-harga='".$row['harga_per_kg']."'>"
                     .$row['nama_service']." - Rp".$row['harga_per_kg']."/kg</option>";
            }
            ?>
        </select><br><br>

        <label>Berat (kg):</label><br>
        <input type="number" step="0.1" name="berat_kg" id="berat_kg" oninput="hitungTotal()" placeholder="Pilih Berat Baju Anda" required><br><br>

        <label>Total Harga:</label><br>
        <span id="total_harga">-</span><br><br>

        <button type="submit">Pesan</button>

        <p><a href="indeks.php">Kembali Ke Beranda</a></p>
    </form>
</body>
</html>