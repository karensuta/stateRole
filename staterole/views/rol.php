<?php 
require_once '../controller/seguridad.php';
session_start();

$_POST["doc"]=$_SESSION["documento"];

$rol = new Seguridad(); 
$rol->compararDatos($_POST["doc"]);

?>