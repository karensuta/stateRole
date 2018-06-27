<?php 

require_once "conexion.php";

class Datos extends Conexion{

	#registro de usuarios
	#-------------------------------
	public static function registroUsuario($datos,$tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,correo,contrasena,c_contrasena) VALUES (:nombre,:apellido,:tipo_documento,:documento,:correo,:contrasena,:c_contrasena)");


		$stmt->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_documento",$datos["tipo_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":contrasena",$datos["contrasena"], PDO::PARAM_STR);
		$stmt->bindParam(":c_contrasena",$datos["c_contrasena"], PDO::PARAM_STR);
		$stmt->execute();
	}

	#registro de las deseriones
	#-------------------------------
	public static function registroDesercion($desercion,$tabla){

		$deser = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,formacion,jornada,ficha,trimestre,observaciones) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:formacion,:jornada,:ficha,:trimestre,:observaciones)");

		$deser->bindParam(":nombre",$desercion["nombre"], PDO::PARAM_STR);
		$deser->bindParam(":apellido",$desercion["apellido"], PDO::PARAM_STR);
		$deser->bindParam(":tipo_documento",$desercion["tipo_documento"], PDO::PARAM_STR);
		$deser->bindParam(":documento",$desercion["documento"], PDO::PARAM_STR);
		$deser->bindParam(":fecha",$desercion["fecha"], PDO::PARAM_STR);
		$deser->bindParam(":correo",$desercion["correo"], PDO::PARAM_STR);
		$deser->bindParam(":sede",$desercion["sede"], PDO::PARAM_STR);
		$deser->bindParam(":formacion",$desercion["formacion"], PDO::PARAM_STR);
		$deser->bindParam(":jornada",$desercion["jornada"], PDO::PARAM_STR);
		$deser->bindParam(":ficha",$desercion["ficha"], PDO::PARAM_STR);
		$deser->bindParam(":trimestre",$desercion["trimestre"], PDO::PARAM_STR);
		$deser->bindParam(":observaciones",$desercion["observaciones"], PDO::PARAM_STR);

		$deser->execute();

	}

	#registro de Cambio de Jornada
	#-------------------------------
	public static function registroCambioJornada($cambioj,$tabla){

		$cambJ = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,formacion,jornada,jornada_p,ficha,trimestre,motivos) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:formacion,:jornada,:jornada_p,:ficha,:trimestre,:motivos)");

		$cambJ->bindParam(":nombre",$cambioj["nombre"], PDO::PARAM_STR);
		$cambJ->bindParam(":apellido",$cambioj["apellido"], PDO::PARAM_STR);
		$cambJ->bindParam(":tipo_documento",$cambioj["tipo_documento"], PDO::PARAM_STR);
		$cambJ->bindParam(":documento",$cambioj["documento"], PDO::PARAM_STR);
		$cambJ->bindParam(":fecha",$cambioj["fecha"], PDO::PARAM_STR);
		$cambJ->bindParam(":correo",$cambioj["correo"], PDO::PARAM_STR);
		$cambJ->bindParam(":sede",$cambioj["sede"], PDO::PARAM_STR);
		$cambJ->bindParam(":formacion",$cambioj["formacion"], PDO::PARAM_STR);
		$cambJ->bindParam(":jornada",$cambioj["jornada"], PDO::PARAM_STR);
		$cambJ->bindParam(":jornada_p",$cambioj["jornada_p"], PDO::PARAM_STR);
		$cambJ->bindParam(":ficha",$cambioj["ficha"], PDO::PARAM_STR);
		$cambJ->bindParam(":trimestre",$cambioj["trimestre"], PDO::PARAM_STR);
		$cambJ->bindParam(":motivos",$cambioj["motivos"], PDO::PARAM_STR);

		$cambJ->execute();

	}

	#registro de Cambio de Jornada
	#-------------------------------
	public static function registroCambioCentro($cambioc,$tabla){

		$cambC = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,sede_t,formacion,jornada,ficha,trimestre,descripcion) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:sede_t,:formacion,:jornada,:ficha,:trimestre,:descripcion)");

		$cambC->bindParam(":nombre",$cambioc["nombre"], PDO::PARAM_STR);
		$cambC->bindParam(":apellido",$cambioc["apellido"], PDO::PARAM_STR);
		$cambC->bindParam(":tipo_documento",$cambioc["tipo_documento"], PDO::PARAM_STR);
		$cambC->bindParam(":documento",$cambioc["documento"], PDO::PARAM_STR);
		$cambC->bindParam(":fecha",$cambioc["fecha"], PDO::PARAM_STR);
		$cambC->bindParam(":correo",$cambioc["correo"], PDO::PARAM_STR);
		$cambC->bindParam(":sede",$cambioc["sede"], PDO::PARAM_STR);
		$cambC->bindParam(":sede_t",$cambioc["sede_t"], PDO::PARAM_STR);
		$cambC->bindParam(":formacion",$cambioc["formacion"], PDO::PARAM_STR);
		$cambC->bindParam(":jornada",$cambioc["jornada"], PDO::PARAM_STR);
		$cambC->bindParam(":ficha",$cambioc["ficha"], PDO::PARAM_STR);
		$cambC->bindParam(":trimestre",$cambioc["trimestre"], PDO::PARAM_STR);
		$cambC->bindParam(":descripcion",$cambioc["descripcion"], PDO::PARAM_STR);

		$cambC->execute();

	}

	#registro de reingreso
	#-------------------------------
	public static function registroReingreso($reingreso,$tabla){

		$rein = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,formacion,jornada,ficha,trimestre) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:formacion,:jornada,:ficha,:trimestre)");

		$rein->bindParam(":nombre",$reingreso["nombre"], PDO::PARAM_STR);
		$rein->bindParam(":apellido",$reingreso["apellido"], PDO::PARAM_STR);
		$rein->bindParam(":tipo_documento",$reingreso["tipo_documento"], PDO::PARAM_STR);
		$rein->bindParam(":documento",$reingreso["documento"], PDO::PARAM_STR);
		$rein->bindParam(":fecha",$reingreso["fecha"], PDO::PARAM_STR);
		$rein->bindParam(":correo",$reingreso["correo"], PDO::PARAM_STR);
		$rein->bindParam(":sede",$reingreso["sede"], PDO::PARAM_STR);
		$rein->bindParam(":formacion",$reingreso["formacion"], PDO::PARAM_STR);
		$rein->bindParam(":jornada",$reingreso["jornada"], PDO::PARAM_STR);
		$rein->bindParam(":ficha",$reingreso["ficha"], PDO::PARAM_STR);
		$rein->bindParam(":trimestre",$reingreso["trimestre"], PDO::PARAM_STR);

		$rein->execute();

	}

	#registro de reingreso
	#-------------------------------
	public static function registroRetiro($retiro,$tabla){

		$reti = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,formacion,jornada,ficha,trimestre,causas) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:formacion,:jornada,:ficha,:trimestre,:causas)");

		$reti->bindParam(":nombre",$retiro["nombre"], PDO::PARAM_STR);
		$reti->bindParam(":apellido",$retiro["apellido"], PDO::PARAM_STR);
		$reti->bindParam(":tipo_documento",$retiro["tipo_documento"], PDO::PARAM_STR);
		$reti->bindParam(":documento",$retiro["documento"], PDO::PARAM_STR);
		$reti->bindParam(":fecha",$retiro["fecha"], PDO::PARAM_STR);
		$reti->bindParam(":correo",$retiro["correo"], PDO::PARAM_STR);
		$reti->bindParam(":sede",$retiro["sede"], PDO::PARAM_STR);
		$reti->bindParam(":formacion",$retiro["formacion"], PDO::PARAM_STR);
		$reti->bindParam(":jornada",$retiro["jornada"], PDO::PARAM_STR);
		$reti->bindParam(":ficha",$retiro["ficha"], PDO::PARAM_STR);
		$reti->bindParam(":trimestre",$retiro["trimestre"], PDO::PARAM_STR);
		$reti->bindParam(":causas",$retiro["causas"], PDO::PARAM_STR);

		$reti->execute();

	}

	#registro de aplazamiento
	#-------------------------------
	public static function registroAplazamiento($aplazamiento,$tabla){

		$apla = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,tipo_documento,documento,fecha,correo,sede,formacion,jornada,ficha,trimestre,motivos) VALUES (:nombre,:apellido,:tipo_documento,:documento,:fecha,:correo,:sede,:formacion,:jornada,:ficha,:trimestre,:motivos)");

		$apla->bindParam(":nombre",$aplazamiento["nombre"], PDO::PARAM_STR);
		$apla->bindParam(":apellido",$aplazamiento["apellido"], PDO::PARAM_STR);
		$apla->bindParam(":tipo_documento",$aplazamiento["tipo_documento"], PDO::PARAM_STR);
		$apla->bindParam(":documento",$aplazamiento["documento"], PDO::PARAM_STR);
		$apla->bindParam(":fecha",$aplazamiento["fecha"], PDO::PARAM_STR);
		$apla->bindParam(":correo",$aplazamiento["correo"], PDO::PARAM_STR);
		$apla->bindParam(":sede",$aplazamiento["sede"], PDO::PARAM_STR);
		$apla->bindParam(":formacion",$aplazamiento["formacion"], PDO::PARAM_STR);
		$apla->bindParam(":jornada",$aplazamiento["jornada"], PDO::PARAM_STR);
		$apla->bindParam(":ficha",$aplazamiento["ficha"], PDO::PARAM_STR);
		$apla->bindParam(":trimestre",$aplazamiento["trimestre"], PDO::PARAM_STR);
		$apla->bindParam(":motivos",$aplazamiento["motivos"], PDO::PARAM_STR);

		$apla->execute();

	}

