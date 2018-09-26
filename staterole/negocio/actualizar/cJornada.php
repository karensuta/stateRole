<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->actualizarCJornada($_POST["n_fecha"],$_POST["n_observacion"],$_POST["id_usuario"],$_POST["id_tipo_novedad"]);

?>