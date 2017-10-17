<?php 
	require('fpdf17/fpdf.php');
	
	$pdf = new FPDF();
// $pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Impression de la ligne numééééro '.$i,0,1);
$pdf->Output();
?>