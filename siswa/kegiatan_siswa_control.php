<?php
$id_user = $_SESSION['id_users'];
$pendaftar_id = $_SESSION['pendaftar_id'];
$nama_siswa = $_SESSION['nama'];
include('../config/koneksi.php');
// tabel wali_murid
$all_kegiatan = mysqli_query($koneksi, 
"SELECT * FROM kegiatan_mengajar 
WHERE pendaftar_id = $pendaftar_id"
);

// cek hasil
if(!$all_kegiatan) {
    die('Query Error : '. mysqli_error($koneksi));
}

if(isset($_GET['action']) && $_GET['action'] == "tambah") {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql_wali = "INSERT INTO wali_murid (nama, no_telp, alamat) values ('$nama', '$no_telp', '$alamat')";
    $insert_wali = mysqli_query($koneksi, $sql_wali);

    if($insert_wali) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Data wali murid berhasil ditambahkan";
        header('location:wali.php');
    } else {
        echo "Error insert wali ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }
}

if(isset($_GET['action']) && $_GET['action'] == "edit") {
    $id_wali = $_GET['id'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $query_wali = mysqli_query($koneksi, "UPDATE wali_murid SET nama = '$nama' , no_telp = '$no_telp', alamat = '$alamat' WHERE wali_murid_id = '$id_wali'");
    if($query_wali) {
        $_SESSION['pesan_sukses'] = "Data wali berhasil diubah";
        header('location:wali.php');
    } else {
        die('Data wali murid tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_wali = $_GET['id'];
    $query_wali = mysqli_query($koneksi, "DELETE FROM wali_murid WHERE wali_murid_id = '$id_wali'");
    if($query_wali) {
        $_SESSION['pesan_sukses'] = "Data wali murid berhasil dihapus";
        header('location:wali.php');
    } else {
        die('Data wali murid tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}


?>