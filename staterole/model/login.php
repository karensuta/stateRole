<?php
require_once ('conexion.php');

class Ingreso extends Conexion
{
	//revisa que el usuario este registrado
	public  function iniciarSesion($documento,$contrasena){

		$da = Conexion::Conectar()->prepare("SELECT * FROM usuario WHERE documento=:documento");
		$da->execute(array(':documento' => $documento));

		if ($row=$da->fetch(PDO::FETCH_ASSOC)) {
        	$_SESSION['documento']=$documento;
			header('location: ../../views/rol.php');
		}else{
			$_SESSION['login']=$_SESSION['login']+3;
			header('location: ../../views/login.php');
		}
	}
	//revisa que el usuario haya sido habilitado
	public static function habilitado($documento){

		$ha = Conexion::conectar()->prepare("SELECT * FROM habilitados WHERE documento='$documento'");
		$ha->execute();
		$cont=0;

		foreach ($ha as $x) {
			$cont=$cont+1;
			$_SESSION["habilitado"]=$cont;
		}
	}

	//revisa que el usuario hno se haya registrado
	public static function registrado($documento){

		$cont=0;

		$ha = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento='$documento'");
		$ha->execute();

		foreach ($ha as $x) {
			$cont=$cont+1;
			$_SESSION["registrado"]=$cont;
		}
	}

	//registra el usuario
	public static function registrarUsuario($datos,$tabla){

		$re = Conexion::conectar()->prepare("INSERT INTO $tabla (p_nombre,s_nombre,p_apellido,s_apellido,id_tipo_documento,documento,correo,contrasena) VALUES (:p_nombre,:s_nombre,:p_apellido,:s_apellido,:id_tipo_documento,:documento,:correo,:contrasena)");

		$pass=password_hash($datos["contrasena"],PASSWORD_DEFAULT);
		$re->bindParam(":p_nombre",$datos["p_nombre"], PDO::PARAM_STR);
		$re->bindParam(":s_nombre",$datos["s_nombre"], PDO::PARAM_STR);
		$re->bindParam(":p_apellido",$datos["p_apellido"], PDO::PARAM_STR);
		$re->bindParam(":s_apellido",$datos["s_apellido"], PDO::PARAM_STR);
		$re->bindParam(":id_tipo_documento",$datos["id_tipo_documento"], PDO::PARAM_STR);
		$re->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$re->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$re->bindParam(":contrasena",$pass,PDO::PARAM_STR);
		$re->execute();

	}
}

?>
