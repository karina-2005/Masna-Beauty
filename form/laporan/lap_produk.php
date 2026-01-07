<?php
include "koneksi.php";
$tgl = date('d-m-Y');
?>

<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">
    <br>

<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff5fa;
}

.report-card{
  border-radius:18px;
  border:1px solid #ffd0e6;
  box-shadow:0 12px 30px rgba(255,95,162,.15);
  background:#fff;
}

.report-header{
  text-align:center;
  padding:25px 15px;
  border-bottom:2px solid #ffd0e6;
}
.report-header h4{
  margin:0;
  font-weight:700;
  color:var(--pink);
}
.report-header p{
  margin:4px 0 0;
  font-size:14px;
  color:#777;
}

.report-info{
  display:flex;
  justify-content:space-between;
  padding:12px 20px;
  font-size:14px;
  background:var(--pink-soft);
}

.table-report thead th{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  text-align:center;
}
.table-report tbody tr:nth-child(even){
  background:#fff7fb;
}

.stok-habis{color:#dc3545;font-weight:600;}
.stok-aman{color:#198754;font-weight:600;}
</style>

<div class="row justify-content-center">
  <div class="col-md-12">

    <div class="card report-card mb-4">

      <!-- HEADER -->
      <div class="report-header">
        <h4>LAPORAN DATA PRODUK</h4>
        <p>Masna Beauty - Sistem Informasi Penjualan Kosmetik</p>
      </div>

      <!-- INFO -->
      <div class="report-info">
        <div>
          <strong>Tanggal Cetak:</strong> <?= $tgl; ?>
        </div>
        <div>
          <a href="form/laporan/cetak_produk.php" 
             target="_blank"
             class="btn btn-sm btn-light rounded-pill shadow">
            <i class="bi bi-printer-fill"></i> Cetak
          </a>
        </div>
      </div>

      <!-- TABLE -->
      <div class="card-body">
        <table class="table table-bordered table-report">
          <thead>
            <tr>
              <th>NO</th>
              <th>ID PRODUK</th>
              <th>NAMA PRODUK</th>
              <th>KATEGORI</th>
              <th>SUPPLIER</th>
              <th>HARGA</th>
              <th>STOK</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no=1;
          $sql=mysqli_query($koneksi,"
            SELECT p.*, k.nama_kategori, s.nama_supplier
            FROM produk p
            JOIN kategori k ON p.id_kategori=k.id_kategori
            JOIN supplier s ON p.id_supplier=s.id_supplier
          ");
          while($d=mysqli_fetch_array($sql)){
          ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= $d['id_produk']; ?></td>
              <td><?= $d['nama_produk']; ?></td>
              <td><?= $d['nama_kategori']; ?></td>
              <td><?= $d['nama_supplier']; ?></td>
              <td>Rp <?= number_format($d['harga'],0,',','.'); ?></td>
              <td class="text-center">
                <?= $d['stok'] <= 5 
                  ? '<span class="stok-habis">Habis</span>' 
                  : '<span class="stok-aman">'.$d['stok'].'</span>'; ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
</div>
