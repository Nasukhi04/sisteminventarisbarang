<?php
require 'koneksi.php';

// Pastikan ID ada di URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Query DELETE dengan placeholder
    $query = "DELETE FROM barang WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare gagal: " . mysqli_error($conn));
    }

    // Bind parameter (i = integer)
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        // Redirect kembali ke index
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);

} else {
    echo "ID tidak ditemukan.";
}
?>