<?php
$host = "localhost";
$user = "root";
$pass = "0";
$db = "penjualan_kue";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false)
{
echo "Koneksi ke server gagal.";
die();
} #else echo "Koneksi berhasil";
?>