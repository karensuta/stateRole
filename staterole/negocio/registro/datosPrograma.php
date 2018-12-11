<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->registrarPrograma(trim($_POST["programa"]),$_POST["id_tipo_programa"]);

?>