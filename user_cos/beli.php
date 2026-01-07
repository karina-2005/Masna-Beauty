<?php
session_start();
include "../koneksi.php";

if (
  !isset($_SESSION['username']) ||
  $_SESSION['role'] != 'customer'
) {
  header("Location: ../login.php");
  exit;
}

$id_produk = $_GET['id_produk'] ?? null;

if (!$id_produk) {
  echo "<script>alert('Produk tidak valid 😭'); window.location='produk.php';</script>";
  exit;
}

// PERBAIKAN: Escape input untuk mencegah SQL injection
$id_produk = mysqli_real_escape_string($koneksi, $id_produk);

$q = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
$p = mysqli_fetch_assoc($q);

if (!$p) {
  echo "<script>alert('Produk tidak ditemukan 😭'); window.location='produk.php';</script>";
  exit;
}

if ($p['stok'] <= 0) {
  echo "<script>alert('Stok habis 😭'); window.location='produk.php';</script>";
  exit;
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Beli Produk | Masna Beauty</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
body{
  background:#fff0f6;
  font-family:'Segoe UI',sans-serif;
  min-height:100vh;
}
.card{
  border:none;
  border-radius:20px;
  box-shadow:0 10px 25px rgba(255,95,162,.25);
  background:#fff;
}
.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border-radius:25px;
  padding:12px 25px;
  font-weight:600;
  border:none;
  transition:all 0.3s ease;
}
.btn-pink:hover{
  background:#ff2f8a;
  color:#fff;
  transform:translateY(-2px);
  box-shadow:0 5px 15px rgba(255,95,162,.4);
}
.product-img{
  max-height:280px;
  object-fit:contain;
  transition:transform 0.3s ease;
}
.product-img:hover{
  transform:scale(1.05);
}
.stock-badge{
  background:#d4edda;
  color:#155724;
  padding:5px 15px;
  border-radius:20px;
  font-size:14px;
  display:inline-block;
  margin-top:10px;
}
.price-tag{
  background:#ffe6f0;
  padding:10px 20px;
  border-radius:15px;
  display:inline-block;
  margin:15px 0;
}
</style>
</head>

<body>

<div class="container mt-5 mb-5">

  <div class="text-center mb-4">
    <h3 class="fw-bold text-danger">
      <i class="bi bi-cart-check-fill"></i> Konfirmasi Pembelian 💖
    </h3>
    <p class="text-muted">Periksa kembali detail produk sebelum melanjutkan</p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-3 col-lg-10">

      <div class="card p-4">

       

        <h4 class="fw-semibold text-center mb-2">
          <?= htmlspecialchars($p['nama_produk']); ?>
        </h4>

        <div class="text-center">
          <div class="price-tag">
            <span class="text-danger fw-bold fs-4">
              Rp <?= number_format($p['harga'],0,',','.'); ?>
            </span>
          </div>
          
          <div class="stock-badge">
            <i class="bi bi-box-seam"></i> Stok tersedia: <satrong><?= $p['stok']; ?></strong>
          </div>
        </div>

        <hr class="my-4">

        <form action="proses_beli.php" method="post" id="formBeli" onsubmit="return validateForm()">

          <input type="hidden" name="id_produk" value="<?= htmlspecialchars($p['id_produk']); ?>">

          <div class="mb-4">
            <label class="form-label fw-semibold">
              <i class="bi bi-bag-plus"></i> Jumlah Pembelian
            </label>
            <input type="number" 
                   name="jumlah"
                   id="jumlah"
                   class="form-control form-control-lg text-center"
                   min="1"
                   max="<?= $p['stok']; ?>"
                   value="1"
                   required
                   oninput="hitungTotal()">
            <small class="text-muted">Maksimal pembelian: <?= $p['stok']; ?> pcs</small>
          </div>

          <div class="alert alert-info text-center mb-4" id="totalHarga">
            <strong>Total Pembayaran:</strong><br>
            <span class="fs-4 text-danger fw-bold" id="totalNominal">
              Rp <?= number_format($p['harga'],0,',','.'); ?>
            </span>
          </div>

          <button type="submit" class="btn btn-pink w-100 mb-3">
            <i class="bi bi-cart-heart-fill"></i> Konfirmasi Pembelian
          </button>

          <a href="produk.php" class="btn btn-light w-100 rounded-pill border">
            <i class="bi bi-arrow-left"></i> Kembali ke Produk
          </a>

        </form>

      </div>

    </div>
  </div>

</div>

<script>
// Hitung total harga otomatis
function hitungTotal() {
  const harga = <?= $p['harga']; ?>;
  const stok = <?= $p['stok']; ?>;
  let jumlah = parseInt(document.getElementById('jumlah').value) || 0;
  
  // Validasi tidak melebihi stok
  if (jumlah > stok) {
    jumlah = stok;
    document.getElementById('jumlah').value = stok;
    alert('Jumlah tidak boleh melebihi stok tersedia!');
  }
  
  if (jumlah < 1) {
    jumlah = 1;
    document.getElementById('jumlah').value = 1;
  }
  
  const total = harga * jumlah;
  document.getElementById('totalNominal').textContent = 
    'Rp ' + total.toLocaleString('id-ID');
}

// Validasi sebelum submit
function validateForm() {
  const jumlah = parseInt(document.getElementById('jumlah').value);
  const stok = <?= $p['stok']; ?>;
  
  if (jumlah < 1) {
    alert('Jumlah minimal pembelian adalah 1!');
    return false;
  }
  
  if (jumlah > stok) {
    alert('Jumlah melebihi stok yang tersedia!');
    return false;
  }
  
  return confirm('Yakin ingin membeli produk ini?');
}

// Inisialisasi saat halaman load
window.onload = function() {
  hitungTotal();
};
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>