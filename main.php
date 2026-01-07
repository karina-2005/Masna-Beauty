<?php
include "koneksi.php";

/* ================== INFO BOX ================== */

// produk
$q_produk = mysqli_query($koneksi,"SELECT COUNT(*) total FROM produk");
$produk = mysqli_fetch_assoc($q_produk);

// customer
$q_customer = mysqli_query($koneksi,"SELECT COUNT(*) total FROM customer");
$customer = mysqli_fetch_assoc($q_customer);

// transaksi
$q_transaksi = mysqli_query($koneksi,"SELECT COUNT(*) total FROM transaksi");
$transaksi = mysqli_fetch_assoc($q_transaksi);

// pendapatan total
$q_pendapatan = mysqli_query($koneksi,"
  SELECT SUM(dt.jumlah * p.harga) total
  FROM transaksi_detail dt
  JOIN produk p ON dt.id_produk = p.id_produk
");
$pendapatan = mysqli_fetch_assoc($q_pendapatan);

/* ================== GRAFIK BULANAN ================== */

$q_chart = mysqli_query($koneksi,"
  SELECT 
    MONTH(t.tanggal_transaksi) bulan,
    YEAR(t.tanggal_transaksi) tahun,
    SUM(dt.jumlah * p.harga) total
  FROM transaksi t
  JOIN transaksi_detail dt ON t.id_transaksi = dt.id_transaksi
  JOIN produk p ON dt.id_produk = p.id_produk
  GROUP BY YEAR(t.tanggal_transaksi), MONTH(t.tanggal_transaksi)
  ORDER BY tahun, bulan
");

$bulan = [];
$total = [];

$nama_bulan = [
  1=>'Jan','Feb','Mar','Apr','Mei','Jun',
  'Jul','Agu','Sep','Okt','Nov','Des'
];

while($d = mysqli_fetch_assoc($q_chart)){
  $bulan[] = $nama_bulan[$d['bulan']] . ' ' . $d['tahun'];
  $total[] = $d['total'];
}
?>

<style>
/* STATS CARDS - MODERN GRADIENT */
.stats-card {
  border: none;
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  transition: all .4s cubic-bezier(.4,0,.2,1);
  box-shadow: 0 10px 30px rgba(0,0,0,.1);
  cursor: pointer;
}

.stats-card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 20px 50px rgba(0,0,0,.15);
}

.stats-card::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle, rgba(255,255,255,.2) 0%, transparent 70%);
  animation: shimmer 4s infinite;
}

@keyframes shimmer {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.stats-card .card-body {
  padding: 30px;
  position: relative;
  z-index: 1;
}

.stats-icon {
  width: 70px;
  height: 70px;
  border-radius: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  margin-bottom: 15px;
  background: rgba(255,255,255,.2);
  backdrop-filter: blur(10px);
}

.stats-label {
  font-size: .9rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  opacity: .9;
  margin-bottom: 8px;
}

.stats-number {
  font-size: 2rem;
  font-weight: 700;
  line-height: 1;
}

/* GRADIENT BACKGROUNDS */
.bg-gradient-pink {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%);
  color: #fff;
}

.bg-gradient-purple {
  background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
  color: #fff;
}

.bg-gradient-success {
  background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
  color: #fff;
}

.bg-gradient-warning {
  background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
  color: #fff;
}

/* CHART CARD */
.chart-card {
  border: none;
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(255,95,162,.15);
  overflow: hidden;
  transition: all .4s ease;
}

.chart-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 50px rgba(255,95,162,.25);
}

.chart-card .card-header {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 100%);
  color: #fff;
  padding: 20px 25px;
  border: none;
  font-weight: 700;
  font-size: 1.1rem;
}

.chart-card .card-body {
  padding: 30px;
}

