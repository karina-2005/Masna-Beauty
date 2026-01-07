<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}

.card-cosmetic{
  border:none;
  border-radius:26px;
  box-shadow:0 18px 40px rgba(255,95,162,.28);
}

.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:26px 26px 0 0;
  padding:20px 28px;
}

.form-control-cosmetic{
  border-radius:30px;
  padding:12px 18px 12px 42px;
  border:1px solid #ffb6d9;
}

.form-control-cosmetic:focus{
  border-color:#ff5fa2;
  box-shadow:0 0 0 .15rem rgba(255,95,162,.3);
}

.icon-input{
  position:absolute;
  left:16px;
  top:50%;
  transform:translateY(-50%);
  color:#ff5fa2;
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

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">

      <div class="row justify-content-center mt-4">
          <div class="col-md-9">
            <div class="card card-cosmetic">

          <div class="card card-cosmetic">
            <div class="card-header header-cosmetic">
              <h4 class="mb-0 fw-bold">
                <i class="bi bi-truck"></i> Form Input Supplier Kosmetik
              </h4>
            </div>

            <form method="post" action="form/supplier/simpan_supplier.php">
              <div class="card-body px-5 py-4">

                <div class="row g-4">

                  <!-- ID SUPPLIER -->
                  <div class="col-md-6 position-relative">
                    <label class="form-label fw-semibold">ID Supplier</label>
                    <i class="bi bi-hash icon-input"></i>
                    <input type="text" name="id_supplier"
                           class="form-control form-control-cosmetic"
                           placeholder="S001" required>
                  </div>

                  <!-- NAMA SUPPLIER -->
                  <div class="col-md-6 position-relative">
                    <label class="form-label fw-semibold">Nama Supplier</label>
                    <i class="bi bi-building icon-input"></i>
                    <input type="text" name="nama_supplier"
                           class="form-control form-control-cosmetic"
                           placeholder="PT. Masna Beauty" required>
                  </div>

                  <!-- KONTAK -->
                  <div class="col-md-12 position-relative">
                    <label class="form-label fw-semibold">Kontak</label>
                    <i class="bi bi-telephone-fill icon-input"></i>
                    <input type="text" name="kontak"
                           class="form-control form-control-cosmetic"
                           placeholder="08xxxxxxxxxx" required>
                  </div>

                </div>

              </div>

              <div class="card-footer bg-light text-end px-5">
                <button type="reset"
                        class="btn btn-outline-secondary rounded-pill px-4">
                  Cancel
                </button>
                <button type="submit"
                        class="btn btn-pink rounded-pill px-5 shadow">
                  <i class="bi bi-save"></i> Simpan Supplier
                </button>
              </div>

            </form>

          </div>

        </div>
      </div>

    </div>
  </div>
</main>