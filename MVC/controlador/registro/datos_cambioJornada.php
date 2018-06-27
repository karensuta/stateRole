<?php 

require_once '../controlador.php';

$registro = new Controladores();
$registro -> registroCambioJornada($_POST["nombre"],$_POST["apellido"],$_POST["tipo_documento"],$_POST["documento"],$_POST["fecha"],$_POST["correo"],$_POST["sede"],$_POST["formacion"],$_POST["jornada"],$_POST["jornada_p"],$_POST["ficha"],$_POST["trimestre"],$_POST["motivos"]);


?>