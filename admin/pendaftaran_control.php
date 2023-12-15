<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.* FROM pendaftar");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar where id = '$id_pendaftar'");

    if(mysqli_num_rows($query_pendaftar)){

        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // hapus foto pendaftar
        if(!empty($data_pendaftar['foto'])){
            unlink('../uploads/'. $data_pendaftar['foto']);
        }
        if(!empty($data_pendaftar['fileupload'])){
            unlink('../uploads/bukti_bayar/'. $data_pendaftar['fileupload']);
        }
        $sql_hapus_pendaftar = mysqli_query($koneksi," DELETE FROM pendaftar where id = '$id_pendaftar'");

        $sql_hapus_user = mysqli_query($koneksi," DELETE FROM users WHERE id = '$id_user'");



        if(!$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query Error: '. mysqli_error($koneksi));
        }

        // simpan session
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:pendaftaran.php');

    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}


?>