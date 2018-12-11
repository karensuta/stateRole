<?php 

session_start();
require_once '../../model/conexion.php';

$ha = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento=$_SESSION[documento]");
$ha->execute();

foreach ($ha as $x) {
	
	if (password_verify($_POST["contrasena"],$x["contrasena"])) {
		require_once '../../controller/adminController.php';

		$iniciar = new Administrador();
		$iniciar->estadoNovedad($_POST["id_usuario"],$_POST["novedad"]);	
	}else{
	 	$_SESSION["usuario"]=$_SESSION["usuario"]+1;
	 	header('location: ../../views/super/registroNovedades.php');
	}
}

?>