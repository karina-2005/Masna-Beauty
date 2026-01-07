<?php
include "../../koneksi.php";

$id_supplier     = $_POST['id_supplier'];
$nama   = $_POST['nama_supplier'];
$kontak = $_POST['kontak'];

$sql = mysqli_query($koneksi,
    "UPDATE supplier 
     SET nama_supplier='$nama', kontak='$kontak'
     WHERE id_supplier='$id_supplier'"
);

if($sql){
    header("location:../../dashboard.php?menu=supplier");
}