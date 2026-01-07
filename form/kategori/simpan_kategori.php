<?php
include "../../koneksi.php";

$id_kategori   = $_POST['id_kategori'];
$nama_kategori = $_POST['nama_kategori'];

$sql = mysqli_query($koneksi, "
  INSERT INTO kategori (id_kategori, nama_kategori)
  VALUES ('$id_kategori', '$nama_kategori')
");

if ($sql) {
    header("Location: ../../dashboard.php?menu=kategori");
    exit;
} else {
    echo "Gagal menyimpan data kategori: " . mysqli_error($koneksi);
}
