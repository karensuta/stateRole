<?php
        require_once 'fpdf/fpdf.php';
        include_once 'plantilla.php';
        require_once '../../controller/adminController.php';

        $novedad=0;
        $lista = new Administrador();
        $us = $lista->listadoPdf($_POST["id_usuario"],$novedad);

        $pdf = new fpdf();

        foreach ($us as $x) {
                        
                switch ($x['id_tipo_documento']) {
                        case 'Cédula de Ciudadania':$x['tipo_documento']="C.C";
                          break;                
                        case 'Tarjeta de Identidad':$x['id_tipo_documento']="T.L";
                          break;
                        case 'Cédula de Extrangeria':$x['id_tipo_documento']="C.E";
                          break;
                        default:
                        $x['tipo_documento']="C.C";break;
                      }
                }

        $pdf->AddPage();
        $pdf->Image('images/sena.PNG',22,5,165);
        $pdf->setFont('Arial','',12);
        $pdf->Ln(20);


        $pdf->SetY(38);
        $pdf->SetX(83);
        $pdf->cell(90,10,utf8_decode('Acta Nª 2018-0441'),0,1,'L');

        $pdf->SetY(48);
        $pdf->SetX(73);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(90,10,utf8_decode('COMITÉ DE SEGUIMIENTO'),0,1,'L');
        
        $pdf->setFont('Arial','B',12);
        $pdf->cell(15, 8, 'Fecha:',0,0,'l' );
        $pdf->setFont('Arial','',12);
        $pdf->cell(17, 8, date('d/m/y'),0,0,'l' );
        $pdf->setFont('Arial','B',12);
        $pdf->cell(13, 8, 'Ficha:',0,0,'l' );
        $pdf->setFont('Arial','',12);
        $pdf->cell(20, 8, $x['ficha'],0,0,'l' );
        $pdf->setFont('Arial','B',12);
        $pdf->cell(23, 8, 'Programa:',0,0,'l' );
        $pdf->setFont('Arial','',10);
        $pdf->cell(15, 8, utf8_decode($x['programa']),0,1,'l' );
        $pdf->setFont('Arial','B',12);
        $pdf->cell(20, 8, 'jornada:',0,0,'l' );
        $pdf->setFont('Arial','',12);
        $pdf->cell(30, 8, $x['jornada'],0,0,'l' );
        $pdf->setFont('Arial','B',12);
        $pdf->cell(13, 8, 'sede:',0,0,'l' );
        $pdf->setFont('Arial','',12);
        $pdf->cell(36, 8,utf8_decode($x['sede']),0,1,'l' );
        
        $pdf->setFont('Arial','B',10);
        $pdf->cell(0,12,'PARTICIPANTES EN EL COMITE',0,1,'l');
        /*los dos coordinadores se dejan siempre ahi*/
        
        $pdf->setFont('Arial','B',12);
        $pdf->cell(27, 8, utf8_decode('Coordinador'),0,0,'l' );
        $pdf->setFont('Arial','',11);
        $pdf->cell(29, 8, utf8_decode('Misional: Mario Rodríguez López'),0,1,'l' );
        
        $pdf->setFont('Arial','B',12);
        $pdf->cell(27, 8, utf8_decode('Coordinador'),0,0,'l' );
        $pdf->setFont('Arial','',11);
        $pdf->cell(90, 8, utf8_decode('Académico: German Gilberto Alarcón'),0,1,'l' );
        $pdf->setFont('Arial','B',12);
        $pdf->cell(25, 8, utf8_decode('Aprendiz citado: '),0,0,'l' );

        /*muestra lo primero del cuadro */
        $pdf->setFont('Arial','B',11);
        $pdf->SetY(113);
        $pdf->SetX(10);
        $pdf->cell(46, 8, 'Nombre:',1,0,'l' );
        $pdf->cell(46, 8, 'Apellidos:',1,0,'l' );
        $pdf->cell(46, 8, 'Tipo de documento:',1,0,'l' );
        $pdf->cell(46, 8, 'Documento:',1,1,'l' );

        /*Muestra los datos del aprendiz*/
        $pdf->setFont('Arial','',10);
        $pdf->cell(46, 8, $x['p_nombre']." ".$x['s_nombre'],1,0,'l' );
        $pdf->cell(46, 8, $x['p_apellido']." ".$x['s_apellido'],1,0,'l' );
        $pdf->cell(46, 8, utf8_decode($x['tipo_documento']),1,0,'l' );
        $pdf->cell(46, 8,  $x['documento'],1,1,'l' );
        
        /*Motivo*/
        $pdf->SetY(136);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(33, 8, utf8_decode('Motivo de citación:'),0,0,'l' );
        $pdf->setFont('Arial','',10);
        $pdf->Cell(146, 8, utf8_decode( 'Revisión de la solicitud de Reingreso de Centro del aprendiz anteriormente mencionado.'),0,'l',0);

        /*Hechos*/
        $pdf->SetY(146);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(18, 8, 'Hechos:',0,0,'l' );
        $pdf->setFont('Arial','',10);
        $pdf->Cell(93, 8, utf8_decode('El aprendiz radica la solicitud de Reingreso del programa de formación. '),0,1,'l',0);

        /*comentarios*/
        $pdf->SetY(156);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(22, 8,utf8_decode('Comentarios de los miembros de comité:'),0,1,'L');
        $pdf->setFont('Arial','',10);
        $pdf->multiCell(180, 6, utf8_decode('Se realiza la revisión en el aplicativo Sena Sofía para validar si el aprendiz presenta novedades, luego de la validación se le genera la novedad de Retiro Voluntario en el aplicativo Sena Sofía.'),0,'J',0);

        /*comentarios*/
        $pdf->SetY(180);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(22, 8,utf8_decode('Evidencias:'),0,1,'L');
        $pdf->setFont('Arial','',10);
        $pdf->multiCell(180, 6, utf8_decode('Comunicación solicitando reingreso por el aprendiz, soportes de las competencias con sus respectivos resultados de aprendizaje.'),0,'J',0);

        $pdf->AddPage();
        $pdf->Image('images/sena.PNG',22,5,165);
        $pdf->setFont('Arial','B',12);
        $pdf->Ln(20);


        /* Muestra la recomendacion*/
        $pdf->SetY(43);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(22, 8,utf8_decode('Recomendacione:'),0,1,'L');
        $pdf->setFont('Arial','B',10);
        $pdf->SetY(55);
        $pdf->SetX(10);
        $pdf->cell(13, 8, 'Doc:',1,0,'l' );
        $pdf->cell(20, 8, 'No Doc:',1,0,'l' );
        $pdf->cell(33, 8, 'Nombres:',1,0,'l' );
        $pdf->cell(33, 8, 'Apellidos:',1,0,'l' );
        $pdf->cell(51, 8, 'Recomendaciones:',1,0,'l' );
        $pdf->cell(48, 8, 'Observaciones:',1,1,'l' );

        /*Muestra los datos del aprendiz*/
        $pdf->setFont('Arial','',9);
        $pdf->cell(13, 8,  utf8_decode($x['tipo_documento']),1,0,'l' );
        $pdf->cell(20, 8, $x['documento'],1,0,'l' );
        $pdf->cell(33, 8, $x['p_nombre']." ".$x['s_nombre'],1,0,'l' );
        $pdf->cell(33, 8, $x['p_apellido']." ".$x['s_apellido'],1,0,'l' );
        $pdf->cell(51, 8,'Se concede el Traslado de Ficha',1,0,'l');
        $pdf->cell(48, 8, $x['observacion'],1,1,'l' );


        $pdf->setFont('Arial','B',10);
        $pdf->SetY(75);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('FIRMA PARTCIPANTES DEL COMITÉ:'),0,1,'l' );

        $pdf->SetY(90);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',12);
        $pdf->cell(33, 8, utf8_decode('Nombre'),0,1,'l' );

        $pdf->SetY(90);
        $pdf->SetX(126);
        $pdf->cell(33, 8, utf8_decode('Firma'),0,1,'l' );

        $pdf->SetY(96);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );

        $pdf->SetY(102);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );

        $pdf->SetY(108);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );

        $pdf->SetY(114);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );
        
        $pdf->SetY(120);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );

        $pdf->SetY(126);
        $pdf->SetX(10);
        $pdf->cell(33, 8, utf8_decode('__________________________________________________________________________________________'),0,1,'l' );

        $pdf->SetY(130);
        $pdf->SetX(10);
        $pdf->setFont('Arial','B',7);
        $pdf->cell(33, 8, utf8_decode('Proyectó: Janeth Rodríguez C.'),0,1,'l' );
        

        
        $pdf->Image('images/pie.PNG',26,255,160);

        $pdf->output("Acta_Reingreso.pdf","D");

?>