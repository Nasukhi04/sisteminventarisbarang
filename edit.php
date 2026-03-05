<?php
require 'koneksi.php';

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Query SELECT satu data
    $query = "SELECT * FROM barang WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Prepare gagal: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan.");
    }

} else {
    die("ID tidak ditemukan.");
}
session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Edit Data Barang</h2>

<form method="POST" action="proses_edit.php">

    <!-- Hidden ID -->
    <input type="hidden" name="id" value="<?= $data['id']; ?>">

    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang"
           value="<?= htmlspecialchars($data['nama_barang']); ?>" required><br><br>

    <label>Kategori:</label><br>
    <select name="kategori" required>
        <option value="Elektronik"
            <?= $data['kategori'] == 'Elektronik' ? 'selected' : '' ?>>
            Elektronik
        </option>
        <option value="ATK"
            <?= $data['kategori'] == 'ATK' ? 'selected' : '' ?>>
            ATK
        </option>
    </select><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok"
           value="<?= $data['stok']; ?>" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga"
           value="<?= $data['harga']; ?>" required><br><br>

    <button type="submit">Update Data</button>

</form>