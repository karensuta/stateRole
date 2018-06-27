<?php 

require_once '../controlador.php';

$registro = new Controladores();
$registro -> registroReingreso($_POST["nombre"],$_POST["apellido"],$_POST["tipo_documento"],$_POST["documento"],$_POST["fecha"],$_POST["correo"],$_POST["sede"],$_POST["formacion"],$_POST["jornada"],$_POST["ficha"],$_POST["trimestre"]);

?>