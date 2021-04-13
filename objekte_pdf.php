<?php
require_once("classes/fpdf.php");

$pdf=new FPDF;
//Seite Hinzufügen
$pdf->AddPage();
//Schrift definieren
$pdf->SetFont("Arial","B",16);
//Schreibt in eine Zelle

$pdf->Cell(80,20,utf8_decode("Halöchen"),0,0);
$pdf->Cell(80,20,utf8_decode("LeuteÄÜÖ"),0,1);

$pdf->Output("test.pdf","I");
