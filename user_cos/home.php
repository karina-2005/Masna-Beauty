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
<title>Masna Beauty | Home</title>
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

/* HEADER BAR */
.header-bar{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  padding:50px 0;
  box-shadow:0 8px 25px rgba(255,95,162,.3);
}
.header-bar h2{
  font-weight:700;
  margin-bottom:10px;
  font-size:2.5rem;
}

/* BADGE */
.badge-kategori{
  background:#fff;
  color:#ff5fa2;
  padding:10px 20px;
  border-radius:25px;
  font-weight:600;
  box-shadow:0 5px 15px rgba(255,95,162,.25);
  cursor:pointer;
  transition:.3s;
}
.badge-kategori:hover{
  transform:translateY(-3px);
  box-shadow:0 8px 20px rgba(255,95,162,.35);
}

/* BANNER */
.banner-img{
  width: 100%;
  height: auto;
  max-height: 500px;
  object-fit: cover;
  border-radius:20px;
}

/* SECTION TITLE */
.section-title{
  font-weight:700;
  color:#ff5fa2;
  margin-bottom:30px;
  position:relative;
  display:inline-block;
}
.section-title::after{
  content:'';
  position:absolute;
  bottom:-10px;
  left:50%;
  transform:translateX(-50%);
  width:60px;
  height:4px;
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  border-radius:2px;
}

/* CARD PRODUK */
.card-produk{
  border:none;
  border-radius:22px;
  box-shadow:0 12px 30px rgba(255,95,162,.25);
  transition:.35s;
  overflow:hidden;
}
.card-produk:hover{
  transform:translateY(-10px);
  box-shadow:0 15px 40px rgba(255,95,162,.35);
}
.card-produk img{
  height: 280px;
  width: 100%;
  object-fit: contain;
  padding: 20px;
  background:#fff;
} 

