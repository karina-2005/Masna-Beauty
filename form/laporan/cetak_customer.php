<?php
include ("../../koneksi.php");
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

/* WARNA PINK */
$pinkHeader = [255,95,162];
$pinkSoft1  = [255,230,240];
$pinkSoft2  = [255,245,250];

/* JUDUL */
$pdf->SetFont('Times','B',16);
$pdf->SetTextColor(255,95,162);
$pdf->Cell(0,10,'LAPORAN DATA CUSTOMER',0,1,'C');

$pdf->SetFont('Times','',11);
$pdf->SetTextColor(100);
$pdf->Cell(0,6,'Masna Beauty - Sistem Informasi Penjualan Kosmetik',0,1,'C');

$pdf->Ln(5);

/* GARIS */
$pdf->SetDrawColor(255,180,210);
$pdf->Line(15,35,195,35);
$pdf->Ln(8);

/* TANGGAL */
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0);
$pdf->Cell(0,6,'Tanggal Cetak : '.date('d-m-Y'),0,1,'R');
$pdf->Ln(3);

/* HEADER TABEL */
$pdf->SetFillColor(...$pinkHeader);
$pdf->SetTextColor(255);
$pdf->SetFont('Times','B',10);

$pdf->Cell(10,8,'NO',1,0,'C',true);
$pdf->Cell(30,8,'ID',1,0,'C',true);
$pdf->Cell(50,8,'NAMA CUSTOMER',1,0,'C',true);
$pdf->Cell(40,8,'NO HANDPHONE',1,0,'C',true);
$pdf->Cell(60,8,'ALAMAT',1,1,'C',true);

/* ISI */
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0);

$no = 1;
$fill = false;

$q = mysqli_query($koneksi,"SELECT * FROM customer ORDER BY nama_cust ASC");
while($d = mysqli_fetch_array($q)){

    if($fill){
        $pdf->SetFillColor(...$pinkSoft1);
    }else{
        $pdf->SetFillColor(...$pinkSoft2);
    }

    $pdf->Cell(10,8,$no++,1,0,'C',true);
    $pdf->Cell(30,8,$d['id_cust'],1,0,'C',true);
    $pdf->Cell(50,8,$d['nama_cust'],1,0,'L',true);
    $pdf->Cell(40,8,$d['no_telp'],1,0,'L',true);
    $pdf->Cell(60,8,$d['alamat'],1,1,'L',true);

    $fill = !$fill;
}


$pdf->Output();
