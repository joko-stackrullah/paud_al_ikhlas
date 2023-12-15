<?php

include('config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    print_r($_POST);

    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);

    // if($_POST['upload']){
    $ekstensi_diperbolehkan	= array('png','jpg');
    $nama_file = $_FILES['file']['name'];
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $ubah_nama = $nama . '.' . $ekstensi;
    
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'uploads/bukti_bayar/'. $ubah_nama);
            // $query = mysqli_query($koneksi,"INSERT INTO upload VALUES(NULL, '$nama')");
            // if($query){
            //     echo 'FILE BERHASIL DI UPLOAD';
            // }else{
            //     echo 'GAGAL MENGUPLOAD GAMBAR';
            // }
        }else{
            echo 'UKURAN FILE TERLALU BESAR';
        }
    }else{
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }
    // }

    if($password != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

    // Insert tabel user
    // $sql_user = "INSERT INTO users () values ('')";
    $sql_user = "INSERT INTO users (nama, username, password, level) values ('$nama', '$email', '$password', 'siswa')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        $data_user = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }

        // insert table pendaftar
        $sql_pendaftar = "INSERT INTO pendaftar (nama, tmpt_lahir, tgl_lahir, jenis_kelamin, agama, alamat, email, telepon, users_id, fileupload) values ('$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$email', '$telepon', '$id_user', '$ubah_nama')";

        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if($result_pendaftar){
            // jika berhasil
            $_SESSION['pesan_registrasi'] = "Registrasi Berhasil, Login Menggunakan Email dan Password anda!";

            header('location:login.php');

        } else {
            // jika query pendaftar gagal
            echo "Error insert pendaftar ". mysqli_error($koneksi);
            echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
            die;
        }


    } else {
        // jika query users gagal
        echo "Error insert users: ". mysqli_error($koneksi);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

} else {
    header('location:registrasi.php');
}

?>