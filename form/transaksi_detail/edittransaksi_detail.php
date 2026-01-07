<?php
include "koneksi.php";

$id_detail = isset($_GET['id_detail']) ? $_GET['id_detail'] : '';

$q = mysqli_query($koneksi,"
  SELECT td.*
  FROM transaksi_detail td
  WHERE td.id_detail='$id_detail'
");
$data = mysqli_fetch_assoc($q);
?>

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
.form-control-cosmetic{
  border-radius:30px;
  padding:10px 18px;
  border:1px solid #ffb6d9;
}
.form-control-cosmetic:focus{
  border-color:#ff5fa2;
  box-shadow:0 0 0 .15rem rgba(255,95,162,.25);
}
.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border:none;
}
.btn-pink:hover{
  background:#ff3c90;
}
.text-pink{ color:var(--pink); }
</style>

<main class="app-main">

  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-receipt-heart-fill"></i>
            Edit Transaksi Detail
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item">
              <a href="dashboard.php?menu=transaksi_detail">Transaksi Detail</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
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
                <i class="bi bi-pencil-heart"></i>
                Form Edit Transaksi Detail
              </h5>
            </div>

            <form method="post" action="form/transaksi_detail/simpan_editdetail.php">
              <div class="card-body px-4 py-4">

                <!-- ID DETAIL -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Detail
                  </label>
                  <input type="text"
                         name="id_detail"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['id_detail'] ?>"
                         readonly>
                </div>

                <!-- ID TRANSAKSI -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-receipt"></i> ID Transaksi
                  </label>
                  <select name="id_transaksi"
                          class="form-control form-control-cosmetic"
                          required>
                    <option value="">-- Pilih Transaksi --</option>
                    <?php
                    $qt = mysqli_query($koneksi,"SELECT * FROM transaksi");
                    while($t = mysqli_fetch_assoc($qt)){
                      $sel = ($t['id_transaksi'] == $data['id_transaksi']) ? 'selected' : '';
                    ?>
                      <option value="<?= $t['id_transaksi'] ?>" <?= $sel ?>>
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
                          class="form-control form-control-cosmetic"
                          required>
                    <option value="">-- Pilih Produk --</option>
                    <?php
                    $qp = mysqli_query($koneksi,"SELECT * FROM produk");
                    while($p = mysqli_fetch_assoc($qp)){
                      $sel = ($p['id_produk'] == $data['id_produk']) ? 'selected' : '';
                    ?>
                      <option value="<?= $p['id_produk'] ?>" <?= $sel ?>>
                        <?= $p['nama_produk'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- JUMLAH -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-plus-circle"></i> Jumlah
                  </label>
                  <input type="number"
                         name="jumlah"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['jumlah'] ?>"
                         min="1"
                         required>
                </div>

                <!-- SUBTOTAL -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-cash-heart"></i> Subtotal
                  </label>
                  <input type="number"
                         name="subtotal"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['subtotal'] ?>"
                         required>
                </div>

              </div>

              <!-- FOOTER -->
              <div class="card-footer bg-light text-end">
                <a href="dashboard.php?menu=transaksi_detail"
                   class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-arrow-left-circle"></i> Batal
                </a>
                <button type="submit"
                        class="btn btn-pink rounded-pill px-4 shadow">
                  <i class="bi bi-save"></i> Update
                </button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</main>