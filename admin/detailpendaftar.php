<?php include('../config/auto_load.php'); ?>
<?php include('detailpendaftar_control.php'); ?>
<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Detail Pendaftar</h1>
  
  <div class="row" style="  display: flex;justify-content: center;">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="col-auto mt-3 text-center">
              
              <?php 
              if(empty($data_pendaftar['status_user'])) {
                echo '
                <div class="alert alert-warning">
                    Data pendaftar belum divalidasi
                </div>';
              } else if($data_pendaftar['status_user'] == 1) {
                echo '
                <div class="alert alert-info">
                    Data pendaftar Dinyatakan <b>LOLOS</b>
                </div>';
              } else if($data_pendaftar['status_user'] == 2) {
                echo '
                <div class="alert alert-danger">
                    Data pendaftar Dinyatakan <b>TIDAK LOLOS</b>
                </div>';
              }
              ?>

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
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Bukti Bayar</h6>
                <div  style="position:relative;overflow:hidden;padding-bottom:60%;">
                  <?php
                  if(isset($data_pendaftar['fileupload']) && $data_pendaftar['fileupload'] != "") {
                    $foto = '../uploads/bukti_bayar/' . $data_pendaftar['fileupload'];
                  } else {
                    $foto = '../assets/img/page.png';
                  }
                  ?>
                  <img src="<?= $foto ?>" class="img img-responsive full-width" alt="menunggu" style="      position: absolute;
      max-width: 100%;
      max-height: 100%;
      top: 50%;
      left: 50%;
      transform: translateX(-50%) translateY(-50%);">
                </div>
              </li>
            </ul>
            
            <div style="display: flex;">
            <a href="pendaftaran.php" class="btn btn-danger mt-3 btn-block" >Kembali</a>
            <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                Validasi Data Pendaftar
            </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <label for="status_user">Beri Penilaian</label>
                          <select name="status_user" id="status_user" class="form-control" required>
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
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA NILAI PENDAFTAR</h6>
        </div>
        <div class="card-body">
          <div class="card-body">

            <?php 
            if($data_nilai['status_user'] == 0) {
              echo '
              <div class="alert alert-warning">
                  Data pendaftar belum divalidasi
              </div>';
            } else if($data_nilai['status_user'] == 1) {
              echo '
              <div class="alert alert-info">
                  Data pendaftar Dinyatakan <b>LOLOS</b>
              </div>';
            } else if($data_nilai['status_user'] == 2) {
              echo '
              <div class="alert alert-danger">
                  Data pendaftar Dinyatakan <b>TIDAK LOLOS</b>
              </div>';
            }
            ?>
            
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nilai Ujian Nasional</h6>
                <small class="text-muted"><?= $data_nilai['nilai_un'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nilai Ujian Sekolah</h6>
                <small class="text-muted"><?= $data_nilai['nilai_us'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nilai UTS</h6>
                <small class="text-muted"><?= $data_nilai['nilai_uts_1'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nilai Rata"</h6>
                <small class="text-muted"><?= number_format(($data_nilai['nilai_uts_1'] + $data_nilai['nilai_us'] + $data_nilai['nilai_un']) / 3, 2) ?></small>
              </li>
            </ul>

            <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                Validasi Data Pendaftar
            </button>


            <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <label for="status_user">Beri Penilaian</label>
                          <select name="status_user" id="status_user" class="form-control" required>
                            <option value="">--Pilih --</option>
                            <option value="1">Lolos</option>
                            <option value="0">Tidak Lolos</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                            <button name="simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <a href="pendaftaran.php" class="btn btn-danger">Kembali</a>
    </div> -->
    
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>