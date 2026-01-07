<main class="app-main">

<!-- HEADER -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h3 class="mb-0 fw-bold text-pink">
          <i class="bi bi-truck"></i> Edit Supplier Kosmetik
        </h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Edit Supplier</li>
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
              <i class="bi bi-box-seam-heart"></i> Form Edit Supplier
            </h5>
          </div>

          <?php
          include "koneksi.php";
          $id_supplier = $_GET['id_supplier'];
          $sql  = mysqli_query($koneksi,"SELECT * FROM supplier WHERE id_supplier='$id_supplier'");
          $data = mysqli_fetch_assoc($sql);
          ?>

          <form method="post" action="form/supplier/simpan_editsupplier.php">
            <div class="card-body px-4 py-4">

              <!-- ID -->
              <label class="form-label fw-semibold">
                <i class="bi bi-hash"></i> ID Supplier
              </label>
              <div class="input-group mb-3">
                <span class="input-group-text bg-pink text-white">
                  <i class="bi bi-shield-lock-fill"></i>
                </span>
                <input type="text" name="id_supplier"
                       class="form-control form-control-cosmetic"
                       value="<?= $data['id_supplier'] ?>" >
              </div>

              <!-- NAMA -->
              <label class="form-label fw-semibold">
                <i class="bi bi-building"></i> Nama Supplier
              </label>
              <div class="input-group mb-3">
                <span class="input-group-text bg-pink text-white">
                  <i class="bi bi-shop"></i>
                </span>
                <input type="text" name="nama_supplier"
                       class="form-control form-control-cosmetic"
                       value="<?= $data['nama_supplier'] ?>" required>
              </div>

              <!-- KONTAK -->
              <label class="form-label fw-semibold">
                <i class="bi bi-telephone-fill"></i> Kontak
              </label>
              <div class="input-group mb-3">
                <span class="input-group-text bg-pink text-white">
                  <i class="bi bi-phone-vibrate"></i>
                </span>
                <input type="text" name="kontak"
                       class="form-control form-control-cosmetic"
                       value="<?= $data['kontak'] ?>" required>
              </div>

            </div>

            <div class="card-footer bg-light text-end">
              <a href="dashboard.php?menu=supplier"
                 class="btn btn-outline-secondary rounded-pill">
                <i class="bi bi-arrow-left"></i> Kembali
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
<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}

.text-pink{ color:var(--pink); }

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

.bg-pink{
  background:#ff5fa2;
}

.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border:none;
}

.btn-pink:hover{
  background:#ff3c90;
}
</style>