#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	MOSTRAR NOMBRE ENCABEZADOS
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#Nombre Encabezados
	#-------------------------------
	public static function nombre($documento,$tabla){

		$nom =Conexion::conectar()->prepare("SELECT nombre,apellido FROM $tabla WHERE documento='$documento'");
		$nom->execute();

		foreach ($nom as $key) {
			echo "$key[nombre]"," ","$key[apellido]";
		}
	}
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	MOSTRAR actualizaciones
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	#Mostrar desercion 
	#-------------------------------
	 public static function mostrarDesercion($documento,$tabla){

	 	$deser=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$deser->execute();

	 	return $deser;
	}


	#Mostrar cambio Jornada
	#-------------------------------
	 public static function mostrarCambioJ($documento,$tabla){

	 	$cambioj=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$cambioj->execute();

	 	return $cambioj;
	}

	#Mostrar cambio Centro
	#-------------------------------
	 public static function mostrarCambioC($documento,$tabla){

	 	$cambioC=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$cambioC->execute();

	 	return $cambioC;
	}

	#Mostrar Aplazamiento
	#-------------------------------
	 public static function mostrarAplazamiento($documento,$tabla){

	 	$mostrar=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$mostrar->execute();

	 	return $mostrar;
	}

	#Mostrar Reingreso
	#-------------------------------
	 public static function mostrarReingreso($documento,$tabla){

	 	$mostrar=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$mostrar->execute();

	 	return $mostrar;
	}

	#Mostrar Retiro Voluntario
	#-------------------------------
	 public static function mostrarRetiroV($documento,$tabla){

	 	$mostrar=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE documento = '$documento'");
	 	$mostrar->execute();

	 	return $mostrar;
	}

