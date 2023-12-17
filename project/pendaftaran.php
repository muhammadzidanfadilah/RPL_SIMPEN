<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "penjualan_kue";
$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn == false) {
    echo "Koneksi ke server gagal.";
    die();
}

// Fungsi untuk menambahkan pengguna ke database
function tambahPengguna($conn, $namaDepan, $namaBelakang, $email, $password, $alamat, $nomorHP) {
    // Hindari SQL Injection dengan menggunakan parameterized query
    $query = "INSERT INTO pengguna (nama_depan, nama_belakang, email, password, alamat, nomor_hp) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "ssssss", $namaDepan, $namaBelakang, $email, $password, $alamat, $nomorHP);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    // Tutup statement
    mysqli_stmt_close($stmt);

    return $result;
}

// Setelah formulir pendaftaran dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaDepan = $_POST['nama_depan'];
    $namaBelakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $alamat = $_POST['alamat'];
    $nomorHP = $_POST['nomor_hp'];

    // Tambahkan pengguna ke database
    if (tambahPengguna($conn, $namaDepan, $namaBelakang, $email, $password, $alamat, $nomorHP)) {
        // Redirect ke halaman login jika pendaftaran berhasil
        header('Location: halaman_login.php');
        exit;
    } else {
        echo "Pendaftaran gagal.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form pendaftaran</title>
    <style>
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
    <h1>pendaftaran<h1>
    <div class="logo">
            <img src="images/kuelogo.png" alt="Logo" width="100">
        </div>
<form action="#" method="post" onsubmit="return redirectToLogin()">
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" required>

            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="Password">Password:</label>
            <input type="password" id="Password" name="password" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>

            <button type="submit">Daftar</button>
        </form>

    <script>
        function redirectToLogin() {
            var namaDepan = document.getElementById('nama_depan').value;
            var namaBelakang = document.getElementById('nama_belakang').value;
            var alamat = document.getElementById('alamat').value;
            var nomorHP = document.getElementById('nomor_hp').value;

            // Lakukan validasi atau pengolahan data pendaftaran di sini

            // Simulasikan bahwa pendaftaran berhasil
            var registrationSuccessful = true;

            if (registrationSuccessful) {
                // Menyimpan informasi pengguna ke localStorage
                localStorage.setItem('user_info', JSON.stringify({
                    nama: namaDepan + ' ' + namaBelakang,
                    alamat: alamat,
                    nomorHP: nomorHP
                }));

                // Menampilkan informasi pengguna setelah pendaftaran berhasil
                document.getElementById('display-nama').textContent = namaDepan + ' ' + namaBelakang;
                document.getElementById('display-alamat').textContent = alamat;
                document.getElementById('display-nomor-hp').textContent = nomorHP;

                // Sembunyikan formulir dan tampilkan informasi pengguna
                document.getElementById('user-info').style.display = 'block';
                document.getElementById('nama_depan').style.display = 'none';
                document.getElementById('nama_belakang').style.display = 'none';
                document.getElementById('email').style.display = 'none';
                document.getElementById('kata_sandi').style.display = 'none';
                document.getElementById('alamat').style.display = 'none';
                document.getElementById('nomor_hp').style.display = 'none';
                document.getElementById('user-info').scrollIntoView(); // Gulir ke info pengguna

                // Berhenti mengirim formulir ke proses_pendaftaran.php
                return false;
            }

            // Jika pendaftaran gagal, biarkan formulir dikirim ke proses_pendaftaran.php
            return true;
        }
    </script>

    <script>
        function redirectToLogin() {
            // Lakukan validasi atau pengolahan data pendaftaran di sini

            // Simulasikan bahwa pendaftaran berhasil
            var registrationSuccessful = true;

            if (registrationSuccessful) {
                // Arahkan pengguna ke halaman login jika pendaftaran berhasil
                alert('Pendaftaran berhasil! Anda akan diarahkan ke halaman login.');
                window.location.href = 'halaman_login.php'; // Ganti dengan path halaman login yang sesuai
                return false; // Tidak mengirim formulir ke proses_pendaftaran.php
            }

            // Jika pendaftaran gagal, biarkan formulir dikirim ke proses_pendaftaran.php
            return true;
        }
    </script>
</body>
</html>

</body>
</html>