/* WELCOME BANNER */
.welcome-banner {
  background: linear-gradient(135deg, #ff5fa2 0%, #ff8fc7 50%, #ffa6d5 100%);
  border-radius: 20px;
  padding: 40px;
  color: #fff;
  margin-bottom: 30px;
  box-shadow: 0 15px 40px rgba(255,95,162,.3);
  position: relative;
  overflow: hidden;
}

.welcome-banner::before {
  content: '';
  position: absolute;
  top: -100px;
  right: -100px;
  width: 300px;
  height: 300px;
  background: radial-gradient(circle, rgba(255,255,255,.2) 0%, transparent 70%);
  border-radius: 50%;
}

.welcome-banner h2 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 10px;
}

.welcome-banner p {
  font-size: 1.1rem;
  opacity: .95;
  margin: 0;
}

/* ANIMATION */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.stats-card,
.chart-card,
.welcome-banner {
  animation: fadeInUp .6s ease-out;
}

.stats-card:nth-child(1) { animation-delay: .1s; }
.stats-card:nth-child(2) { animation-delay: .2s; }
.stats-card:nth-child(3) { animation-delay: .3s; }
.stats-card:nth-child(4) { animation-delay: .4s; }
.chart-card { animation-delay: .5s; }
</style>

<main class="app-main">

<!-- ================= HEADER ================= -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h3 class="mb-0 fw-bold" style="color:#ff5fa2;">
          <i class="bi bi-speedometer2"></i> Dashboard
        </h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- ================= CONTENT ================= -->
<div class="app-content">
<div class="container-fluid">

<!-- WELCOME BANNER -->
<div class="welcome-banner">
  <h2>
    <i class="bi bi-heart-fill"></i> 
    Selamat Datang di Masna Beauty
  </h2>
  <p>Dashboard Admin - Kelola toko kosmetik Anda dengan mudah 💄</p>
</div>

<!-- ================= STATS CARDS ================= -->
<div class="row g-4 mb-4">

  <!-- PRODUK -->
  <div class="col-lg-3 col-md-6">
    <div class="card stats-card bg-gradient-pink" onclick="window.location.href='dashboard.php?menu=produk'">
      <div class="card-body">
        <div class="stats-icon">
          <i class="bi bi-bag-heart-fill"></i>
        </div>
        <div class="stats-label">Total Produk</div>
        <div class="stats-number"><?= $produk['total'] ?></div>
        <div class="mt-3" style="opacity:.8">
          <i class="bi bi-arrow-up-right"></i> Lihat Detail
        </div>
      </div>
    </div>
  </div>

  <!-- CUSTOMER -->
  <div class="col-lg-3 col-md-6">
    <div class="card stats-card bg-gradient-purple" onclick="window.location.href='dashboard.php?menu=customer'">
      <div class="card-body">
        <div class="stats-icon">
          <i class="bi bi-person-badge"></i>
        </div>
        <div class="stats-label">Total Customer</div>
        <div class="stats-number"><?= $customer['total'] ?></div>
        <div class="mt-3" style="opacity:.8">
          <i class="bi bi-arrow-up-right"></i> Lihat Detail
        </div>
      </div>
    </div>
  </div>

  <!-- TRANSAKSI -->
  <div class="col-lg-3 col-md-6">
    <div class="card stats-card bg-gradient-success" onclick="window.location.href='dashboard.php?menu=transaksi'">
      <div class="card-body">
        <div class="stats-icon">
          <i class="bi bi-arrow-repeat"></i>
        </div>
        <div class="stats-label">Total Transaksi</div>
        <div class="stats-number"><?= $transaksi['total'] ?></div>
        <div class="mt-3" style="opacity:.8">
          <i class="bi bi-arrow-up-right"></i> Lihat Detail
        </div>
      </div>
    </div>
  </div>

  <!-- PENDAPATAN -->
  <div class="col-lg-3 col-md-6">
    <div class="card stats-card bg-gradient-warning" >
      <div class="card-body">
        <div class="stats-icon">
          <i class="bi bi-currency-dollar"></i>
        </div>
        <div class="stats-label">Total Pendapatan</div>
        <div class="stats-number" style="font-size:1.5rem">
          Rp <?= number_format($pendapatan['total'] ?? 0,0,',','.') ?>
        </div>
        
      </div>
    </div>
  </div>

