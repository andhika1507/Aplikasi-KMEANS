<?php
include 'src/header.php';

if(isset($_POST['update'])){
    $nama = $_POST['nama_cluster'];
    $k1 = $_POST['k1'];
    $k2 = $_POST['k2'];
    $k3 = $_POST['k3'];
    $k4 = $_POST['k4'];
    $k5 = $_POST['k5'];


    $update = mysqli_query($koneksi, "UPDATE data_cluster SET nama_cluster = '$nama', k1 = '$k1', k2 = '$k2', k3 = '$k3', k4 = '$k4', k5 = '$k5' WHERE id_cluster = '$_GET[id_cluster]'");
    echo "<script>alert('Data Berhasil Diupdate');window.location='data_cluster.php'</script>";
}
?>
        <div class="block-header">
            <h2>EDIT DATA CLUSTER</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="data_cluster.php"><button type="button" class='btn btn-sm btn-primary shadow-sm'>Kembali</button></a>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <?php
                                    $id    = $_GET['id_cluster'];
                                    $cari  = mysqli_query($koneksi, "SELECT * FROM data_cluster WHERE id_cluster = '$id'");
                                    $hasil = mysqli_fetch_array($cari);
                                    ?>
                                    <form method="POST" action="">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_cluster" value="<?= $hasil['nama_cluster'] ?>" class="form-control" placeholder="Nama Cluster" required/>
                                            </div>
                                        </div>
                                        <?php
                                        $namaK = array();
                                        $krit = mysqli_query($koneksi, "SELECT * FROM data_kriteria");
                                        while($dKrit = mysqli_fetch_array($krit)){
                                            array_push($namaK, $dKrit['nama_kriteria']);
                                        }
                                        ?>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><?= $namaK[0] ?></label>
                                                <input type="text" name="k1" value="<?= $hasil['k1'] ?>" class="form-control" placeholder="Input <?= $namaK[0] ?>" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><?= $namaK[1] ?></label>
                                                <input type="text" name="k2" value="<?= $hasil['k2'] ?>" class="form-control" placeholder="Input <?= $namaK[1] ?>" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><?= $namaK[2] ?></label>
                                                <input type="text" name="k3" value="<?= $hasil['k3'] ?>" class="form-control" placeholder="Input <?= $namaK[2] ?>" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><?= $namaK[3] ?></label>
                                                <input type="text" name="k4" value="<?= $hasil['k4'] ?>" class="form-control" placeholder="Input <?= $namaK[3] ?>" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label><?= $namaK[4] ?></label>
                                                <input type="text" name="k5" value="<?= $hasil['k5'] ?>" class="form-control" placeholder="Input <?= $namaK[4] ?>" required/>
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

    