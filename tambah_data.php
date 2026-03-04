<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Barang</title>
</head>
<body>

    <h2>Form Tambah Data Barang</h2>

    <form method="POST" action="proses_data.php">

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang"><br><br>

        <label>Kategori:</label><br>
        <select name="kategori">
            <option value="">-- Pilih Kategori --</option>
            <option value="Elektronik">Elektronik</option>
            <option value="ATK">ATK</option>
        </select><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" min="0"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" min="0"><br><br>

        <button type="submit">Simpan Data</button>

    </form>

</body>
</html>