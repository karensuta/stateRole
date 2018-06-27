<?php 

require_once '../controlador.php';

$registro = new Controladores();
$registro -> registroUsurios($_POST["nombre"],$_POST["apellido"],$_POST["tipo_documento"],$_POST["documento"],$_POST["correo"],$_POST["contrasena"],$_POST["c_contrasena"]);


?>