<?php 
require_once ('conexion.php');

class Admin extends Conexion
{

//-------------------------------------------
	//Usuarios
//-------------------------------------------
	//consulta si existe el usuario
	public static function existeUsuario($documento){

		$res = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento='$documento' AND estado=1");
		$res->execute();
		$cont=0;

		foreach ($res as $x) {
			$cont=$cont+1;
			$_SESSION["usuario"]=$cont;
		}
	}

	//consulta datos de los usuarios
	public static function usuario($documento,$rolC){

		if ($rolC == 3) {
			$us = Conexion::conectar()->prepare("SELECT * FROM usuario INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
																	INNER JOIN rol ON usuario.id_rol=rol.id_rol 
																	INNER JOIN sede ON usuario.id_sede=sede.id_sede
																	INNER JOIN ficha ON usuario.id_ficha=ficha.id_ficha
																	INNER JOIN formacion On ficha.id_formacion=formacion.id_formacion
																	INNER JOIN jornada ON usuario.id_jornada=jornada.id_jornada
																	INNER JOIN trimestre ON usuario.id_trimestre=trimestre.id_trimestre
																	WHERE documento='$documento'");
			$us->execute();
			return $us;
		}else{
			$us = Conexion::conectar()->prepare("SELECT * FROM usuario INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
																	INNER JOIN rol ON usuario.id_rol=rol.id_rol
																	WHERE documento='$documento'");
			$us->execute();	
			return $us;
		}

		
	}

	//lista de los usuarios registrados en el sistema
	public static function listadoUsuarios($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla inner join tipo_documento on $tabla.id_tipo_documento=tipo_documento.id_tipo_documento INNER JOIN rol ON $tabla.id_rol=rol.id_rol WHERE estado=1 AND rol.id_rol!=3 " );
		$res->execute();

		return $res;
	}

	//Habilitado repetido 
	public static function repetirHabilitado($documento){

		$ha = Conexion::conectar()->prepare("SELECT * FROM habilitados WHERE documento='$documento' AND estado=1");
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
		$ha = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado=1");
		$ha->execute();

		return $ha;
	}

	//elimina el usuario habilitado cambiandole el estado
	public static function eliminarHabilitado($doc){
		$ha = Conexion::conectar()->prepare("UPDATE habilitados SET estado=0 WHERE documento=$doc");
		$ha->execute();
	}

	//elimina el usuario cambiandole el estado
	public static function eliminarUsuario($doc){
		$ha = Conexion::conectar()->prepare("UPDATE usuario SET estado=0 WHERE documento=$doc");
		$ha->execute();
	}
	
	//elimina el aprendiz cambiandole el estado
	public static function eliminarAprendiz($doc){
		$ha = Conexion::conectar()->prepare("UPDATE usuario SET estado=0 WHERE documento=$doc");
		$ha->execute();
	}

	//elimina el programa cambiandole el estado
	public static function eliminarPrograma($for){
		$ha = Conexion::conectar()->prepare("UPDATE formacion SET estado=0 WHERE id_formacion=$for");
		$ha->execute();
	}

	//elimina la ficha cambiandole el estado
	public static function eliminarFicha($ficha){
		$ha = Conexion::conectar()->prepare("UPDATE ficha SET estado_ficha=0 WHERE id_ficha=$ficha");
		$ha->execute();
	}

	//-----------------------
	// 	Actualizar
	//-----------------------

	//actualiza datos de los usuarios
	public static function actualizarDatos($datos,$doc,$tabla,$rolC){

		if ($rolC==3) {
			
			$ac = Conexion::conectar()->prepare("UPDATE $tabla SET p_nombre=:p_nombre, s_nombre=:s_nombre, p_apellido=:p_apellido, s_apellido=:s_apellido, id_tipo_documento=:id_tipo_documento, correo=:correo, id_rol=:id_rol, id_sede=:id_sede, id_ficha=:id_ficha, id_jornada=:id_jornada, id_trimestre=:id_trimestre WHERE documento='$doc'");

			$ac->bindParam(":p_nombre",$datos["p_nombre"], PDO::PARAM_STR);
			$ac->bindParam(":s_nombre",$datos["s_nombre"], PDO::PARAM_STR);
			$ac->bindParam(":p_apellido",$datos["p_apellido"], PDO::PARAM_STR);
			$ac->bindParam(":s_apellido",$datos["s_apellido"], PDO::PARAM_STR);
			$ac->bindParam(":id_tipo_documento",$datos["id_tipo_documento"], PDO::PARAM_STR);
			$ac->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
			$ac->bindParam(":id_rol",$datos["id_rol"], PDO::PARAM_STR);
			$ac->bindParam(":id_sede",$datos["id_sede"], PDO::PARAM_STR);
			$ac->bindParam(":id_ficha",$datos["id_ficha"], PDO::PARAM_STR);
			$ac->bindParam(":id_jornada",$datos["id_jornada"], PDO::PARAM_STR);
			$ac->bindParam(":id_trimestre",$datos["id_trimestre"], PDO::PARAM_STR);

			$ac->execute();

		}else{

			$ac = Conexion::conectar()->prepare("UPDATE $tabla SET p_nombre=:p_nombre, s_nombre=:s_nombre, p_apellido=:p_apellido, s_apellido=:s_apellido, id_tipo_documento=:id_tipo_documento, correo=:correo, id_rol=:id_rol WHERE documento='$doc'");

			$ac->bindParam(":p_nombre",$datos["p_nombre"], PDO::PARAM_STR);
			$ac->bindParam(":s_nombre",$datos["s_nombre"], PDO::PARAM_STR);
			$ac->bindParam(":p_apellido",$datos["p_apellido"], PDO::PARAM_STR);
			$ac->bindParam(":s_apellido",$datos["s_apellido"], PDO::PARAM_STR);
			$ac->bindParam(":id_tipo_documento",$datos["id_tipo_documento"], PDO::PARAM_STR);
			$ac->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
			$ac->bindParam(":id_rol",$datos["id_rol"], PDO::PARAM_STR);

			$ac->execute();
		}
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
											WHERE id_rol=3 AND $tabla.estado=1 order by id_usuario asc" );
		$res->execute();

		return $res;
	}

	//-----------------------
	// 	Desercion
	//-----------------------

	//imprime datos del aprendiz hacer la desercion - imprime si el aprendiz esta registrado
	public static function aprendiz($documento){

		$apre = Conexion::conectar()->prepare("SELECT * FROM usuario
												LEFT JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento 
												LEFT JOIN sede ON usuario.id_sede=sede.id_sede 
												LEFT JOIN ficha ON usuario.id_ficha=ficha.id_ficha 
												LEFT JOIN formacion ON ficha.id_formacion=formacion.id_formacion
												LEFT JOIN jornada ON usuario.id_jornada=jornada.id_jornada 
												LEFT JOIN trimestre ON usuario.id_trimestre=trimestre.id_trimestre
												WHERE documento=$documento AND id_rol=3");
		$apre->execute();
		return $apre;
	}

//-------------------------------------------
	//PROGRAMAS DE FORMACION
//-------------------------------------------

	//registro del programa de formacion
	public static function registrarPrograma($programa,$id_tipo_programa){

		$res=Conexion::Conectar()->prepare("SELECT * FROM formacion WHERE programa='$programa'");
		$res->execute();

		$cont=0;

		foreach ($res as $x) {
			$cont=$cont+1;
		}

		if ($cont >= 1) {
			$_SESSION["programa"]=$_SESSION["programa"]+2;
			header('location: ../../views/super/registroPrograma.php');
		}else{
			$pro = Conexion::Conectar()->prepare("INSERT INTO formacion (programa,id_tipo_programa) VALUES (:programa,:id_tipo_programa)");
			$pro->bindParam(":programa",$programa, PDO::PARAM_STR);
			$pro->bindParam(":id_tipo_programa",$id_tipo_programa, PDO::PARAM_STR);
			$pro->execute();
		}
	}

	//lista de los programas registrados en el sistema
	public static function listadoPrograma($tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado=1" );
		$res->execute();

		return $res;
	}

//-------------------------------------------
	//FICHAS
//-------------------------------------------

	//revisa que la ficha no este registrada
	public static function repetirFicha($ficha,$tabla){

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ficha='$ficha' AND estado_ficha=1" );
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

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN formacion ON $tabla.id_formacion=formacion.id_formacion WHERE $tabla.estado_ficha=1");
		$res->execute();

		return $res;
	}

//-------------------------------------------
	//NOVEDADES
//-------------------------------------------


	//verifica que al aprendiz no se le aya registrado una novedad
	public static function verificaNovedad($documento){

		$re=Conexion::conectar()->prepare("SELECT * FROM novedad INNER JOIN usuario ON novedad.id_usuario=usuario.id_usuario WHERE documento='$documento' AND novedad.estado_novedad>0");
		$re->execute();
		$con=0;
		foreach ($re as $x) {
			$con=$con+1;
		}
		return $con;
	}

	//trae infomacion de la tabla novedad
	public static function novedad($id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("SELECT * FROM novedad WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");
		$ac->execute();
		return $ac;
	}

	//actualiza el estado de la novedad (en proceso, aprovado, rechazado)
	public static function estadoNovedad($id_usuario,$novedad){
		$re = Conexion::conectar()->prepare("UPDATE novedad SET estado_novedad='$novedad' WHERE id_usuario='$id_usuario'");
		$re->execute();
	}

	//Eliminar(cambia el estado de las novedades en 0)
	public  static function eliminarNovedad($nov){
		$eli = Conexion::conectar()->prepare("UPDATE novedad SET estado_novedad=0 WHERE id_novedad=$nov");
		$eli->execute();
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

		$res = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=1 AND $tabla.estado_novedad=1");
		$res->execute();

		return $res;
	}

	//Actualiza desercion
	public static function actualizarDesercion($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
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
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=6 AND $tabla.estado_novedad>=1");
		$res->execute();

		return $res;
	}

	//Actualiza desercion
	public static function actualizarCJornada($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
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
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=5 AND $tabla.estado_novedad>=1");
		$res->execute();

		return $res;
	}

	//Actualiza desercion
	public static function actualizarCSede($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
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
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=2 AND $tabla.estado_novedad>=1");
		$res->execute();

		return $res;
	}

	//Actualiza aplazamiento
	public static function actualizarAplazamiento($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
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
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=3 AND $tabla.estado_novedad>=1");
		$res->execute();

		return $res;
	}

	//Actualiza Reingreso
	public static function actualizarReingreso($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
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
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento WHERE id_tipo_novedad=4 AND $tabla.estado_novedad>=1");
		$res->execute();

		return $res;
	}

	//Actualiza Retiro
	public static function actualizarRetiro($datos,$id_usuario,$id_tipo_novedad){

		$ac = Conexion::conectar()->prepare("UPDATE novedad SET fecha=:fecha, observacion=:observacion, estado_novedad=1 WHERE id_usuario='$id_usuario' AND id_tipo_novedad='$id_tipo_novedad'");

		$ac->bindParam(":fecha",$datos["fecha"], PDO::PARAM_STR);
		$ac->bindParam(":observacion",$datos["observacion"], PDO::PARAM_STR);
		$ac->execute();
	}

	//----------------
	// 	Listado Novedades
	//----------------

	//imprime todas las novedades

	//lista de las novedades registradas
	public static function consultarNovedad($tabla,$novedad){

		if ($novedad == 0) {
			$res = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER join usuario on $tabla.id_usuario=usuario.id_usuario 
											 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
											 INNER join tipo_novedad on $tabla.id_tipo_novedad=tipo_novedad.id_tipo_novedad Where $tabla.estado_novedad >= 1");
			$res->execute();

			return $res;

		}else{

			$res = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER join usuario on $tabla.id_usuario=usuario.id_usuario 
												 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
												 INNER join tipo_novedad on $tabla.id_tipo_novedad=tipo_novedad.id_tipo_novedad Where $tabla.estado_novedad = 1");
			$res->execute();

			return $res;
		}
	}

	//historial del sistema
	public static function historial($his){

		if ($his=="habilitados") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM $his");
			$hist->execute();
			return $hist;
		}
		if ($his=="usuario") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM $his inner join tipo_documento on $his.id_tipo_documento=tipo_documento.id_tipo_documento INNER JOIN rol ON $his.id_rol=rol.id_rol WHERE rol.id_rol!=3");
			$hist->execute();
			return $hist;
		}
		if ($his=="usuario2") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM usuario
											INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento 
											INNER JOIN sede ON usuario.id_sede=sede.id_sede 
											INNER JOIN ficha ON usuario.id_ficha=ficha.id_ficha 
											INNER JOIN jornada ON usuario.id_jornada=jornada.id_jornada 
											INNER JOIN trimestre ON usuario.id_trimestre=trimestre.id_trimestre
											WHERE id_rol=3");
			$hist->execute();
			return $hist;
		}
		if ($his=="ficha") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM $his");
			$hist->execute();
			return $hist;
		}
		if ($his=="formacion") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM $his");
			$hist->execute();
			return $hist;
		}
		if ($his=="novedad") {
			$hist = Conexion::conectar()->prepare("SELECT * FROM $his INNER join usuario on $his.id_usuario=usuario.id_usuario 
												 INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
												 INNER join tipo_novedad on $his.id_tipo_novedad=tipo_novedad.id_tipo_novedad order by $his.id_novedad asc");
			$hist->execute();
			return $hist;
		}
	}


	//----------------
	// 	Listado FPDF
	//----------------


	//Imprime las actas 
	public static function consultarPdf($id_usuario){

		$act = Conexion::conectar()->prepare("SELECT * FROM novedad INNER JOIN usuario on novedad.id_usuario=usuario.id_usuario 
												INNER JOIN ficha ON usuario.id_ficha=ficha.id_ficha
												INNER JOIN formacion ON ficha.id_formacion=formacion.id_formacion 
												INNER JOIN trimestre ON usuario.id_trimestre=trimestre.id_trimestre
												INNER JOIN jornada ON usuario.id_jornada=jornada.id_jornada
												INNER JOIN sede ON usuario.id_sede=sede.id_sede
												INNER JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
												


			WHERE novedad.id_usuario=$id_usuario" );
		$act->execute();

		return $act;

	}

}

?>