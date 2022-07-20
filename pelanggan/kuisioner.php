<?php
include 'src/header.php';

if(isset($_POST['update'])){
    $id   = $_SESSION['id'];
    $k1   = $_POST['k1'];
    $k2   = $_POST['k2'];
    $k3   = $_POST['k3'];
    $k4   = $_POST['k4'];
    $k5   = $_POST['k5'];

    $query = mysqli_query($koneksi, "SELECT * FROM data_nilai WHERE id_pelanggan = '$id'");
    $cek   = mysqli_num_rows($query);

    if($cek > 0){
        $update = mysqli_query($koneksi, "UPDATE data_nilai SET k1 = '$k1', k2 = '$k2', k3 = '$k3', k4 = '$k4', k5 = '$k5' WHERE id_pelanggan = '$id'");
    }else{
        $simpan = mysqli_query($koneksi, "INSERT INTO data_nilai VALUES('','$id','$k1','$k2','$k3','$k4','$k5')");
    }

    echo "<script>alert('Data Berhasil Disimpan');window.location='data_nilai.php'</script>";
}

?>
        <div class="block-header">
            <h2>INPUT KUISIONER</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form method="POST" action="">
                                       <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $cari = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE id_pelanggan = '$_SESSION[id]'");
                                                $nama = mysqli_fetch_array($cari);
                                                ?>
                                                <input type="text" name="nama_pelanggan" value="<?= $nama['nama_pelanggan'] ?>" class="form-control" readOnly/>
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
                                                <select class="form-control" name="k1">
                                                    <option value="">-- <?= $namaK[0] ?> --</option>
                                                    <option value="5">Sangat Aktif</option>
                                                    <option value="4">Cukup Aktif</option>
                                                    <option value="3">Aktif</option>
                                                    <option value="2">Kurang Aktif</option>
                                                    <option value="1">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="k2">
                                                    <option value="">-- <?= $namaK[1] ?> --</option>
                                                    <option value="5">Sangat Aktif</option>
                                                    <option value="4">Cukup Aktif</option>
                                                    <option value="3">Aktif</option>
                                                    <option value="2">Kurang Aktif</option>
                                                    <option value="1">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="k3">
                                                    <option value="">-- <?= $namaK[2] ?> --</option>
                                                    <option value="5">Sangat Aktif</option>
                                                    <option value="4">Cukup Aktif</option>
                                                    <option value="3">Aktif</option>
                                                    <option value="2">Kurang Aktif</option>
                                                    <option value="1">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="k4">
                                                    <option value="">-- <?= $namaK[3] ?> --</option>
                                                    <option value="5">Sangat Aktif</option>
                                                    <option value="4">Cukup Aktif</option>
                                                    <option value="3">Aktif</option>
                                                    <option value="2">Kurang Aktif</option>
                                                    <option value="1">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="k5">
                                                    <option value="">-- <?= $namaK[4] ?> --</option>
                                                    <option value="5">Sangat Aktif</option>
                                                    <option value="4">Cukup Aktif</option>
                                                    <option value="3">Aktif</option>
                                                    <option value="2">Kurang Aktif</option>
                                                    <option value="1">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>                    
                                        <div class="form-group">
                                            <button type="submit" name="update" id="update" class='btn btn-sm btn-success shadow-sm'>Simpan</button>
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

    