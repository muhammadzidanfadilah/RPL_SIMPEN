<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "penjualan_kue";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false)
{
echo "Koneksi ke server gagal.";
die();
} #else echo "Koneksi berhasil";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Kue</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #ffa12c;
            margin: 0;
        }

        .container {
            width: 100%;
            display: flex;
            flex-direction: column;
            max-width: 850px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 auto;
            text-align: center;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            width: 100%;
            max-width: 100px;
            height: auto;
            display: inline-block;
        }

        h2 {
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        li {
            margin: 10px;
            text-align: center;
        }

        button {
            border: none;
            outline: none;
            padding: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background: #ffa12c;
            transition: background 0.3s ease;
        }

        button:hover {
            background: rgba(214, 86, 64, 1);
        }

        .cart-button {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Katalog Kue</h2>

    <ul>
        <li data-item="Lapis surabaya" data-price="10000">
            <img src="images/ala.jpg" alt="kue">
            <p>lapis surabaya - Rp. 10,000</p>
            <button onclick="addToCart('lapis surabaya', 10000)">Tambahkan ke Keranjang</button>
        </li>
        <li data-item="Lapis legit" data-price="15000">
            <img src="images/aka.jpg" alt="lapis legit">
            <p>lapis legit - Rp. 15,000</p>
            <button onclick="addToCart('lapis legit', 15000)">Tambahkan ke Keranjang</button>
        </li>
        <li data-item="Kue kembang" data-price="20000">
            <img src="images/kue.jpg" alt="Kue kembang">
            <p>Kue kembang - Rp. 20,000</p>
            <button onclick="addToCart('kue kembang', 20000)">Tambahkan ke Keranjang</button>
        </li>
        <!-- Tambahkan lebih banyak kue sesuai kebutuhan -->
    </ul>

    <script>
        function addToCart(itemName, price) {
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            cart.push({ itemName: itemName, price: price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert('Item telah ditambahkan ke keranjang!');
            openCartPage();
        }

        function openCartPage() {
            window.location.href = 'keranjang.php';
        }
    </script>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['itemName'];
    $price = $_POST['price'];

    $query = "INSERT INTO cart (item_name, price) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $itemName, $price);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
</body>
</html>