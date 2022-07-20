<?php
include '../koneksi.php';

$hapus = mysqli_query($koneksi, "DELETE FROM data_admin WHERE id_admin = '$_GET[id_admin]'");
echo "<script>alert('Data Berhasil Dihapus');window.location='data_admin.php'</script>";
?>