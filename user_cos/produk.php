<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'customer'){
  header("Location: ../login.php");
  exit;
}

$nama_customer = $_SESSION['username'];
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Masna Beauty | Produk</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
  background:#fff0f6;
  font-family:'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  box-shadow:0 4px 15px rgba(255,95,162,.3);
}
.navbar-brand{
  color:#fff!important;
  font-weight:700;
  font-size:1.3rem;
}
.nav-link{
  color:#fff!important;
  font-weight:500;
  transition:.3s;
}
.nav-link:hover{
  transform:translateY(-2px);
}

/* HEADER SECTION */
.header-section{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  padding:60px 0 40px;
  margin-bottom:40px;
  box-shadow:0 8px 25px rgba(255,95,162,.3);
}
.header-section h1{
  font-weight:700;
  font-size:2.8rem;
  margin-bottom:15px;
}

/* SEARCH BAR */
.search-wrapper{
  max-width:600px;
  margin:30px auto 0;
}
.search-box{
  border-radius:50px;
  border:none;
  padding:15px 25px;
  box-shadow:0 8px 20px rgba(0,0,0,.1);
}
.search-box:focus{
  box-shadow:0 8px 30px rgba(0,0,0,.15);
}

/* FILTER BUTTONS */
.filter-btn{
  background:#fff;
  color:#ff5fa2;
  border:2px solid #fff;
  border-radius:30px;
  padding:10px 25px;
  font-weight:600;
  transition:.3s;
  cursor:pointer;
}
.filter-btn:hover,
.filter-btn.active{
  background:#ff5fa2;
  color:#fff;
  transform:translateY(-3px);
  box-shadow:0 8px 20px rgba(255,95,162,.4);
}

/* CARD PRODUK */
.card-produk{
  border:none;
  border-radius:25px;
  box-shadow:0 10px 30px rgba(255,95,162,.2);
  transition:.4s;
  background:#fff;
  overflow:hidden;
  height:100%;
}
.card-produk:hover{
  transform:translateY(-12px);
  box-shadow:0 20px 50px rgba(255,95,162,.35);
}

