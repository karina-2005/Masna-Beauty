<?php
session_start();
include "../koneksi.php";

/* KUNCI AKSES */
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit;
}

$nama = mysqli_real_escape_string($koneksi, $_SESSION['username']);
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Riwayat Transaksi | Masna Beauty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <style>
  body{
    background:#fff0f6;
    font-family:'Segoe UI',sans-serif;
    min-height:100vh;
  }
  
  .header-section{
    background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
    padding:30px;
    border-radius:20px;
    color:#fff;
    box-shadow:0 10px 25px rgba(255,95,162,.3);
    margin-bottom:30px;
  }
  
  .card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(255,95,162,.15);
    overflow:hidden;
  }
  
  .table{
    margin-bottom:0;
  }
  
  .table thead{
    background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
    color:#fff;
  }
  
  .table thead th{
    border:none;
    padding:15px;
    font-weight:600;
  }
  
  .table tbody tr{
    transition:all 0.3s ease;
  }
  
  .table tbody tr:hover{
    background:#ffe6f0;
    transform:scale(1.01);
  }
  
  .btn-back{
    background:#fff;
    color:#ff5fa2;
    border:none;
    border-radius:25px;
    padding:10px 25px;
    font-weight:600;
    transition:all 0.3s ease;
  }
  
  .btn-back:hover{
    background:#ffe6f0;
    color:#ff2f8a;
    transform:translateX(-5px);
  }
  
  .badge-id{
    background:#ff5fa2;
    color:#fff;
    padding:8px 15px;
    border-radius:20px;
    font-weight:600;
  }
  
  .empty-state{
    padding:60px 20px;
    text-align:center;
  }
  
  .empty-state i{
    font-size:4rem;
    color:#ffb3d9;
    margin-bottom:20px;
  }
  
  .total-price{
    color:#ff5fa2;
    font-weight:700;
  }
  
  .status-badge{
    padding:5px 15px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
  }
  
  .status-pending{
    background:#fff3cd;
    color:#856404;
  }
  
  .status-selesai{
    background:#d4edda;
    color:#155724;
  }
  
  @media (max-width: 768px) {
    .table{
      font-size:14px;
    }
    .header-section h3{
      font-size:1.3rem;
    }
  }
  </style>
</head>

<body>

<div class="container py-4">

  <!-- HEADER -->
  <div class="header-section">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3 class="fw-bold mb-2">
          <i class="bi bi-receipt-cutoff"></i> Riwayat Transaksi
        </h3>
        <p class="mb-0 opacity-75">
          <i class="bi bi-person-circle"></i> 
          Halo, <?= htmlspecialchars($_SESSION['username']); ?> 💖
        </p>
      </div>
      <a href="dashboard.php" class="btn btn-back">
        <i class="bi bi-arrow-left"></i> Kembali
      </a>
    </div>
  </div>

  <!-- CARD TABLE -->
  <div class="card">
    <div class="card-body p-0">

      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="text-center">
            <tr>
              <th style="width:60px">No</th>
              <th>ID Transaksi</th>
              <th>Tanggal</th>
              <th>Produk</th>
              <th style="width:100px">Jumlah</th>
              <th style="width:150px">Total</th>
              <th style="width:120px">Status</th>
            </tr>
          </thead>

          <tbody>
          <?php
          $no = 1;

          // PERBAIKAN: Query dengan escape variable dan nama kolom yang benar
          $query = mysqli_query($koneksi, "
            SELECT 
              tc.id_transaksi,
              tc.nama,
              tc.tanggal_pemesanan,
              p.nama_produk,
              tc.qty,
              tc.total,
              tc.status
            FROM transaksi_customer tc
            JOIN produk p ON tc.id_produk = p.id_produk
            WHERE tc.nama = '$nama'
            ORDER BY tc.id_transaksi DESC
          ");

          if(!$query){
            die("Error Query: " . mysqli_error($koneksi));
          }

          if(mysqli_num_rows($query) > 0){
            $total_keseluruhan = 0;
            
            while($row = mysqli_fetch_assoc($query)){
              $total_keseluruhan += $row['total'];
              
              // Tentukan class status
              $status = $row['status'] ?? 'pending';
              $status_class = ($status == 'selesai') ? 'status-selesai' : 'status-pending';
          ?>
            <tr>
              <td class="text-center fw-semibold"><?= $no++; ?></td>
              <td>
                <span class="badge-id">
                  #<?= htmlspecialchars($row['id_transaksi']); ?>
                </span>
              </td>
              <td>
                <i class="bi bi-calendar-event text-muted"></i>
                <?= date('d M Y', strtotime($row['tanggal_pemesanan'])); ?>
              </td>
              <td>
                <strong><?= htmlspecialchars($row['nama_produk']); ?></strong>
              </td>
              <td class="text-center">
                <span class="badge bg-secondary">
                  <?= $row['qty']; ?> pcs
                </span>
              </td>
              <td class="text-end total-price">
                Rp <?= number_format($row['total'], 0, ',', '.'); ?>
              </td>
              <td class="text-center">
                <span class="status-badge <?= $status_class; ?>">
                  <?= ucfirst($status); ?>
                </span>
              </td>
            </tr>
          <?php
            }
          ?>
            <!-- TOTAL KESELURUHAN -->
            <tr class="table-light">
              <td colspan="5" class="text-end fw-bold fs-5">
                <i class="bi bi-calculator"></i> Total Keseluruhan:
              </td>
              <td class="text-end fw-bold fs-5 text-danger">
                Rp <?= number_format($total_keseluruhan, 0, ',', '.'); ?>
              </td>
              <td></td>
            </tr>
          <?php
          } else {
          ?>
            <tr>
              <td colspan="7">
                <div class="empty-state">
                  <i class="bi bi-cart-x"></i>
                  <h5 class="text-muted">Belum Ada Transaksi</h5>
                  <p class="text-muted mb-4">
                    Yuk mulai belanja produk kecantikan favoritmu! 💄
                  </p>
                  <a href="produk.php" class="btn btn-pink" style="background:#ff5fa2; color:#fff; border-radius:25px; padding:12px 30px;">
                    <i class="bi bi-bag-heart"></i> Belanja Sekarang
                  </a>
                </div>
              </td>
            </tr>
          <?php } ?>
          </tbody>

        </table>
      </div>

    </div>
  </div>

  <?php if(mysqli_num_rows($query) > 0){ ?>
  <div class="text-center mt-4">
    <p class="text-muted">
      <i class="bi bi-info-circle"></i>
      Total <?= mysqli_num_rows($query); ?> transaksi ditemukan
    </p>
  </div>
  <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>