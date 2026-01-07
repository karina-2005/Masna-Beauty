<?php include "koneksi.php" ?>
<div class="app-content"> <div class="col-sm-6">
                
              </div>
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
                        <div class="row">
                        <div class="col-md-6">
<div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">[ <a href="dashboard.php?menu=addbarang"> Tambah</a> ]</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th style="width: 40px">Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = mysqli_query($koneksi,"SELECT * FROM barang order by nama_barang");
                        while($data = mysqli_fetch_array($sql)){
                        ?>
                        <tr class="align-middle">
                            <td><?=$no; ?></td>
                          <td><?=$data['kode_barang'] ?></td>
                          <td><?=$data['nama_barang']?></td>
                          <td><?=$data['jumlah']?></td>
                          </td>
                          <?php $no++;}?>
                          
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
            </div>
</div>
</div>
