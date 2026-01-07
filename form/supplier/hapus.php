<?php
include "../../koneksi.php";

$id_supplier = $_GET['id_supplier'];

$sql = mysqli_query(
  $koneksi,
  "DELETE FROM supplier WHERE id_supplier='$id_supplier'"
);

if ($sql) {
    header("Location: ../../dashboard.php?menu=supplier");
    exit;
} else {
    echo "Gagal menghapus data supplier";
}
