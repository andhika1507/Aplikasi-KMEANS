<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Aplikasi Data Mining Untuk Menentukan Strategi Marketing Bisnis Usaha DAV Net dengan KMeans</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<?php
  include 'koneksi.php';
  if(isset($_POST['login'])){
    session_start();
    $user  = $_POST['username'];
    $pass  = ($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE username = '$user' AND password = '$pass'");
    $cek   = mysqli_num_rows($query);
    $data  = mysqli_fetch_array($query);

    $query1 = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE username = '$user' AND password = '$pass'");
    $cek1   = mysqli_num_rows($query1);
    $data1  = mysqli_fetch_array($query1);
    

    if($cek > 0){
      $_SESSION['akses']    = 'Admin';
      $_SESSION['id']       = $data['id_admin'];
      $_SESSION['nama']     = $data['nama_admin'];
      echo "<script>alert('Selamat Datang');window.location='admin/index.php'</script>";
    }elseif($cek1 > 0){
      $_SESSION['akses']    = 'Pelanggan';
      $_SESSION['id']       = $data1['id_pelanggan'];
      $_SESSION['nama']     = $data1['nama_pelanggan'];
      echo "<script>alert('Selamat Datang');window.location='pelanggan/index.php'</script>";     
    }else{
      echo "<script>alert('Periksa Username dan Password Anda');window.location='index.php'</script>";
    }
  }
  ?>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">APLIKASI<b> K-MEANS</b></a>
            <small>Sistem Aplikasi Data Mining Untuk Menentukan Strategi Marketing Bisnis Usaha</small></a>
            <small>Studi Kasus : DAV NET CIBARUSAH</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="login" id="login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            Belum Punya Akun?
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="registrasi.php">Registrasi Disini</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>

</html>