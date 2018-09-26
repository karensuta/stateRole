<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->eliminarAplazamiento($_POST["id_usuario"],$_POST["id_tipo_novedad"]);

?>