<?php include('../config/auto_load.php'); ?>
<?php include('detailsiswa_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Detail Siswa</h1>
  
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="col-auto mt-3 text-center">
              <?php
              if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != "") {
                $foto = '../uploads/' . $data_pendaftar['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px;">
            </div>
            <br>
            <h5 class="card-title mb-3 text-center">
              <?= $data_pendaftar['nama'] ?>
            </h5>
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Tempat, Tanggal Lahir</h6>
                <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jenis Kelamin</h6>
                <?php 
                if($data_pendaftar['jenis_kelamin'] == 'L') {
                  $kelamin = "Laki-laki";
                } else {
                  $kelamin = "Perempuan";
                }
                ?>

                <small class="text-muted"><?= $kelamin ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Agama</h6>
                <small class="text-muted">Islam</small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat</h6>
                <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Email</h6>
                <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Telepon</h6>
                <small class="text-muted"><?= $data_pendaftar['telepon'] ?></small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card shadow mb-4">
        <form action="<?= $base_url ?>/admin/detailsiswa_control.php?id=<?= $id_pendaftar ?>" class="wali_murid" method="POST">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA WALI KELAS</h6>
          </div>
          <div class="card-body">
            <div class="card-body">
              <div class="form-group">
                <ul class="list-group">
                  <li class="list-group-item">
                    <label for="wali">Wali Murid</label>
                    <select name="wali" id="wali" class="form-control">
                    <option selected="selected">
                    -- Pilih Wali Murid --
                    </option>
                    <?php
                      foreach($data_wali as $key => $data) { 
                        $select = (isset($data_pendaftar) && $data_pendaftar['wali_murid_id'] == $data_wali[$key]['wali_murid_id'] )?"selected = 'selected'":"";?>
                        <option value="<?php echo $data_wali[$key]['wali_murid_id']; ?>"  <?php echo $select; ?>><?php echo $data_wali[$key]['nama']; ?></option>
                    <?php } ?>
                    </select>
                  </li>
                  <li class="list-group-item">
                  <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                    <option selected="selected">
                    -- Pilih Kelas --
                    </option>
                    <?php
                      foreach($data_kelas as $key => $data) { 
                        $select = (isset($data_pendaftar) && $data_pendaftar['kelas_id'] == $data_kelas[$key]['kelas_id'] )?"selected = 'selected'":"";?>
                        <option value="<?php echo $data_kelas[$key]['kelas_id']; ?>"  <?php echo $select; ?>><?php echo $data_kelas[$key]['nama_kelas']; ?></option>
                    <?php } ?>
                    </select>
                  </li>
                </ul>
              </div>
              <button type="submit" name="btn_wali_kelas" value="update_wali_kelas" class="btn btn-primary btn-user btn-block">
                  Simpan Data Wali kelas
              </button>
              <!-- <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                  Simpan Data Wali kelas
              </button> -->
              <!-- Modal -->
              <!-- <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_pendaftar ?>" method="POST">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Penilaian data pendaftar</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <label for="nilai">Beri Penilaian</label>
                            <select name="nilai" id="nilai" class="form-control" required>
                              <option value="">--Pilih --</option>
                              <option value="1">Lolos</option>
                              <option value="2">Tidak Lolos</option>
                            </select>
                          </div>
                          <div class="modal-footer">
                              <button name="simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                  </div>
              </div> -->
            </div>
          </div>
        </form>              
      </div>

      <a href="pendaftaran.php" class="btn btn-danger">Kembali</a>
    </div>
    
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>