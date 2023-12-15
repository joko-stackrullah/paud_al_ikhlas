<?php
include('config/koneksi.php');

// jml pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");
// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml Laki
$jml_laki = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE jenis_kelamin = 'L'");
// cek laki
if(!$jml_laki) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml perempuan
$jml_perempuan = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE jenis_kelamin = 'P'");
// cek perempuan
if(!$jml_perempuan) {
    die('Query Error : '. mysqli_error($koneksi));
}

?>