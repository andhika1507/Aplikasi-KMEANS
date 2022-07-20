<?php
include 'src/header.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_admin'];
    $user = $_POST['username'];
    $pass = ($_POST['password']);

    $simpan = mysqli_query($koneksi, "INSERT INTO data_admin VALUES('','$nama','$user','$pass')");
    echo "<script>alert('Data Berhasil Disimpan');window.location='data_admin.php'</script>";
}
?>
        <div class="block-header">
            <h2>TAMBAH DATA ADMIN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="data_admin.php"><button type="button" class='btn btn-sm btn-primary shadow-sm'>Kembali</button></a>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form method="POST" action="">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_admin" class="form-control" placeholder="Nama Admin" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" class="form-control" placeholder="Username" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="password" class="form-control" placeholder="Password" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="simpan" id="simpan" class='btn btn-sm btn-success shadow-sm'>Simpan</button>
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

    