<?php
$host = "localhost";
$user = "root";
$pass = "0";
$db = "penjualan_kue";
$conn = mysqli_connect($host, $user, $pass, $db);
// Sertakan file koneksi ke database (gantilah dengan informasi koneksi yang sesuai)
include 'koneksi.php';

// Tangkap data id_pendaftaran dari sesi login
$id_pendaftaran = $_SESSION['user_id'];

// Query untuk mendapatkan total belanja dari keranjang pengguna
$sql = "SELECT SUM(k.harga * c.jumlah) AS total_bayar
        FROM keranjang c
        INNER JOIN katalog_kue k ON c.id_kue = k.id
        WHERE c.id_pendaftaran = $id_pendaftaran";
$result = $conn->query($sql);

// Tangkap total belanja
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_bayar = $row['total_bayar'];
} else {
    $total_bayar = 0;
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
</head>
<body>
    <h2>Form Pembayaran</h2>
    <p>Total Belanja: Rp <?php echo $total_bayar; ?></p>
    
    <form action="process_pembayaran.php" method="POST">
        <input type="hidden" name="total_bayar" value="<?php echo $total_bayar; ?>">
        
        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select name="metode_pembayaran" required>
            <option value="transfer_bank">Transfer Bank</option>
            <option value="tunai">Tunai</option>
        </select><br>

        <input type="submit" value="Bayar">
    </form>
</body>
</html>
