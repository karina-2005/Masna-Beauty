<?php
session_start();
include "../koneksi.php";

// Cek login
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'customer') {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: 'Anda harus login sebagai customer!',
        confirmButtonColor: '#ff5fa2',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location = '../login.php';
      });
    </script>
  </body>
  </html>
  <?php
  exit;
}

// Validasi input POST
if (!isset($_POST['id_produk']) || !isset($_POST['jumlah'])) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Data Tidak Lengkap',
        text: 'Mohon lengkapi data pembelian!',
        confirmButtonColor: '#ff5fa2',
        confirmButtonText: 'OK'
      }).then(() => {
        window.location = 'produk.php';
      });
    </script>
  </body>
  </html>
  <?php
  exit;
}

// Escape dan validasi input
$id_produk = mysqli_real_escape_string($koneksi, $_POST['id_produk']);
$qty       = (int)$_POST['jumlah'];
$nama      = mysqli_real_escape_string($koneksi, $_SESSION['username']);

// Validasi qty
if ($qty <= 0) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Jumlah Tidak Valid',
        text: 'Jumlah pembelian harus lebih dari 0!',
        confirmButtonColor: '#ff5fa2',
        confirmButtonText: 'OK'
      }).then(() => {
        window.history.back();
      });
    </script>
  </body>
  </html>
  <?php
  exit;
}

// Start transaction untuk keamanan data
mysqli_begin_transaction($koneksi);

try {
  // Ambil data produk dengan FOR UPDATE (lock row)
  $result = mysqli_query($koneksi, "
    SELECT * FROM produk 
    WHERE id_produk='$id_produk' 
    FOR UPDATE
  ");
  
  $produk = mysqli_fetch_assoc($result);
  
  if (!$produk) {
    throw new Exception("Produk tidak ditemukan!");
  }
  
  // Cek stok
  if ($produk['stok'] < $qty) {
    throw new Exception("Stok tidak mencukupi! Stok tersedia: " . $produk['stok']);
  }
  
  // Hitung total
  $total = $produk['harga'] * $qty;
  $tgl   = date('Y-m-d');
  
  // Insert transaksi (id_transaksi AUTO_INCREMENT, tidak perlu disebutkan)
  $insert = mysqli_query($koneksi, "
    INSERT INTO transaksi_customer
    (nama, id_produk, qty, total, tanggal_pemesanan, status)
    VALUES
    ('$nama', '$id_produk', $qty, $total, '$tgl', 'pending')
  ");
  
  if (!$insert) {
    throw new Exception("Gagal menyimpan transaksi: " . mysqli_error($koneksi));
  }
  
  // Update stok produk
  $update = mysqli_query($koneksi, "
    UPDATE produk 
    SET stok = stok - $qty 
    WHERE id_produk='$id_produk'
  ");
  
  if (!$update) {
    throw new Exception("Gagal update stok: " . mysqli_error($koneksi));
  }
  
  // Commit transaction
  mysqli_commit($koneksi);
  
  // Redirect dengan success message
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Pembelian Berhasil! 🎉',
        html: `
          <div style="text-align:left; padding:10px;">
            <p><strong>Produk:</strong> <?= $produk['nama_produk'] ?></p>
            <p><strong>Jumlah:</strong> <?= $qty ?></p>
            <p><strong>Total:</strong> <span style="color:#ff5fa2; font-weight:bold;">Rp <?= number_format($total, 0, ',', '.') ?></span></p>
          </div>
        `,
        confirmButtonColor: '#ff5fa2',
        confirmButtonText: '💖 Lihat Transaksi',
        showCancelButton: true,
        cancelButtonText: '🛍️ Belanja Lagi',
        cancelButtonColor: '#6c757d'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = 'transaksi.php';
        } else {
          window.location = 'produk.php';
        }
      });
    </script>
  </body>
  </html>
  <?php
  exit;
  
} catch (Exception $e) {
  // Rollback jika ada error
  mysqli_rollback($koneksi);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Pembelian Gagal',
        text: '<?= addslashes($e->getMessage()) ?>',
        confirmButtonColor: '#ff5fa2',
        confirmButtonText: 'OK'
      }).then(() => {
        window.history.back();
      });
    </script>
  </body>
  </html>
  <?php
  exit;
}
?>