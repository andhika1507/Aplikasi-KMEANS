<?php include 'src/header.php'; ?>
        <div class="block-header">
            <h2>DATA KRITERIA</h2>
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
                                            <th>Nama Cluster</th>
                                            <?php
                                            $QKrit = mysqli_query($koneksi, "SELECT nama_kriteria FROM data_kriteria");
                                            while($DKrit = mysqli_fetch_array($QKrit)){
                                                echo "<th>$DKrit[nama_kriteria]</th>";
                                            }
                                            ?>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                                        while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <th><?= $data['nama_cluster'] ?></th>
                                            <td><?= $data['k1'] ?></td>
                                            <td><?= $data['k2'] ?></td>
                                            <td><?= $data['k3'] ?></td>
                                            <td><?= $data['k4'] ?></td>
                                            <td><?= $data['k5'] ?></td>
                                            <td>
                                                <a href="cluster_edit.php?id_cluster=<?php echo $data['id_cluster']; ?>"><button type="button" class='btn btn-sm btn-primary shadow-sm'>Edit</button></a>
                                            </td>
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

    