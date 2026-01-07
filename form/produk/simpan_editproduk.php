<?php
include "../../koneksi.php";
$kode = $_POST['id_produk'];
$nama = $_POST['txtNamaproduk'];
$harga = $_POST['txtJumlah'];
$sql = mysqli_query($koneksi,"UPDATE produk SET nama_produk = '$nama', harga = '$harga' WHERE id_produk = '$kode'");
if($sql){
    header('location:./../../../cosmetics/dashboard.php?menu=produk');
}
