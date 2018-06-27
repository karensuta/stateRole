<?php 
require '../../modelo/crud.php';

class Controladores{

	#Esta es la planatilla
	#------------------------------------
	public function pagina(){

		include "vista/login/login.php";
	}

	#registro de los usuarios
	#-----------------------------------
	public function registroUsurios($nombre,$apellido,$tipo_documento,$documento,$correo,$contrasena,$c_contrasena){

		if($contrasena == $c_contrasena){

			if(isset($_POST["nombre"]))
			{
				$datos = array("nombre"=>$_POST["nombre"],
								"apellido"=>$_POST["apellido"],
								"tipo_documento"=>$_POST["tipo_documento"],
								"documento"=>$_POST["documento"],
							   	"correo"=>$_POST["correo"],
							   	"contrasena"=>$_POST["contrasena"],
							   	"c_contrasena"=>$_POST["c_contrasena"]);

				$respuesta = Datos::registroUsuario($datos,"usuarios");
				header('location: ../vista/login.php');
			}
		}
		else{
			header('location: ../vista/login/login_contrasena.php');
		}
	}

	#registro de las deseriones
	#-------------------------------
	public function registroDesercion($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$formacion,$jornada,$ficha,$trimestre,$observaciones){

		$desercion= array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"],
							"observaciones"=>$_POST["observaciones"]);

		$respuestaDesercion = Datos::registroDesercion($desercion,"desercion");
		header('location: ../../vista/inicio.php');
	}

	#registro de Cambio de Jornada
	#-------------------------------
	public function registroCambioJornada($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$formacion,$jornada,$jornada_p,$ficha,$trimestre,$motivos){

		$cambioj = array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"jornada_p"=>$_POST["jornada_p"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"],
							"motivos"=>$_POST["motivos"]);

		$respuestaCambioJ = Datos::registroCambioJornada($cambioj,"cambio_jornada");
		header('location: ../../vista/inicio.php');
	}

	#registro de Cambio de centro
	#-------------------------------
	public function registroCambioCentro($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$sede_t,$formacion,$jornada,$ficha,$trimestre,$descripcion){

		$cambioc = array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"sede_t"=>$_POST["sede_t"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"],
							"descripcion"=>$_POST["descripcion"]);

		$respuestaCambioC = Datos::registroCambioCentro($cambioc,"cambio_centro");
		header('location: ../../vista/inicio.php');

	}

	#registro de reingreso
	#-------------------------------
	public function registroReingreso($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$formacion,$jornada,$ficha,$trimestre){

		$reingreso = array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"]);

		$respuestaReingreso = Datos::registroReingreso($reingreso,"reingreso");
		header('location: ../../vista/inicio.php');

	}

	#registro de retiro voluntario
	#-------------------------------
	public function registroRetiro($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$formacion,$jornada,$ficha,$trimestre,$causas){

		$retiro = array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"],
							"causas"=>$_POST["causas"]);

		$respuestaRetiro = Datos::registroRetiro($retiro,"retiro_voluntario");
		header('location: ../../vista/inicio.php');

	}

	#registro de aplazamineto
	#-------------------------------
	public function registroAplazamiento($nombre,$apellido,$tipo_documento,$documento,$fecha,$correo,$sede,$formacion,$jornada,$ficha,$trimestre,$motivos){

		$aplazamiento = array ("nombre"=>$_POST["nombre"],
							"apellido"=>$_POST["apellido"],
							"tipo_documento"=>$_POST["tipo_documento"],
							"documento"=>$_POST["documento"],
							"fecha"=>$_POST["fecha"],
							"correo"=>$_POST["correo"],
							"sede"=>$_POST["sede"],
							"formacion"=>$_POST["formacion"],
							"jornada"=>$_POST["jornada"],
							"ficha"=>$_POST["ficha"],
							"trimestre"=>$_POST["trimestre"],
							"motivos"=>$_POST["motivos"]);

		$respuestaAplazamiento = Datos::registroAplazamiento($aplazamiento,"aplazamiento");
		header('location: ../../vista/inicio.php');

	}

}

?>