<?php  
include ("../../koneksi.php");
require ('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

// ================= WARNA =================
$pink      = array(255,95,162);
$pinkSoft  = array(255,228,240);
$pinkRow1  = array(255,245,250);
$pinkRow2  = array(255,232,244);

// ================= HEADER =================
$pdf->SetFont('Times','B',18);
$pdf->SetTextColor($pink[0],$pink[1],$pink[2]);
$pdf->Cell(0,10,'LAPORAN DATA PRODUK',0,1,'C');

$pdf->SetFont('Times','',11);
$pdf->SetTextColor(120,120,120);
$pdf->Cell(0,6,'Masna Beauty - Sistem Informasi Penjualan Kosmetik',0,1,'C');

$pdf->Ln(3);

// garis pink
$pdf->SetDrawColor($pink[0],$pink[1],$pink[2]);
$pdf->Line(15,32,195,32);

$pdf->Ln(8);

// ================= INFO =================
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,'Tanggal Cetak : '.date('d-m-Y'),0,1,'R');

$pdf->Ln(4);

// ================= HEADER TABEL =================
$pdf->SetFillColor($pink[0],$pink[1],$pink[2]);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Times','B',10);

$pdf->Cell(10,8,'NO',1,0,'C',true);
$pdf->Cell(30,8,'ID',1,0,'C',true);
$pdf->Cell(65,8,'NAMA PRODUK',1,0,'C',true);
$pdf->Cell(35,8,'KATEGORI',1,0,'C',true);
$pdf->Cell(25,8,'STOK',1,0,'C',true);
$pdf->Cell(25,8,'HARGA',1,1,'C',true);

// ================= ISI TABEL =================
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);

$no = 1;
$fill = false;

$sql = mysqli_query($koneksi,"
  SELECT p.*, k.nama_kategori
  FROM produk p
  JOIN kategori k ON p.id_kategori = k.id_kategori
  ORDER BY p.id_produk ASC
");

while($d = mysqli_fetch_array($sql)){

  if($fill){
    $pdf->SetFillColor($pinkRow1[0],$pinkRow1[1],$pinkRow1[2]);
  } else {
    $pdf->SetFillColor($pinkRow2[0],$pinkRow2[1],$pinkRow2[2]);
  }

  $pdf->Cell(10,8,$no++,1,0,'C',true);
  $pdf->Cell(30,8,$d['id_produk'],1,0,'C',true);
  $pdf->Cell(65,8,$d['nama_produk'],1,0,'L',true);
  $pdf->Cell(35,8,$d['nama_kategori'],1,0,'C',true);
  $pdf->Cell(25,8,$d['stok'],1,0,'C',true);
  $pdf->Cell(25,8,'Rp '.number_format($d['harga'],0,',','.'),1,1,'R',true);

  $fill = !$fill;
}



$pdf->Output();
?>
