<?php
$al = '';
if (isset($_POST['login'])) {
    require_once '../../class/koneksi.php';
    $koneksi = new koneksi;
    $querylogin = mysqli_query($koneksi->conn, "SELECT * from user WHERE id_user='$_POST[id_user]'");
    if (mysqli_num_rows($querylogin) > 0) {
        $dataUser = mysqli_fetch_assoc($querylogin);
        if (md5($_POST['password']) == $dataUser['password']) {
            $koneksi->Login($dataUser['id_user'], $dataUser['nama_user'], $dataUser['level']);
        } else {
            $al = "<div class='alert alert-danger'><i class='ti-alert'></i> Pasword salah!</div>";
        }
    } else {
        $al = "<div class='alert alert-danger'><i class='ti-alert'></i> user_id tidak terdaftar!</div>";
    }
}
