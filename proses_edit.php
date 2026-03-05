<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Tangkap semua data termasuk ID
    $id           = $_POST['id'];
    $nama_barang  = $_POST['nama_barang'];
    $kategori     = $_POST['kategori'];
    $stok         = $_POST['stok'];
    $harga        = $_POST['harga'];

    // Validasi sederhana
    if (empty($id) || empty($nama_barang) || empty($kategori) || empty($stok) || empty($harga)) {
        die("Semua field wajib diisi.");
    }

    // Query UPDATE dengan placeholder
    $query = "UPDATE barang 
              SET nama_barang = ?, 
                  kategori = ?, 
                  stok = ?, 
                  harga = ? 
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare gagal: " . mysqli_error($conn));
    }

    // Urutan sesuai tanda tanya (?)
    // string, string, integer, integer, integer
    mysqli_stmt_bind_param($stmt, "ssiii",
        $nama_barang,
        $kategori,
        $stok,
        $harga,
        $id
    );

    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);

} else {
    echo "Akses tidak diizinkan.";
}
session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>