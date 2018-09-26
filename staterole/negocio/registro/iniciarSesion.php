<?php 
session_start();
require_once '../../controller/loginController.php';

$iniciar = new Login();
$iniciar->iniciarSesion($_POST["documento"],$_POST["contrasena"]);

?>