<html lang="en">
	
<?php
$al = '';
if (isset($_POST['login'])) {
	//var_dump(id_user);
	//var_dump(password); die;
	$koneksi = new koneksi;
	$querylogin = mysqli_query($koneksi->conn, "SELECT * from user WHERE id_user='$_POST[id_user]'");
	if (mysqli_num_rows($querylogin) > 0) {
		$dataUser = mysqli_fetch_assoc($querylogin);
		if (md5($_POST['password']) == $dataUser['password']) {
			$koneksi->Login($dataUser['id_user'], $dataUser['nama_user'], $dataUser['level']);
		} else {
			echo "<script>alert('Username / Password Salah');</script>";
			//$al = "<div class='alert alert-danger'><i class='ti-alert'></i> Password salah!</div>";
		}
	} else {
		echo "<script>alert('Username / Password Salah');</script>";
		//$al = "<div class='alert alert-danger'><i class='ti-alert'></i> ID User tidak terdaftar!</div>";
	}
}
?>
<!DOCTYPE html>

<head>
    <title>PT. Empat Perdana Carton</title>
    <link rel="icon" href="images/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="views/dashboard/login/css/style.css">
    <link rel="stylesheet" type="text/css" href="views/dashboard/login/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/a9b5ac602b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="views/dashboard/login/js/bootstrap.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="js/support.js"></script>
    <div>
        <div class="box-header">
            <img class="logo" src="images/logo1.png" width="460" height="345">
            <a href="" id="judul-header-atas">SISTEM INFORMASI PENJUALAN DAN PEMBELIAN</a><br>
            <a href="" id="judul-header-bawah">PT. Empat Perdana Carton</a>
            
        </div>

        <div class="box-menu">
            
        </div>
        <!--<br><br><br>
			<marquee>Jalan Rangga Gede No. 147 Gempol - Kecamatan Karawang Barat Kabupaten Karawang 41361 - Telp & Fax (0267) 403310  &nbsp;<img src="logoepc.jpg" width="30" style="padding-hanging:30"></img></marquee>
		-->
        

        <section id="box-login">
            <div class="grid-login">
                <div class="body-login">
                    <center>

                        <div class="login">
                            <div class="header-login">
                                <h3 class="txtLogin">Login User</h3>
                            </div>
                            <div class="alert-login" style="height:70px;">
                                <!--<?php //Main::flash(); ?>-->
                            </div>
                            <div class="main-login">
                                <form action="" method="POST">
                                    <input class="input-text" type="text" id="input-login" name="id_user" placeholder="Username" required autocomplete="off" >
                                    <input class="input-text" type="password" id="input-login" name="password" placeholder="Password" required autocomplete="off">
                                    <button class="btn-login" name="login" value="Login"><i class="fas fa-sign-in-alt"></i> Login</button>
                                </form>
                            </div>

                            <!--<div class="mid">
                                <p class="txtMidLogin">atau</p>
                            </div>

                            <div class="footer-login">
                                <button type="button" class="btnDaftar" onclick="openDaftar()">daftar</button>
                            </div>-->
                        </div>
                    </center>
                </div>
            </div>
        </section>

        

        
        
    </div>
</body>

</html>
