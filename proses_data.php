<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $stok        = $_POST['stok'];
    $harga       = $_POST['harga'];

    // Validasi sederhana
    if (empty($nama_barang) || empty($kategori) || empty($stok) || empty($harga)) {
        echo "Semua field wajib diisi!";
        exit;
    }

    // Query dengan tanda tanya (?)
    $query = "INSERT INTO barang (nama_barang, kategori, stok, harga) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare gagal: " . mysqli_error($conn));
    }

    // Bind parameter
    // s = string, i = integer
    mysqli_stmt_bind_param($stmt, "ssii", $nama_barang, $kategori, $stok, $harga);

    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        // Redirect ke index.php
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>