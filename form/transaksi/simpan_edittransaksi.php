<?php
include "../../koneksi.php";

// ambil data dari form
$id_transaksi       = $_POST['id_transaksi'];
$tanggal_transaksi  = $_POST['tanggal_transaksi'];
$kode           = $_POST['id_cust'];

// update transaksi (JANGAN INSERT)
$query = mysqli_query($koneksi, "
  UPDATE transaksi SET
    tanggal_transaksi = '$tanggal_transaksi',
    id_cust = '$kode'
  WHERE id_transaksi = '$id_transaksi'
");

if ($query) {
    header("Location: ../../dashboard.php?menu=transaksi");
    exit;
} else {
    echo "Gagal menyimpan transaksi : " . mysqli_error($koneksi);
}
