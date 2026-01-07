<?php
include ("../../koneksi.php");
require('fpdf/fpdf.php');

$tgl_awal  = $_POST['txtTgl_awal'];
$tgl_akhir = $_POST['txtTgl_akhir'];

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

/* ================= HEADER ================= */
$pdf->SetFont('Times','B',16);
$pdf->SetTextColor(255,95,162); // pink
$pdf->Cell(0,10,'LAPORAN TRANSAKSI',0,1,'C');

$pdf->SetFont('Times','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,6,'Masna Beauty - Sistem Informasi Penjualan',0,1,'C');

$pdf->Ln(4);
$pdf->SetDrawColor(255,95,162);
$pdf->Line(10,30,200,30);
$pdf->Ln(8);

/* ================= INFO ================= */
$pdf->SetFont('Times','',10);
$pdf->Cell(0,6,'Periode : '.$tgl_awal.' s/d '.$tgl_akhir,0,1,'L');
$pdf->Ln(4);

/* ================= HEADER TABEL ================= */
$pdf->SetFillColor(255,182,193); // pink pastel
$pdf->SetFont('Times','B',10);

$pdf->Cell(10,8,'N0',1,0,'C',true);
$pdf->Cell(30,8,'ID TRANSAKSI',1,0,'C',true);
$pdf->Cell(30,8,'TANGGAL',1,0,'C',true);
$pdf->Cell(25,8,'CUSTOMER',1,0,'C',true);
$pdf->Cell(25,8,'PRODUK',1,0,'C',true);
$pdf->Cell(15,8,'JUMLAH',1,0,'C',true);
$pdf->Cell(30,8,'SUBTOTAL',1,1,'C',true);

/* ================= ISI ================= */
$pdf->SetFont('Times','',10);
$no = 1;
$fill = false;

$sql = mysqli_query($koneksi,"
  SELECT 
    t.id_transaksi,
    t.tanggal_transaksi,
    t.id_cust,
    d.id_produk,
    d.jumlah,
    d.subtotal
  FROM transaksi t
  JOIN transaksi_detail d ON t.id_transaksi = d.id_transaksi
  WHERE DATE(t.tanggal_transaksi) 
        BETWEEN '$tgl_awal' AND '$tgl_akhir'
  ORDER BY t.id_transaksi ASC
");

if(!$sql){
  die('Query Error: '.mysqli_error($koneksi));
}

while($d = mysqli_fetch_array($sql)){

  if($fill){
    $pdf->SetFillColor(255,240,246);
  }else{
    $pdf->SetFillColor(255,228,235);
  }

  $pdf->Cell(10,8,$no++,1,0,'C',true);
  $pdf->Cell(30,8,$d['id_transaksi'],1,0,'C',true);
  $pdf->Cell(30,8,date('d-m-Y',strtotime($d['tanggal_transaksi'])),1,0,'C',true);
  $pdf->Cell(25,8,$d['id_cust'],1,0,'C',true);
  $pdf->Cell(25,8,$d['id_produk'],1,0,'C',true);
  $pdf->Cell(15,8,$d['jumlah'],1,0,'C',true);
  $pdf->Cell(30,8,'Rp '.number_format($d['subtotal'],0,',','.'),1,1,'R',true);

  $fill = !$fill;
}


$pdf->Output();
