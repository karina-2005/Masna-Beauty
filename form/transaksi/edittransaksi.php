<?php
include "koneksi.php";

$id_transaksi = $_GET['id_transaksi'] ?? '';

$q = mysqli_query($koneksi,"
  SELECT t.*, c.nama_cust
  FROM transaksi t
  JOIN customer c ON t.id_cust = c.id_cust
  WHERE t.id_transaksi = '$id_transaksi'
");

$data = mysqli_fetch_assoc($q);

if (!$data) {
  echo "<div class='alert alert-danger'>Data transaksi tidak ditemukan</div>";
  exit;
}
?>

<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="fw-bold text-pink">
        <i class="bi bi-pencil-square"></i> Edit Transaksi
      </h3>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="card card-cosmetic">
        <div class="card-body">

          <form method="post" action="form/transaksi/simpan_transaksi.php">

            <input type="hidden" name="id_transaksi"
                   value="<?= $data['id_transaksi'] ?>">

            <div class="mb-3">
              <label class="form-label">ID Transaksi</label>
              <input type="text"
                     class="form-control"
                     value="<?= $data['id_transaksi'] ?>"
                     readonly>
            </div>

            <div class="mb-3">
              <label class="form-label">Tanggal Transaksi</label>
              <input type="date"
                     name="tanggal_transaksi"
                     value="<?= $data['tanggal_transaksi'] ?>"
                     class="form-control"
                     required>
            </div>

            <div class="mb-3">
              <label class="form-label">Customer</label>
              <select name="id_cust" class="form-select" required>
                <?php
                $qc = mysqli_query($koneksi,"SELECT * FROM customer");
                while($c = mysqli_fetch_assoc($qc)){
                  $sel = $c['id_cust']==$data['id_cust'] ? 'selected' : '';
                ?>
                  <option value="<?= $c['id_cust'] ?>" <?= $sel ?>>
                    <?= $c['nama_cust'] ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-warning">
                <i class="bi bi-save"></i> Update
              </button>

              <a href="dashboard.php?menu=transaksi"
                 class="btn btn-secondary">
                Kembali
              </a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</main>
