<?php
class index
{
    function index()
    {

        $_SESSION['id_user'] = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';

        require_once "class/koneksi.php";
        require_once "class/user.php";
        require_once "class/suplier.php";
        require_once "class/customer.php";
        require_once "class/size.php";
        require_once "class/pembelian.php";
        require_once "class/penjualan.php";
        require_once "class/datapembelian.php";
        require_once "class/datapenjualan.php";
        require_once "class/faktur.php";

        // if (file_exists('class/user.php')) {
        //     echo "<script> alert ('oke');</script>";
        // }
        $koneksi = new koneksi();
        $user = new user();
        $suplier = new suplier();
        $customer = new customer();
        $size = new size();
        $pembelian = new pembelian();
        $penjualan = new  penjualan();
        $datapembelian = new  datapembelian();
        $datapenjualan = new  datapenjualan();
        $faktur = new  faktur();
        $_GET['p'] = isset($_GET['p']) ? $_GET['p'] : false;
?>
        <!doctype html>
        <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
        <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
        <!--[if gt IE 8]><!-->
        <html class="no-js" lang="en">
        <!--<![endif]-->

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title style="font-family:calibri">PT. Empat Perdana Carton</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="apple-touch-icon" href="apple-icon.png">
            <link rel="shortcut icon" href="images/epc.jpg">

            <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
            <link rel="stylesheet" href="vendors/datatables/css/dataTables.bootstrap4.min.css">

            <link rel="stylesheet" href="assets/css/style.css" type='text/css'>

            <link rel='stylesheet' href='assets/css/open-sans.css'>
            <link rel="stylesheet" href="vendors/material-design/css/materialdesignicons.min.css" type='text/css' />
        </head>
        <?php
        if ($_SESSION['id_user'] == '') {
            self::form_login();
        } elseif ($_GET['p'] == 'cetak_nota') {
            require_once 'views/keranjang/cetak_nota.php';
        } elseif ($_GET['p'] == 'cetak_laporan') {
            require_once 'views/laporan/cetak_laporan.php';
        } elseif ($_GET['p'] == 'logout') {
            include_once "views/user/logout.php";
        } else if ($_GET['p'] == 'cetak_detail') {
            include_once "views/faktur/cetak_detail.php";
        } else if ($_GET['p'] == 'cetak_datapembelian') {
            include_once "views/datapembelian/cetak_datapembelian.php";
        } else if ($_GET['p'] == 'cetak_datapenjualan') {
            include_once "views/datapenjualan/cetak_datapenjualan.php";
        } else {
        ?>


            <body>


                <!-- Left Panel -->

                <aside id="left-panel" class="left-panel">
                    <nav class="navbar navbar-expand-sm navbar-default">

                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-list"></i>
                            </button>
                            <a class="navbar-brand" href="index.php?page=dashboard" style="font-family:Arial">
                                <h1>JualBeli</h1>

                            </a>
                            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                        </div>

                        <div id="main-menu" class="main-menu collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="index.php?page=dashboard" style="font-family:Arial"> <i class="menu-icon fa fa-home"></i>
                                        <h7>Beranda</h7>
                                    </a>
                                </li>
                                <!-- /.menu-title -->
                                <?php
                                if ($_SESSION['level'] == 'Admin') {
                                ?>
                                    <li>
                                        <a href="index.php?p=user" style="font-family:Arial"> <i class="menu-icon fa fa-user-circle"></i>
                                            <h7>Data User </h7>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=suplier" style="font-family:Arial"> <i class="menu-icon fa fa-vcard-o"></i>
                                            <h7>Data Suplier </h7>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=customer" style="font-family:Arial"> <i class="menu-icon fa fa-vcard"></i>
                                            <h7>Data Customer </h7>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=size" style="font-family:Arial"> <i class="menu-icon fa fa-cube"></i>
                                            <h7>Data Size Karton</h7>
                                        </a>
                                    </li>


                                <?php }
                                if ($_SESSION['level'] == 'Admin' || $_SESSION['level'] == 'Marketing') {  ?>
                                    <li>
                                        <a href="index.php?p=pembelian" style="font-family:Arial"> <i class="menu-icon fa fa-arrow-circle-down"></i>
                                            <h7>Pembelian</h7>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?p=penjualan" style="font-family:Arial"> <i class="menu-icon fa fa-arrow-circle-up"></i>
                                            <h7>Penjualan</h7>
                                        </a>
                                    </li>
                                <?php
                                }
                                if ($_SESSION['level'] == 'Admin' || $_SESSION['level'] == 'Marketing') {  ?>
                                    <li>
                                        <a href="index.php?p=faktur" style="font-family:Arial"> <i class="menu-icon fa fa-file"></i>
                                            <h7>Faktur Penjualan</h7>
                                        </a>
                                    </li>

                                <?php
                                }

                                if ($_SESSION['level'] == 'Marketing' || $_SESSION['level'] == 'Pimpinan Perusahaan') { ?>
                                    <li class="menu-item-has-children dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family:Arial"> <i class="menu-icon fa fa-laptop"></i>
                                            <h7>Laporan</h7>
                                        </a>
                                        <ul class="sub-menu children dropdown-menu">
                                            <li><a href="index.php?p=laporanpembelian" style="font-family:Arial">
                                                    <h7>Laporan Pembelian</h7>
                                                </a></li>
                                            <li><a href="index.php?p=laporan" style="font-family:Arial">
                                                    <h7>Laporan Penjualan</h7>
                                                </a></li>
                                        </ul>

                                    </li>

                                <?php
                                }
                                ?>

                                <h3 class="menu-title"></h3><!-- /.menu-title -->
                                <li>
                                    <a href="index.php?p=logout" style="font-family:Arial"> <i class="menu-icon fa fa-sign-out"></i>
                                        <h7> Logout</h7>
                                    </a>
                                </li>

                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </aside><!-- /#left-panel -->

                <!-- Left Panel -->

                <!-- Right Panel -->

                <div id="right-panel" class="right-panel">

                    <!-- Header-->
                    <header id="header" class="header">

                        <div class="header-menu">

                            <div class="col-sm-7">
                                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-tasks"></i></a>
                                <div class="header-left">
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="user-area dropdown float-right">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family:Arial">
                                        <i class="menu-icon fa fa-user"></i>
                                        <h7> Selamat Datang, <?= $_SESSION['nama_user'] ?>
                                        </h7>
                                    </a>
                                    <div class="user-menu dropdown-menu">
                                        <a class="nav-link" href="index.php?p=logout"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </header>
                    <!-- /header -->
                    <!-- Header-->

                    <div class="content mt-3">


                    </div> <!-- .content -->
                    <?php $this->loader(); ?>



                    <div class="footer" style="width : 100%;">
                        <div class="text-center">
                            <div class="col-sm-12">
                                <br>
                                <h5>&copy; Nida Fuadiyah - Sistem Informasi Akuntansi - STMIK Kharisma Karawang&nbsp;<img src="kharisma.png" width="30" style="padding-hanging:30"></img>
                                </h5>
                                <br>
                            </div>
                        </div>
                    </div>
                </div><!-- /#right-panel -->
                <script src="assets/js/jquery-3.1.1.min.js"></script>
                <script src="vendors/jquery/dist/jquery.min.js"></script>
                <script src="assets/js/main.js"></script>
                <script src="vendors/bootstrap/dist/js/bootstrap.min.js"> </script>
                <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
                <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="vendors/datatables/js/dataTables.bootstrap4.min.js"></script>
                <script>
                    jQuery('#dataTable').ready(function() {
                        jQuery('#dataTable').DataTable({
                            "language": {
                                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                                "infoEmpty": "Data tidak ada",
                                "infoFiltered": "(hasil dari _MAX_ total data)",
                                "zeroRecords": "TIDAK ADA DATA",
                                "paginate": {
                                    "previous": "sebelum",
                                    "next": "selanjutnya"
                                },
                                "search": "Cari"
                            }
                        });
                    });
                </script>

                <!-- Right Panel -->




            </body>
        <?php
        } ?>

        </html>
<?php
    }

