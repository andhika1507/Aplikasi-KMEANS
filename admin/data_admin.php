<?php include 'src/header.php'; ?>
        <div class="block-header">
            <h2>DATA ADMIN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="admin_tambah.php"><button type="button" class='btn btn-sm btn-success shadow-sm'>Tambah</button></a>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Admin</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM data_admin");
                                        while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?= $data['nama_admin'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td><?= md5($data['password']) ?></td>
                                            <td>
                                                <a href="admin_edit.php?id_admin=<?php echo $data['id_admin']; ?>"><button type="button" class='btn btn-sm btn-primary shadow-sm'>Edit</button></a>
                                                <a href="admin_hapus.php?id_admin=<?php echo $data['id_admin']; ?>"><button type="button" class='btn btn-sm btn-danger shadow-sm'>Hapus</button></a>
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

    