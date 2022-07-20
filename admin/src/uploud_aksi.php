<?php
if(isset($_POST['upload'])){
    // menghubungkan dengan library excel reader
    include "../../assets/excel_reader2.php";
    include "../../koneksi.php";

    // upload file xls
    $target = basename($_FILES['pelanggan']['name']) ;
    move_uploaded_file($_FILES['pelanggan']['tmp_name'], $target);
     
    // beri permisi agar file xls dapat di baca
    chmod($_FILES['pelanggan']['name'],0777);
     
    // mengambil isi file xls
    $data = new Spreadsheet_Excel_Reader($_FILES['pelanggan']['name'],false);
    // menghitung jumlah baris data yang ada
    $jumlah_baris = $data->rowcount($sheet_index=0);
     
    // jumlah default data yang berhasil di import
    $berhasil = 0;
    for ($i=2; $i<=$jumlah_baris; $i++){
     
        // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
        $nama      = $data->val($i, 2);
        $user      = $data->val($i, 3);
        $pass      = $data->val($i, 4);
        $umur      = $data->val($i, 5);
        $tmp_lahir = $data->val($i, 6);
        $tgl_lahir = $data->val($i, 7);
        $jk        = $data->val($i, 8);
        $alamat    = $data->val($i, 9);
        $no_hp     = $data->val($i, 10);

        $pass1     = md5($pass);
     
        if($nama != "" && $user != "" && $pass1 != "" && $umur != "" && $tmp_lahir != "" && $tgl_lahir != "" && $jk != "" && $alamat != "" && $no_hp != ""){
            // input data ke database (table data_pegawai)
            mysqli_query($koneksi,"INSERT into data_pelanggan values('','$nama','$user','$pass1','$umur','$tmp_lahir','$tgl_lahir','$jk','$alamat','$no_hp')");
            $berhasil++;
        }
    }
     
    // hapus kembali file .xls yang di upload tadi
    unlink($_FILES['pelanggan']['name']);
     
    // alihkan halaman ke index.php
    echo "<script>alert('Data Berhasil Diuploud');window.location='../data_pelanggan.php'</script>";
}
?>