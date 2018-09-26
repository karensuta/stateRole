<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->registrarFicha($_POST["ficha"],$_POST["id_formacion"]);

?>