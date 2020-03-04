<?php
require ('fpdf.php');
require ("connectionfile.php");
$ask="select * from parents ";
$today = date("m.d.y");
$qwery=mysqli_query($conn,$ask);
$result=mysqli_fetch_assoc($qwery);
while($row = mysqli_fetch_assoc($qwery))

if(isset($_POST))
{
    $pdf = new FPDF();
    $pdf->SetFont('Arial','B',10);
    $pdf->AddPage();
    $pdf->Cell(40,10,'FIRST NAME',1,0,'C');
    $pdf->Cell(40,10,'LAST NAME',1,0,'C');
    $pdf->Cell(30,10,'NUMBER ',1,0,'C');
    $pdf->Cell(60,10,'EMAIL ',1,1,'C');
    while($row = mysqli_fetch_assoc($qwery))
  {   $pdf->SetFont('Arial','i',9);
      $pdf->Cell(40,10,$row['fname'],1,0,'C');
      $pdf->Cell(40,10,$row['surname'],1,0,'C');
      $pdf->Cell(30,10,$row['number'],1,0,'C');
      $pdf->Cell(60,10,$row['email'],1,1,'C');

  }
  
    $pdf->Output();
}