<?php
include "../../koneksi.php";

$id_kategori = $_GET['id_kategori'];

mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");

header("Location: ../../dashboard.php?menu=kategori");
exit;
