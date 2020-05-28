<?php
class koneksi
{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "jualbeli";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die("Koneksi gagal");
    }
    public function Login($id_user, $nama_user, $level)
    {
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama_user'] = $nama_user;
        $_SESSION['level'] = $level;
        echo "<script> alert('Login Berhasil'); </script>";
        echo "<script> window.location='index.php'; </script>";
    }
    public function Logout()
    {
        unset($_SESSION['id_user']);
        unset($_SESSION['nama_user']);
        unset($_SESSION['level']);
        echo "<script> alert('Logout Berhasil'); </script>";
        echo "<script> window.location='index.php'; </script>";
    }
}
