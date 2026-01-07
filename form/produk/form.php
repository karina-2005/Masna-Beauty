<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}

.text-pink{ color:var(--pink); }

/* CARD LEBIH BESAR */
.card-cosmetic{
  border:none;
  border-radius:26px;
  box-shadow:0 20px 45px rgba(255,95,162,.3);
}

/* HEADER */
.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:26px 26px 0 0;
  padding:20px 28px;
  font-size:1.2rem;
}

/* INPUT BESAR */
.form-control-cosmetic{
  border-radius:35px;
  padding:14px 22px;
  font-size:1.05rem;
  border:1px solid #ffb6d9;
}

.form-control-cosmetic:focus{
  border-color:#ff5fa2;
  box-shadow:0 0 0 .2rem rgba(255,95,162,.25);
}

/* LABEL */
.form-label{
  font-size:1.05rem;
}

/* BUTTON */
.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border:none;
  font-size:1rem;
  padding:10px 26px;
}

.btn-pink:hover{
  background:#ff3c90;
}
</style>

<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-bag-heart-fill"></i>
            Data Produk Kosmetik
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Form Produk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-12">

          <div class="card card-cosmetic mb-4">
            <div class="card-header header-cosmetic">
              <h5 class="mb-0 fw-semibold">
                <i class="bi bi-plus-circle"></i>
                Form Input Produk Kosmetik
              </h5>
            </div>

            <form action="form/produk/simpan_produk.php"
            method="POST"
            enctype="multipart/form-data">            
              <div class="card-body px-4 py-4">

  <!-- ID PRODUK -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-hash"></i> ID Produk
    </label>
    <input type="text" name="id_produk"
           class="form-control form-control-cosmetic"
           placeholder="Contoh: P1" required>
  </div>

  <!-- NAMA PRODUK -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-box-seam"></i> Nama Produk
    </label>
    <input type="text" name="nama_produk"
           class="form-control form-control-cosmetic"
           required>
  </div>

  <!-- ID KATEGORI -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-tags-fill"></i> ID Kategori
    </label>
    <input type="text" name="id_kategori"
           class="form-control form-control-cosmetic"
           required>
  </div>

  <!-- ID SUPPLIER -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-truck"></i> ID Supplier
    </label>
    <input type="text" name="id_supplier"
           class="form-control form-control-cosmetic"
           required>
  </div>

  <!-- HARGA -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-currency-dollar"></i> Harga
    </label>
    <input type="number" name="harga"
           class="form-control form-control-cosmetic"
           required>
  </div>

  <!-- STOK -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-boxes"></i> Stok
    </label>
    <input type="number" name="stok"
           class="form-control form-control-cosmetic"
           required>
  </div>

  <!-- FOTO -->
  <div class="mb-3">
    <label class="form-label fw-semibold">
      <i class="bi bi-image"></i> Foto Produk
    </label>
    <input type="file"
           name="foto"
           class="form-control form-control-cosmetic"
           accept="image/*"
           required>
  </div>

</div>
              <div class="card-footer bg-light text-end">
                <button type="reset"
                        class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Batal
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