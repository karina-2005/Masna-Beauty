<?php
include "../../koneksi.php";

$id_detail = $_POST['id_detail'];
$id_produk = $_POST['id_produk'];
$jumlah    = $_POST['jumlah'];

/* ambil data lama */
$qOld = mysqli_query($koneksi,"
  SELECT id_produk, jumlah 
  FROM transaksi_detail 
  WHERE id_detail = '$id_detail'
");
$old = mysqli_fetch_assoc($qOld);

/* kembalikan stok lama */
mysqli_query($koneksi,"
  UPDATE produk 
  SET stok = stok + {$old['jumlah']}
  WHERE id_produk = '{$old['id_produk']}'
");

/* ambil harga baru */
$qHarga = mysqli_query($koneksi,"
  SELECT harga 
  FROM produk 
  WHERE id_produk = '$id_produk'
");
$p = mysqli_fetch_assoc($qHarga);

$harga    = $p['harga'];
$subtotal = $harga * $jumlah;

/* update detail */
$sql = mysqli_query($koneksi,"
  UPDATE transaksi_detail SET
    id_produk = '$id_produk',
    jumlah    = '$jumlah',
    harga     = '$harga',
    subtotal  = '$subtotal'
  WHERE id_detail = '$id_detail'
");

if(!$sql){
  die('ERROR UPDATE: '.mysqli_error($koneksi));
}

/* kurangi stok baru */
mysqli_query($koneksi,"
  UPDATE produk 
  SET stok = stok - $jumlah
  WHERE id_produk = '$id_produk'
");

header("Location: ./../../../cosmetics/dashboard.php?menu=transaksi_detail");
exit;
