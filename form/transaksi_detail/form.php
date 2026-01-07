<main class="app-main">
  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-receipt-heart-fill"></i>
            Data Transaksi Detail
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Form Transaksi Detail</li>
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
                Form Input Transaksi Detail
              </h5>
            </div>

            <?php include "koneksi.php"; ?>

            <form method="post" action="form/transaksi_detail/simpan_detail.php">
              <div class="card-body px-4 py-4">

                <!-- ID DETAIL -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Detail
                  </label>
                  <input type="text"
                         name="id_detail"
                         class="form-control form-control-cosmetic"
                         placeholder="D00"
                         required>
                </div>

                <!-- ID TRANSAKSI -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-receipt"></i>ID Transaksi
                  </label>
                  <select name="id_transaksi"
                          class="form-select form-control-cosmetic"
                          required>
                    <option value="">-- Pilih Transaksi --</option>
                    <?php
                    $qt = mysqli_query($koneksi,"SELECT id_transaksi FROM transaksi");
                    while($t = mysqli_fetch_assoc($qt)){
                    ?>
                      <option value="<?= $t['id_transaksi'] ?>">
                        <?= $t['id_transaksi'] ?>
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
                    $qp = mysqli_query($koneksi,"SELECT id_produk, nama_produk FROM produk");
                    while($p = mysqli_fetch_assoc($qp)){
                    ?>
                      <option value="<?= $p['id_produk'] ?>">
                        <?= $p['nama_produk'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- QTY -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-plus-circle"></i> Quantity
                  </label>
                  <input type="number"
                         name="jumlah"
                         class="form-control form-control-cosmetic"
                         min="1"
                         required>
                </div>

                <!-- INFO -->
                <div class="alert alert-light border text-muted small mb-0">
                  <i class="bi bi-info-circle"></i>
                  Harga & subtotal dihitung otomatis oleh sistem
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <button type="reset"
                        class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Cancel
                </button>
                <button type="submit"
                        class="btn btn-pink rounded-pill px-4 shadow">
                  <i class="bi bi-save"></i> Simpan
                </button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</main>
