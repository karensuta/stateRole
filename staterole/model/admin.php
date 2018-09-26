<?php 
require_once ('conexion.php');

class Admin extends Conexion
{

//-------------------------------------------
	//Usuarios
//-------------------------------------------
	//consulta si existe el usuario
	public static function existeUsuario($documento){

		$res = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento='$documento'");
		$res->execute();
		$cont=0;

		foreach ($res as $x) {
			$cont=$cont+1;
			$_SESSION["usuario"]=$cont;
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

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join tipo_documento on $tabla.id_tipo_documento=tipo_documento.id_tipo_documento INNER JOIN rol ON $tabla.id_rol=rol.id_rol" );
		$res->execute();

		return $res;
	}

	//Habilitado repetido 
	public static function repetirHabilitado($documento){

		$ha = Conexion::conectar()->prepare("SELECT * FROM habilitados WHERE documento='$documento'");
		$ha->execute();
		
		$cont=0;

		foreach ($ha as $x) {
			$cont=$cont+1;
			$_SESSION["repetirH"]=$cont;
		}

	}

	//habilitar usuarios
	public static function habilitarUsuario($documento,$tabla){
		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (documento) VALUES (:documento)");

		$res->bindParam(":documento",$documento, PDO::PARAM_STR);
		$res->execute();

	}

	//lista de los uasuarios habilitados
	public static function listaHabilitado($tabla){
		$ha = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$ha->execute();

		return $ha;
	}
	
	//-----------------------
	// 	Actualizar
	//-----------------------

	//actualiza datos de los usuarios
	public static function actualizarDatos($datos,$doc,$tabla){

		$ac = Conexion::conectar()->prepare("UPDATE $tabla SET p_nombre=:p_nombre, s_nombre=:s_nombre, p_apellido=:p_apellido, s_apellido=:s_apellido, id_tipo_documento=:id_tipo_documento, documento=:documento, correo=:correo, id_rol=:id_rol WHERE documento='$doc'");

		$ac->bindParam(":p_nombre",$datos["p_nombre"], PDO::PARAM_STR);
		$ac->bindParam(":s_nombre",$datos["s_nombre"], PDO::PARAM_STR);
		$ac->bindParam(":p_apellido",$datos["p_apellido"], PDO::PARAM_STR);
		$ac->bindParam(":s_apellido",$datos["s_apellido"], PDO::PARAM_STR);
		$ac->bindParam(":id_tipo_documento",$datos["id_tipo_documento"], PDO::PARAM_STR);
		$ac->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$ac->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$ac->bindParam(":id_rol",$datos["id_rol"], PDO::PARAM_STR);

		$ac->execute();
	}

//-------------------------------------------
	//APRENDICES
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



	//Registra aprendices
	public static function registrarAprendiz($datos,$tabla){

		$re = Conexion::Conectar()->prepare("INSERT INTO $tabla (p_nombre,s_nombre,p_apellido,s_apellido,id_tipo_documento,documento,correo,id_rol,id_sede,id_ficha,id_jornada,id_trimestre) VALUES (:p_nombre,:s_nombre,:p_apellido,:s_apellido,:id_tipo_documento,:documento,:correo,:id_rol,:id_sede,:id_ficha,:id_jornada,:id_trimestre)");
		
		$re->bindParam(":p_nombre",$datos["p_nombre"], PDO::PARAM_STR);
		$re->bindParam(":s_nombre",$datos["s_nombre"], PDO::PARAM_STR);
		$re->bindParam(":p_apellido",$datos["p_apellido"], PDO::PARAM_STR);
		$re->bindParam(":s_apellido",$datos["s_apellido"], PDO::PARAM_STR);
		$re->bindParam(":id_tipo_documento",$datos["id_tipo_documento"], PDO::PARAM_STR);
		$re->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$re->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$re->bindParam(":id_rol",$datos["id_rol"], PDO::PARAM_STR);
		$re->bindParam(":id_sede",$datos["id_sede"], PDO::PARAM_STR);
		$re->bindParam(":id_ficha",$datos["id_ficha"], PDO::PARAM_STR);
		$re->bindParam(":id_jornada",$datos["id_jornada"], PDO::PARAM_STR);
		$re->bindParam(":id_trimestre",$datos["id_trimestre"], PDO::PARAM_STR);

		$re->execute();
	}

	//revisa si el aprendiz esta registrado
	public static function repetirAprendiz($documento,$tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento='$documento'");
		$res->execute();
		
		$cont=0;
		foreach ($res as $x) {
			$cont=$cont+1;
			$_SESSION["repetir"]=$cont;
		}
	}

	//lista de los aprendices registrados en el sistema
	public static function listadoAprendiz($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla 
											INNER JOIN tipo_documento ON $tabla.id_tipo_documento=tipo_documento.id_tipo_documento 
											INNER JOIN sede ON $tabla.id_sede=sede.id_sede 
											INNER JOIN ficha ON $tabla.id_ficha=ficha.id_ficha 
											INNER JOIN jornada ON $tabla.id_jornada=jornada.id_jornada 
											INNER JOIN trimestre ON $tabla.id_trimestre=trimestre.id_trimestre
											WHERE id_rol=3 order by id_usuario asc" );
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

//-------------------------------------------
	//FICHAS
//-------------------------------------------

	//revisa que la ficha no este registrada
	public static function repetirFicha($ficha,$tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ficha='$ficha'" );
		$res->execute();

		$cont=0;
		foreach ($res as $x) {
			$cont=$cont+1;
			$_SESSION["repetir"]=$cont;
		}
	}

	//registra la ficha
	public static function registrarFicha($ficha,$id_formacion){

		$pro = Conexion::Conectar()->prepare("INSERT INTO ficha (ficha,id_formacion) VALUES (:ficha,:id_formacion)");
		$pro->bindParam(":ficha",$ficha, PDO::PARAM_STR);
		$pro->bindParam(":id_formacion",$id_formacion, PDO::PARAM_STR);
		$pro->execute();
	}

	//lista de las fichas
	public static function listadoFicha($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN formacion ON $tabla.id_formacion=formacion.id_formacion" );
		$res->execute();

		return $res;
	}

//-------------------------------------------
	//NOVEDADES
//-------------------------------------------

	//trae infomacion de la tabla novedad
	public static function novedad($id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("SELECT * FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$ac->execute();
		return $ac;
	}

	//----------------
	// 	Desercion
	//----------------

	//registra novedad 
	public static function registrarDesercion($datos,$tabla){

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

	//Actualiza desercion
	public static function actualizarDesercion($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina desercion
	public  static function eliminarDesercion($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}

	//----------------
	// 	Cambio Jornada
	//----------------

	//registra novedad 
	public static function registrarCJornada($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarCJornada($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=6");
		$res->execute();

		return $res;
	}

	//Actualiza desercion
	public static function actualizarCJornada($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina cambio de jornada
	public  static function eliminarCJornada($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}

	//----------------
	// 	Cambio Sede
	//----------------

	//registra novedad 
	public static function registrarCSede($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarCSede($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=5");
		$res->execute();

		return $res;
	}

	//Actualiza desercion
	public static function actualizarCSede($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina cambio de sede
	public  static function eliminarCSede($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}

	//----------------
	// 	Aplazamiento
	//----------------

	//registra novedad 
	public static function registrarAplazamiento($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarAplazamiento($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=2");
		$res->execute();

		return $res;
	}

	//Actualiza aplazamiento
	public static function actualizarAplazamiento($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina Aplazamiento
	public  static function eliminarAplazamiento($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}

	//----------------
	// 	Reingreso
	//----------------

	//registra Reingreso 
	public static function registrarReingreso($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarReingreso($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=3");
		$res->execute();

		return $res;
	}

	//Actualiza Reingreso
	public static function actualizarReingreso($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina Reingreso
	public  static function eliminarReingreso($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}

	//----------------
	// 	Retiro
	//----------------

	//registra Retiro 
	public static function registrarRetiro($datos,$tabla){

		$res = Conexion::conectar()->prepare("INSERT INTO $tabla (id_usuario,id_tipo_novedad,fecha,observacion) VALUES (:id_usuario,:id_tipo_novedad,:fecha,:observacion)");

		$res->bindParam(":id_usuario",$datos["id_usuario"], PDO::PARAM_STR);
		$res->bindParam(":id_tipo_novedad",$datos["id_tipo_novedad"], PDO::PARAM_STR);
		$res->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$res->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$res->execute();
	}

	//lista de los usuarios registrados en el sistema
	public static function consultarRetiro($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=4");
		$res->execute();

		return $res;
	}

	//Actualiza Retiro
	public static function actualizarRetiro($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//Elimina Retiro
	public  static function eliminarRetiro($id_usuario,$id_tipo_novedad){
		$eli = Conexion::conectar()->prepare("DELETE FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$eli->execute();
	}


}




?>