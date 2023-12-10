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
    <title>Checkout</title>
    <style>
    

        h2 {
            text-align: center;
        }
        p {
            color: #15e037;
            font-size: 18px;
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: center;
            
        }

        label {
            margin-top: 10px;
            text-align: center;
        }

        display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #ffa12c;
            margin: 0;
        

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
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #ffa12c;
        margin: 0;
    }

    #cart-list {
        margin-top: 20px; /* Sesuaikan margin-top sesuai kebutuhan */
        list-style-type: none;
        padding: 0;
        text-align: center;
    }

    #user-info {
        text-align: center;
        margin-bottom: 20px; /* Sesuaikan margin-bottom sesuai kebutuhan */
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
            text-align: center;
        }

        hr {
            border-top: 2px solid #ffa12c;
            text-align: center;
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
        .logo {
            text-align: center; /* Menengahkan konten secara horizontal */
        }

        .logo img {
            width: 100%; /* Gambar mengambil lebar 100% dari parent (.logo) */
            max-width: 100px; /* Maksimum lebar gambar (opsional) */
            height: auto; /* Menjaga rasio aspek gambar */
            display: inline-block; /* Menghilangkan whitespace yang mungkin muncul */
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
            display: block;
            margin: auto;
            /* Menengahkan tombol dengan display: block dan margin: auto */
            border: none;
            outline: none;
            padding: 10px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background: #ffa12c; /* Warna latar belakang tombol */
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
        #cart-list {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        #cart-list li {
            margin: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        #cart-list img {
            width: 200px;
            height: auto;
            margin-right: 10px;
        }

        /* Gaya tambahan jika diperlukan */
        /* Misalnya, gaya untuk total harga */
        #total-price {
            font-weight: bold;
            margin-top: 10px;
        }
        </style>
</head>
<body>
<script>
       function displayCart() {
    let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    let cartList = document.getElementById('cart-list');

    cartList.innerHTML = '';
    cart.forEach(item => {
        cartList.innerHTML += `
        <li>
        <img src="images/aka.jpg" alt="Lapis legit">

        ${item.itemName} - Rp. ${item.price} - Jumlah: ${item.quantity || 1}
        </li>`;
    });
}

    function displayUserInfo() {
        let userInfo = localStorage.getItem('user_info') ? JSON.parse(localStorage.getItem('user_info')) : {};
        let userInfoContainer = document.getElementById('user-info');

    }

    function submitPayment() {
    let selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked');

    if (selectedPaymentMethod) {
        if (confirm('Payment successful! Do you want to view the transaction report?')) {
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            cart.forEach(transaction => {
                transaction.paymentMethod = selectedPaymentMethod.value;
            });
            localStorage.setItem('transactions', JSON.stringify(cart));

            // Redirect to laporan_transaksi
            window.location.href = 'laporan_transaksi.php';
        }
    } else {
        alert('Please select a payment method!');
    }
}
    </script>

    <h2>Checkout and Payment</h2>

    <div id="user-info"></div>
    <ul id="cart-list"></ul>

    <form id="paymentForm">
        <label>
            Name:
            <input type="text" name="nama Pembeli" required>
        </label>
        <label>
            Address:
            <textarea name="alamat" rows="4" required></textarea>
        </label>
        <label>
            Phone Number:
            <input type="tel" name="nomorHP" pattern="[0-9]{10,12}" required>
        </label>
        <label>
            <input type="radio" name="metodePembayaran" value="CreditCard" checked> Credit Card
        </label>
        <label>
            <input type="radio" name="metodePembayaran" value="BankTransfer"> Bank Transfer
        </label>
        <button class="cart-button" onclick="submitPayment()">bayar</button>
    </form>
    <button onclick="redirectToLaporan()">laporan transaksi</button>
    <script>
        function redirectToLaporan() {
            window.location.href = 'laporan_transaksi.php';
        }

        displayUserInfo();
        displayCart();
    </script>
</body>
</html>