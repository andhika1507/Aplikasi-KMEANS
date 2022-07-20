<?php include 'src/header.php'; 

?>
        <div class="block-header">
            <h2>DATA PELANGGAN</h2>
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
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM data_pelanggan WHERE id_pelanggan = '$_SESSION[id]'");
                                        while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?= $data['nama_pelanggan'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= md5($data['password']) ?></td>
                                            <td>
                                                <a href="pelanggan_view.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>"><button type="button" class='btn btn-sm btn-primary shadow-sm'>View Detail</button></a>
                                                <a href="pelanggan_edit.php?id_pelanggan=<?php echo $data['id_pelanggan']; ?>"><button type="button" class='btn btn-sm btn-success shadow-sm'>Edit</button></a>
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

    