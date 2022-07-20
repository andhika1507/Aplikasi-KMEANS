<?php

ob_start();
require('../assets/pdf/fpdf.php');
include '../koneksi.php';

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Image('../assets/dav.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'LAPORAN DATA HASIL PENGELOMPOKKAN PELANGGAN DAV NET',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 085x-xxxx-xxxx',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Indonesia',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Source Code by -------',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Hasil Pengelompokkan '.$_GET['cluster'],0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1.5, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama', 1, 0, 'C');
$krit = mysqli_query($koneksi, "SELECT * FROM data_kriteria");
while($dKrit = mysqli_fetch_array($krit)){
  $pdf->Cell(3, 0.8, $dKrit['nama_kriteria'], 1, 0, 'C');
}
$pdf->Cell(4, 0.8, 'Cluster', 1, 0, 'C');
$pdf->ln();

$no=1;

$namaC = array();
$Nclus = mysqli_query($koneksi, "SELECT nama_cluster FROM data_cluster");
while($Dclus = mysqli_fetch_array($Nclus)){
  array_push($namaC, $Dclus['nama_cluster']);
}

$query = mysqli_query($koneksi, "SELECT data_nilai.*, data_pelanggan.* FROM data_nilai, data_pelanggan WHERE data_nilai.id_pelanggan = data_pelanggan.id_pelanggan AND Cluster = '$_GET[cluster]'");
while($data=mysqli_fetch_array($query)){
  if($data['Cluster'] == "Cluster-1"){
    $ket = $namaC[0];
  }elseif($data['Cluster'] == "Cluster-2"){
    $ket = $namaC[1];
  }

  $pdf->Cell(1.5, 0.8, $no , 1, 0, 'C');
  $pdf->Cell(5, 0.8, $data['nama_pelanggan'],1, 0, 'C');
  $pdf->Cell(3, 0.8, $data['k1'], 1, 0,'C');
  $pdf->Cell(3, 0.8, $data['k2'], 1, 0,'C');
  $pdf->Cell(3, 0.8, $data['k3'], 1, 0,'C');
  $pdf->Cell(3, 0.8, $data['k4'], 1, 0,'C');
  $pdf->Cell(3, 0.8, $data['k5'], 1, 0,'C');
  $pdf->Cell(4, 0.8, $ket, 1, 0,'C');
  $pdf->ln();
  $no++;
}
$pdf->Output("laporan_data_hasil.pdf","I");

?>