    function loader()
    {
        $koneksi = new koneksi();
        $user = new user();
        $suplier = new suplier();
        $customer = new customer();
        $size = new size();
        $pembelian = new pembelian();
        $penjualan = new  penjualan();
        $datapembelian = new  datapembelian();
        $datapenjualan = new  datapenjualan();
        $faktur = new  faktur();
        if (isset($_GET['p'])) {
            if ($_GET['p'] == 'user') {
                /*User*/
                include "views/user/tampil_user.php";
            } elseif ($_GET['p'] == 'tambah_user') {
                include_once "views/user/tambah_user.php";
            } else if ($_GET['p'] == 'hapus_user') {
                include_once "views/user/hapus_user.php";
            } else if ($_GET['p'] == 'edit_user') {
                include_once "views/user/edit_user.php";
            }
            /*Suplier*/ else if ($_GET['p'] == 'suplier') {
                include_once "views/suplier/tampil_suplier.php";
            } else if ($_GET['p'] == 'tambah_suplier') {
                include_once "views/suplier/tambah_suplier.php";
            } else if ($_GET['p'] == 'hapus_suplier') {
                include_once "views/suplier/hapus_suplier.php";
            } else if ($_GET['p'] == 'edit_suplier') {
                include_once "views/suplier/edit_suplier.php";
            }
            /*Customer*/ else if ($_GET['p'] == 'customer') {
                include_once "views/customer/tampil_customer.php";
            } else if ($_GET['p'] == 'tambah_customer') {
                include_once "views/customer/tambah_customer.php";
            } else if ($_GET['p'] == 'hapus_customer') {
                include_once "views/customer/hapus_customer.php";
            } else if ($_GET['p'] == 'edit_customer') {
                include_once "views/customer/edit_customer.php";
            }
            /*Size*/ else if ($_GET['p'] == 'size') {
                include_once "views/size/tampil_size.php";
            } else if ($_GET['p'] == 'tambah_size') {
                include_once "views/size/tambah_size.php";
            } else if ($_GET['p'] == 'edit_size') {
                include_once "views/size/edit_size.php";
            } else if ($_GET['p'] == 'hapus_size') {
                include_once "views/size/hapus_size.php";
            }
            /*Pembelian*/ else if ($_GET['p'] == 'pembelian') {
                include_once "views/pembelian/tampil_pembelian.php";
            } else if ($_GET['p'] == 'tambah_pembelian') {
                include_once "views/pembelian/tambah_pembelian.php";
            } else if ($_GET['p'] == 'edit_pembelian') {
                include_once "views/pembelian/edit_pembelian.php";
            } else if ($_GET['p'] == 'hapus_pembelian') {
                include_once "views/pembelian/hapus_pembelian.php";
            }
            /*Penjualan*/ else if ($_GET['p'] == 'penjualan') {
                include_once "views/penjualan/tampil_penjualan.php";
            } else if ($_GET['p'] == 'tambah_penjualan') {
                include_once "views/penjualan/tambah_penjualan.php";
            } else if ($_GET['p'] == 'edit_penjualan') {
                include_once "views/penjualan/edit_penjualan.php";
            } else if ($_GET['p'] == 'hapus_penjulan') {
                include_once "views/penjualan/hapus_penjualan.php";
            }
            /*Faktur*/ else if ($_GET['p'] == 'faktur') {
                include_once "views/faktur/tampil_faktur.php";
            } else if ($_GET['p'] == 'tambah_faktur') {
                include_once "views/faktur/tambah_faktur.php";
            } else if ($_GET['p'] == 'hapus_faktur') {
                include_once "views/faktur/hapus_faktur.php";
            } else if ($_GET['p'] == 'detail_faktur') {
                include_once "views/faktur/detail_faktur.php";
            }
            /*Data Pembelian*/ else if ($_GET['p'] == 'datapembelian') {
                include_once "views/datapembelian/lihat_datapembelian.php";
            }
            /*Data Penjualan*/ else if ($_GET['p'] == 'datapenjualan') {
                include_once "views/datapenjualan/lihat_datapenjualan.php";
            }
            /*Laporan*/ else if ($_GET['p'] == 'laporan') {
                include_once "views/laporan/lihat_laporan.php";
            }
            /*LaporanPembelian*/ else if ($_GET['p'] == 'laporanpembelian') {
                include_once "views/laporanpembelian/lihat_laporanpembelian.php";
            } else {
                self::dashboard();
            }
        }
    }
    public function form_login()
    {
        require_once 'views/dashboard/login/index.php';
    }

    public function dashboard()
    {
        include "views/dashboard/dashboard.php";
    }
}
