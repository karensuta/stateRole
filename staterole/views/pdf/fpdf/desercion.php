<?php 

	 require_once 'fpdf/fpdf.php';

	 $pdf = new FPDF();
	 $pdf->AddPage();
	 $pdf->SetFont('Arial','B',15);

	 $pdf->cell(100,10,'Hola Mundo',1,0,'c');

	 $pdf->Output();

	 
 ?>