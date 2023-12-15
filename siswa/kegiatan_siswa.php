<?php include('../config/auto_load.php'); ?>
<?php include('kegiatan_siswa_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Kegiatan Mengajar Atas Nama <?= $nama_siswa ?></h1>
  
  <div class="row">
    <div class="col-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>
              <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
      <?php }
      
      unset($_SESSION['pesan_sukses']);
      ?>
    </div>
    <div class="col-md-12">
        <!-- <div class="top-panel row" style="margin-bottom: 20px;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modalkegiatan" style="margin-right: 10px;">Tambah Kegiatan Siswa</a>
        </div> -->
        <table id="data-tabel-kegiatan-siswa" class="table table-bordered table-hover" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Materi Pelajaran</th>
                <th>Kegiatan Pembelajaran</th>
                <th>Nilai Siswa</th>
                <th>Foto Kegiatan</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while($p = mysqli_fetch_array($all_kegiatan)) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $p['tanggal'] ?></td>
                <td><?= $p['materi_pelajaran'] ?></td>
                <td><?= $p['kegiatan_pelajaran'] ?></td>
                <td><?= $p['nilai_siswa'] ?></td>
                <td><img src="../uploads/foto_kegiatan/<?=$p['bukti_kegiatan_upload'] ?>" alt="foto profil" class="img-fluid" style="max-width:350px;max-height:200px"></td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <p>Anda akan menghapus data kegiatan mengajar berikut ?<br>
                        
                        <b> DATA AKAN DIHAPUS PERMANEN.<b></p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['kegiatan_mengajar_id'] ?>" class="btn btn-danger">Hapus</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalEdit_<?= $p['kegiatan_mengajar_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?= $base_url ?>/admin/kegiatan_mengajar.php?action=edit&id=<?= $p['kegiatan_mengajar_id'] ?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kegiatan Mengajar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" placeholder="Masukkan Tanggal" name="tanggal" value="<?= $p['tanggal'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="materi_pelajaran">Materi Pelajaran</label>
                                    <input type="text" class="form-control" id="materi_pelajaran" placeholder="Masukkan Materi Pelajaran" name="materi_pelajaran" value="<?= $p['materi_pelajaran'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan_pelajaran">Kegiatan Pelajaran</label>
                                    <input type="text" class="form-control" id="kegiatan_pelajaran" placeholder="Masukkan Kegiatan Pelajaran" name="kegiatan_pelajaran" value="<?= $p['kegiatan_pelajaran'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nilai_siswa">Nilai Siswa</label>
                                    <input type="text" class="form-control" id="nilai_siswa" placeholder="Masukkan Nilai Siswa" name="nilai_siswa" value="<?= $p['nilai_siswa'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button name="edit" value="edit_kegiatan_mengajar" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php }
            
            
            if(mysqli_num_rows($all_kegiatan) == 0) {
                echo "<tr><td colspan='8' align='center'><b>Belum ada kegiatan mengajar</b></td></tr>";
            }

            ?>

            </tbody>
            <!-- <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
          