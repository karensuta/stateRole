<?php 

$doc=$_POST["doc"];
$contrasena=$_POST["contrasena"];

session_start();
require_once '../../model/conexion.php';

$ha = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento=$_SESSION[documento]");
$ha->execute();

foreach ($ha as $x) {
	
	if (password_verify($contrasena,$x["contrasena"])) {
		require_once '../../controller/adminController.php';

		$iniciar = new Administrador();
		$iniciar->eliminarUsuario($doc);	
	}else{
	 	$_SESSION["usuario"]=$_SESSION["usuario"]+1;
	 	if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/listadoUsuarios.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/listadoUsuarios.php');
		}
	}
}

?>
