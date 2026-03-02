<?php

$keyword = "";

// Cek apakah user sedang melakukan pencarian
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Testing sementara (boleh dihapus nanti)
    echo "Keyword yang dicari: " . htmlspecialchars($keyword) . "<br><br>";
}
// Array multidimensi (5 data barang)
$barang = [
    [
        "nama_barang" => "Laptop",
        "kategori" => "Elektronik",
        "stok" => 5,
        "harga" => 7000000
    ],
    [
        "nama_barang" => "Mouse",
        "kategori" => "Elektronik",
        "stok" => 15,
        "harga" => 150000
    ],
    [
        "nama_barang" => "Buku Tulis",
        "kategori" => "ATK",
        "stok" => 8,
        "harga" => 5000
    ],
    [
        "nama_barang" => "Pulpen",
        "kategori" => "ATK",
        "stok" => 25,
        "harga" => 3000
    ],
    [
        "nama_barang" => "Printer",
        "kategori" => "Elektronik",
        "stok" => 3,
        "harga" => 2000000
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Inventaris Barang</title>
</head>
<body>

<h2>Daftar Inventaris Barang</h2>
<form method="GET" action="">
    <input type="text" name="keyword" placeholder="Ketik kata kunci..." 
           value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
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
    </tr>
    <?php
$adaData = false;
?>
<?php foreach ($barang as $item) : ?>

<?php
    if ($keyword == "") {
        $tampilkan = true;
    } else {
        $namaBarangLower = strtolower($item['nama_barang']);
        $keywordLower    = strtolower($keyword);

        $tampilkan = str_contains($namaBarangLower, $keywordLower);
    }
?>

<?php if ($tampilkan) : ?>
    <?php $adaData = true; ?>
    <tr>
        <td><?= $item["nama_barang"]; ?></td>
        <td><?= $item["kategori"]; ?></td>
        <td><?= $item["stok"]; ?></td>
        <td>Rp <?= number_format($item["harga"], 0, ',', '.'); ?></td>
    </tr>
<?php endif; ?>

<?php endforeach; ?>

<?php if ($keyword != "" && !$adaData) : ?>
    <tr>
        <td colspan="4" style="text-align:center; color:red;">
            Data tidak ditemukan.
        </td>
    </tr>
<?php endif; ?>

</table>

</body>
</html>