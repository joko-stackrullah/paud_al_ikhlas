<?php include('../config/auto_load.php'); ?>

<?php include('dashboard_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>

      <div class="alert alert-success">
        <?= $_SESSION['pesan_sukses'] ?>
      </div>

      <?php } 
      unset($_SESSION['pesan_sukses']);

      ?>
    </div>
    <div class="col-md-6">
      
      <div class="row">
        <?php if(!isset($status)) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
              </div>
              <div class="card-body">
                  <p class="text-danger">*Jika data telah diisi oleh wali murid,akan muncul nama wali murid dan penempatan kelas !</p>
                  <form class="user" method="POST" action="<?= $base_url ?>/siswa/dashboard.php">
                      <div class="form-group">
                          <label for="un">Wali Murid</label>
                          <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $data_pendaftar['nama_wali']?>" disabled>
                      </div>
                      <div class="form-group">
                          <label for="un">No.Telepon Wali Murid</label>
                          <input type="number" class="form-control" id="no_telp_wali" name="no_telp_wali" value="<?= $data_pendaftar['no_telp_wali']?>" disabled>
                      </div>
                      <div class="form-group">
                          <label for="un">Kelas Siswa</label>
                          <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $data_pendaftar['nama_kelas']?>" disabled>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        <?php } else if(isset($status) && $status == 0) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">Proses Penilaian</h5>
                    <div class="col-auto">
                      <i class="fas fa-spinner text-warning mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Terima kasih telah melakukan pendaftaran di PAUD Al-Ikhlas. Pengumuman pada tanggal: </p>
                    <span class="badge badge-danger" style="font-size: 20px;">30 November 2023</span>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PAUD AL-IKHLAS - PONDOK PUCUNG</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else if(isset($status) && $status == 1) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">ANDA LOLOS</h5>
                    <div class="col-auto">
                      <i class="far fa-check-circle text-success mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Selamat anda lolos seleksi di PAUD Al-Ikhlas. Lakukan Daftar Ulang pada tanggal: </p>
                    <span class="badge badge-danger" style="font-size: 20px;">27 November 2023</span>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PAUD AL-IKHLAS - PONDOK PUCUNG</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        <?php } else if(isset($status) && $status == 2) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">ANDA TIDAK LOLOS</h5>
                    <div class="col-auto">
                      <i class="fa fa-times text-danger mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Anda Belum lolos. Terima kasih telah mengikuti seleksi dengan baik. </p>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PAUD AL-IKHLAS - PONDOK PUCUNG</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>


        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">PERSYARATAN DAFTAR ULANG</h6>
            </div>
            <div class="card-body">
              <p>Siswa yang lolos seleksi wajib melakukan daftar ulang dengan membawa berkas sebagai berikut: </p>

              <!-- dari bootstrap -->
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  1. FC AKTA
                  <span class="badge badge-info badge-pill">1 Lembar</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  2. FC Kartu Keluarga
                  <span class="badge badge-info badge-pill">1 Lembar</span>
                </li>
                <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                  3. FC Nilai Ujian Nasional
                  <span class="badge badge-info badge-pill">2 Lembar</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  4. FC Nilai Ujian Sekolah
                  <span class="badge badge-info badge-pill">2 Lembar</span>
                </li> -->
              </ul>
              <p class="text-danger mt-3">* Wajib melakukan Daftar Ulang pada tanggal: 27 November 2023</p>
            </div>
          </div>
        </div>
      
      </div>

    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="col-auto mt-3 text-center">
                  <?php
                  if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                  } else {
                    $foto = '../assets/img/avatar.jpg';
                  }
                  ?>
                  <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px; height: 200px;">
                </div>
                <br>
                <div class="text-right">
                    <a href="editprofil.php" class="btn btn-warning btn-sm">Edit Profil</a>
                    <a href="<?= $base_url ?>/cetak/detail_cetak.php?id=<?= $data_pendaftar['id'] ?>" class="btn btn-success btn-sm float-left" target="_blank">Cetak Data Diri</a>
                </div>
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
      </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
