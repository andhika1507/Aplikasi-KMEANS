<?php
session_start();
  if($_SESSION['akses']==""){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu!');window.location='../index.php'</script>";
    $id = $_SESSION['id'];
}
include '../koneksi.php';
$ambil = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = $_SESSION[id]");
$nama  = mysqli_fetch_array($ambil);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Aplikasi Data Mining Untuk Menentukan Strategi Marketing Bisnis Usaha DAV Net dengan KMeans</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../assets/material.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">APLIKASI K-MEANS</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                    <div class="email"><?= $nama['nama_admin'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="data_admin.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_admin.php">
                            <i class="material-icons">people</i>
                            <span>DATA ADMIN</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_kriteria.php">
                            <i class="material-icons">layers</i>
                            <span>KRITERIA</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_cluster.php">
                            <i class="material-icons">apps</i>
                            <span>DATA CLUSTER</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_pelanggan.php">
                            <i class="material-icons">people</i>
                            <span>DATA PELANGGAN</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_nilai.php">
                            <i class="material-icons">apps</i>
                            <span>DATA KUISIONER</span>
                        </a>
                    </li>
                    <li>
                        <a href="data_hasil.php">
                            <i class="material-icons">view_list</i>
                            <span>HASIL</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="index.php">APLIKASI K-MEANS</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">DATA ADMIN</div>
                            <?php 
                            $query = mysqli_query($koneksi, "SELECT count(id_admin) AS admin FROM data_admin");
                            $data  = mysqli_fetch_array($query);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?= $data['admin'] ?>" data-speed="5" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">PELANGGAN</div>
                            <?php 
                            $query = mysqli_query($koneksi, "SELECT count(id_pelanggan) AS pel FROM data_pelanggan");
                            $data  = mysqli_fetch_array($query);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?= $data['pel'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">backspace</i>
                        </div>
                        <div class="content">
                            <div class="text">POTENSIAL</div>
                            <?php 
                            $query = mysqli_query($koneksi, "SELECT count(id_nilai) AS c1 FROM data_nilai WHERE Cluster = 'Cluster-1'");
                            $data  = mysqli_fetch_array($query);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?= $data['c1'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">backspace</i>
                        </div>
                        <div class="content">
                            <div class="text">TIDAK POTENSIAL</div>
                            <?php 
                            $query = mysqli_query($koneksi, "SELECT count(id_nilai) AS c2 FROM data_nilai WHERE Cluster = 'Cluster-2'");
                            $data  = mysqli_fetch_array($query);
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?= $data['c2'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->