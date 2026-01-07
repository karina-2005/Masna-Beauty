<?php
include "../../koneksi.php";

$id_transaksi       = $_POST['id_transaksi'];
$tanggal_transaksi  = $_POST['tanggal_transaksi'];
$kode        = $_POST['id_cust'];

$sql = mysqli_query($koneksi, "
  INSERT INTO transaksi 
  (id_transaksi, tanggal_transaksi, id_cust)
  VALUES
  ('$id_transaksi', '$tanggal_transaksi', '$kode')
");

if ($sql) {
    header("Location: ../../dashboard.php?menu=transaksi");
    exit;
} else {
    echo "Gagal menyimpan transaksi : " . mysqli_error($koneksi);
}
