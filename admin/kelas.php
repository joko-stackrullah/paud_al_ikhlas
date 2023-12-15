<?php include('../config/auto_load.php'); ?>
<?php include('kelas_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Kelas</h1>
  
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
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modalkelas" style="margin-right: 10px;">Tambah Kelas</a>
        </div>
        <table id="data-tabel-kelas" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while($p = mysqli_fetch_array($all_kelas)) { ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['nama_kelas'] ?></td>
                <td>
                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEdit_<?= $p['kelas_id'] ?>">Update</a> 
                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['kelas_id'] ?>">Hapus</a>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalHapus_<?= $p['kelas_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <p>Anda akan menghapus data kelas "<?= $p['nama_kelas'] ?>". <br>
                        
                        <b> DATA AKAN DIHAPUS PERMANEN.<b></p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= $base_url ?>/admin/kelas.php?action=hapus&id=<?= $p['kelas_id'] ?>" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEdit_<?= $p['kelas_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= $base_url ?>/admin/kelas.php?action=edit&id=<?= $p['kelas_id'] ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" placeholder="Masukkan Nama Kelas" name="nama_kelas" value="<?= $p['nama_kelas'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button name="edit" value="edit_kelas" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php }
            
            
            if(mysqli_num_rows($all_kelas) == 0) {
                echo "<tr><td colspan='8' align='center'><b>Belum Ada Data Kelas</b></td></tr>";
            }

            ?>

            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?= $base_url ?>/admin/kelas.php?action=tambah" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kelas">Nama</label>
                            <input type="text" class="form-control" id="nama_kelas" placeholder="Masukkan Nama Kelas" name="nama_kelas">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="tambah" value="tambah_kelas" class="btn btn-primary">Tambah</button>
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