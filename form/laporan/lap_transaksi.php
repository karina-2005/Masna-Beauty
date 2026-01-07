<main class="app-main">

  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 text-pink fw-bold">
            <i class="bi bi-receipt-heart"></i> Laporan Transaksi
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Form Laporan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="app-content">
    <div class="container-fluid">

<style>
:root{
  --pink:#ff5fa2;
  --pink-soft:#fff0f6;
}

.card-report{
  border:none;
  border-radius:22px;
  box-shadow:0 15px 35px rgba(255,95,162,.25);
}

.header-report{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:22px 22px 0 0;
  text-align:center;
  padding:22px;
}

.header-report h5{
  margin:0;
  font-weight:700;
  letter-spacing:1px;
}

.header-report p{
  margin:5px 0 0;
  font-size:14px;
  opacity:.9;
}

.form-label{
  font-weight:600;
  color:#444;
}

.form-control{
  border-radius:14px;
}

.btn-pink{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border:none;
  border-radius:25px;
}

.btn-pink:hover{
  opacity:.9;
  color:#fff;
}

.info-box{
  background:var(--pink-soft);
  border-radius:14px;
  padding:12px;
  font-size:14px;
  color:#555;
}
</style>

      <div class="row justify-content-center mt-3">
        <div class="col-md-6">

          <div class="card card-report">

            <!-- CARD HEADER -->
            <div class="header-report">
              <h5>
                <i class="bi bi-calendar-heart"></i>
                Cetak Laporan Transaksi
              </h5>
              <p>Pilih rentang tanggal transaksi</p>
            </div>

            <!-- FORM -->
            <form method="post" action="form/laporan/cetak_transaksi.php" target="_blank">

              <div class="card-body">

                <div class="info-box mb-3 text-center">
                  📌 Laporan akan dicetak dalam bentuk PDF
                </div>

                <!-- TANGGAL AWAL -->
                <div class="mb-3">
                  <label class="form-label">
                    <i class="bi bi-calendar-event"></i> Tanggal Awal
                  </label>
                  <input type="date"
                         class="form-control"
                         name="txtTgl_awal"
                         required>
                </div>

                <!-- TANGGAL AKHIR -->
                <div class="mb-3">
                  <label class="form-label">
                    <i class="bi bi-calendar-check"></i> Tanggal Akhir
                  </label>
                  <input type="date"
                         class="form-control"
                         name="txtTgl_akhir"
                         required>
                </div>

              </div>

              <!-- FOOTER -->
              <div class="card-footer d-flex justify-content-between px-4">
                <button type="reset" class="btn btn-light rounded-pill">
                  <i class="bi bi-x-circle"></i> Reset
                </button>

                <button type="submit" class="btn btn-pink">
                  <i class="bi bi-printer-fill"></i> Cetak Laporan
                </button>
              </div>

            </form>

          </div>

        </div>
      </div>

    </div>
  </div>
</main>
