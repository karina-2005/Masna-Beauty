<?php
include "../../koneksi.php";

$kode   = $_POST['id_cust'];
$nama   = $_POST['txtNamacust'];
$hp     = $_POST['txtHp'];
$alamat = $_POST['txtAlamat'];

$sql = mysqli_query($koneksi, "
  INSERT INTO customer (id_cust, nama_cust, no_telp, alamat)
  VALUES ('$kode', '$nama', '$hp', '$alamat')
");

if ($sql) {
    header("Location: ../../dashboard.php?menu=customer");
    exit;
} else {
    echo "Gagal menyimpan data";
}