/* IMAGE WRAPPER */
.img-wrapper{
  position:relative;
  background:linear-gradient(135deg,#fff,#fff0f6);
  overflow:hidden;
  height:280px;
}
.card-produk img{
  height:100%;
  width:100%;
  object-fit:contain;
  padding:25px;
  transition:.4s;
}
.card-produk:hover img{
  transform:scale(1.08);
}

/* BADGE STOK */
.badge-stok{
  position:absolute;
  top:15px;
  right:15px;
  background:rgba(255,255,255,.95);
  color:#ff5fa2;
  border-radius:20px;
  padding:8px 15px;
  font-weight:700;
  font-size:.8rem;
  box-shadow:0 4px 15px rgba(0,0,0,.15);
}

/* BADGE NEW */
.badge-new{
  position:absolute;
  top:15px;
  left:15px;
  background:linear-gradient(135deg,#ff5fa2,#ff2f8a);
  color:#fff;
  border-radius:20px;
  padding:6px 12px;
  font-weight:700;
  font-size:.75rem;
  box-shadow:0 4px 15px rgba(255,95,162,.4);
}

/* CARD BODY */
.card-produk .card-body{
  padding:25px;
}

/* KATEGORI */
.kategori-tag{
  display:inline-block;
  background:#fff0f6;
  color:#ff5fa2;
  padding:5px 15px;
  border-radius:15px;
  font-size:.8rem;
  font-weight:600;
  margin-bottom:10px;
}

/* NAMA PRODUK */
.card-produk h5{
  font-size:1.15rem;
  font-weight:700;
  color:#333;
  margin-bottom:12px;
  line-height:1.4;
  min-height:50px;
}

/* RATING */
.rating{
  color:#ffc107;
  font-size:.9rem;
  margin-bottom:10px;
}

/* HARGA */
.harga{
  color:#ff2f8a;
  font-size:1.4rem;
  font-weight:700;
  margin-bottom:15px;
}

/* BUTTON */
.btn-pink{
  background:linear-gradient(135deg,#ff5fa2,#ff2f8a);
  color:#fff;
  border:none;
  border-radius:30px;
  padding:12px 30px;
  font-weight:600;
  transition:.3s;
  width:100%;
}
.btn-pink:hover{
  background:linear-gradient(135deg,#ff2f8a,#ff5fa2);
  transform:translateY(-2px);
  box-shadow:0 8px 20px rgba(255,95,162,.4);
  color:#fff;
}

/* EMPTY STATE */
.empty-state{
  text-align:center;
  padding:60px 20px;
}
.empty-state i{
  font-size:5rem;
  color:#ff5fa2;
  opacity:.5;
  margin-bottom:20px;
}

/* STATS CARD */
.stats-card{
  background:#fff;
  border-radius:20px;
  padding:20px;
  text-align:center;
  box-shadow:0 8px 20px rgba(255,95,162,.15);
}
.stats-number{
  font-size:2rem;
  font-weight:700;
  color:#ff5fa2;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a href="home.php" class="navbar-brand">
      <i class="bi bi-heart-fill"></i> Masna Beauty
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a href="home.php" class="nav-link">
            <i class="bi bi-house-heart"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a href="produk.php" class="nav-link active">
            <i class="bi bi-bag-heart"></i> Produk
          </a>
        </li>
        <li class="nav-item">
          <a href="transaksi.php" class="nav-link">
            <i class="bi bi-receipt"></i> Transaksi
          </a>
        </li>
        <li class="nav-item ms-3">
          <span class="text-white me-3">
            <i class="bi bi-person-circle"></i> <?= $nama_customer ?>
          </span>
          <a href="../logout.php" class="btn btn-light btn-sm rounded-pill">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- HEADER SECTION -->
<div class="header-section">
  <div class="container text-center">
    <h1>Koleksi Produk Kami 💄</h1>
    <p class="fs-5 mb-0" style="opacity:.95">
      Temukan produk kecantikan impianmu disini ✨
    </p>

    <!-- SEARCH BAR -->
    <div class="search-wrapper">
      <input type="text" 
             class="form-control search-box" 
             id="searchInput"
             placeholder="🔍 Cari produk favoritmu...">
    </div>

    <!-- FILTER KATEGORI -->
    <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
      <button class="filter-btn active" data-filter="all">
        ✨ Semua
      </button>
      <button class="filter-btn" data-filter="makeup">
        💄 Makeup
      </button>
      <button class="filter-btn" data-filter="skincare">
        🧴 Skincare
      </button>
      <button class="filter-btn" data-filter="bodycare">
        🌸 Body Care
      </button>
    </div>
  </div>
</div>

<!-- STATS -->
<div class="container mb-4">
  <div class="row g-3">
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stats-number">
          <?php
          $count = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) as total FROM produk WHERE stok > 0"));
          echo $count['total'];
          ?>
        </div>
        <div class="text-muted">Produk Tersedia</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stats-number">100%</div>
        <div class="text-muted">Original</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stats-card">
        <div class="stats-number">
          <i class="bi bi-star-fill text-warning"></i> 4.8
        </div>
        <div class="text-muted">Rating Toko</div>
      </div>
    </div>
  </div>
</div>

<!-- PRODUK -->
<div class="container mb-5">
  <div class="row g-4" id="productContainer">

    <?php
    $q = mysqli_query($koneksi,"SELECT * FROM produk WHERE stok > 0 ORDER BY nama_produk");
    $no = 1;
    
    if(mysqli_num_rows($q) == 0){
    ?>
      <div class="col-12">
        <div class="empty-state">
          <i class="bi bi-inbox"></i>
          <h4 class="text-muted">Belum ada produk tersedia</h4>
          <p class="text-muted">Silakan kembali lagi nanti 💖</p>
        </div>
      </div>
    <?php
    } else {
      while($p = mysqli_fetch_assoc($q)){
    ?>

    <div class="col-md-6 col-lg-4 product-item">
      <div class="card card-produk">

        <!-- IMAGE -->
        <div class="img-wrapper">
          <?php if($no <= 3){ ?>
            <span class="badge-new">🔥 NEW</span>
          <?php } ?>
          <span class="badge-stok">
            <i class="bi bi-box-seam"></i> <?= $p['stok'] ?>
          </span>
          <img src="../dist/assets/img/produk/<?= $p['foto'] ?>" 
               alt="<?= $p['nama_produk'] ?>">
        </div>

        <!-- BODY -->
        <div class="card-body">
          
          <!-- KATEGORI -->
          <span class="kategori-tag">
            <i class="bi bi-tag"></i> Beauty
          </span>

          <!-- NAMA -->
          <h5><?= $p['nama_produk'] ?></h5>

          <!-- RATING -->
          <div class="rating">
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-fill"></i>
            <i class="bi bi-star-half"></i>
            <span class="text-muted ms-1">(4.5)</span>
          </div>

          <!-- HARGA -->
          <div class="harga">
            Rp <?= number_format($p['harga'],0,',','.') ?>
          </div>

          <!-- BUTTON -->
          <a href="beli.php?id_produk=<?= $p['id_produk'] ?>" 
             class="btn btn-pink">
            <i class="bi bi-cart-heart"></i> Beli Sekarang
          </a>

        </div>

      </div>
    </div>

    <?php 
      $no++;
      } 
    }
    ?>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// SEARCH FUNCTION
document.getElementById('searchInput').addEventListener('keyup', function() {
  const searchValue = this.value.toLowerCase();
  const products = document.querySelectorAll('.product-item');
  
  products.forEach(product => {
    const productName = product.querySelector('h5').textContent.toLowerCase();
    if(productName.includes(searchValue)) {
      product.style.display = 'block';
    } else {
      product.style.display = 'none';
    }
  });
});

// FILTER FUNCTION
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    // Remove active class
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    // Add active to clicked
    this.classList.add('active');
    
    const filter = this.getAttribute('data-filter');
    const products = document.querySelectorAll('.product-item');
    
    if(filter === 'all') {
      products.forEach(p => p.style.display = 'block');
    } else {
      // Untuk demo, tampilkan semua dulu
      // Nanti bisa disesuaikan dengan kategori produk di database
      products.forEach(p => p.style.display = 'block');
    }
  });
});
</script>

</body>
</html> 