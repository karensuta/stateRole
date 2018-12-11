<?php 
$contrasena=$_POST["contrasena"];

session_start();
require_once '../../model/conexion.php';

$ha = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento=$_SESSION[documento]");
$ha->execute();

foreach ($ha as $x) {
	
	if (password_verify($contrasena,$x["contrasena"])) {
		require_once '../../controller/adminController.php';

		$iniciar = new Administrador();

		if ($_POST["rolC"] == 3) {
			$iniciar->actualizarDatosA($_POST["n_p_nombre"],$_POST["n_s_nombre"],$_POST["n_p_apellido"],$_POST["n_s_apellido"],$_POST["n_id_tipo_documento"],$_POST["doc"],$_POST["n_correo"],$_POST["n_id_rol"],$_POST["n_id_sede"],$_POST["n_id_ficha"],$_POST["n_id_jornada"],$_POST["n_id_trimestre"],$_POST["rolC"],$_POST["volver"]);
		}else{
			$iniciar->actualizarDatosU($_POST["n_p_nombre"],$_POST["n_s_nombre"],$_POST["n_p_apellido"],$_POST["n_s_apellido"],$_POST["n_id_tipo_documento"],$_POST["doc"],$_POST["n_correo"],$_POST["n_id_rol"],$_POST["rolC"]);
		}	
	}else{
	 	$_SESSION["usuario"]=$_SESSION["usuario"]+1;
	 	if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/informacionUsuario.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/informacionUsuario.php');
		}
	}
}

?>