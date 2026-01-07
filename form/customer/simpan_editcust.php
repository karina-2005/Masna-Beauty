<?php
include "../../koneksi.php";

$kode   = $_POST['id_cust'];
$nama   = $_POST['txtNamacust'];
$hp     = $_POST['txtHp'];
$alamat = $_POST['txtAlamat'];

$sql = mysqli_query($koneksi,"
  UPDATE customer SET
    nama_cust = '$nama',
    no_telp   = '$hp',
    alamat    = '$alamat'
  WHERE id_cust = '$kode'
");

if($sql){
    header('Location: ./../../../cosmetics/dashboard.php?menu=customer');
    exit;
}else{
    die('ERROR SQL: '.mysqli_error($koneksi));
}
