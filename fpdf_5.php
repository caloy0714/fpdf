<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;

$pdf = new Fpdf('p', 'mm', 'A4');
$pdf->AddFont('Ceviche','','CevicheOne-Regular.php');
$pdf->AddFont('bhu','','BhuTukaExpandedOne-Regular.php');

$pdf->AddPage();
$pdf->SetFont('times','B',35);
$pdf->Write(10,'The future belongs to those who believe in the beauty of their dreams.');
$pdf->Ln();
$pdf->SetFont('Ceviche','',15);
$pdf->Write(10,'-Eleanor Roosevelt');
$pdf->Ln(20);



$pdf->SetFont('bhu','',35);
$pdf->Write(10,'The best and most beautiful things in the world cannot be seen or even touched — they must be felt with the heart. ');
$pdf->Ln();
$pdf->SetFont('symbol','',15);
$pdf->Write(10,'-Helen Keller');
$pdf->Ln();


$pdf->Output();
?>