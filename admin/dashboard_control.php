<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml pendaftar
$jml_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

// jml LOLOS
$jml_lolos = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE status_user = 1");

// cek hasil
if(!$jml_lolos) {
    die('Query Error : '. mysqli_error($koneksi));
}

?>