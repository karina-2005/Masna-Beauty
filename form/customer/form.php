<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
  --pink-light:#ffe6f0;
}

.text-pink{ color:var(--pink); }

/* CARD */
.card-cosmetic{
  border:none;
  border-radius:28px;
  box-shadow:0 18px 40px rgba(255,95,162,.3);
  background:#fff;
}

/* HEADER */
.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff9acb);
  color:#fff;
  border-radius:28px 28px 0 0;
  padding:18px 24px;
}

/* INPUT */
.form-control-cosmetic{
  border-radius:35px;
  padding:14px 22px;
  font-size:1.05rem;
  border:1px solid #ffb6d9;
  background:#fff;
}

.form-control-cosmetic:focus{
  border-color:#ff5fa2;
  box-shadow:0 0 0 .2rem rgba(255,95,162,.25);
}

/* TEXTAREA */
.textarea-cosmetic{
  border-radius:22px;
  padding:14px 18px;
}

/* BUTTON */
.btn-pink{
  background:#ff5fa2;
  color:#fff;
  border:none;
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
          <h3 class="mb-0 fw-bold text-pink fs-2">
            <i class="bi bi-people-fill"></i>
            Data Customer
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Form Customer</li>
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
                <i class="bi bi-heart-fill"></i>
                Form Input Customer
              </h5>
            </div>

            <form method="post" action="form/customer/simpan_cust.php">
              <div class="card-body px-4 py-4">

                <!-- ID Customer -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Customer
                  </label>
                  <input type="text"
                         name="id_cust"
                         class="form-control form-control-cosmetic"
                         placeholder="C01"
                         required>
                </div>

                <!-- Nama -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-person-fill"></i> Nama Customer
                  </label>
                  <input type="text"
                         name="txtNamacust"
                         class="form-control form-control-cosmetic"
                         placeholder="Nama customer"
                         required>
                </div>

                <!-- No HP -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-telephone-fill"></i> Nomor HP
                  </label>
                  <input type="text"
                         name="txtHp"
                         class="form-control form-control-cosmetic"
                         placeholder="08xxxxxxxxxx"
                         required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-geo-alt-fill"></i> Alamat
                  </label>
                  <textarea name="txtAlamat"
                            class="form-control textarea-cosmetic"
                            rows="3"
                            placeholder="Masukkan alamat lengkap"
                            required></textarea>
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <button type="reset"
                        class="btn btn-outline-secondary rounded-pill">
                  <i class="bi bi-x-circle"></i> Cancel
                </button>
                <button type="submit"
                        class="btn btn-pink rounded-pill px-4 shadow">
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