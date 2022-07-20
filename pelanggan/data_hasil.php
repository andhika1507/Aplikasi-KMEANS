<?php include 'src/header.php'; ?>
        <div class="block-header">
            <h2>DATA HASIL PENGELOMPOKKAN PELANGGAN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
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
                                        
                                        $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_nilai.id_pelanggan = data_pelanggan.id_pelanggan AND data_nilai.id_pelanggan = $_SESSION[id]");

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

    