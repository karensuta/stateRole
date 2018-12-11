<?php
require_once '../../model/login.php';

class Login
{
	//Este es el inicio de sesion
	public static function iniciarSesion($documento,$contrasena){
		$res = Ingreso::iniciarSesion($documento,$contrasena);
	}

	public function registrarUsuario($p_nombre,$s_nombre,$p_apellido,$s_apellido,$id_tipo_documento,$documento,$correo,$id_rol,$contrasena){

		$datos = array('p_nombre' => $_POST["p_nombre"],
						's_nombre' => $_POST["s_nombre"],
						'p_apellido' => $_POST["p_apellido"],
						's_apellido' => $_POST["s_apellido"],
						'id_tipo_documento' => $_POST["id_tipo_documento"],
						'documento' => $_POST["documento"],
						'correo' => $_POST["correo"],
						'id_rol' => $_POST["id_rol"],
						'contrasena' => $_POST["contrasena"]);

		$res = Ingreso::habilitado($documento);
		$res = Ingreso::registrado($documento);

		if ($_SESSION["habilitado"] != 0) {
			if ($_SESSION["registrado"] <= 0) {

				$res = Ingreso::registrarUsuario($datos,"usuario");
				$_SESSION["login"]=$_SESSION["login"]+2;
				header('location: ../../views/login.php');

			}else{
				$_SESSION["registrado"]=$_SESSION["registrado"]+1;
				header('location: ../../views/login.php');
			}
		}else{
			$_SESSION["habilitado"]=$_SESSION["habilitado"]+2;
			header('location: ../../views/login.php');
		}
	}

}




?>
