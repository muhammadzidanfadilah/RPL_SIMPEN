<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "penjualan_kue";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false) {
    echo "Koneksi ke server gagal.";
    die();
}

// Query untuk mengambil data transaksi dari tabel pembelian
$query = "SELECT * FROM pembayaran";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

// Ambil data transaksi dan simpan dalam array
$laporan_transaksi = [];
while ($row = mysqli_fetch_assoc($result)) {
    $laporan_transaksi[] = $row;
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan transaksi</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 400px; /* Adjust the width as needed */
        }

        li {
            border: 1px solid #ddd;
            margin-bottom: 5px;
            padding: 10px;
            background-color: #ffa12c;
            color: white;
        }

        li span {
            display: block;
            margin-top: 5px;
            color: black; /* Change the color to your preference */
        }
    </style>

    <!-- Redirect to logout.php after 15 seconds -->
    <meta http-equiv="refresh" content="15;url=logout.php">
</head>
<body>
    <h2>Laporan transaksi</h2>
    <ul>
        <?php
        // Sample data
        $transactions = [
            ['nama kue' => 'Lapis legit', 'Harga' => 15000,'Jumlah' => 1, 'Nama pembeli' => 'zidan', 'Alamat' => 'cibarusah', 'Nomor Hp' => '089514751811','Metode Pembayaran' => 'Bank Transfer',],
        ];

        // Display transactions
        foreach ($transactions as $transaction) {
            echo "<li>";
            echo "<strong>{$transaction['nama kue']}</strong>";
            echo "<span>Jumlah: {$transaction['Jumlah']}</span>";
            echo "<span>Nama Pembeli: {$transaction['Nama pembeli']}</span>";
            echo "<span>Harga: Rp. " . number_format($transaction['Harga'], 0, ',', '.') . "</span>";
            echo "<span>Alamat: {$transaction['Alamat']}</span>";
            echo "<span>Nomor Hp: {$transaction['Nomor Hp']}</span>";
            echo "<span>Metode Pembayaran: {$transaction['Metode Pembayaran']}</span>";
            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>
