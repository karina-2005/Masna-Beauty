<?php include "koneksi.php"; ?>

<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}
.card-cosmetic{
  border:none;
  border-radius:22px;
  box-shadow:0 15px 35px rgba(255,95,162,.25);
}
.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:22px 22px 0 0;
}
.bg-pink{ background:#ff5fa2; }
.table-cosmetic tbody tr:hover{
  background:var(--pink-soft);
}
.text-pink{ color:var(--pink); }
      .btn-action{
  width:36px;
  height:36px;
  border-radius:50%;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  border:none;
  transition:all 0.3s ease;
  margin:0 3px;
  box-shadow:0 2px 8px rgba(0,0,0,.15);
}
.btn-action:hover{
  transform:translateY(-3px) scale(1.1) rotate(5deg);
  box-shadow:0 6px 16px rgba(0,0,0,.3);
}
.btn-edit{
  background:linear-gradient(135deg,#667eea,#764ba2);
  color:#fff;
}
.btn-edit:hover{
  background:linear-gradient(135deg,#5568d3,#6a3f8f);
}
.btn-delete{
  background:linear-gradient(135deg,#f093fb,#f5576c);
  color:#fff;
}
.btn-delete:hover{
  background:linear-gradient(135deg,#e77ef1,#e84a5f);
}
.btn-action i{
  font-size:14px;
}
</style>

<main class="app-main">

  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="app-content">
    <div class="container-fluid">

      <div class="card card-cosmetic">

        <!-- CARD HEADER -->
<div class="card-header header-cosmetic">
  <div class="d-flex align-items-center">

    <!-- JUDUL (KIRI) -->
    <h5 class="mb-0 fw-semibold">
      <i class="bi bi-cart-heart"></i>
      Daftar Transaksi Detail
    </h5>

    <!-- TOMBOL (KANAN) -->
    <div class="ms-auto">
      <a href="dashboard.php?menu=addtransaksi_detail"
         class="btn btn-light btn-sm rounded-pill shadow">
        <i class="bi bi-plus-circle"></i>
        <span class="d-none d-md-inline"> Tambah </span>
      </a>
    </div>

  </div>
</div>

        <!-- TABLE -->
        <div class="card-body p-0">
          <table class="table table-hover table-cosmetic align-middle mb-0">
            <thead class="text-center" style="background:#fff0f6">
              <tr>
                <th width="70">NO</th>
                <th>ID DETAIL</th>
                <th>ID TRANSAKSI</th>
                <th>PRODUK</th>
                <th>JUMLAH</th>
                <th>SUBTOTAL</th>
                <th width="140">AKSI</th>
              </tr>
            </thead>

<tbody>
<?php
$no = 1;
$q = mysqli_query($koneksi,"
  SELECT 
    td.id_detail,
    td.id_transaksi,
    td.jumlah,
    td.subtotal,
    p.nama_produk
  FROM transaksi_detail td
  JOIN produk p ON td.id_produk = p.id_produk
");

while($d = mysqli_fetch_assoc($q)){
?>
  <tr>

    <td class="text-center">
      <span class="badge bg-pink rounded-pill">
        <?= $no++ ?>
      </span>
    </td>

    <td class="text-center fw-semibold">
      <?= $d['id_detail'] ?>
    </td>

    <td class="text-center">
      <?= $d['id_transaksi'] ?>
    </td>

    <td class="text-center">
      <?= $d['nama_produk'] ?>
    </td>

    <td class="text-center">
      <?= $d['jumlah'] ?>
    </td>

    <td class="text-center fw-semibold">
      Rp <?= number_format($d['subtotal'],0,',','.') ?>
    </td>

    <td class="text-center">
      <a href="dashboard.php?menu=edittransaksi_detail&id_detail=<?= $d['id_detail'] ?>"
         class="btn btn-action btn-edit" title="Edit Detail Transaksi">
        <i class="bi bi-pencil-fill"></i>
      </a>

      <a href="form/transaksi_detail/hapus_detail.php?id_detail=<?= $d['id_detail'] ?>"
         class="btn btn-action btn-delete" title="Hapus Detail Transaksi"
         onclick="return confirm('Yakin hapus data ini?')">
        <i class="bi bi-trash-fill"></i>
      </a>
    </td>

  </tr>
<?php } ?>
</tbody>

          </table>
        </div>

        
      </div>

    </div>
  </div>

</main>