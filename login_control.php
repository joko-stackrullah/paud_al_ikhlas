<?php 

include('config/koneksi.php');
session_start();

if(isset($_POST['btn_login'])) {
    // jika sudah ditekan
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql_user = "SELECT a.*,b.status_user,b.id pendaftar_id FROM users a LEFT JOIN pendaftar b on a.id = b.users_id WHERE a.username = '$username' and a.password = '$password'";
    $result_user = mysqli_query($koneksi, $sql_user);

    if(mysqli_num_rows($result_user) > 0) {
        // jika data tersedia, simpan data user kedalam session
        while($data_user = mysqli_fetch_array($result_user)){
            $_SESSION['status'] = 'login';
            $_SESSION['id_users'] = $data_user['id'];
            $_SESSION['pendaftar_id'] = $data_user['pendaftar_id'];
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['level'] = $data_user['level'];

            if($data_user['level'] == 'admin') {
                header('location:admin/dashboard.php');

            } else if($data_user['level'] == 'siswa') {
                // print_r($data_user['status_user']);
                // exit;
                if(empty($data_user['status_user'])){
                    $_SESSION['login_error'] = "Data Anda Belum DiValidasi!";
                    header('location:login.php');
                }else if($data_user['status_user'] == 2){
                    $_SESSION['login_error'] = "Data Anda Ditolak!";
                    header('location:login.php');
                }else if($data_user['status_user'] == 1){
                    header('location:siswa/dashboard.php');
                }
            }
        }
    } else {
        $_SESSION['login_error'] = "Username atau Password anda Salah!";
        header('location:login.php');

    }

} else {
    header('location:login.php');

}

?>