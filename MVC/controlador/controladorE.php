<?php 
require_once '../../../modelo/crud.php';

class ControladorEliminar{

	#Eliminacion Desercion 
	#----------------------------------------------------------------------------
	public function eliminarDesercion($documento){

		$nuevo=Datos::eliminarDesercion($documento,"desercion");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}

	#Eliminacion cambio Jornada
	#----------------------------------------------------------------------------
	public function eliminarCambioJ($documento){

		$nuevo=Datos::eliminarCambioJ($documento,"cambio_jornada");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}

	#Eliminacion cambio Centro
	#----------------------------------------------------------------------------
	public function eliminarCambioC($documento){

		$nuevo=Datos::eliminarCambioC($documento,"cambio_centro");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}

	#Eliminacion Aplazamiento
	#----------------------------------------------------------------------------
	public function eliminarAplazamiento($documento){

		$nuevo=Datos::eliminarAplazamiento($documento,"aplazamiento");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}

	#Eliminacion Reingreso
	#----------------------------------------------------------------------------
	public function eliminarReingreso($documento){

		$nuevo=Datos::eliminarReingreso($documento,"reingreso");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}

	#Eliminacion Retiro Voluntario
	#----------------------------------------------------------------------------
	public function eliminarRetiroV($documento){

		$nuevo=Datos::eliminarRetiroV($documento,"retiro_voluntario");
		header('location: ../../../vista/administrador/actualizacionE.php');
	}
}


?>