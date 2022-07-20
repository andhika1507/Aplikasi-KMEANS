<?php
include 'src/header.php';
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
                                    <form method="POST" action="data_pelanggan.php">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_pelanggan" value="<?= $hasil['nama_pelanggan'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" value="<?= $hasil['username'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="password" value="<?= $hasil['password'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="usia" value="<?= $hasil['usia'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tempat_lahir" value="<?= $hasil['tempat_lahir'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tanggal_lahir" value="<?= $hasil['tanggal_lahir'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jenis_kelamin" value="<?= $hasil['jenis_kelamin'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="alamat_lengkap" value="<?= $hasil['alamat_lengkap'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" value="<?= $hasil['no_hp'] ?>" class="form-control" readonly/>
                                            </div>
                                        </div>                                     
                                        <div class="form-group">
                                            <button type="submit" name="update" id="update" class='btn btn-sm btn-success shadow-sm'>Kembali</button>
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

    