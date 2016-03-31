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
function FancyTable($header,$laporan)
{
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(20, 30, 120, 10, 10,10,10,10,15,30,40,30,20,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    $this->SetFont('');
    foreach($laporan as $row)
    {
    	$price = "Rp. " . number_format($row->harga,0,',','.');

        $this->Cell($w[0],6, date("j-M-y", strtotime($row->tanggal)),'LR',0,'L');
        $this->Cell($w[1],6,$row->nama_marketing,'LR',0,'L');
        $this->Cell($w[2],6,$row->alamat_properti,'LR',0,'L');
        $this->Cell($w[3],6,$row->kamar_tidur,'LR',0,'C');
        $this->Cell($w[4],6,$row->kamar_mandi,'LR',0,'C');
        $this->Cell($w[5],6,$row->tingkat,'LR',0,'C');
        $this->Cell($w[6],6,$row->telepon,'LR',0,'C');
        $this->Cell($w[7],6,$row->ac,'LR',0,'C');
        $this->Cell($w[8],6,$row->listrik,'LR',0,'C');
        $this->Cell($w[9],6,$row->status_kepemilikan,'LR',0,'L');
        $this->Cell($w[10],6,$price,'LR',0,'R');
        $this->Cell($w[11],6,$row->fasilitas_lain,'LR',0,'R');
        $this->Cell($w[12],6,$row->jenis_transaksi_akhir,'LR',0,'R');
        $this->Cell($w[13],6,$row->tipe_properti,'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}


$pdf = new PDF('L','mm','A3');
$header = array('Tanggal', 'Marketing', 'Alamat Properti', 'KT', 'KM','Lt.','Telp','AC','Listrik','Surat','Harga','Fasilitas Lain','Jual/Sewa','Jenis Prop.');
// Data loading
$pdf->SetFont('Arial','',11);
$pdf->AddPage();
$pdf->FancyTable($header,$laporan);
$pdf->Output();
?>