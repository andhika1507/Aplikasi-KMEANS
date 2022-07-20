<?php
include 'src/header.php';

if(isset($_POST['update'])){
    $nama = $_POST['nama_pelanggan'];
    $user = $_POST['username'];
    $pass = ($_POST['password']);
    $usia = $_POST['usia'];
    $tmpL = $_POST['tempat_lahir'];
    $tglL = $_POST['tanggal_lahir'];
    $jk   = $_POST['jenis_kelamin'];
    $almt = $_POST['alamat_lengkap'];
    $nohp = $_POST['no_hp'];

    $update = mysqli_query($koneksi, "UPDATE data_pelanggan SET nama_pelanggan = '$nama', username = '$user', password = '$pass', usia = '$usia', tempat_lahir = '$tmpL', tanggal_lahir = '$tglL', jenis_kelamin = '$jk', alamat_lengkap = '$almt', no_hp = '$nohp' WHERE id_pelanggan = '$_GET[id_pelanggan]'");
    echo "<script>alert('Data Berhasil Diupdate');window.location='data_pelanggan.php'</script>";
}

?>
        <div class="block-header">
            <h2>DETAIL DATA PELANGGAN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <?php
                                    $id    = $_GET['id_pelanggan'];
                                    $cari  = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE id_pelanggan = '$id'");
                                    $hasil = mysqli_fetch_array($cari);
                                    ?>
                                    <form method="POST" action="">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_pelanggan" value="<?= $hasil['nama_pelanggan'] ?>" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" value="<?= $hasil['username'] ?>" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="password" placeholder="Password" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="usia" placeholder="Usia" value="<?= $hasil['usia'] ?>" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $hasil['tempat_lahir'] ?>" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $hasil['tanggal_lahir'] ?>" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <option value="Pria" <?php if($hasil['jenis_kelamin'] == "Pria"){ echo "selected"; } ?> >Pria</option>
                                                    <option value="Wanita" <?php if($hasil['jenis_kelamin'] == "Wanita"){ echo "selected"; } ?> >Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap"><?= $hasil['alamat_lengkap'] ?></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" placeholder="No HP" value="<?= $hasil['no_hp'] ?>" class="form-control" required/>
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

    