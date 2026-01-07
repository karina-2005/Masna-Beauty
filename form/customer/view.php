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
.table-cosmetic tbody tr{
  transition:.25s ease;
}
.table-cosmetic tbody tr:hover{
  background:var(--pink-soft);
  transform:scale(1.01);
}
.text-pink{color:var(--pink);}
.table td, .table th{
  vertical-align: middle;
}
/* kosmetik table fix alignment */
.icon-col{
  width:28px;
  text-align:center;
  font-size:1rem;
}

.text-col{
  white-space:nowrap;
}

.table td, .table th{
  vertical-align: middle !important;
}

.bg-pink{
  background:#ff5fa2;
}
/* Action Buttons */
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

          <!-- JUDUL -->
          <h5 class="mb-4 fw-bold">
            <i class="bi bi-people-fill"></i> Data Customer
          </h5>

          <!-- KANAN -->
          <div class="d-flex align-items-center gap-2">

            <!-- SEARCH -->
            <div class="position-relative">
              <i class="bi bi-search search-icon"></i>
              <input type="text" id="searchCustomer"
                     class="form-control form-control-sm search-box"
                     placeholder="Cari customer...">
            </div>
            <div class="position-relative">
            <!-- TAMBAH -->
            <a href="dashboard.php?menu=addcust"
               class="btn btn-light btn-sm rounded-pill shadow">
              <i class="bi bi-plus-circle"></i>
              <span class="d-none d-md-inline">Tambah</span>
            </a>
          </div>

        </div>
      </div>

      <!-- TABLE -->
      <div class="card-body p-0">
        <table class="table table-hover table-cosmetic align-middle mb-0" id="customerTable">
          <thead class="text-center" style="background:#fff0f6">
            <tr>
              <th>NO</th>
              <th>ID</th>
              <th>NAMA</th>
              <th>NO HP</th>
              <th>ALAMAT</th>
              <th>AKSI</th>
            </tr>
          </thead>

<tbody>
<?php
$no=1;
$q=mysqli_query($koneksi,"SELECT * FROM customer");
while($d=mysqli_fetch_array($q)){
?>
<tr>

  <!-- NO -->
  <td class="text-center">
    <span class="badge bg-pink rounded-pill"><?= $no++ ?></span>
  </td>

  <!-- ID -->
  <td class="text-center fw-semibold">
    <?= $d['id_cust'] ?>
  </td>

  <!-- NAMA -->
  <td>
    <div class="row align-items-center g-0">
      <div class="col-auto icon-col">
        <i class="bi bi-person-fill"></i>
      </div>
      <div class="col text-col">
        <?= $d['nama_cust'] ?>
      </div>
    </div>
  </td>

  <!-- NO HP -->
  <td>
    <div class="row align-items-center g-0">
      <div class="col-auto icon-col text-success">
        <i class="bi bi-telephone-fill"></i>
      </div>
      <div class="col text-col">
        <?= $d['no_telp'] ?>
      </div>
    </div>
  </td>

  <!-- ALAMAT -->
  <td>
    <div class="row align-items-center g-0">
      <div class="col-auto icon-col text-danger">
        <i class="bi bi-geo-alt-fill"></i>
      </div>
      <div class="col text-col">
        <?= $d['alamat'] ?>
      </div>
    </div>
  </td>

  <!-- AKSI -->
  <td class="text-center">
    <a href="dashboard.php?menu=editcust&id_cust=<?= $d['id_cust'] ?>"
       class="btn btn-action btn-edit" title="Edit Customer">
      <i class="bi bi-pencil-fill"></i>
    </a>
    <a href="form/customer/hapus.php?id_cust=<?= $d['id_cust'] ?>"
       class="btn btn-action btn-delete" title="Hapus Customer"
       onclick="return confirm('Yakin hapus?')">
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

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('searchCustomer').addEventListener('keyup', function(){
  let value = this.value.toLowerCase();
  document.querySelectorAll('#customerTable tbody tr').forEach(row=>{
    row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
  });
});
</script>