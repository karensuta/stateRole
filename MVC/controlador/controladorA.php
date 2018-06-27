<?php 
require '../../modelo/crud.php';

class ControladorActualizar{
#----------------------------------------------------------------------------------------------------------------------

	#Actualizar desercion
	#-------------------------------
	public function actualizarDatos($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento,$correo_nuevo,$rol_nuevo){

		$datos = array ("nombre"=>$_POST["nombre_nuevo"],
						"apellido"=>$_POST["apellido_nuevo"],
						"tipo_documento"=>$_POST["tipo_nuevo"],
						"documento"=>$_POST["documento"],
						"correo"=>$_POST["correo_nuevo"],
						"rol"=>$_POST["rol_nuevo"]);

		$documento=$_POST["documento"];

		$nueva= Datos::actualizarRol($datos,$documento,"usuarios");
		header('location: ../../vista/administrador/inicio.php');
	}

	#Actulizar desercion
	#-------------------------------
	public function actualizarDesercion($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$observaciones_nuevo){		

		$desercion= array ("nombre"=>$_POST["nombre_nuevo"],
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
							"observaciones"=>$_POST["observaciones_nuevo"]);

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarDesercion($desercion,$documento,"desercion");
		header('location: ../../vista/administrador/actualizacionE.php');

	}

	#Actulizar Cambio Jornada
	#-------------------------------
	public function actualizarCambioJ($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$jornada_p_nuevo,$ficha_nuevo,$trimestre_nuevo,$motivos_nuevo){		

		

		$cambioj= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_nuevo"],
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

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarCambioJ($cambioj,$documento,"cambio_jornada");
		header('location: ../../vista/administrador/actualizacionE.php');

	}

	#Actulizar Cambio Centro
	#-------------------------------
	public function actualizarCambioC($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$sede_t_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$descripcion_nuevo){		

		

		$cambioc= array ("nombre"=>$_POST["nombre_nuevo"],
							"apellido"=>$_POST["apellido_nuevo"],
							"tipo_documento"=>$_POST["tipo_nuevo"],
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

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarCambioC($cambioc,$documento,"cambio_centro");
		header('location: ../../vista/administrador/actualizacionE.php');

	}

	#Actulizar Aplazamiento
	#-------------------------------
	public function actualizarAplazamiento($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$motivos_nuevo){		

		

		$apla= array ("nombre"=>$_POST["nombre_nuevo"],
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
							"motivos"=>$_POST["motivos_nuevo"]);

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarAplazamiento($apla,$documento,"aplazamiento");
		header('location: ../../vista/administrador/actualizacionE.php');

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

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarReingreso($reingreso,$documento,"reingreso");
		header('location: ../../vista/administrador/actualizacionE.php');

	}

	#Actulizar Retiro Voluntario
	#-------------------------------
	public function actualizarRetiroV($nombre_nuevo,$apellido_nuevo,$tipo_nuevo,$documento_nuevo,$fecha_nuevo,$correo_nuevo,$sede_nuevo,$formacion_nuevo,$jornada_nuevo,$ficha_nuevo,$trimestre_nuevo,$causas_nuevo){		

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
							"causas"=>$_POST["causas_nuevo"]);

		$documento=$_POST["documento_nuevo"];

		$nuevo= Datos::actualizarRetiroV($retiro,$documento,"retiro_voluntario");
		header('location: ../../vista/administrador/actualizacionE.php');

	}



}