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
              <i class="bi bi-receipt"></i>
              Daftar Transaksi
            </h5>

            <!-- TOMBOL (KANAN) -->
            <div class="ms-auto">
              <a href="dashboard.php?menu=addtransaksi"
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
                <th>ID TRANSAKSI</th>
                <th>TANGGAL</th>
                <th>CUSTOMER</th>
                <th width="140">AKSI</th>
              </tr>
            </thead>

            <tbody>
            <?php
            $no = 1;
            $q = mysqli_query($koneksi,"
              SELECT t.id_transaksi,
                     t.tanggal_transaksi,
                     c.nama_cust
              FROM transaksi t
              JOIN customer c ON t.id_cust = c.id_cust
              ORDER BY t.tanggal_transaksi DESC
            ");

            if(mysqli_num_rows($q)==0){
            ?>
              <tr>
                <td colspan="5" class="text-center text-muted py-4">
                  <i class="bi bi-inbox fs-1"></i>
                  <p class="mb-0 mt-2">Belum ada transaksi</p>
                </td>
              </tr>
            <?php
            } else {
              while($d=mysqli_fetch_assoc($q)){
            ?>
              <tr>

                <td class="text-center">
                  <span class="badge bg-pink rounded-pill">
                    <?= $no++ ?>
                  </span>
                </td>

                <td class="text-center fw-semibold">
                  <?= $d['id_transaksi'] ?>
                </td>

                <td class="text-center">
                  <?= date('d-m-Y', strtotime($d['tanggal_transaksi'])) ?>
                </td>

                <td class="text-center">
                  <?= $d['nama_cust'] ?>
                </td>

                <td class="text-center">
                  <!-- DETAIL -->
                  <a href="dashboard.php?menu=transaksi_detail&id_transaksi=<?= $d['id_transaksi'] ?>"
                     class="btn btn-info btn-sm rounded-circle"
                     title="Detail">
                    <i class="bi bi-eye"></i>
                  </a>

                  <!-- HAPUS -->
                  <a href="form/transaksi/hapus.php?id_transaksi=<?= $d['id_transaksi'] ?>"
                     class="btn btn-danger btn-sm rounded-circle"
                     onclick="return confirm('Yakin hapus transaksi ini?')"
                     title="Hapus">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>

              </tr>
            <?php }} ?>
            </tbody>

          </table>
        </div>

      </div>

    </div>
  </div>

</main>