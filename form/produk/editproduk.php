<main class="app-main">
  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-bag-heart-fill"></i>
            Edit Produk Kosmetik
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Produk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-9">

          <div class="card card-cosmetic">
            <div class="card-header header-cosmetic">
              <h5 class="mb-0 fw-semibold">
                <i class="bi bi-pencil-heart"></i>
                Form Edit Data Produk
              </h5>
            </div>

            <?php
            include "koneksi.php";
            $kode = isset($_GET['id_produk']) ? $_GET['id_produk'] : '';
            $sql  = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$kode'");
            $data = mysqli_fetch_assoc($sql);
            ?>

            <form method="post" action="form/produk/simpan_editproduk.php">
              <div class="card-body px-4 py-4">

                <!-- ID PRODUK -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Produk
                  </label>
                  <input type="text"
                         name="id_produk"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['id_produk'] ?>"
                         readonly>
                </div>

                <!-- NAMA PRODUK -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-box-heart-fill"></i> Nama Produk
                  </label>
                  <input type="text"
                         name="txtNamaproduk"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['nama_produk'] ?>"
                         placeholder="Lip Cream, Serum Wajah..."
                         required>
                </div>

                <!-- HARGA -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-cash-coin"></i> Harga
                  </label>
                  <input type="text"
                         name="txtJumlah"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['harga'] ?>"
                         placeholder="Rp 50.000"
                         required>
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <a href="dashboard.php?menu=produk"
                   class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Cancel
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
  border-radius:24px;
  box-shadow:0 18px 45px rgba(255,95,162,.30);
}

.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:24px 24px 0 0;
}

.form-control-cosmetic{
  border-radius:30px;
  padding:12px 20px;
  border:1px solid #ffb6d9;
}

.form-control-cosmetic:focus{
  border-color:#ff5fa2;
  box-shadow:0 0 0 .18rem rgba(255,95,162,.25);
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