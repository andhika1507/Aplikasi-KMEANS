<?php
include 'src/header.php'; 
?>
        <div class="block-header">
            <h2>DETAIL HASIL PERHITUNGAN</h2>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                      <a href="data_hasil.php"><button type="button" class='btn btn-sm btn-danger shadow-sm'>Kembali</button></a>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                      <tr>
                                        <th colspan="6"><h2 align="center">DATA NILAI</h2></th>
                                      </tr>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <?php
                                            $QKrit = mysqli_query($koneksi, "SELECT nama_kriteria FROM data_kriteria");
                                            while($DKrit = mysqli_fetch_array($QKrit)){
                                                echo "<th>$DKrit[nama_kriteria]</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_nilai.id_pelanggan = data_pelanggan.id_pelanggan");
                                        while($data = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <th><?= $data['nama_pelanggan'] ?></th>
                                            <td><?= $data['k1'] ?></td>
                                            <td><?= $data['k2'] ?></td>
                                            <td><?= $data['k3'] ?></td>
                                            <td><?= $data['k4'] ?></td>
                                            <td><?= $data['k5'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <?php
                                $query_total_data = mysqli_query($koneksi, "SELECT COUNT(*) as SIZE FROM data_nilai");
                                $n_iterasi = 100;
                                $n_data = mysqli_fetch_array($query_total_data)['SIZE'];
                                $n_cluster = 2;
                                $old_iterasi = array();
                                                    
                                for ($i=0; $i < $n_iterasi; $i++) { 
                                ?>
                                <hr>
                                <h1><button type="submit" class="btn btn-primary"> Iterasi Perhitungan Ke <?= $i+1 ?> </button></h1>
                                <hr>
                                <div style="margin: 2px 2px;">
                                <?php
                                $centroid = array();

                                if ($i == 0) {
                                  $query_total_data = mysqli_query($koneksi, "SELECT * FROM data_cluster");
                                  $index_centroid = 1;
                                ?>
                                <div class="page-header">
                                  <small>
                                    Centroid Awal 
                                  </small>
                                </div>
                                <table id="data" class="table table-bordered table-striped table-scalable">
                                <?php
                                $cluster_= 1;
                                while ($row = mysqli_fetch_array($query_total_data)) {
                                //Centroid awal
                                  if ($index_centroid == 1 or $index_centroid == 2) {
                                    array_push($centroid, $row);
                                  }
                                ?>
                                <tr>
                                  <th><?php echo 'Cluster'.$cluster_++; ?></th>
                                  <th><?php echo $row['k1'] ?></th>
                                  <th><?php echo $row['k2'] ?></th>
                                  <th><?php echo $row['k3'] ?></th>
                                  <th><?php echo $row['k4'] ?></th>
                                  <th><?php echo $row['k5'] ?></th>
                                </tr>
                                <?php
                                  $index_centroid++;
                                }
                                ?>
                                </table>
                                <hr>
                                <?php
                                }else{ 
                                ?>
                                <div class="page-header">
                                  <small>
                                    Centroid Baru 
                                  </small>
                                </div>
                                <table id="data" class="table table-bordered table-striped table-scalable">
                                <?php
                                //Menghitung centroid baru
                                for ($j=0; $j < $n_cluster; $j++) {
                                  $query_centroid = "SELECT AVG(k1) as 'k1', AVG(k2) as 'k2', AVG(k3) as 'k3',AVG(k4) as 'k4', AVG(k5) as 'k5' FROM data_nilai WHERE Cluster = 'Cluster-".($j+1)."'";
                                  $resultat_centroid = mysqli_query($koneksi, $query_centroid);
                                  while ($row_centroid = mysqli_fetch_array($resultat_centroid)) {
                                    array_push($centroid, $row_centroid);
                                ?>
                                  <tr>
                                    <th><?php echo 'Cluster'.($j+1); ?></th>
                                    <th><?php echo $row_centroid['k1'] ?></th>
                                    <th><?php echo $row_centroid['k2'] ?></th>
                                    <th><?php echo $row_centroid['k3'] ?></th>
                                    <th><?php echo $row_centroid['k4'] ?></th>
                                    <th><?php echo $row_centroid['k5'] ?></th>
                                  </tr>
                                <?php
                                }  
                                }
                                ?>
                                </table>
                                <?php
                                }
                                $query = "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_pelanggan.id_pelanggan = data_nilai.id_pelanggan";
                                $resultat = mysqli_query($koneksi, $query);
                                ?>

                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="'#tabel-data'">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-0">ID</th>
                                            <th scope="col" class="border-0">Nama Pelanggan</th>
                                            <th scope="col" class="border-0">Cluster 1</th>
                                            <th scope="col" class="border-0">Cluster 2</th>
                                            <th scope="col" class="border-0">Cluster</th>
                                            <th scope="col" class="border-0">Ket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            while ($row = mysqli_fetch_array($resultat)) {
                                              $temp_cluster = array();
                                              for ($j=0; $j < $n_cluster; $j++) {
                                                $warga_cluster = sqrt(pow(($row['k1']-$centroid[$j]['k1']), 2)+pow(($row['k2']-$centroid[$j]['k2']), 2)+pow(($row['k3']-$centroid[$j]['k3']), 2)+pow(($row['k4']-$centroid[$j]['k4']), 2)+pow(($row['k5']-$centroid[$j]['k5']), 2));
                                                $temp_cluster['Cluster-'.($j+1)] = $warga_cluster;
                                              }
                                              $my_cluster = array($temp_cluster['Cluster-1'], $temp_cluster['Cluster-2']);
                                              sort($my_cluster);
                                              $cluster = '';
                                              foreach ($temp_cluster as $key => $value) {
                                                if ($value == $my_cluster[0]) {
                                                  $cluster = $key;
                                                  break;
                                                }
                                              }

                                            if($temp_cluster['Cluster-1'] < $temp_cluster['Cluster-2']){
                                              $ket = "Masuk ke Cluster 1 Karena Nilai Hasil Cluster Lebih Kecil dari Cluster 2";
                                            }else{
                                              $ket = "Masuk ke Cluster 2 Karena Nilai Hasil Cluster Lebih Kecil dari Cluster 1";
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_pelanggan'] ?></td>
                                            <td><?php echo round($temp_cluster['Cluster-1'],4) ?></td>
                                            <td><?php echo round($temp_cluster['Cluster-2'],4) ?></td>
                                            <?php
                                            if($cluster == "Cluster-1"){
                                            ?>
                                            <td><button class="btn btn-success"><?php echo $cluster ?></button></td>
                                            <?php
                                            }elseif($cluster == "Cluster-2"){
                                            ?>
                                            <td><button class="btn btn-danger"><?php echo $cluster ?></button></td>
                                            <?php } ?>
                                            <td><?php echo $ket ?></td>
                                        </tr>
                                    </tbody>
                                        <?php
                                            $id =  $row['id_nilai'];
                                            $query_update = mysqli_query($koneksi, "UPDATE data_nilai SET Cluster = '$cluster' WHERE id_nilai = $id");
                                            }
                                        ?>
                                    
                                </table>
                                <?php
                                  if ($i <= 0) {
                                    for ($k=0; $k < $n_cluster; $k++) { 
                                      $query_old_iterasi = "SELECT id_nilai, Cluster FROM data_nilai WHERE Cluster = 'Cluster-".($k+1)."'";
                                      $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi); 
                                      while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                        $old_iterasi[$row['id_nilai']] = $row['Cluster'];
                                      }
                                    }
                                  }else{
                                    $check = true;
                                    for ($k=0; $k < $n_cluster; $k++) { 
                                      $query_old_iterasi = "SELECT id_nilai, Cluster FROM data_nilai WHERE Cluster = 'Cluster-".($k+1)."'";
                                      $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi);
                                      while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                        if($old_iterasi[$row['id_nilai']] != $row['Cluster']){
                                          $check = false;
                                          $k = $k + $n_cluster+1;
                                          break;
                                        }
                                      }
                                    }

                                    if ($check == true) {
                                      $i = $n_iterasi+1;
                                      echo "<h2>Karena Hasil Dari Pengelompokkan Iterasi sudah Sama maka Iterasi Di Hentikan</h2>";
                                      echo "<hr>";
                                    }else{
                                      $old_iterasi = array();
                                      for ($k=0; $k < $n_cluster; $k++) { 
                                        $query_old_iterasi = "SELECT id_nilai, Cluster FROM data_nilai WHERE Cluster = 'Cluster-".($k+1)."'";
                                        $resultat_old_iterasi = mysqli_query($koneksi, $query_old_iterasi);
                                        while ($row = mysqli_fetch_array($resultat_old_iterasi)) {
                                          $old_iterasi[$row['id_nilai']] = $row['Cluster'];
                                        }
                                      }
                                      echo "<h2>Karena Hasil Dari Pengelompokkan Iterasi masih Berbeda maka Iterasi Di teruskan</h2>";
                                    }
                                }
                              ?>
                              </div>
                              <?php } ?>
                            </div>
                            <hr>
                            <h2 align="center">HASIL PENGELOMPOKKAN PELANGGAN</h2>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Nama Pelanggan</th>
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
                                        $query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_pelanggan.id_pelanggan = data_nilai.id_pelanggan");
                                        while($data = mysqli_fetch_array($query)){
                                          if($data['Cluster'] == "Cluster-1"){
                                            $ket = "<button class='btn btn-success'>$namaC[0]</button>";
                                          }elseif($data['Cluster'] == "Cluster-2"){
                                            $ket = "<button class='btn btn-primary'>$namaC[1]</button>";
                                          }
                                        ?>
                                        <tr align="center">
                                          <td><?= $data['id_pelanggan'] ?></td>
                                          <td><?= $data['nama_pelanggan'] ?></td>
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

    