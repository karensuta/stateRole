S<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->registrarDesercion($_POST["id_usuario"],$_POST["id_tipo_novedad"],$_POST["fecha"],$_POST["observacion"]);
?>