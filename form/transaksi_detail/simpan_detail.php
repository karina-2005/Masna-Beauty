<?php
// koneksi database (WAJIB NAIK 2 FOLDER)
include "../../koneksi.php";

// ambil data dari form
$id_detail    = $_POST['id_detail'];
$id_transaksi = $_POST['id_transaksi'];
$id_produk    = $_POST['id_produk'];
$jumlah       = $_POST['jumlah'];

// ambil harga produk
$qHarga = mysqli_query($koneksi, "
    SELECT harga 
    FROM produk 
    WHERE id_produk = '$id_produk'
");

$dataHarga = mysqli_fetch_assoc($qHarga);
$harga     = $dataHarga['harga'];

// hitung subtotal
$subtotal = $harga * $jumlah;

// simpan ke tabel transaksi_detail
mysqli_query($koneksi, "
    INSERT INTO transaksi_detail 
    (id_detail, id_transaksi, id_produk, jumlah, subtotal)
    VALUES 
    ('$id_detail', '$id_transaksi', '$id_produk', '$jumlah', '$subtotal')
");

// update total di tabel transaksi
mysqli_query($koneksi, "
    UPDATE transaksi 
    SET total = (
        SELECT SUM(subtotal)
        FROM transaksi_detail
        WHERE id_transaksi = '$id_transaksi'
    )
    WHERE id_transaksi = '$id_transaksi'
");

// kembali ke halaman detail transaksi
header("Location: ../../dashboard.php?menu=transaksi_detail");
exit;
