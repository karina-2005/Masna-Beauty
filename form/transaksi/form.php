<?php include "koneksi.php"; ?>

<main class="app-main">
  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-receipt-heart-fill"></i>
            Data Transaksi
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Form Transaksi</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card card-cosmetic">
            <div class="card-header header-cosmetic">
              <h5 class="mb-0 fw-semibold">
                <i class="bi bi-cart-heart"></i>
                Form Input Transaksi
              </h5>
            </div>

            <form method="post" action="form/transaksi/simpan_transaksi.php">
              <div class="card-body px-4 py-4">

                <!-- ID TRANSAKSI -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Transaksi
                  </label>
                  <input type="text"
                         name="id_transaksi"
                         class="form-control form-control-cosmetic"
                         placeholder="T10" required>
                         
                </div>

                <!-- TANGGAL -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-calendar-heart"></i> Tanggal Transaksi
                  </label>
                  <input type="date"
                         name="tanggal_transaksi"
                         class="form-control form-control-cosmetic"
                         value="<?= date('Y-m-d') ?>"
                         required>
                </div>

                <!-- CUSTOMER -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-person-heart"></i> Customer
                  </label>
                  <select name="id_cust"
                          class="form-select form-control-cosmetic"
                          required>
                    <option value="">-- Pilih Customer --</option>
                    <?php
                    $qc = mysqli_query($koneksi,"SELECT id_cust, nama_cust FROM customer");
                    while($c = mysqli_fetch_assoc($qc)){
                    ?>
                      <option value="<?= $c['id_cust'] ?>">
                        <?= $c['nama_cust'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- PRODUK -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-bag-heart"></i> Produk
                  </label>
                  <select name="id_produk"
                          class="form-select form-control-cosmetic"
                          required>
                    <option value="">-- Pilih Produk --</option>
                    <?php
                    $qp = mysqli_query($koneksi,"SELECT id_produk, nama_produk, stok FROM produk WHERE stok > 0");
                    while($p = mysqli_fetch_assoc($qp)){
                    ?>
                      <option value="<?= $p['id_produk'] ?>">
                        <?= $p['nama_produk'] ?> (Stok: <?= $p['stok'] ?>)
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- JUMLAH -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-plus-slash-minus"></i> Jumlah
                  </label>
                  <input type="number"
                         name="jumlah"
                         class="form-control form-control-cosmetic"
                         min="1"
                         required>
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <button type="reset"
                        class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Cancel
                </button>
                <button type="submit"
                        class="btn btn-pink rounded-pill px-4 shadow">
                  <i class="bi bi-save"></i> Simpan Transaksi
                </button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</main>