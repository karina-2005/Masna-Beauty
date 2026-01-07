<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-tags-fill"></i>
            Data Kategori Kosmetik
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Form Kategori</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-10">

          <div class="card card-cosmetic">
            <div class="card-header header-cosmetic">
              <h5 class="mb-0 fw-semibold">
                <i class="bi bi-bookmark-heart-fill"></i>
                Form Input Kategori Kosmetik
              </h5>
            </div>

            <form method="post" action="form/kategori/simpan_kategori.php">
              <div class="card-body px-4 py-4">

                <!-- ID Kategori -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Kategori
                  </label>
                  <input
                    type="text"
                    name="id_kategori"
                    class="form-control form-control-cosmetic"
                    placeholder="Contoh: KT1"
                    required
                  />
                </div>

                <!-- Nama Kategori -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-bookmark-heart-fill"></i> Nama Kategori
                  </label>
                  <input
                    type="text"
                    name="nama_kategori"
                    class="form-control form-control-cosmetic"
                    placeholder="Skincare, Makeup, Bodycare"
                    required
                  />
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <button type="reset" class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Cancel
                </button>
                <button type="submit" class="btn btn-pink rounded-pill px-4 shadow">
                  <i class="bi bi-save"></i> Save
                </button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
</main>
<?php /* file: form_kategori.php */ ?>

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

.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border:none;
}

.btn-pink:hover{
  background:#ff3c90;
}
</style>