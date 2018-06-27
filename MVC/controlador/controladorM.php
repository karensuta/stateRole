<?php 
require '../../../modelo/crud.php';

class ControladorMostrar{

#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	MOSTRAR DATOS
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#buscador
	#-------------------------------
	public static function nombreBuscar($documento){

		$respuesta= $_POST["documento"];
		$respuesta= Datos::nombre($documento,"usuarios");
	}

	#nombre desercion
	#-------------------------------
	public static function nombreDesercion($documento){

		$respuesta= Datos::nombre($documento,"desercion");
	}

	#nombre cambio Jornada
	#-------------------------------
	public static function nombreCambioj($documento){

		$respuesta= Datos::nombre($documento,"cambio_jornada");
	}
	#nombre cambio centro
	#-------------------------------
	public static function nombreCambioc($documento){

		$respuesta= Datos::nombre($documento,"cambio_centro");
	}
	#nombre aplazamineto
	#-------------------------------
	public static function nombreAplazamiento($documento){

		$respuesta= Datos::nombre($documento,"aplazamiento");
	}
	#nombre Reingreso
	#-------------------------------
	public static function nombreReingresos($documento){

		$respuesta= Datos::nombre($documento,"reingreso");
	}
	#nombre Retiro Voluntario
	#-------------------------------
	public static function nombreRetiroV($documento){

		$respuesta= Datos::nombre($documento,"retiro_voluntario");
	}

#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	MOSTRAR actualizaciones
#-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#mostar datos
	#-------------------------------
	public static function mostrarDatos($documento){

		$documento= $_POST["documento"];
		$datos = $respuesta= Datos::mostrarDesercion($documento,"usuarios");
		return $datos;
	}

	#mostar desercion
	#-------------------------------
	public static function mostrarDesercion($documento){

		$documento= $_POST["documento"];
		$deser = $respuesta= Datos::mostrarDesercion($documento,"desercion");
		return $deser;
	}

	#mostar cambio jornada
	#-------------------------------
	public function mostrarCambioJ($documento){

		$respuesta = $_POST["documento"];
		$deser = $respuestaMDesercion = Datos::mostrarCambioJ($respuesta,"cambio_jornada");
		return $deser;
	}
	#mostar cambio centro
	#-------------------------------
	public function mostrarCambioC($documento){

		$respuesta = $_POST["documento"];
		$deser = $respuestaMDesercion = Datos::mostrarCambioC($respuesta,"cambio_Centro");
		return $deser;
	}
	#mostar Apalazamiento
	#-------------------------------
	public function mostrarAplazamiento($documento){

		$respuesta = $_POST["documento"];
		$mostrar = $respuestaMAplazamiento = Datos::mostrarAplazamiento($respuesta,"aplazamiento");
		return $mostrar;
	}
	#mostar Reingreso
	#-------------------------------
	public function mostrarReingreso($documento){

		$respuesta = $_POST["documento"];
		$mostrar = $respuestaMReingreso = Datos::mostrarReingreso($respuesta,"reingreso");
		return $mostrar;
	}
	#mostar Retiro Voluntario
	#-------------------------------
	public function mostrarRetiroV($documento){

		$respuesta = $_POST["documento"];
		$mostrar = $respuestaMRetiroV = Datos::mostrarRetiroV($respuesta,"retiro_voluntario");
		return $mostrar;
	}


#----------------------------------------------------------------------------------------------------------------------
	#Actulizar Datos del Usuario
	#-------------------------------
	public function actualizar($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento,$correo_nuevo,$rol_nuevo){		

		$datos= array ("nombre"=>$_POST["nombre_nuevo"],
						"apellido"=>$_POST["apellido_nuevo"],
						"tipo_documento"=>$_POST["tipo_nuevo"],
						"documento"=>$_POST["documento_nuevo"],
						"correo"=>$_POST["correo_nuevo"],
						"rol"=>$_POST["rol_nuevo"]);

		$nuevo= Datos::actualizarDesercion($datos,"usuarios");
		return $actualizarDa;
	}

	#Actulizar desercion
	#-------------------------------
	public function actualizarDesercion($nombre_nuevo,$apellido_nuevo,$tipo_documento_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$observaciones_nuevo){		

		$desercion= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_documento_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"],
							"observaciones"=>$_POST["observaciones_nuevo"]);

		$nuevo= Datos::actualizarDesercion($desercion,"desercion");
		return $actualizarD;
	}

	#Actulizar Cambio Jornada
	#-------------------------------
	public function actualizarCambioJ($nombre_nuevo,$apellido_nuevo,$tipo_documento_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$jornada_p_nuevo,$ficha_nuevo,$trimestre_nuevo,$motivos_nuevo){		

		$cambioj= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_documento_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"jornada_p"=>$_POST["jornada_p_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"],
							"motivos"=>$_POST["motivos_nuevo"]);

		$nuevo= Datos::actualizarCambioJ($cambioj,"cambio_jornada");
		return $cambioj;
	}
	#Actulizar Cambio Centro
	#-------------------------------
	public function actualizarCambioC($nombre_nuevo,$apellido_nuevo,$tipo_documento_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$sede_t_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$descripcion_nuevo){		

		$cambioc= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_documento_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"sede_t"=>$_POST["sede_t_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"],
							"descripcion"=>$_POST["descripcion_nuevo"]);

		$nuevo= Datos::actualizarCambioC($cambioc,"cambio_centro");
		return $cambioc;
	}
	#Actulizar Aplazamiento
	#-------------------------------
	public function actualizarAplazamiento($nombre_nuevo,$apellido_nuevo,$tipo_documento_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$motivos_nuevo){		

		$apla= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_documento_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"],
							"motivos"=>$_POST["motivos_nuevo"]);

		$nuevo= Datos::actualizarAplazamiento($apla,"aplazamiento");
		return $apla;
	}
	#Actulizar Reingreso
	#-------------------------------
	public function actualizarReingreso($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo){		

		$reingreso= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"]);

		$nuevo= Datos::actualizarReingreso($reingreso,"reingreso");
		return $actualizarR;
	}

	#Actulizar Retiro Voluntario
	#-------------------------------
	public function actualizarRetiroV($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$causas){		

		$retiro= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_nuevo"],
							"documento"=>$_POST["documento_nuevo"],
							"fecha"=>$_POST["fecha_nuevo"],
							"correo"=>$_POST["correo_nuevo"],
							"sede"=>$_POST["sede_nuevo"],
							"formacion"=>$_POST["formacion_nuevo"],
							"jornada"=>$_POST["jornada_nuevo"],
							"ficha"=>$_POST["ficha_nuevo"],
							"trimestre"=>$_POST["trimestre_nuevo"],
							"causas"=>$_POST["causas"]);

		$nuevo= Datos::actualizarRetiroV($retiro,"retiro_voluntario");
		return $actualizarRV;
	}

}