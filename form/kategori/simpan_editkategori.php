<?php
include "../../koneksi.php";

$id_kategori   = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$sql = mysqli_query($koneksi, "
  UPDATE kategori 
  SET nama_kategori = '$nama_kategori'
  WHERE id_kategori = '$id_kategori'
");

if ($sql) {
    header('Location: ./../../../cosmetics/dashboard.php?menu=kategori');
    exit;
} else {
    echo "Gagal update kategori: " . mysqli_error($koneksi);
}