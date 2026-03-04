<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "database_toko";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil"; // boleh dicoba untuk testing

?>