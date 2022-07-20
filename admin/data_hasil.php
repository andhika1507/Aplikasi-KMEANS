<?php include 'src/header.php'; ?>
        <div class="block-header">
            <h2>DATA HASIL PENGELOMPOKKAN PELANGGAN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <form method="POST" accept="">
                            <select name="cluster" required>
                                <option value="">-- Pilih Cluster --</option>
                                <?php
                                $kel = mysqli_query($koneksi, "SELECT Cluster FROM data_nilai GROUP BY Cluster");
                                while($dk = mysqli_fetch_array($kel)){
                                    echo "<option value='$dk[Cluster]'>$dk[Cluster]</option>";
                                }
                                ?>                               
                            </select>
                            <button type="submit" class='btn btn-sm btn-primary shadow-sm' name="tampil">Tampil</button>
                            <?php if(isset($_POST['tampil'])){ ?>
                            <a href="cetak_cluster.php?cluster=<?= $_POST['cluster'] ?>" target="_blank()"><button type="button" class='btn btn-sm btn-danger shadow-sm'>Cetak Cluster</button></a>
                            <?php } ?>
                        </form>
                        <hr>
                        <a href="detail_hasil.php"><button type="button" class='btn btn-sm btn-success shadow-sm'>Detail Hasil</button></a>
                        <a href="hasil_cetak.php" target="_blank()"><button type="button" class='btn btn-sm btn-danger shadow-sm'>Print</button></a>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <?php
                                            $QKrit = mysqli_query($koneksi, "SELECT nama_kriteria FROM data_kriteria");
                                            while($DKrit = mysqli_fetch_array($QKrit)){
                                                echo "<th>$DKrit[nama_kriteria]</th>";
                                            }
                                            ?>
                                            <th>Cluster</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $namaC = array();
                                        $Nclus = mysqli_query($koneksi, "SELECT nama_cluster FROM data_cluster");
                                        while($Dclus = mysqli_fetch_array($Nclus)){
                                          array_push($namaC, $Dclus['nama_cluster']);
                                        }
                                        if(isset($_POST['tampil'])){
                                            $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_nilai.id_pelanggan = data_pelanggan.id_pelanggan AND data_nilai.Cluster = '$_POST[cluster]'");
                                        }else{
                                            $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_nilai.id_pelanggan = data_pelanggan.id_pelanggan");
                                        }

                                        while($data = mysqli_fetch_array($query)){
                                            if($data['Cluster'] == "Cluster-1"){
                                                $ket = "<button class='btn btn-success'>$namaC[0]</button>";
                                            }elseif($data['Cluster'] == "Cluster-2"){
                                                $ket = "<button class='btn btn-primary'>$namaC[1]</button>";
                                            }
                                        ?>
                                        <tr>
                                            <th><?= $data['nama_pelanggan'] ?></th>
                                            <td><?= $data['k1'] ?></td>
                                            <td><?= $data['k2'] ?></td>
                                            <td><?= $data['k3'] ?></td>
                                            <td><?= $data['k4'] ?></td>
                                            <td><?= $data['k5'] ?></td>
                                            <td><?= $ket ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<?php include 'src/footer.php'; ?>

    