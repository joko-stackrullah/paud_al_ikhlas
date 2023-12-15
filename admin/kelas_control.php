<?php

// tabel kelas
$all_kelas = mysqli_query($koneksi, 
"SELECT * FROM kelas");

// cek hasil
if(!$all_kelas) {
    die('Query Error : '. mysqli_error($koneksi));
}


if(isset($_GET['action']) && $_GET['action'] == "tambah") {
    $nama_kelas = $_POST['nama_kelas'];

    $sql_kelas = "INSERT INTO kelas (nama_kelas) values ('$nama_kelas')";
    $insert_kelas = mysqli_query($koneksi, $sql_kelas);

    if($insert_kelas) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Data kelas berhasil ditambahkan";
        header('location:kelas.php');
    } else {
        echo "Error insert kelas ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }
}

if(isset($_GET['action']) && $_GET['action'] == "edit") {
    $id_kelas = $_GET['id'];
    $nama_kelas = $_POST['nama_kelas'];

    $query_kelas = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE kelas_id = '$id_kelas'");
    if($query_kelas) {
        $_SESSION['pesan_sukses'] = "Data kelas berhasil diubah";
        header('location:kelas.php');
    } else {
        die('Data kelas tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_kelas = $_GET['id'];
    $query_kelas = mysqli_query($koneksi, "DELETE FROM kelas WHERE kelas_id = '$id_kelas'");
    if($query_kelas) {
        $_SESSION['pesan_sukses'] = "Data kelas berhasil dihapus";
        header('location:kelas.php');
    } else {
        die('Data kelas tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}


?>