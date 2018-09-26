<?php
session_start(); 
require_once '../../controller/loginController.php';

if ($_POST["contrasena"] == $_POST["c_contrasena"]) {
	$registro= new Login();
	$registro->registrarUsuario($_POST["p_nombre"],$_POST["s_nombre"],$_POST["p_apellido"],$_POST["s_apellido"],$_POST["id_tipo_documento"],$_POST["documento"],$_POST["correo"],$_POST["contrasena"]);
}else{
	$_SESSION["login"]=$_SESSION["login"]+1;
	header('location: ../../views/login.php');
}


?>