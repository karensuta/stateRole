<?php 
require_once ('conexion.php');

class Inst extends Conexion
{

//-------------------------------------------
	//Usuarios
//-------------------------------------------
	//revisa si el aprendiz existe
	public static function existeAprendiz($documento){

		$res = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento='$documento' AND id_rol=3");
		$res->execute();
		$cont=0;

		foreach ($res as $x) {
			$cont=$cont+1;
			$_SESSION["aprendiz"]=$cont;
		}
	}

	//consulta datos de los usuarios
	public static function consultarUsuario($documento){

		$us = Conexion::conectar()->prepare("SELECT * FROM usuario INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento INNER JOIN rol ON usuario.id_rol=rol.id_rol WHERE documento='$documento'");
		$us->execute();

		return $us;
	}

	//lista de los usuarios registrados en el sistema
	public static function listadoUsuarios($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join tipo_documento on $tabla.id_tipo_documento=tipo_documento.id_tipo_documento" );
		$res->execute();

		return $res;
	}


	//-----------------------
	// 	Desercion
	//-----------------------

	//imprime datos del aprendiz hacer la desercion
	public function aprendiz($documento){

		$apre = Conexion::conectar()->prepare("SELECT * FROM usuario
												INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento 
												INNER JOIN sede ON usuario.id_sede=sede.id_sede 
												INNER JOIN ficha ON usuario.id_ficha=ficha.id_ficha 
												INNER JOIN formacion ON ficha.id_formacion=formacion.id_formacion
												INNER JOIN jornada ON usuario.id_jornada=jornada.id_jornada 
												INNER JOIN trimestre ON usuario.id_trimestre=trimestre.id_trimestre
												WHERE documento='$documento' AND id_rol=3");
		$apre->execute();
		return $apre;
	}

//-------------------------------------------
	//PROGRAMAS DE FORMACION
//-------------------------------------------

	//registro del programa de formacion
	public static function registrarPrograma($programa){

		$pro = Conexion::Conectar()->prepare("INSERT INTO formacion (programa) VALUES (:programa)");
		$pro->bindParam(":programa",$programa, PDO::PARAM_STR);
		$pro->execute();
	}

	//lista de los programas registrados en el sistema
	public static function listadoPrograma($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla" );
		$res->execute();

		return $res;
	}

//--------------------------------------
//cambio de jornada
//--------------------------------------

	//lista de los usuarios registrados en el sistema
	public static function consultarCJornada($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=6");
		$res->execute();

		return $res;
	}

//--------------------------------------
//cambio de sede
//--------------------------------------


	//lista de los usuarios registrados en el sistema
	public static function consultarCSede($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=5");
		$res->execute();

		return $res;
	}	

//--------------------------------------
//Aplazamiento
//--------------------------------------

	//lista de los usuarios registrados en el sistema
	public static function consultarAplazamiento($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=2");
		$res->execute();

		return $res;
	}

//--------------------------------------
//Reingreso
//--------------------------------------

//lista de los usuarios registrados en el sistema
	public static function consultarReingreso($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=3");
		$res->execute();

		return $res;
	}

//--------------------------------------
//Retiro Voluntario
//--------------------------------------

	//lista de los usuarios registrados en el sistema
	public static function consultarRetiro($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=4");
		$res->execute();

		return $res;
	}


//-------------------------------------------
	//NOVEDADES
//-------------------------------------------

	//regsitra novedad 
	public static function desercion($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarDesercion($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=1");
		$res->execute();

		return $res;
	}

	//trae infomacion de la tabla novedad
	public static function novedad($id_usuario){

		$ac = Conexion::conectar()->prepare("SELECT * FROM novedad WHERE id_usuario='$id_usuario'");
		$ac->execute();
		return $ac;
	}

}




?>