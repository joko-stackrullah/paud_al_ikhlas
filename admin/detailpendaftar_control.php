<?php
include('../config/koneksi.php');
$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar where id = '$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// ubah status status_user
if(isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_nilai') {

    $status_user = $_POST['status_user'];

    $sql_nilai = " UPDATE pendaftar set status_user ='$status_user' where id='$id_pendaftar'";
    $query_nilai = mysqli_query($koneksi,$sql_nilai);

    if($query_nilai) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:pendaftaran.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}




?>