</div>

<!-- ================= GRAFIK ================= -->
<div class="row">
  <div class="col-12">
    <div class="card chart-card">
      <div class="card-header">
        <i class="bi bi-graph-up"></i> Grafik Pendapatan Bulanan
      </div>
      <div class="card-body">
        <canvas id="chartPendapatan" height="80"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- QUICK STATS -->
<div class="row mt-4">
  <div class="col-md-6">
    <div class="card chart-card">
      <div class="card-header">
        <i class="bi bi-star-fill"></i> Produk Terlaris
      </div>
      <div class="card-body">
        <div class="list-group list-group-flush">
          <?php
          $q_terlaris = mysqli_query($koneksi,"
            SELECT p.nama_produk, SUM(td.jumlah) as total_terjual
            FROM transaksi_detail td
            JOIN produk p ON td.id_produk = p.id_produk
            GROUP BY td.id_produk
            ORDER BY total_terjual DESC
            LIMIT 5
          ");
          
          while($terlaris = mysqli_fetch_assoc($q_terlaris)){
          ?>
          <div class="list-group-item d-flex justify-content-between align-items-center border-0">
            <span>
              <i class="bi bi-box-seam text-danger"></i>
              <?= $terlaris['nama_produk'] ?>
            </span>
            <span class="badge bg-danger rounded-pill"><?= $terlaris['total_terjual'] ?> terjual</span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card chart-card">
      <div class="card-header">
        <i class="bi bi-clock-history"></i> Aktivitas Terbaru
      </div>
      <div class="card-body">
        <div class="list-group list-group-flush">
          <?php
          $q_aktivitas = mysqli_query($koneksi,"
            SELECT t.id_transaksi, t.tanggal_transaksi, c.nama_cust
            FROM transaksi t
            JOIN customer c ON t.id_cust = c.id_cust
            ORDER BY t.tanggal_transaksi DESC
            LIMIT 5
          ");
          
          while($akt = mysqli_fetch_assoc($q_aktivitas)){
          ?>
          <div class="list-group-item d-flex justify-content-between align-items-center border-0">
            <span>
              <i class="bi bi-receipt text-primary"></i>
              Transaksi #<?= $akt['id_transaksi'] ?> - <?= $akt['nama_cust'] ?>
            </span>
            <span class="text-muted small">
              <?= date('d M Y', strtotime($akt['tanggal_transaksi'])) ?>
            </span>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

</main>

<!-- ================= CHART JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartPendapatan');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($bulan) ?>,
    datasets: [{
      label: 'Pendapatan',
      data: <?= json_encode($total) ?>,
      backgroundColor: 'rgba(255, 95, 162, 0.8)',
      borderColor: '#ff5fa2',
      borderWidth: 2,
      borderRadius: 10,
      hoverBackgroundColor: '#ff5fa2',
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: true,
    plugins: {
      legend: { 
        display: true,
        labels: {
          color: '#2d3748',
          font: {
            size: 14,
            weight: 'bold'
          }
        }
      },
      tooltip: {
        backgroundColor: 'rgba(255, 95, 162, 0.9)',
        padding: 12,
        cornerRadius: 8,
        titleFont: {
          size: 14,
          weight: 'bold'
        },
        bodyFont: {
          size: 13
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          color: 'rgba(0, 0, 0, 0.05)',
          drawBorder: false
        },
        ticks: {
          color: '#718096',
          font: {
            size: 12
          },
          callback: value => 'Rp ' + value.toLocaleString('id-ID')
        }
      },
      x: {
        grid: {
          display: false
        },
        ticks: {
          color: '#718096',
          font: {
            size: 12
          }
        }
      }
    },
    animation: {
      duration: 1500,
      easing: 'easeInOutQuart'
    }
  }
});
</script>