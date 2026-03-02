<-- membuat database -->
CREATE DATABASE db_toko;
<-- menggunakan database yang sudah dibuat -->
USE db_toko;
<-- membuat tabel di database -->
CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    stok INT NOT NULL,
    harga DECIMAL(10,2) NOT NULL
);

<-- mengisi tabel -->
INSERT INTO barang (nama_barang, kategori, stok, harga) VALUES
('Laptop', 'Elektronik', 5, 7000000),
('Mouse', 'Elektronik', 15, 150000),
('Buku Tulis', 'ATK', 8, 5000),
('Pulpen', 'ATK', 25, 3000),
('Printer', 'Elektronik', 3, 2000000);

<-- cek apakah data sudah masuk -->
SELECT * FROM barang ORDER BY id;