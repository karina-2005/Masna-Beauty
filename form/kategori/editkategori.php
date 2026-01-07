<main class="app-main">
  <!-- HEADER -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h3 class="mb-0 fw-bold text-pink">
            <i class="bi bi-heart-fill"></i>
            Edit Kategori Kosmetik
          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Edit Kategori
            </li>
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
                <i class="bi bi-brush-fill"></i>
                Form Edit Kategori Kosmetik
              </h5>
            </div>

            <?php
            include "koneksi.php";
            $id_kategori = $_GET['id_kategori'];
            $sql  = mysqli_query(
              $koneksi,
              "SELECT * FROM kategori WHERE id_kategori='$id_kategori'"
            );
            $data = mysqli_fetch_assoc($sql);
            ?>

            <form method="post" action="form/kategori/simpan_editkategori.php">
              <div class="card-body px-4 py-4">

                <!-- ID -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-hash"></i> ID Kategori
                  </label>
                  <input type="text"
                         name="id_kategori"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['id_kategori'] ?>"
                        >
                </div>

                <!-- NAMA -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">
                    <i class="bi bi-tag-heart-fill"></i> Nama Kategori
                  </label>
                  <input type="text"
                         name="nama_kategori"
                         class="form-control form-control-cosmetic"
                         value="<?= $data['nama_kategori'] ?>"
                         >
                </div>

              </div>

              <div class="card-footer bg-light text-end">
                <a href="dashboard.php?menu=kategori"
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
  box-shadow:0 15px 40px rgba(255,95,162,.30);
}

.header-cosmetic{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:24px 24px 0 0;
}

.form-control-cosmetic{
  border-radius:30px;
  padding:12px 18px;
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