<?php
include('../config/koneksi.php');
$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar where id = '$id_pendaftar' and status_user = 1";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

$sql_wali = "SELECT * FROM wali_murid ";
$result_wali = mysqli_query($koneksi, $sql_wali);
$data_wali = $result_wali->fetch_all(MYSQLI_ASSOC);

$sql_kelas = "SELECT * FROM kelas ";
$result_kelas = mysqli_query($koneksi, $sql_kelas);
$data_kelas = $result_kelas->fetch_all(MYSQLI_ASSOC);


// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

if(!$result_wali) {
    die('Query Error : '. mysqli_error($koneksi));
}

// ubah data wali kelas
if(isset($_POST['btn_wali_kelas'])) {

    $wali = $_POST['wali'];
    $kelas = $_POST['kelas'];

    $sql_nilai = " UPDATE pendaftar SET wali_murid_id = $wali , kelas_id = $kelas  where id='$id_pendaftar'";
    $query_nilai = mysqli_query($koneksi,$sql_nilai);

    if($query_nilai) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:siswa.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}


?>