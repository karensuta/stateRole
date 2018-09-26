<?php 
require_once '../../model/ins.php';

class Instructor
{

//-------------------------------------------
	//APRENDICES
//-------------------------------------------

	//imprime aprendiz
	public function aprendiz($documento){

		$res = Inst::existeAprendiz($documento);
		if ($_SESSION["aprendiz"]!=0) {
			$_SESSION["aprendiz"]=0;
			$res = Inst::aprendiz($documento);
			return $res;
		}else{
			$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
			header('location: ../../../views/instructor/registroDesercion.php');
		}
	}



//-------------------------------------------
	//Novedades
//-------------------------------------------

	//registra desercion
	public function desercion($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Inst::desercion($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroDesercion.php');
	}

	//treae informacion de la tabla novedad
	public function novedad($id_usuario){

		$ac = Admin::novedad($id_usuario);
		return $ac;
	}
	//----------------------------------------
	//Desercion
	//----------------------------------------

	//imprime el listado de las deserciones
	public function listadoDesercion(){

		$res = Inst::consultarDesercion("novedad");

		return $res;
	}
	//----------------------------------------
	//Cambio jornada
	//----------------------------------------

	//imprime el listado del cambio de jornada
	public function listadoCJornada(){

		$res = Inst::consultarCJornada("novedad");

		return $res;
	}

	//----------------------------------------
	//Cambio sede
	//----------------------------------------

	//imprime el listado del cambio de sede
	public function listadoCSede(){

		$res = Inst::consultarCSede("novedad");

		return $res;
	}

	//----------------------------------------
	//Aplazamiento
	//----------------------------------------

	//imprime el listado de los aplazamientos
	public function listadoAplazamiento(){

		$res = Inst::consultarAplazamiento("novedad");

		return $res;
	}


	//----------------------------------------
	//Reingreso
	//----------------------------------------

	//imprime el listado de los reingresos
		public function listadoReingreso(){

		$res = Inst::consultarReingreso("novedad");

		return $res;
	}

	//----------------------------------------
	//Reingreso
	//----------------------------------------

		//imprime el listado de los reingresos
			public function listadoRetiro(){

			$res = Inst::consultarRetiro("novedad");

			return $res;
		}

}
?>