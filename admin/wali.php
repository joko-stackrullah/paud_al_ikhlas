<?php include('../config/auto_load.php'); ?>
<?php include('wali_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Wali</h1>
  
  <div class="row">
    <div class="col-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>
              <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
      <?php }
      
      unset($_SESSION['pesan_sukses']);
      ?>
    </div>
    <div class="col-md-12">
        <div class="top-panel row" style="margin-bottom: 20px;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modalwali" style="margin-right: 10px;">Tambah Wali Murid</a>
        </div>
        <table id="data-tabel-wali" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Wali Murid</th>
                <th>Alamat</th>
                <th>No.Telp</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while($p = mysqli_fetch_array($all_wali)) { ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama'] ?></td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['no_telp'] ?></td>
                <td>
                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit_<?= $p['wali_murid_id'] ?>">Update</a> 
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['wali_murid_id'] ?>">Hapus</a>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalHapus_<?= $p['wali_murid_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <p>Anda akan menghapus data wali murid atas nama "<?= $p['nama'] ?>". <br>
                        
                        <b> DATA AKAN DIHAPUS PERMANEN.<b></p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= $base_url ?>/admin/wali.php?action=hapus&id=<?= $p['wali_murid_id'] ?>" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEdit_<?= $p['wali_murid_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= $base_url ?>/admin/wali.php?action=edit&id=<?= $p['wali_murid_id'] ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Wali Murid</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $p['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No.Telp</label>
                                <input type="text" class="form-control" id="no_telp" placeholder="Masukkan No.Telp" name="no_telp" value="<?= $p['no_telp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="<?= $p['alamat'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="edit" value="edit_wali" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php }
            
            
            if(mysqli_num_rows($all_wali) == 0) {
                echo "<tr><td colspan='8' align='center'><b>Belum Ada Data Wali Murid</b></td></tr>";
            }

            ?>

            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalwali" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= $base_url ?>/admin/wali.php?action=tambah" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Wali Murid</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No.Telp</label>
                            <input type="text" class="form-control" id="no_telp" placeholder="Masukkan No.Telp" name="no_telp">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="tambah" value="tambah_wali" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>

</script>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>