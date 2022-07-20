<?php include 'src/header.php'; 

?>
        <div class="block-header">
            <h2>DATA PELANGGAN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <form method="post" enctype="multipart/form-data" action="src/uploud_aksi.php">
                            <div class="form-group">
                                <label>Uploud Excel</label>
                                <input name="pelanggan" type="file" required="required"> 
                            </div>
                            <div class="form-group">
                                <button name="upload" id="upload" type="submit" class="btn btn-success" value="Import">Uploud</button>
                            </div>
                            
                        </form>
                        <a href="pelanggan_tambah.php"><button type="button" class='btn btn-sm btn-success shadow-sm'>Create</button></a>
                        <a href="pelanggan_cetak.php" target="_blank()"><button type="button" class='btn btn-sm btn-danger shadow-sm'>Print</button></a>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM data_pelanggan");
                                        while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?= $data['nama_pelanggan'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= md5($data['password']) ?></td>
                                            <td>
                                                <a href="pelanggan_view.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>"><button type="button" class='btn btn-sm btn-primary shadow-sm'>View Detail</button></a>
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

    