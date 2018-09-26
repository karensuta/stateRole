<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->registrarAprendiz($_POST["p_nombre"],$_POST["s_nombre"],$_POST["p_apellido"],$_POST["s_apellido"],$_POST["id_tipo_documento"],$_POST["documento"],$_POST["correo"],$_POST["id_rol"],$_POST["id_sede"],$_POST["id_ficha"],$_POST["id_jornada"],$_POST["id_trimestre"]);

?>