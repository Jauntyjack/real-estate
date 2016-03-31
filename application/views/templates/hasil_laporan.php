<?php
require('../CodeIgniter/assets/fpdf/fpdf.php');


class PDF extends FPDF
{

// Simple table
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

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($laporan as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header,$laporan,$sd,$ed)
{

//$this->SetFont('Arial','B',15);
$this->SetFont('','B');
$this->Cell(30,10,'Laporan Transaksi Kantor');
$this->SetFont('','');
$this->Ln(10);
$this->Cell(30,10,'Periode : ' . $sd . ' - ' . $ed);
$this->Ln(15);

    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(10, 20, 30, 110, 20,30,30,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    $this->SetFont('');
    $num = 1;
    foreach($laporan as $row)
    {
    	$price = number_format($row->harga,0,',','.');

        $this->Cell($w[0],6, $num,'LR',0,'C');
        $this->Cell($w[1],6, date("j-M-y", strtotime($row->tgl_transaksi)),'LR',0,'L');
        $this->Cell($w[2],6,$row->nama_marketing,'LR',0,'L');
        $this->Cell($w[3],6,$row->alamat_properti,'LR',0,'L');
        $this->Cell($w[4],6,$row->jenis_transaksi_akhir,'LR',0,'C');
        $this->Cell($w[5],6,$price,'LR',0,'C');
        $this->Cell($w[6],6,$row->nama_penjual,'LR',0,'C');
        $this->Cell($w[7],6,$row->nama_pelanggan,'LR',0,'C');
        $this->Ln();
        $num++;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}


$pdf = new PDF('L','mm','A4');
$header = array('No.', 'Tanggal', 'Marketing', 'Alamat Properti', 'Transaksi','Harga','Penjual','Pembeli');
// Data loading
$pdf->SetFont('Arial','',11);
$pdf->AddPage();

$sd = $startdate;
$ed = $enddate;
$pdf->FancyTable($header,$laporan,$sd,$ed);
$pdf->Output();
?>