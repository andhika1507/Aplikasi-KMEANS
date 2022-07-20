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
  if(isset($_POST['regis'])){
    $nama = $_POST['nama_pelanggan'];
    $user = $_POST['username'];
    $pass = ($_POST['password']);
    $usia = $_POST['usia'];
    $tmpL = $_POST['tempat_lahir'];
    $tglL = $_POST['tanggal_lahir'];
    $jk   = $_POST['jenis_kelamin'];
    $almt = $_POST['alamat_lengkap'];
    $nohp = $_POST['no_hp'];

    $simpan = mysqli_query($koneksi, "INSERT INTO data_pelanggan VALUES('','$nama','$user','$pass','$usia','$tmpL','$tglL','$jk','$almt','$nohp')");
    echo "<script>alert('Data Berhasil Disimpan');window.location='index.php'</script>";
  }
  ?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Metode<b>KMEANS</b></a>
            <small>Sistem Aplikasi Data Mining Untuk Menentukan Strategi Marketing Bisnis Usaha DAV Net</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="7" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="usia" placeholder="Usia" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <select class="form-control" name="jenis_kelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>                               
                            </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" required></textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="no_hp" placeholder="No HP" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" name="regis" type="submit">SIGN UP</button>
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