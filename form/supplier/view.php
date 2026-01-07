<?php include "koneksi.php"; ?>

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
.search-box{
  width:220px;
  border-radius:25px;
  padding-left:38px;
  border:1px solid #ffb6d9;
}
.search-icon{
  position:absolute;
  left:14px;
  top:50%;
  transform:translateY(-50%);
  color:var(--pink);
}
.table-cosmetic tbody tr:hover{
  background:var(--pink-soft);
}
.bg-pink{
  background:#ff5fa2;
}
.btn-action{
  width:36px;
  height:36px;
  border-radius:50%;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  border:none;
  transition:all 0.3s ease;
  margin:0 3px;
  box-shadow:0 2px 8px rgba(0,0,0,.15);
}
.btn-action:hover{
  transform:translateY(-3px) scale(1.1) rotate(5deg);
  box-shadow:0 6px 16px rgba(0,0,0,.3);
}
.btn-edit{
  background:linear-gradient(135deg,#667eea,#764ba2);
  color:#fff;
}
.btn-edit:hover{
  background:linear-gradient(135deg,#5568d3,#6a3f8f);
}
.btn-delete{
  background:linear-gradient(135deg,#f093fb,#f5576c);
  color:#fff;
}
.btn-delete:hover{
  background:linear-gradient(135deg,#e77ef1,#e84a5f);
}
.btn-action i{
  font-size:14px;
}
</style>

<div class="app-content">
  <div class="container-fluid">
    <br>

    <div class="card card-cosmetic">

      <!-- HEADER -->
      <div class="card-header header-cosmetic">
        <div class="d-flex justify-content-between align-items-center">

          <h5 class="mb-0 fw-bold">
            <i class="bi bi-truck"></i> Data Supplier
          </h5>

          <div class="d-flex gap-2">

            <!-- SEARCH -->
            <div class="position-relative">
              <i class="bi bi-search search-icon"></i>
              <input type="text" id="searchSupplier"
                     class="form-control form-control-sm search-box"
                     placeholder="Cari supplier...">
            </div>

            <!-- TAMBAH -->
            <a href="dashboard.php?menu=addsupplier"
               class="btn btn-light btn-sm rounded-pill shadow">
              <i class="bi bi-plus-circle"></i> Tambah
            </a>

          </div>
        </div>
      </div>

      <!-- TABLE -->
      <div class="card-body p-0">
        <table class="table table-hover table-cosmetic mb-0" id="supplierTable">
          <thead class="text-center" style="background:#fff0f6">
            <tr>
              <th width="80">NO</th>
              <th>ID SUPPLIER</th>
              <th>NAMA SUPPLIER</th>
              <th>KONTAK</th>
              <th width="140">AKSI</th>
            </tr>
          </thead>

          <tbody>
          <?php
          $no=1;
          $q=mysqli_query($koneksi,"SELECT * FROM supplier");
          while($d=mysqli_fetch_array($q)){
          ?>
          <tr>

            <td class="text-center">
              <span class="badge bg-pink rounded-pill"><?= $no++ ?></span>
            </td>

            <td class="text-center fw-semibold">
              <?= $d['id_supplier'] ?>
            </td>

            <td>
              <i class="bi bi-building text-pink me-2"></i>
              <?= $d['nama_supplier'] ?>
            </td>

            <td>
              <i class="bi bi-telephone-fill text-success me-2"></i>
              <?= $d['kontak'] ?>
            </td>

            <td class="text-center">
              <a href="dashboard.php?menu=editsupplier&id_supplier=<?= $d['id_supplier'] ?>"
                 class="btn btn-action btn-edit" title="Edit Supplier">
                <i class="bi bi-pencil-fill"></i>
              </a>

              <a href="form/supplier/hapus.php?id_supplier=<?= $d['id_supplier'] ?>"
                 class="btn btn-action btn-delete" title="Hapus Supplier"
                 onclick="return confirm('Yakin hapus supplier ini?')">
                <i class="bi bi-trash-fill"></i>
              </a>
            </td>

          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('searchSupplier').addEventListener('keyup', function(){
  let value = this.value.toLowerCase();
  document.querySelectorAll('#supplierTable tbody tr').forEach(row=>{
    row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
  });
});
</script>