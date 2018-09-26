<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->habilitarUsuario($_POST["documento"]);

?>