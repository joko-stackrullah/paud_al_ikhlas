<?php

include('../config/koneksi.php');
$id_pendaftar = $_GET['id_pendaftar'];
$nama_siswa = $_GET['nama'];
// tabel wali_murid
// print_r($sql_kegiatan);
// exit;
$all_kegiatan = mysqli_query($koneksi, 
"SELECT a.*,b.nama,CONCAT(c.nama, ' - ', d.nama_kelas) AS wali_dan_kelas FROM kegiatan_mengajar a 
LEFT JOIN pendaftar b ON a.pendaftar_id = b.id
LEFT JOIN wali_murid c ON b.wali_murid_id = c.wali_murid_id
LEFT JOIN kelas d ON b.kelas_id = d.kelas_id
WHERE b.id = '$id_pendaftar'"
);

// cek hasil
if(!$all_kegiatan) {
    die('Query Error : '. mysqli_error($koneksi));
}


if(isset($_GET['action']) && $_GET['action'] == "tambah") {
    $id_pendaftars = $_GET['pendaftar_id'];
    $nama_siswax = $_GET['nama_siswa'];
    $tanggal = $_POST['tanggal'];
    $materi_pelajaran = $_POST['materi_pelajaran'];
    $kegiatan_pelajaran = $_POST['kegiatan_pelajaran'];
    $nilai_siswa = $_POST['nilai_siswa'];

    
    if($_FILES['bukti_kegiatan']['name'] != '') {

        $ekstensi_diperbolehkan = array('png','jpg','jpeg');
        $nama_gambar = $_FILES['bukti_kegiatan']['name'];
        // profile.png
        $x = explode('.', $nama_gambar);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['bukti_kegiatan']['size'];
        $file_tmp = $_FILES['bukti_kegiatan']['tmp_name'];

        $ubah_nama = $tanggal.'_'.$nama_siswax.'_'.$materi_pelajaran.'.'.$ekstensi;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../uploads/foto_kegiatan/'. $ubah_nama);

            } else {
                echo "Gambar terlalu besar"; die;
            }

        } else {
            echo " ekstensi tidak diperbolehkan"; die;
        }


    }

    $sql_kegiatan = "INSERT INTO kegiatan_mengajar (tanggal, materi_pelajaran, kegiatan_pelajaran, nilai_siswa, pendaftar_id, bukti_kegiatan_upload) values ('$tanggal', '$materi_pelajaran', '$kegiatan_pelajaran', '$nilai_siswa','$id_pendaftars','$ubah_nama')";

    $insert_kegiatan = mysqli_query($koneksi, $sql_kegiatan);
    // print_r($sql_kegiatan);
    // exit;

    if($insert_kegiatan) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Data kegiatan berhasil ditambahkan";
        header('location:siswa.php');
    } else {
        echo "Error insert kegiatan ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }
}

if(isset($_GET['action']) && $_GET['action'] == "edit") {
    $kegiatan_mengajar_id = $_GET['id'];
    $nama_siswax = $_GET['nama_siswa'];
    $tanggal = $_POST['tanggal'];
    $materi_pelajaran = $_POST['materi_pelajaran'];
    $kegiatan_pelajaran = $_POST['kegiatan_pelajaran'];
    $nilai_siswa = $_POST['nilai_siswa'];

    if($_FILES['bukti_kegiatan']['name'] != '') {

        $ekstensi_diperbolehkan = array('png','jpg','jpeg');
        $nama_gambar = $_FILES['bukti_kegiatan']['name'];
        // profile.png
        $x = explode('.', $nama_gambar);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['bukti_kegiatan']['size'];
        $file_tmp = $_FILES['bukti_kegiatan']['tmp_name'];

        $ubah_nama = $tanggal.'_'.$nama_siswax.'_'.$materi_pelajaran.'.'.$ekstensi;

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../uploads/foto_kegiatan/'. $ubah_nama);

            } else {
                echo "Gambar terlalu besar"; die;
            }

        } else {
            echo " ekstensi tidak diperbolehkan"; die;
        }


    }


    $query_kegiatan = mysqli_query($koneksi, "UPDATE kegiatan_mengajar SET tanggal = '$tanggal' , materi_pelajaran = '$materi_pelajaran', kegiatan_pelajaran = '$kegiatan_pelajaran', nilai_siswa = '$nilai_siswa', bukti_kegiatan_upload = '$ubah_nama' WHERE kegiatan_mengajar_id = '$kegiatan_mengajar_id'");
    if($query_kegiatan) {
        $_SESSION['pesan_sukses'] = "Data kegiatan berhasil diubah";
        header('location:siswa.php');
    } else {
        die('Data mengajar tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $kegiatan_mengajar_id = $_GET['id'];
    $query_mengajar = mysqli_query($koneksi, "DELETE FROM kegiatan_mengajar WHERE kegiatan_mengajar_id = '$kegiatan_mengajar_id'");
    if($query_mengajar) {
        $_SESSION['pesan_sukses'] = "Data mengajar berhasil dihapus";
        header('location:siswa.php');
    } else {
        die('Data mengajars tidak ditemukan!'.'Query Error: '. mysqli_error($koneksi));
    }
}


?>