<?php
include 'src/header.php';

if(isset($_POST['update'])){
    $nama = $_POST['nama_admin'];
    $user = $_POST['username'];
    $pass = ($_POST['password']);

    $update = mysqli_query($koneksi, "UPDATE data_admin SET nama_admin = '$nama', username = '$user', password = '$pass' WHERE id_admin = '$_GET[id_admin]'");
    echo "<script>alert('Data Berhasil Diupdate');window.location='data_admin.php'</script>";
}
?>
        <div class="block-header">
            <h2>EDIT DATA ADMIN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="data_admin.php"><button type="button" class='btn btn-sm btn-primary shadow-sm'>Kembali</button></a>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <?php
                                    $id    = $_GET['id_admin'];
                                    $cari  = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin = '$id'");
                                    $hasil = mysqli_fetch_array($cari);
                                    ?>
                                    <form method="POST" action="">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_admin" value="<?= $hasil['nama_admin'] ?>" class="form-control" placeholder="Nama Admin" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" value="<?= $hasil['username'] ?>" class="form-control" placeholder="Username" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="password" class="form-control" placeholder="Password" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update" id="update" class='btn btn-sm btn-success shadow-sm'>Update</button>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'src/footer.php'; ?>

    