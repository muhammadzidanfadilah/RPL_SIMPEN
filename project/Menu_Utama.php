<?php
$host = "localhost"; // Ganti dengan host database Anda
$dbname = "penjualan_kue"; // Ganti dengan nama database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menu</title>
    <!-- Tambahkan pustaka Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
        }
        header {
            background-color: #ff6600; /* Warna oranye */
            color: white;
            text-align: center;
            padding: 15px;
        }
        nav {
            background-color: #ffcc00; /* Warna oranye muda */
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        nav a {
            text-decoration: none;
            color: #333; /* Warna abu-abu gelap untuk teks */
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: #e0e0e0; /* Warna abu-abu untuk hover */
        }
        nav a + a {
            margin-left: 10px; /* Jarak antara setiap menu */
        }
        section {
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }
        h2 {
            color: #ff6600; /* Warna oranye */
            text-align: center;
            margin-left: 10px; /* Jarak antara setiap menu */
        }
        .sales-chart {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            /* Tambahkan gaya khusus untuk grafik penjualan di sini */
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #ff6600; /* Warna oranye */
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary {
            background-color: #ff6600; /* Warna oranye */
            border-color: #ff6600;
        }
        .btn-primary:hover {
            background-color: #cc5200; /* Warna oranye lebih gelap untuk hover */
            border-color: #cc5200;
        }
    </style>
</head>
<body>

<header>
        <h1>Dashboard Menu User</h1>
    </header>
     
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToLoginPage()">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToPendaftaranPage()">Pendaftaran</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToKatalogKuePage()">Katalog Kue</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToKeranjangPage()">Keranjang</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToCheckoutPage()">Checkout</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToLaporanTransaksiPage()">Laporan Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="logout()">Logout</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="redirectToAdminPage()">Admin</a></li>
    </ul>
</nav>

<script>
function redirectToLoginPage() {
    window.location.href = 'halaman_login.php';
}

function redirectToPendaftaranPage() {
    window.location.href = 'pendaftaran.php';
}

function redirectToKatalogKuePage() {
    window.location.href = 'katalog_kue.php';
}

function redirectToKeranjangPage() {
    window.location.href = 'keranjang.php';
}

function redirectToCheckoutPage() {
    window.location.href = 'checkout.php';
}

function redirectToLaporanTransaksiPage() {
    window.location.href = 'laporan_transaksi.php';
}

function logout() {
    window.location.href = 'logout.php';
}

function redirectToAdminPage() {
    window.location.href = 'admin.php';
}
</script>



                   
                   
                <!-- Tambahkan menu lainnya sesuai kebutuhan -->
            </ul>
        </div>
    </div>
</nav>

            </div>

        </div>

    </nav>
    <ul>
    <h2>Tampilan Kue</h2>
        <li data-item="lapis surabaya" data-price="10000">
            <img src="images/ala.jpg" alt="kue">
            <p>lapis surabaya - Rp. 10,000</p>
            <button onclick="addToCart('lapis surabaya', 10000)"
        

        <li data-item="lapis legit" data-price="15000">
            <img src="images/aka.jpg" alt="lapis legit">
            <p>lapis legit - Rp. 15,000</p>
            <button onclick="addToCart('lapis legit', 15000)"
        

        <li data-item="kue kembang" data-price="20000">
            <img src="images/kue.jpg" alt="Kue kembang">
            <p>Kue kembang - Rp. 20,000</p>
            <button onclick="addToCart('kue kembang', 20000)"
        </li>


        <style>
        /* ... (CSS dari kode sebelumnya) ... */

        /* Efek hover pada menu */
        nav a:hover {
            background-color: #ffeb3b; /* Warna kuning saat hover */
            color: #333; /* Warna teks abu-abu gelap saat hover */
        }

        /* Gaya tambahan untuk tombol aksi */
        .action-btn {
            background-color: #28a745; /* Warna hijau */
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .action-btn:hover {
            background-color: #218838; /* Warna hijau lebih gelap saat hover */
        }

        /* Animasi fade-in pada elemen */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- ... (Menu dari kode sebelumnya) ... -->
                </ul>
                <!-- Tombol aksi tambahan -->
                <button class="action-btn" onclick="showInfo()">Info</button>
            </div>
        </div>
    </nav>

    <section id="dashboardContent" class="loading-content">
        <!-- Menambahkan loading spinner -->
        <div class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Menambahkan elemen chart -->
        <div class="fade-in">
            <h2>Statistik Penjualan</h2>
            <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
    </section>

    <!-- Tambahkan pustaka Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Hapus loading spinner setelah konten dimuat
            document.getElementById("dashboardContent").classList.remove("loading-content");

            // Inisialisasi Chart.js
            var ctx = document.getElementById('salesChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Penjualan',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: '#007bff', /* Warna biru */
                        borderColor: '#007bff',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        function loadDashboard(url) {
            // Tampilkan loading spinner saat konten dimuat
            document.getElementById("dashboardContent").classList.add("loading-content");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Hapus loading spinner setelah konten dimuat
                    document.getElementById("dashboardContent").classList.remove("loading-content");

                    // Muat konten dashboard
                    document.getElementById("dashboardContent").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", url, true);
            xhttp.send();

            // Tambahkan baris berikut untuk menggulir ke atas halaman setelah memuat konten
            window.scrollTo(0, 0);
        }

        // Fungsi untuk menampilkan info tambahan
        function showInfo() {
            alert("Selamat datang di Dashboard! Ini adalah informasi tambahan.");
        }
    </script>


</body>
</html>
