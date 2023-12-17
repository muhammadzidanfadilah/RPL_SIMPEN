<?php
header("Content-type: text/css; charset: UTF-8");

$primaryColor = "#3498db";  // Ganti dengan warna utama yang diinginkan
$hoverColor = "#1a5d99";    // Ganti dengan warna saat dihover

$dangerColor = "#e74c3c";   // Ganti dengan warna untuk tindakan berbahaya
$dangerHoverColor = "#c0392b"; // Warna saat dihover pada tindakan berbahaya
?>

body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    display: inline-block;
    margin-right: 10px;
}

a {
    text-decoration: none;
    color: <?php echo $primaryColor; ?>;
    font-weight: bold;
}

a:hover {
    color: <?php echo $hoverColor; ?>;
}

.logout-link {
    text-align: center;
    margin-top: 20px;
}

.logout-link a {
    color: <?php echo $dangerColor; ?>;
}

.logout-link a:hover {
    color: <?php echo $dangerHoverColor; ?>;
}
