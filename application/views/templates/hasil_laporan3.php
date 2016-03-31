<?php
require('../CodeIgniter/assets/fpdf/fpdf.php');


class PDF extends FPDF
{


// Colored table
function FancyTable($header,$laporan,$sd,$ed)
{

//$this->SetFont('Arial','B',15);
$this->SetFont('','B');
$this->Cell(30,10,'Laporan Performa Marketing');
$this->SetFont('','');
$this->Ln(10);
$this->Cell(30,10,'Periode : ' . $sd . ' - ' . $ed);
$this->Ln(15);

    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(10, 40, 40, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    $this->SetFont('');
    $num = 1;
    foreach($laporan as $row)
    {
        $price = number_format($row->nominal,0,',','.');
        $this->Cell($w[0],6,$num,'LR',0,'C');
        $this->Cell($w[1],6,$row->nama_marketing,'LR',0,'L');
        $this->Cell($w[2],6,$row->transsum,'LR',0,'C');
        $this->Cell($w[3],6,$price,'LR',0,'C');
        $this->Ln();
        $num++;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}


$pdf = new PDF('L','mm','A4');
$header = array('No.','Marketing','Jumlah Transaksi','Jumlah Nominal');
// Data loading
$pdf->SetFont('Arial','',11);
$pdf->AddPage();

$sd = $startdate;
$ed = $enddate;
$pdf->FancyTable($header,$laporan,$sd,$ed);
$pdf->Output();
?>