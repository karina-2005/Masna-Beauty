<?php
session_start();
include "koneksi.php";

$username = ($_POST['txtUsername']);
$password = ($_POST['txtPassword']); 

$sql = mysqli_query($koneksi,"
  SELECT * FROM login 
  WHERE username='$username' 
  AND password='$password'
");

$data = mysqli_fetch_assoc($sql);

if($data){
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if($data['role'] == 'admin'){
        header("Location: dashboard.php");
    } else {
        header("Location: ./user_cos/dashboard.php");
    }
    exit;
} else {
    echo "<script>
      alert('Login gagal! Username atau Password salah');
      window.location='login.php';
    </script>";
}
?>
