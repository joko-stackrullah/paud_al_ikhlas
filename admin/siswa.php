<?php include('../config/auto_load.php'); ?>

<?php include('siswa_control.php'); ?>


<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
  
  <div class="row">
    <div class="col-12">
      <?php if(isset($_SESSION['pesan_sukses'])) { ?>
              <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
      <?php }
      
      unset($_SESSION['pesan_sukses']);
      ?>
    </div>
    <div class="col-md-12">
      <table id="data-tabel-siswa" class="table table-bordered table-hover" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Wali Kelas</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <!-- <th>Status</th> -->
            <th>Aksi</th>
            <th>Kegiatan Mengajar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while($p = mysqli_fetch_array($all_pendaftar)) { ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['nama_wali'] ?></td>
            <td><?= $p['nama_kelas'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <!-- <?php

            if($p['status_user'] == null) {
              $status = '<span class="badge badge-info">BARU</span>';

            } else if ($p['status_user'] == 1) {
              $status = '<span class="badge badge-success">LOLOS</span>';

            } else if ($p['status_user'] == 0) {
              $status = '<span class="badge badge-danger">TIDAK LOLOS</span>';
            }

            ?>
            <td><?= $status ?></td> -->
            <td>
                <a href="detailsiswa.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Cek Detail</a> 
                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">Hapus</a>
            </td>
            <td>
                <a href="kegiatan_mengajar.php?id_pendaftar=<?= $p['id'] ?>&nama=<?= $p['nama']?>" class="btn btn-primary btn-sm">Cek Kegiatan Mengajar</a>  
            </td>
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
                      <p>Anda akan menghapus data pendaftar atas nama "<?= $p['nama'] ?>". <br>
                      
                      <b> DATA AKAN DIHAPUS PERMANEN.<b></p>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Hapus</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
              </div>
          </div>

          <?php }
        
        
          if(mysqli_num_rows($all_pendaftar) == 0) {
            echo "<tr><td colspan='8' align='center'><b>Belum Ada pendaftar baru</b></td></tr>";
          }

          ?>

        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<script>

</script>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>