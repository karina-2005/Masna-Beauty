<!--begin::App Content-->
<div class="app-content">
  <div class="container-fluid">
    <br>
<style>
.product-thumb{
  width:60px;
  height:60px;
  object-fit:cover;
  border-radius:12px;
  box-shadow:0 6px 15px rgba(255,95,162,.3);
  cursor:pointer;
  transition:.3s;
}
.product-thumb:hover{
  transform:scale(1.15);
}
.modal-cosmetic .modal-content{
  border-radius:22px;
  border:none;
  box-shadow:0 20px 50px rgba(255,95,162,.35);
}
.modal-header{
  background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
  color:#fff;
  border-radius:22px 22px 0 0;
}
</style>

    <style>
      :root{
        --pink:#ff5fa2;
        --pink-soft:#fff0f6;
      }
      .card-cosmetic{
        border-radius:20px;
        border:none;
        box-shadow:0 14px 35px rgba(255,95,162,.2);
      }
      .header-cosmetic{
        background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
        color:#fff;
        border-radius:20px 20px 0 0;
      }
      .badge-pink{
        background:linear-gradient(135deg,#ff5fa2,#ff8fc7);
      }
      .table-cosmetic tbody tr{
        transition:.25s ease;
      }
      .table-cosmetic tbody tr:hover{
        background:var(--pink-soft);
        transform:scale(1.01);
      }
      .search-box{
        max-width:260px;
        border-radius:25px;
        border:1px solid #ffb6d9;
        padding-left:40px;
      }
      .search-icon{
        position:absolute;
        left:14px;
        top:50%;
        transform:translateY(-50%);
        color:var(--pink);
      }
      .text-pink{color:var(--pink);}
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

    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-cosmetic mb-4">

          <!-- HEADER -->
          <div class="card-header header-cosmetic">
  <div class="d-flex justify-content-between align-items-center">

    <!-- KIRI : JUDUL -->
    <h5 class="fw-bold mb-0">
      <i class="bi bi-bag-heart-fill"></i> Data Produk Kosmetik
    </h5>

    <!-- KANAN : SEARCH + TAMBAH -->
    <div class="d-flex align-items-center gap-2">

      <!-- SEARCH -->
      <div class="position-relative">
        <i class="bi bi-search search-icon"></i>
        <input type="text"
               id="searchProduk"
               class="form-control form-control-sm search-box"
               placeholder="Cari produk...">
      </div>

      <!-- TAMBAH -->
      <a href="dashboard.php?menu=addproduk"
         class="btn btn-light btn-sm rounded-pill shadow">
        <i class="bi bi-plus-circle"></i>
        <span class="d-none d-md-inline">Tambah</span>
      </a>

    </div>
  </div>
</div>

          <!-- BODY -->
          <div class="card-body">
            <table class="table table-bordered table-cosmetic align-middle" id="produkTable">
              <thead class="text-center" style="background:#fff0f6">
                <tr>
                  <th>NO</th>
                  <th>ID</th>
                  <th>PRODUK</th>
                  <th>KATEGORI</th>
                  <th>SUPPLIER</th>
                  <th>HARGA</th>
                  <th>STOK</th>
                  <th>FOTO</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
              <?php
              include "koneksi.php";
              $no=1;
              $sql=mysqli_query($koneksi,"SELECT * FROM produk");
              while($d=mysqli_fetch_array($sql)){
              ?>
                <tr>
                  <td class="text-center">
                    <span class="badge badge-pink rounded-pill"><?= $no++; ?></span>
                  </td>
                  <td><?= $d['id_produk']; ?></td>
                  <td class="fw-semibold text-pink">
                     <?= $d['nama_produk']; ?>
                  </td>
                  <td>
                    <span class="badge bg-secondary"><?= $d['id_kategori']; ?></span>
                  </td>
                  <td><?= $d['id_supplier']; ?></td>
                  <td class="fw-bold text-pink">
                    Rp <?= number_format($d['harga'],0,',','.'); ?>
                  </td>
                  <td class="text-center">
                    <?php if($d['stok'] <= 5){ ?>
                      <span class="badge bg-danger">Habis</span>
                    <?php } else { ?>
                      <span class="badge bg-success"><?= $d['stok']; ?></span>
                    <?php } ?>
                  </td>
                  <td class="text-center">
                  <img src="dist/assets/img/produk/<?= $d['foto']; ?>"
                  class="product-thumb"
                  data-bs-toggle="modal"
                  data-bs-target="#detail<?= $d['id_produk']; ?>">
                  </td>
                  <td class="text-center">
                    <a href="dashboard.php?menu=editproduk&id_produk=<?= $d['id_produk']; ?>"
                       class="btn btn-action btn-edit" title="Edit Produk">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="form/produk/hapus.php?id_produk=<?= $d['id_produk']; ?>"
                      class="btn btn-action btn-delete" title="Hapus Produk"
                       onclick="return confirm('Hapus produk ini?')">
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
  </div>
</div>
<!--end::App Content-->

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('searchProduk').addEventListener('keyup', function(){
  let value = this.value.toLowerCase();
  document.querySelectorAll('#produkTable tbody tr').forEach(row=>{
    row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
  });
});
</script>