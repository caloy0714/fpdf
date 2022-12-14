<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;

$csv_file = 'data2012.csv';
$handle = fopen($csv_file, 'r');
$row_index = 0; // initialize
$headers = [];
$data = [];

while (($row_data = fgetcsv($handle, 1000, ',')) !== FALSE)
{
	if ($row_index++ < 1)
	{
		foreach ($row_data as $col)
		{
			array_push($headers, $col);
		}
		continue;
	}

	$tmp = [];
	for ($index = 0; $index < count($headers); $index++)
	{
		$tmp[$headers[$index]] = $row_data[$index];
	}
	array_push($data, $tmp);
}

fclose($handle);

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(',',trim($line));
    return $data;
}

// Simple table
// function BasicTable($header, $data)
// {
//     Header
//     foreach($header as $col)
//         $this->Cell(60,6,$col,1);
//     $this->Ln();
//     Data
//     foreach($data as $row)
//     {
//         foreach($row as $col)
//             $this->Cell(60,6,$col,1);
//         $this->Ln();
//     }
// }

// Better table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}


}

$pdf = new PDF();
// Column headings
$header = array('#','Country (or dependency)','Population','Yearly','Net,Density' );// Data loading
$data = $pdf->LoadData('data2012.csv');
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>

											

