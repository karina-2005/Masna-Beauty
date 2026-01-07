<?php
include "../../koneksi.php";

$id_transaksi = $_GET['id_transaksi'];

$sql = mysqli_query($koneksi, "
  DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'
");

if ($sql) {
    header("Location: ../../dashboard.php?menu=transaksi");
    exit;
} else {
    echo "Gagal hapus transaksi : " . mysqli_error($koneksi);
}
