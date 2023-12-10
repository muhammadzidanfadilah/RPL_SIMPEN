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
    <title>Keranjang Belanja</title>
    <style>

        h2 {
            text-align: center;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

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
            max-width: 850px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Mengatasi shadow di luar border-radius */
        }

        .login {
            width: 400px;
            align-items: center;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        h1 {
            margin: 20px 0;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
            color: #333;
        }

        hr {
            border-top: 2px solid #ffa12c;
        }

        p {
            text-align: center;
            margin: 10px;
            color: #333;
        }

        form label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            padding: 5px;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            margin: 5px 0;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
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

        @media (max-width: 880px) {
            .container {
                width: 100%;
                max-width: 750px;
                margin-left: 20px;
                margin-right: 20px;
            }

            .login {
                width: 100%;
                padding: 20px;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<h2>Keranjang Belanja</h2>
    <div class="logo">
        <img src="images/kuelogo.png" alt="Logo" width="100">
    </div>

    <ul id="cart-list"></ul>

    <button onclick="openPaymentPage()" style="display: block; margin: auto;">Buka Halaman Checkout</button>

    <script>
     
    // Fungsi untuk menampilkan item dari localStorage ke halaman
    function displayCart() {
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
        let cartList = document.getElementById('cart-list');

        // Membuat daftar item di halaman
        cartList.innerHTML = '';
        cart.forEach((item, index) => {
            cartList.innerHTML += `
                <li>
                
              
           
        </li>
        <li data-item="Lapis legit" data-price="15000">
            <img src="images/aka.jpg" alt="Lapis legit">
           
            
        </li>
                    ${item.itemName} - Rp. ${item.price} - Quantity: ${item.quantity || 1}
                    <button onclick="removeItem(${index})">Hapus</button>
                    <button onclick="increaseQuantity(${index})">Tambah</button>
                    <button onclick="decreaseQuantity(${index})">Kurangi</button>
                </li>`;
        });
    }

    // Fungsi untuk menghapus item dari keranjang
    function removeItem(index) {
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }

    // Fungsi untuk menambah jumlah item dalam keranjang
    function increaseQuantity(index) {
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
        cart[index].quantity = (cart[index].quantity || 1) + 1;
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }

    // Fungsi untuk mengurangi jumlah item dalam keranjang
    function decreaseQuantity(index) {
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
        if (cart[index].quantity && cart[index].quantity > 1) {
            cart[index].quantity -= 1;
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }

    // Fungsi untuk membuka halaman checkout
    function openPaymentPage() {
        // Mengarahkan pengguna ke halaman checkout
        window.location.href = 'checkout.php';
    }

    // Panggil fungsi displayCart saat halaman dimuat
    window.onload = function() {
        displayCart();
    };
    </script>

</body>
</html>

