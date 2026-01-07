<?php
include "koneksi.php";
$tgl = date('d-m-Y');
?>

<div class="app-content">
  <div class="container-fluid">
    <br>

<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}

.report-card{
  border-radius:20px;
  border:1px solid #ffd0e6;
  box-shadow:0 12px 30px rgba(255,95,162,.18);
}

.report-header{
  text-align:center;
  padding:22px;
  border-bottom:2px solid #ffd0e6;
}
.report-header h4{
  margin:0;
  color:var(--pink);
  font-weight:700;
}
.report-header p{
  margin:5px 0 0;
  color:#777;
}

.report-info{
  display:flex;
  justify-content:space-between;
  padding:12px 20px;
  background:var(--pink-soft);
  font-size:14px;
}

.table-report thead th{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  text-align:center;
}
.table-report tbody tr:nth-child(even){
  background:#fff7fb;
}
.table-report tbody tr:hover{
  background:#ffe4f1;
}
</style>

<div class="card report-card">

  <!-- HEADER -->
  <div class="report-header">
    <h4>LAPORAN DATA CUSTOMER</h4>
    <p>Masna Beauty - Sistem Informasi Penjualan Kosmetik</p>
  </div>

  <!-- INFO -->
  <div class="report-info">
    <div>
      <strong>Tanggal Cetak:</strong> <?= $tgl ?>
    </div>
    <div>
      <a href="form/laporan/cetak_customer.php"
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
          <th width="5%">NO</th>
          <th>ID CUSTOMER</th>
          <th>NAMA CUSTOMER</th>
          <th>NO HANDPHONE</th>
          <th>ALAMAT</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $no=1;
      $q=mysqli_query($koneksi,"SELECT * FROM customer ORDER BY nama_cust ASC");
      while($d=mysqli_fetch_array($q)){
      ?>
        <tr>
          <td class="text-center"><?= $no++ ?></td>
          <td><?= $d['id_cust'] ?></td>
          <td><?= $d['nama_cust'] ?></td>
          <td><?= $d['no_telp'] ?></td>
          <td><?= $d['alamat'] ?></td>
        </tr>
      <?php } ?>

      </tbody>
    </table>
  </div>

  <div class="text-end px-4 pb-3">
    <small class="text-muted">
      Dicetak otomatis oleh sistem • Masna Beauty
    </small>
  </div>

</div>

  </div>
</div>