/* PROMO CARD */
.promo-card{
  background:linear-gradient(135deg,#fff,#fff0f6);
  border:2px solid #ff5fa2;
  border-radius:20px;
  padding:30px;
  text-align:center;
  box-shadow:0 10px 25px rgba(255,95,162,.2);
  transition:.3s;
}
.promo-card:hover{
  transform:translateY(-5px);
}

/* FEATURE BOX */
.feature-box{
  background:#fff;
  border-radius:20px;
  padding:30px;
  text-align:center;
  box-shadow:0 8px 20px rgba(255,95,162,.15);
  transition:.3s;
  height:100%;
}
.feature-box:hover{
  transform:translateY(-5px);
  box-shadow:0 12px 30px rgba(255,95,162,.25);
}
.feature-icon{
  font-size:3rem;
  color:#ff5fa2;
  margin-bottom:15px;
}

/* BUTTON */
.btn-pink{
  background:linear-gradient(135deg,#ff5fa2,#ff2f8a);
  color:#fff;
  border-radius:30px;
  padding:10px 25px;
  font-weight:600;
  border:none;
  transition:.3s;
}
.btn-pink:hover{
  color:#fff;
  transform:translateY(-3px);
  box-shadow:0 8px 20px rgba(255,95,162,.4);
}

/* TESTIMONIAL */
.testimonial-card{
  background:#fff;
  border-radius:20px;
  padding:25px;
  box-shadow:0 8px 20px rgba(255,95,162,.15);
  margin-bottom:20px;
}

/* FOOTER */
.footer{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  padding:40px 0 20px;
  margin-top:60px;
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
          <a href="home.php" class="nav-link ">
            <i class="bi bi-house-heart"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a href="produk.php" class="nav-link">
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

<!-- HEADER BAR -->
<div class="header-bar">
  <div class="container text-center">
    <h2>Welcome To Masna Beauty 💄</h2>
    <p class="fs-5 mb-4" style="opacity:0.95">Temukan kecantikan terbaik untukmu ✨</p>

    <!-- KATEGORI -->
    <div class="d-flex justify-content-center gap-3 flex-wrap mt-3">
      <span class="badge-kategori">💄 Makeup</span>
      <span class="badge-kategori">🧴 Skincare</span>
      <span class="badge-kategori">🌸 Body Care</span>
      <span class="badge-kategori">💅 Nails</span>
    </div>

    <!-- KOLEKSI -->
    <div class="mt-4">
      <span class="badge rounded-pill px-4 py-2 bg-white text-danger fw-semibold fs-6">
        💖 Koleksi Eksklusif 2025
      </span>
    </div>
  </div>
</div>

<!-- PROMO SECTION -->
<div class="container mt-5">
  <div class="row g-4">
    <div class="col-md-4">
      <div class="promo-card">
        <div class="fs-1 mb-3">🎁</div>
        <h5 class="fw-bold text-danger">Free Ongkir</h5>
        <p class="text-muted mb-0">Min. belanja Rp 200.000</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="promo-card">
        <div class="fs-1 mb-3">💝</div>
        <h5 class="fw-bold text-danger">Diskon 20%</h5>
        <p class="text-muted mb-0">Untuk member baru</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="promo-card">
        <div class="fs-1 mb-3">⭐</div>
        <h5 class="fw-bold text-danger">Cashback 10%</h5>
        <p class="text-muted mb-0">Setiap pembelian</p>
      </div>
    </div>
  </div>
</div>

<!-- BANNER SLIDER -->
<div class="container mt-5">
  <div id="bannerSlider" class="carousel slide" data-bs-ride="carousel">

    <!-- INDICATOR -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="2"></button>
    </div>

    <!-- SLIDES -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../dist/assets/img/banner-large-image.png" class="d-block w-100 banner-img">
      </div>
      <div class="carousel-item">
        <img src="../dist/assets/img/banner-large-image1.png" class="d-block w-100 banner-img">
      </div>
      <div class="carousel-item">
        <img src="../dist/assets/img/banner-large-image2.jpg" class="d-block w-100 banner-img">
      </div>
    </div>

    <!-- PANAH -->
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>

<!-- PRODUK UNGGULAN -->
<div class="container mt-5">
  <div class="text-center mb-5">
    <h3 class="section-title">Produk Terlaris 🔥</h3>
  </div>

  <div class="row g-4">
    <?php
    $q = mysqli_query($koneksi,"
      SELECT * FROM produk 
      WHERE stok > 0 
      ORDER BY RAND() 
      LIMIT 6
    ");
    
    while($p = mysqli_fetch_assoc($q)){
    ?>
    <div class="col-md-6 col-lg-4">
      <div class="card card-produk">
        <img src="../dist/assets/img/produk/<?= $p['foto'] ?>" alt="<?= $p['nama_produk'] ?>">
        <div class="card-body text-center">
          <h6 class="fw-bold fs-5 mb-3"><?= $p['nama_produk'] ?></h6>
          <div class="text-danger fw-bold fs-4 mb-2">
            Rp <?= number_format($p['harga'],0,',','.') ?>
          </div>
          <span class="badge bg-success mb-3">
            <i class="bi bi-box-seam"></i> Stok: <?= $p['stok'] ?>
          </span>
          <div>
            <a href="beli.php?id_produk=<?= $p['id_produk'] ?>" class="btn btn-pink">
              <i class="bi bi-cart-heart"></i> Beli Sekarang
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <div class="text-center mt-4">
    <a href="produk.php" class="btn btn-pink btn-lg">
      <i class="bi bi-bag-heart"></i> Lihat Semua Produk
    </a>
  </div>
</div>

<!-- KENAPA PILIH KAMI -->
<div class="container mt-5">
  <div class="text-center mb-5">
    <h3 class="section-title">Kenapa Pilih Kami? 💖</h3>
  </div>

  <div class="row g-4">
    <div class="col-md-3">
      <div class="feature-box">
        <div class="feature-icon">
          <i class="bi bi-shield-check"></i>
        </div>
        <h5 class="fw-bold text-danger">100% Original</h5>
        <p class="text-muted mb-0">Produk terjamin keasliannya</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-box">
        <div class="feature-icon">
          <i class="bi bi-truck"></i>
        </div>
        <h5 class="fw-bold text-danger">Pengiriman Cepat</h5>
        <p class="text-muted mb-0">Produk sampai dengan aman</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-box">
        <div class="feature-icon">
          <i class="bi bi-credit-card"></i>
        </div>
        <h5 class="fw-bold text-danger">Pembayaran Mudah</h5>
        <p class="text-muted mb-0">Banyak metode pembayaran</p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="feature-box">
        <div class="feature-icon">
          <i class="bi bi-headset"></i>
        </div>
        <h5 class="fw-bold text-danger">CS 24/7</h5>
        <p class="text-muted mb-0">Siap membantu kapanpun</p>
      </div>
    </div>
  </div>
</div>

<!-- TESTIMONIAL -->
<div class="container mt-5">
  <div class="text-center mb-5">
    <h3 class="section-title">Apa Kata Mereka? 💬</h3>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="testimonial-card">
        <div class="mb-3">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
        <p class="text-muted">"Produknya bagus banget dan original! Pelayanan juga ramah. Pasti bakal order lagi!"</p>
        <div class="fw-bold text-danger">- Siti Nurhaliza</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-card">
        <div class="mb-3">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
        <p class="text-muted">"Pengiriman cepat, packaging rapi. Harganya juga affordable. Recommended!"</p>
        <div class="fw-bold text-danger">- Dewi Lestari</div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="testimonial-card">
        <div class="mb-3">
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
          <i class="bi bi-star-fill text-warning"></i>
        </div>
        <p class="text-muted">"Masna Beauty jadi toko online beauty favorit aku! Lengkap dan terpercaya."</p>
        <div class="fw-bold text-danger">- Rina Susanti</div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">
          <i class="bi bi-heart-fill"></i> Masna Beauty
        </h5>
        <p>Toko online terpercaya untuk semua kebutuhan kecantikan Anda. Produk original dengan harga terbaik.</p>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">Hubungi Kami</h5>
        <p class="mb-2">
          <i class="bi bi-geo-alt"></i> Jl. Kecantikan No. 123, Jakarta
        </p>
        <p class="mb-2">
          <i class="bi bi-telephone"></i> 0812-3456-7890
        </p>
        <p class="mb-2">
          <i class="bi bi-envelope"></i> info@masnabeauty.com
        </p>
      </div>
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold mb-3">Ikuti Kami</h5>
        <div class="d-flex gap-3">
          <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-tiktok"></i></a>
          <a href="#" class="text-white fs-4"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
    </div>
    <hr class="border-white opacity-25">
    <div class="text-center">
      <p class="mb-0">&copy; 2025 Masna Beauty. All Rights Reserved. Made with 💖</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>