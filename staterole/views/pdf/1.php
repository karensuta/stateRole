<?php 
	/* PDF */
	
	 require_once 'fpdf/fpdf.php';
	 require_once '../../controller/adminController.php';
	 #require_once '../../controller/acta_controller.php';

      $novedad=0;
      $lista = new Administrador();
      $us = $lista->listadoPdf($_POST["id_usuario"],$novedad);

	 	$pdf = new fpdf();

	 	foreach ($us as $x) {
	 		
	 		if ($x['id_tipo_novedad']=1) {

	 			switch ($x['id_tipo_documento']) {
	 				case 'Cédula de Ciudadania':$x['id_tipo_documento']="C.C";
	 					break;
	 				
	 				case 'Tarjeta de Identidad':$x['id_tipo_documento']="T.L";
	 					break;

	 				case 'Cédula de Extrangeria':$x['id_tipo_documento']="C.E";
	 					break;

	 				default:
	 				$x['id_tipo_documento']="C.C";break;
	 			}
	 			
	 		}
	 	}
	 
	/* Muestra todo lo que este en el pdf */

	 $pdf->AddPage();
	 $pdf->SetFont('Arial','B',10);

	 $pdf->Image('images/logos.png',22,5,165);

	 $pdf->SetY(35);
	 $pdf->SetX(20);
	 $pdf->SetFont('Arial','B',11);
	 $pdf->cell(90,10,'NOMBRE DEL APRENDIZ: ' .$x['p_nombre']." ".$x['s_nombre']." ".$x['p_apellido']." ".$x['s_apellido'],0,1,'L');
	 $pdf->SetX(20);
	 $pdf->SetFont('Arial','B',10);
	 $pdf->cell(100,10,'DOCUMENTO DE IDENTIDAD:',0,0,'L');
	 
	 /*tarjeta de identidad*/
	 $pdf->SetX(72);
	 $pdf->cell(10,10,'T.I',0,0,'L');
	 $pdf->setXY(80,47);
	 if ($x['id_tipo_documento'] == "T.I")
	 {
	 	$pdf->cell(5,5,'x',1,1,'l');
	 }
	 else{
	 	$pdf->cell(5,5,'',1,1,'L');
	 }


	 /*Cedula */
	 $pdf->SetXY(86,45);
	 $pdf->cell(10,10,'C.C',0,0,'L');
	 $pdf->setXY(95,47); 
	 if ($x['id_tipo_documento'] == "C.C") {
	 	$pdf->cell(5,5,'x',1,1,'l');
	 }
	 else{
	 	$pdf->cell(5,5,'',1,1,'l');
	 }

	 /*Cedula Extrangeria*/
	 $pdf->SetXY(100,45);
	 $pdf->cell(10,10,'C.E',0,0,'L');
	 $pdf->setXY(109,47); 
	 if ($x['id_tipo_documento'] == "C.E") {
	 	$pdf->cell(5,5,'x',1,1,'l');

	 }
	 else{
	 	$pdf->cell(5,5,'',1,1,'l');
	 }

	 /*Numero*/
	 $pdf->SetXY(155,35);
	 $pdf->cell(10,10,'No. '.$x['documento'],0,1,'L');
	 

	 $pdf->SetX(120,45);
	 $pdf->cell(10,10,' ',0,1,'L');
	 $pdf->SetX(20);
	 $pdf->SetFont('Arial','B',11);
	 $pdf->cell(90,10,utf8_decode('Ficha caracterización: ').$x['ficha'],0,1,'L');
	 $pdf->SetX(20);

	 $pdf->cell(100,8,utf8_decode('PROGRAMA DE FORMACIÓN:').$x['programa'],0,1,'L');
	 $pdf->SetX(20);
	 $pdf->SetX(20);
	 $pdf->cell(65,8,utf8_decode('TRIMESTRE QUE CURSA:'.$x['trimestre']),0,0,'L');
	 $pdf->SetXY(20,81);
	 $pdf->cell(10,8,'FECHA REPORTE: ',0,1,'L');

	 /* Muestra lo segundo */
	 $pdf->SetX(20);
	 $pdf->cell(100,8,utf8_decode('FECHA DE INICIACIÓN DEL CURSO'),0,0,'L');

	 /* Muestra el Dia */
	 $pdf->SetFont('Arial','B',9);
	 $pdf->setXY(110,89);
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->setXY(117,71);
	 $pdf->cell(50,50,'DIA',0,0,'D');

	 /* Muestra el Mes */
	 $pdf->setXY(137,89);
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->setXY(143,71);
	 $pdf->cell(50,50,'MES',0,0,'D');

	 /* Muestra el Año */
	 $pdf->setXY(165,89);
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->cell(10,5,' ',1,0,'J');
	 $pdf->setXY(169,71);
	 $pdf->cell(50,50,utf8_decode('AÑO'),0,1,'D');

	
	  /* Muestra la parte superior del cuadro */

	 $pdf->setXY(20,98);
	 $pdf->cell(85,10,utf8_decode('DESERCIÓN'),1,0,'C');
	 $pdf->cell(90,10,utf8_decode('POSIBLES CAUSAS DE DESERCIÓN'),1,1,'C');
	 $pdf->setXY(20,110);
	 $pdf->SetFont('Arial','B',10);
	 $pdf->Cell(85,10,utf8_decode('FECHA DE DESERCIÓN'),0,1,'C');


	  /*Cuadoros pequeños*/

	 $pdf->setXY(20,98);
	 $pdf->Cell(85,65,utf8_decode(''),1,0,'C');


	 /*Muestra lo que esta adentro del cuadro*/

	 /* Muestra el Dia */
	 $pdf->SetFont('Arial','B',12);
	 $pdf->setXY(30,126);
	 $pdf->cell(15,8,date("d"),1,0,'C');
	 $pdf->setXY(33,112);
	 $pdf->cell(50,50,'DIA',0,0,'D');

	  /* Muestra el Mes */
	 $pdf->SetFont('Arial','B',12);
	 $pdf->setXY(55,126);
	 $pdf->cell(15,8,date("m"),1,0,'C');
	 $pdf->setXY(57,112);
	 $pdf->cell(50,50,'MES',0,0,'D');

	 /* Muestra el Año */
	 $pdf->SetFont('Arial','B',12);
	 $pdf->setXY(79,126);
	 $pdf->cell(15,8,date("y"),1,0,'C');
	 $pdf->setXY(80,112);
	 $pdf->cell(50,50,utf8_decode('AÑO'),0,1,'D');

	  /* Muestra la causa de desercion */

	 $pdf->setXY(20,152);
	 $pdf->SetFont('Arial','B',12);
	 $pdf->cell(60,5,utf8_decode('CAUSA DE DESERCIÓN'),0,0,'C');
	 $pdf->setXY(85,149);
	 $pdf->cell(15,8,date(""),1,0,'C');

	  /* Muestra la parte de la izquierda del cuadro */

	 $pdf->setXY(105,108);
	 $pdf->Cell(45,55,utf8_decode(''),1,0,'C');

	 $pdf->SetFont('Arial','B',9);
	 $pdf->setXY(105,108);
	 $pdf->Cell(45,7,utf8_decode('1.Falta de interés en el curso.'),0,1,'',0);
	 $pdf->setXY(105,114);
	 $pdf->MultiCell(45,7,utf8_decode('2.Dedicación a otros estudios o actividades.'),0,1,'',0);
	 $pdf->setXY(105,128);
	 $pdf->Cell(45,7,utf8_decode('3.Problemas de salud.'),0,1,'',0);
	 $pdf->setXY(105,135);
	 $pdf->Cell(45,7,utf8_decode('4.Maternidad.'),0,1,'',0);
	 $pdf->setXY(105,142);
	 $pdf->MultiCell(45,5,utf8_decode('5.Problemas familiares o personales.'),0,1,'',0);
	 $pdf->setXY(105,152);
	 $pdf->Cell(45,5,utf8_decode('6.Problemas laborales.'),0,1,'',0);
	 $pdf->setXY(105,157);
	 $pdf->Cell(45,5,utf8_decode('7.Problemas económicos.'),0,1,'',0);

	/*Muestra la parte de la izquierda del cuadro N°2*/

	$pdf->setXY(150,108);
	$pdf->Cell(45,55,utf8_decode(''),1,0,'C');

	$pdf->setXY(150,108);
	$pdf->MultiCell(45,5,utf8_decode('8.Problema de servicio militar.'),0,1,'',0);
	$pdf->setXY(150,118);
	$pdf->MultiCell(45,5,utf8_decode('9.Problemas relacionados con el desarrollo del curso.'),0,1,'',0);
	$pdf->setXY(150,128);
	$pdf->MultiCell(45,5,utf8_decode('10.Bajo rendimiento académico y/o práctico.'),0,1,'',0);
	$pdf->setXY(150,138);
	$pdf->MultiCell(45,5,utf8_decode('11.Indisciplina y mala conducta.'),0,1,'',0);
	$pdf->setXY(150,148);
	$pdf->MultiCell(45,5,utf8_decode('12.Falta de puntualidad y mala conducta.'),0,1,'',0);
	$pdf->setXY(150,158);
	$pdf->MultiCell(45,4,utf8_decode('13.Otras causas.'),0,1,'',0);

	/* parte inferior del cuadro */

	$pdf->setXY(20,163);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(175,13,utf8_decode('OBSERVACIONES: '),1,0,'l');


	/*Verificacion del reporte*/
	$pdf->setXY(20,180);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(175,13,utf8_decode('VERIFICACIÓN DEL REPORTE:'),0,0,'l');

	$pdf->setXY(80,180);
	$pdf->Cell(175,13,utf8_decode('Estado en Sofía:_________________'),0,1,'l');

	$pdf->setXY(20,185);
	$pdf->Cell(175,13,utf8_decode('Fecha verificación:'),0,1,'l');
	$pdf->setXY(56,185);
	$pdf->Cell(50,13,utf8_decode('D___/'),0,0,'l');
	$pdf->setXY(67,185);
	$pdf->Cell(50,13,utf8_decode('M___/'),0,0,'l');
	$pdf->setXY(77,185);
	$pdf->Cell(50,13,utf8_decode('A___'),0,0,'l');

	/* 	Muestra el segundo cuadro */
	/* 	Muestra la primera parte del cuadro */
	$pdf->setXY(20,195);
	$pdf->cell(45,8,utf8_decode('No. Telefónico'),1,0,'C');
	$pdf->setXY(65,195);
	$pdf->cell(68,8,utf8_decode('Dirección de Residencia'),1,0,'C');
	$pdf->setXY(133,195);
	$pdf->cell(61,8,utf8_decode('Correo Electrónico'),1,0,'C');

	/* 	Muestra la segunda parte del cuadro */
	/* 	Telefeno */
	$pdf->setXY(20,203);
	$pdf->cell(45,8,utf8_decode(''),1,0,'C');
	/* 	Direccion  */
	$pdf->setXY(65,203);
	$pdf->cell(68,8,utf8_decode(''),1,0,'C');
	/* 	Correo  */
	$pdf->setXY(133,203);
	$pdf->cell(61,8,utf8_decode(''),1,0,'C');
	/* 	OBSERVACION  */
	$pdf->setXY(20,211);
	$pdf->Cell(174,14,utf8_decode('Observaciones:'),1,0,'L');
	/* 	Firma */
	$pdf->setXY(20,225);
	$pdf->Cell(174,10,utf8_decode('Firma del responsable:'),1,0,'L');
	$pdf->Ln();
	/* 	Firmas */
	$pdf->SetFont('Arial','B',10);
	$pdf->setXY(20,248);
	$pdf->Cell(60,10,utf8_decode('Nombre y firma instructor'),0,0,'C');
	$pdf->setXY(20,245);
	$pdf->Cell(50,8,utf8_decode('________________________________'),0,0,'L');

	/* 	Firma del instructor */
	$pdf->setXY(120,248);
	$pdf->Cell(60,10,utf8_decode('Nombre y firma instructor'),0,0,'C');
	$pdf->setXY(120,245);
	$pdf->Cell(50,8,utf8_decode('________________________________'),0,0,'L');

	/* 	Firma del vocero */
	$pdf->setXY(20,271);
	$pdf->Cell(60,5,utf8_decode('Nombre y firma vocero del Grupo'),0,0,'C');
	$pdf->setXY(20,266);
	$pdf->Cell(50,8,utf8_decode('________________________________'),0,0,'L');
	
	 /* Firma del vocero */
	$pdf->setXY(120,271);
	$pdf->Cell(60,5,utf8_decode('Vo.Bo, Coordinador académico'),0,0,'C');
	$pdf->setXY(120,266);
	$pdf->Cell(120,8,utf8_decode('________________________________'),0,0,'L');



	$pdf->Output("Acta_Desercion.pdf","D");
	 
 ?>


