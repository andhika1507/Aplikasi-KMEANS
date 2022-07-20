<?php
include 'src/header.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_pelanggan'];
    $user = $_POST['username'];
    $pass = ($_POST['password']);
    $usia = $_POST['usia'];
    $tmpL = $_POST['tempat_lahir'];
    $tglL = $_POST['tanggal_lahir'];
    $jk   = $_POST['jenis_kelamin'];
    $almt = $_POST['alamat_lengkap'];
    $nohp = $_POST['no_hp'];

    $simpan = mysqli_query($koneksi, "INSERT INTO data_pelanggan VALUES('','$nama','$user','$pass','$usia','$tmpL','$tglL','$jk','$almt','$nohp')");
    echo "<script>alert('Data Berhasil Disimpan');window.location='data_pelanggan.php'</script>";
}
?>
        <div class="block-header">
            <h2>TAMBAH DATA PELANGGAN</h2>
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
                                                <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" placeholder="Usename" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="password" placeholder="Password" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="usia" placeholder="Usia" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" name="tanggal_lahir" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" name="alamat_lengkap" placeholder="Alamat Lengkap" required></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" placeholder="No HP" class="form-control" required/>
                                            </div>
                                        </div>                                     
                                        <div class="form-group">
                                            <button type="submit" name="simpan" id="simpan" class='btn btn-sm btn-success shadow-sm'>Simpan</button>
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

    