<?php
include "../../koneksi.php";

$id_detail = $_GET['id_detail'];

/* ambil data detail */
$q = mysqli_query($koneksi,"
  SELECT id_produk, jumlah 
  FROM transaksi_detail
  WHERE id_detail = '$id_detail'
");
$d = mysqli_fetch_assoc($q);

/* kembalikan stok */
mysqli_query($koneksi,"
  UPDATE produk 
  SET stok = stok + {$d['jumlah']}
  WHERE id_produk = '{$d['id_produk']}'
");

/* hapus detail */
$del = mysqli_query($koneksi,"
  DELETE FROM transaksi_detail 
  WHERE id_detail = '$id_detail'
");

if(!$del){
  die('ERROR HAPUS: '.mysqli_error($koneksi));
}

header("Location: ./../../../cosmetics/dashboard.php?menu=transaksi_detail");
exit;
