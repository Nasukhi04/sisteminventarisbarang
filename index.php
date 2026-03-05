<?php

require 'koneksi.php';

$keyword = "";

$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}

// Jika ada pencarian
if (isset($_GET['q']) && $_GET['q'] != "") {
    $keyword = mysqli_real_escape_string($conn, $_GET['q']);
    $query = "SELECT * FROM barang 
              WHERE nama_barang LIKE '%$keyword%' 
              OR kategori LIKE '%$keyword%'";
}

$result = mysqli_query($conn, $query);
session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Inventaris Barang</title>
</head>
<body>
<p>
    Selamat datang, <strong><?= $_SESSION['username']; ?></strong> |
    <a href="logout.php">Logout</a>
</p>

<h2>Daftar Inventaris Barang</h2>

<form method="GET" action="">
    <input type="text" name="q" placeholder="Ketik kata kunci..." 
           value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset Pencarian</a>
</form>

<br>


<table border="1" cellpadding="10">
    <tr>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

<?php if (mysqli_num_rows($result) > 0) : ?>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['nama_barang']); ?></td>
            <td><?= htmlspecialchars($row['kategori']); ?></td>
            <td><?= htmlspecialchars($row['stok']); ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td>
                <?php if ($row['stok'] > 10) : ?>
                    <span style="color:green; font-weight:bold;">
                        Stok Aman
                    </span>
                <?php elseif ($row['stok'] > 0) : ?>
                    <span style="color:orange; font-weight:bold;">
                        Stok Menipis, Silakan Restock
                    </span>
                <?php else : ?>
                    <span style="color:red; font-weight:bold;">
                        Stok Habis
                    </span>
                <?php endif; ?>
            </td>
              <td>
             <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id']; ?>" 
                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>

<?php else : ?>
    <tr>
        <td colspan="5" style="text-align:center; color:red;">
            Data tidak ditemukan.
        </td>
    </tr>
<?php endif; ?>

</table>

</body>
</html>