<?php
include "../../koneksi.php";

$id_supplier = $_POST['id_supplier'];
$nama   = $_POST['nama_supplier'];
$kontak = $_POST['kontak'];

$sql = mysqli_query($koneksi,
  "INSERT INTO supplier (id_supplier, nama_supplier, kontak)
   VALUES ('$id_supplier','$nama','$kontak')"
);

if($sql){
  header("Location: ../../dashboard.php?menu=supplier");
}else{
  echo "Gagal simpan supplier";
}