#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	ACTUALIZAR DATOS
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#Actualizar rol 
	#-------------------------------
	public static function actualizarRol($datos,$documento,$tabla){

		$da=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
																apellido=:apellido,
																tipo_documento=:tipo_documento,
																documento=:documento,
																correo=:correo,
																rol=:rol
																WHERE documento = '$documento'");

		$da->bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
		$da->bindParam(":apellido",$datos["apellido"], PDO::PARAM_STR);
		$da->bindParam(":tipo_documento",$datos["tipo_documento"], PDO::PARAM_STR);
		$da->bindParam(":documento",$datos["documento"], PDO::PARAM_STR);
		$da->bindParam(":correo",$datos["correo"], PDO::PARAM_STR);
		$da->bindParam(":rol",$datos["rol"], PDO::PARAM_STR);

		$da->execute();
	}
	#Actualizar desercion 
	#-------------------------------
	public static function actualizarDesercion($desercion,$documento,$tabla){

		$aD=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 formacion=:formacion,
															 jornada=:jornada,
															 ficha=:ficha,
															 trimestre=:trimestre,
															 observaciones=:observaciones
															  WHERE documento='$documento'");

		$aD->bindParam(":nombre",$desercion["nombre"], PDO::PARAM_STR);
		$aD->bindParam(":apellido",$desercion["apellido"], PDO::PARAM_STR);
		$aD->bindParam(":tipo_documento",$desercion["tipo_documento"], PDO::PARAM_STR);
		$aD->bindParam(":documento",$desercion["documento"], PDO::PARAM_STR);
		$aD->bindParam(":fecha",$desercion["fecha"], PDO::PARAM_STR);
		$aD->bindParam(":correo",$desercion["correo"], PDO::PARAM_STR);
		$aD->bindParam(":sede",$desercion["sede"], PDO::PARAM_STR);
		$aD->bindParam(":formacion",$desercion["formacion"], PDO::PARAM_STR);
		$aD->bindParam(":jornada",$desercion["jornada"], PDO::PARAM_STR);
		$aD->bindParam(":ficha",$desercion["ficha"], PDO::PARAM_STR);
		$aD->bindParam(":trimestre",$desercion["trimestre"], PDO::PARAM_STR);
		$aD->bindParam(":observaciones",$desercion["observaciones"], PDO::PARAM_STR);

		$aD->execute();
	}

	#Actualizar cambio jornada
	#-------------------------------
	public static function actualizarCambioJ($cambioj,$documento,$tabla){

		$aCJ=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 formacion=:formacion,
															 jornada=:jornada,
															 jornada_p=:jornada_p,
															 ficha=:ficha,
															 trimestre=:trimestre,
															 motivos=:motivos
															  WHERE documento='$documento'");

		$aCJ->bindParam(":nombre",$cambioj["nombre"], PDO::PARAM_STR);
		$aCJ->bindParam(":apellido",$cambioj["apellido"], PDO::PARAM_STR);
		$aCJ->bindParam(":tipo_documento",$cambioj["tipo_documento"], PDO::PARAM_STR);
		$aCJ->bindParam(":documento",$cambioj["documento"], PDO::PARAM_STR);
		$aCJ->bindParam(":fecha",$cambioj["fecha"], PDO::PARAM_STR);
		$aCJ->bindParam(":correo",$cambioj["correo"], PDO::PARAM_STR);
		$aCJ->bindParam(":sede",$cambioj["sede"], PDO::PARAM_STR);
		$aCJ->bindParam(":formacion",$cambioj["formacion"], PDO::PARAM_STR);
		$aCJ->bindParam(":jornada",$cambioj["jornada"], PDO::PARAM_STR);
		$aCJ->bindParam(":jornada_p",$cambioj["jornada_p"], PDO::PARAM_STR);
		$aCJ->bindParam(":ficha",$cambioj["ficha"], PDO::PARAM_STR);
		$aCJ->bindParam(":trimestre",$cambioj["trimestre"], PDO::PARAM_STR);
		$aCJ->bindParam(":motivos",$cambioj["motivos"], PDO::PARAM_STR);

		$aCJ->execute();
	}

	#Actualizar cambio Centro
	#-------------------------------
	public static function actualizarCambioC($cambioc,$documento,$tabla){

		$aCC=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 sede_t=:sede_t,
															 formacion=:formacion,
															 jornada=:jornada,
															 ficha=:ficha,
															 trimestre=:trimestre,
															 descripcion=:descripcion
															  WHERE documento='$documento'");

		$aCC->bindParam(":nombre",$cambioc["nombre"], PDO::PARAM_STR);
		$aCC->bindParam(":apellido",$cambioc["apellido"], PDO::PARAM_STR);
		$aCC->bindParam(":tipo_documento",$cambioc["tipo_documento"], PDO::PARAM_STR);
		$aCC->bindParam(":documento",$cambioc["documento"], PDO::PARAM_STR);
		$aCC->bindParam(":fecha",$cambioc["fecha"], PDO::PARAM_STR);
		$aCC->bindParam(":correo",$cambioc["correo"], PDO::PARAM_STR);
		$aCC->bindParam(":sede",$cambioc["sede"], PDO::PARAM_STR);
		$aCC->bindParam(":sede_t",$cambioc["sede_t"], PDO::PARAM_STR);
		$aCC->bindParam(":formacion",$cambioc["formacion"], PDO::PARAM_STR);
		$aCC->bindParam(":jornada",$cambioc["jornada"], PDO::PARAM_STR);
		$aCC->bindParam(":ficha",$cambioc["ficha"], PDO::PARAM_STR);
		$aCC->bindParam(":trimestre",$cambioc["trimestre"], PDO::PARAM_STR);
		$aCC->bindParam(":descripcion",$cambioc["descripcion"], PDO::PARAM_STR);

		$aCC->execute();
	}

	#Actualizar Aplazamiento
	#-------------------------------
	public static function actualizarAplazamiento($apla,$documento,$tabla){

		$aA=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 formacion=:formacion,
															 jornada=:jornada,
															 ficha=:ficha,
															 trimestre=:trimestre,
															 motivos=:motivos
															  WHERE documento='$documento'");

		$aA->bindParam(":nombre",$apla["nombre"], PDO::PARAM_STR);
		$aA->bindParam(":apellido",$apla["apellido"], PDO::PARAM_STR);
		$aA->bindParam(":tipo_documento",$apla["tipo_documento"], PDO::PARAM_STR);
		$aA->bindParam(":documento",$apla["documento"], PDO::PARAM_STR);
		$aA->bindParam(":fecha",$apla["fecha"], PDO::PARAM_STR);
		$aA->bindParam(":correo",$apla["correo"], PDO::PARAM_STR);
		$aA->bindParam(":sede",$apla["sede"], PDO::PARAM_STR);
		$aA->bindParam(":formacion",$apla["formacion"], PDO::PARAM_STR);
		$aA->bindParam(":jornada",$apla["jornada"], PDO::PARAM_STR);
		$aA->bindParam(":ficha",$apla["ficha"], PDO::PARAM_STR);
		$aA->bindParam(":trimestre",$apla["trimestre"], PDO::PARAM_STR);
		$aA->bindParam(":motivos",$apla["motivos"], PDO::PARAM_STR);

		$aA->execute();
	}

	#Actualizar Reingreso 
	#-------------------------------
	public static function actualizarReingreso($reingreso,$documento,$tabla){

		$aR=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 formacion=:formacion,
															 jornada=:jornada,
															 ficha=:ficha,
															 trimestre=:trimestre
															  WHERE documento='$documento'");

		$aR->bindParam(":nombre",$reingreso["nombre"], PDO::PARAM_STR);
		$aR->bindParam(":apellido",$reingreso["apellido"], PDO::PARAM_STR);
		$aR->bindParam(":tipo_documento",$reingreso["tipo_documento"], PDO::PARAM_STR);
		$aR->bindParam(":documento",$reingreso["documento"], PDO::PARAM_STR);
		$aR->bindParam(":fecha",$reingreso["fecha"], PDO::PARAM_STR);
		$aR->bindParam(":correo",$reingreso["correo"], PDO::PARAM_STR);
		$aR->bindParam(":sede",$reingreso["sede"], PDO::PARAM_STR);
		$aR->bindParam(":formacion",$reingreso["formacion"], PDO::PARAM_STR);
		$aR->bindParam(":jornada",$reingreso["jornada"], PDO::PARAM_STR);
		$aR->bindParam(":ficha",$reingreso["ficha"], PDO::PARAM_STR);
		$aR->bindParam(":trimestre",$reingreso["trimestre"], PDO::PARAM_STR);

		$aR->execute();
	}

	#Actualizar Retiro Voluntario 
	#-------------------------------
	public static function actualizarRetiroV($retiro,$documento,$tabla){

		$aRV=Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,
															 apellido=:apellido,
															 tipo_documento= :tipo_documento,
															 documento=:documento,
															 fecha=:fecha,
															 correo=:correo,
															 sede=:sede,
															 formacion=:formacion,
															 jornada=:jornada,
															 ficha=:ficha,
															 trimestre=:trimestre,
															 causas=:causas
															  WHERE documento='$documento'");

		$aRV->bindParam(":nombre",$retiro["nombre"], PDO::PARAM_STR);
		$aRV->bindParam(":apellido",$retiro["apellido"], PDO::PARAM_STR);
		$aRV->bindParam(":tipo_documento",$retiro["tipo_documento"], PDO::PARAM_STR);
		$aRV->bindParam(":documento",$retiro["documento"], PDO::PARAM_STR);
		$aRV->bindParam(":fecha",$retiro["fecha"], PDO::PARAM_STR);
		$aRV->bindParam(":correo",$retiro["correo"], PDO::PARAM_STR);
		$aRV->bindParam(":sede",$retiro["sede"], PDO::PARAM_STR);
		$aRV->bindParam(":formacion",$retiro["formacion"], PDO::PARAM_STR);
		$aRV->bindParam(":jornada",$retiro["jornada"], PDO::PARAM_STR);
		$aRV->bindParam(":ficha",$retiro["ficha"], PDO::PARAM_STR);
		$aRV->bindParam(":trimestre",$retiro["trimestre"], PDO::PARAM_STR);
		$aRV->bindParam(":causas",$retiro["causas"], PDO::PARAM_STR);

		$aRV->execute();
	}

#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	ELIMINAR
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#Eliminacion Desercion 
	#----------------------------------------------------------------------------

	public static function eliminarDesercion($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();
	}


	#Eliminacion cambio Jornada
	#----------------------------------------------------------------------------

	public static function eliminarCambioJ($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();
	}

	#Eliminacion cambio Jornada
	#----------------------------------------------------------------------------

	public static function eliminarCambioC($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();
	}

	#Eliminacion Aplazamiento
	#----------------------------------------------------------------------------

		public static function eliminarAplazamiento($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();

	}

	#Eliminacion Aplazamiento
	#----------------------------------------------------------------------------

		public static function eliminarReingreso($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();

	}

	#Eliminacion Retiro Voluntario
	#----------------------------------------------------------------------------

		public static function eliminarRetiroV($documento,$tabla){

		$eliminar=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE documento='$documento'");
		$eliminar->execute();

	}

}

?>