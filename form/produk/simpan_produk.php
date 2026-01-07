<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../../koneksi.php";

$id_produk   = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$id_supplier = $_POST['id_supplier'];
$harga       = $_POST['harga'];
$stok        = $_POST['stok'];
$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];
$folder = "../../dist/assets/img/produk/";
move_uploaded_file($tmp, $folder.$foto);

$sql = mysqli_query($koneksi, "
  INSERT INTO produk 
  (id_produk, nama_produk, id_kategori, id_supplier, harga, stok, foto)
  VALUES
  ('$id_produk', '$nama_produk', '$id_kategori', '$id_supplier', '$harga', '$stok', '$foto')
");

if (!$sql) {
    die('ERROR SQL: '.mysqli_error($koneksi));
}

header("Location: ./../../../cosmetics/dashboard.php?menu=produk");
exit;