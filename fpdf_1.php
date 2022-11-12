<?php
include "vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new Fpdf('L', 'mm', 'A5');
$pdf->AddPage();
$pdf->SetFont('Courier', 'B', 15);

$pdf->Cell(40, 10, 'Carlitos Bernardino');
$pdf->Ln();
$pdf->Cell(40, 10, 'CCS');
$pdf->Ln();
$pdf->Cell(40, 10, 'caloy0714@gmail.com');
$pdf->Ln();
$pdf->Cell(40, 10, '20-1094-702');


$pdf->Output();