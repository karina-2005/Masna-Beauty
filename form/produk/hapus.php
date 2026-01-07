<?php
include "../../koneksi.php";
$kode = $_GET['id_produk'];
$sql = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk = '$kode'");
if($sql){
    header('location:./../../../cosmetics/dashboard.php?menu=produk');
}else{
    echo "Data gagal dihapus";
}
?>