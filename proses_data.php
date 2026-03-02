<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $stok        = $_POST['stok'];
    $harga       = $_POST['harga'];

    if (empty($nama_barang) || empty($kategori) || empty($stok) || empty($harga)) {

        echo "<h3 style='color:red;'>Error: Semua kolom wajib diisi!</h3>";
        echo "<a href='tambah_data.php'>Kembali ke Form</a>";

    } else {

        echo "<h2>Data Berhasil Disimpan</h2>";

        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
              </tr>";

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nama_barang) . "</td>";
        echo "<td>" . htmlspecialchars($kategori) . "</td>";
        echo "<td>" . htmlspecialchars($stok) . "</td>";
        echo "<td>Rp " . number_format($harga, 0, ',', '.') . "</td>";
        echo "</tr>";

        echo "</table>";

        echo "<br><a href='tambah_data.php'>Tambah Data Lagi</a>";
    }

} else {
    echo "<h3 style='color:red;'>Akses tidak diizinkan!</h3>";
}
?>