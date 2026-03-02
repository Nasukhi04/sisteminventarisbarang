<?php
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

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Status</th>
    </tr>

    <?php foreach ($barang as $item) : ?>
        <tr>
            <td><?= $item["nama_barang"]; ?></td>
            <td><?= $item["kategori"]; ?></td>
            <td><?= $item["stok"]; ?></td>
            <td>Rp <?= number_format($item["harga"], 0, ',', '.'); ?></td>
            <td>
                <?php
                if ($item["stok"] < 10) {
                    echo "<span style='color:red;'>Stok Menipis - Segera Restock!</span>";
                } else {
                    echo "Stok Aman";
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>