<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->registrarPrograma($_POST["programa"]);

?>