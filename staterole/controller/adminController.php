<?php 
require_once '../../model/admin.php';

class Administrador
{
//-------------------------------------------
	//Usuarios
//-------------------------------------------
	//consulta datos de los usuarios
	public function consultarUsuario($documento){

		$res = Admin::existeUsuario($documento);

		if ($_SESSION["usuario"] != 0) {
			$_SESSION["usuario"]=0;
			$us = Admin::consultarUsuario($documento);
			return $us;
		}else{
			$_SESSION["usuario"]=$_SESSION["usuario"]+2;
			header('location: ../../views/admin/inicio.php');
		}
	}

	//imprime el listado de los usuarios
	public function listadoUsuarios(){

		$res = Admin::listadoUsuarios("usuario");

		return $res;
	}


	//hablitar usuario 
	public function habilitarUsuario($documento){

		$ha = Admin::repetirHabilitado($documento);
		
		if ($_SESSION["repetirH"] <= 0) {
			$ha = Admin::habilitarUsuario($documento,"habilitados");
			$_SESSION["repetirH"]=$_SESSION["repetirH"]+2;
			header('location: ../../views/admin/habilitar.php');
		}else{
			header('location: ../../views/admin/habilitar.php');
		}
	}

	public function listaHabilitado(){

		$ha = Admin::listaHabilitado('habilitados');

		return $ha;
	}

	//----------------
	// 	Actualizar
	//----------------


	//actualizar datos del usuario (rol)
	public function actualizarDatos($n_p_nombre,$n_s_nombre,$n_p_apellido,$n_s_apellido,$n_id_tipo_documento,$doc,$n_docuemnto,$n_correo,$n_id_rol){

		$datos = array('p_nombre' => $_POST["n_p_nombre"],
						's_nombre' => $_POST["n_s_nombre"],
						'p_apellido' => $_POST["n_p_apellido"],
						's_apellido' => $_POST["n_s_apellido"],
						'id_tipo_documento' => $_POST["n_id_tipo_documento"],
						'documento' => $_POST["n_docuemnto"],
						'correo' => $_POST["n_correo"],
						'id_rol' => $_POST["n_id_rol"]);

		$res = Admin::actualizarDatos($datos,$doc,"usuario");
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/inicio.php');
	}

//-------------------------------------------
	//APRENDICES
//-------------------------------------------

	//imprime aprendiz
	public function aprendiz($documento){

		$res = Admin::existeAprendiz($documento);
		if ($_SESSION["aprendiz"]!=0) {
			$_SESSION["aprendiz"]=0;
			$res = Admin::aprendiz($documento);
			return $res;
		}else{
			$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
			header('location: ../../views/admin/registroDesercion.php');
		}
	}



	//Registra aprendiz el administrador
	public function registrarAprendiz($p_nombre,$s_nombre,$p_apellido,$s_apellido,$id_tipo_documento,$documento,$correo,$id_rol,$id_sede,$id_ficha,$id_jornada,$id_trimestre){

		$datos = array('p_nombre' => $_POST["p_nombre"],
						's_nombre' => $_POST["s_nombre"],
						'p_apellido' => $_POST["p_apellido"],
						's_apellido' => $_POST["s_apellido"],
						'id_tipo_documento' => $_POST["id_tipo_documento"],
						'documento' => $_POST["documento"],
						'correo' => $_POST["correo"],
						'id_rol' => $_POST["id_rol"],
						'id_sede' => $_POST["id_sede"],
						'id_ficha' => $_POST["id_ficha"],
						'id_jornada' => $_POST["id_jornada"],
						'id_trimestre' => $_POST["id_trimestre"] );
		
		//revisa que este aprendiz no aya estado registrado
		$res = Admin::repetirAprendiz($documento,"usuario");

		if ($_SESSION["repetir"] <= 0) {
			$res = Admin::registrarAprendiz($datos,"usuario");
			$_SESSION["registroA"]=$_SESSION["registroA"]+1;
			header('location: ../../views/admin/registroAprendiz.php');
		}else{
			header('location: ../../views/admin/registroAprendiz.php');
		}
	}

	//imprime el listado de los aprendices
	public function listadoAprendiz(){

		$res = Admin::listadoAprendiz("usuario");

		return $res;
	}



//-------------------------------------------
	//PROGRAMAS DE FORMACION
//-------------------------------------------

	//regsitro del programa de formacion
	public function registrarPrograma($programa){

		$res = Admin::registrarPrograma($programa);
		$_SESSION["programa"]=$_SESSION["programa"]+1;
		header('location: ../../views/admin/registroPrograma.php');
	}
	
	//imprime el listado de los programas
	public function listadoPrograma(){

		$res = Admin::listadoPrograma("formacion");

		return $res;
	}

//-------------------------------------------
	//FICHAS
//-------------------------------------------

	//registro de la ficha
	public function registrarFicha($ficha,$id_formacion){

		//revisa si la ficha ya esta registrada 
		$res = Admin::repetirFicha($ficha,"ficha");

		if ($_SESSION["repetir"] <= 0) {
			$res = Admin::registrarFicha($ficha,$id_formacion);
			$_SESSION["ficha"]=$_SESSION["ficha"]+1;
			header('location: ../../views/admin/registroFicha.php');
		}else{
			header('location: ../../views/admin/registroFicha.php');
		}
	}

	//imprime el listado de las fichas
	public function listadoFicha(){

		$res = Admin::listadoFicha("ficha");

		return $res;
	}

//-------------------------------------------
	//Novedades
//-------------------------------------------

	//trae informacion de la tabla novedad segin la novedad que se necesite
	//eso se ve por la id_tipo_novedad
	public function novedad($id_usuario,$id_tipo_novedad){

		$ac = Admin::novedad($id_usuario,$id_tipo_novedad);
		return $ac;
	}

	//----------------
	// 	Desercion
	//----------------

	//registra desercion
	public function registrarDesercion($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarDesercion($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroDesercion.php');
	}

	//imprime el listado de las deserciones
	public function listadoDesercion(){

		$res = Admin::consultarDesercion("novedad");

		return $res;
	}

	//actualiza desercion
	public function actualizarDesercion($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarDesercion($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoDesercion.php');
	}

	//Elimina desercion
	public function eliminarDesercion($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarDesercion($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoDesercion.php');
	}

	//----------------
	// 	Cambio de jornada
	//----------------
	
	//registra cambio de jornada
	public function registrarCJornada($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarCJornada($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroCJornada.php');
	}

	//imprime el listado del cambio de jornada
	public function listadoCJornada(){

		$res = Admin::consultarCJornada("novedad");

		return $res;
	}

	//actualiza cambio de jornada
	public function actualizarCJornada($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarCJornada($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoCJornada.php');
	}

	//Elimina Cambio de jornada
	public function eliminarCJornada($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarCJornada($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoCJornada.php');
	}

	//----------------
	// 	Cambio de sede
	//----------------
	
	//registra cambio de jornada
	public function registrarCSede($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarCSede($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroCSede.php');
	}

	//imprime el listado del cambio de jornada
	public function listadoCSede(){

		$res = Admin::consultarCSede("novedad");

		return $res;
	}

	//actualiza cambio de sede
	public function actualizarCSede($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarCSede($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoCSede.php');
	}

	//Elimina Cambio de sede
	public function eliminarCSede($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarCSede($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoCSede.php');
	}

	//----------------
	// 	Aplazamiento
	//----------------
	
	//registra cambio de jornada
	public function registrarAplazamiento($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarAplazamiento($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroAplazamiento.php');
	}

	//imprime el listado de los aplazamientos
	public function listadoAplazamiento(){

		$res = Admin::consultarAplazamiento("novedad");

		return $res;
	}

	//actualiza aplazamiento
	public function actualizarAplazamiento($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarAplazamiento($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoAplazamiento.php');
	}

	//Elimina Aplazamiento
	public function eliminarAplazamiento($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarAplazamiento($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoAplazamiento.php');
	}

	//----------------
	// 	Reingreso
	//----------------
	
	//registra Reingreso
	public function registrarReingreso($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarReingreso($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroReingreso.php');
	}

	//imprime el listado de los reingresos
	public function listadoReingreso(){

		$res = Admin::consultarReingreso("novedad");

		return $res;
	}

	//actualiza Reingreso
	public function actualizarReingreso($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarReingreso($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoReingreso.php');
	}

	//Elimina Reingreso
	public function eliminarReingreso($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarReingreso($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoReingreso.php');
	}

	//----------------
	// 	Retiro
	//----------------
	
	//registra Reingreso
	public function registrarRetiro($id_usuario,$id_tipo_novedad,$fecha,$observacion){

		$datos = array('id_usuario' => $_POST["id_usuario"],
						  'id_tipo_novedad' => $_POST["id_tipo_novedad"],
						  'fecha' => $_POST["fecha"],
					      'observacion' => $_POST["observacion"]);
		$res = Admin::registrarRetiro($datos,"novedad");
		$_SESSION['novedad']=$_SESSION['novedad']+2;
		header('location: ../../views/admin/registroRetiro.php');
	}

	//imprime el listado de los reingresos
	public function listadoRetiro(){

		$res = Admin::consultarRetiro("novedad");

		return $res;
	}

	//actualiza Retiro
	public function actualizarRetiro($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarRetiro($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		header('location: ../../views/admin/listadoRetiro.php');
	}

	//Elimina Retiro
	public function eliminarRetiro($id_usuario,$id_tipo_novedad){
		$res = Admin::eliminarRetiro($id_usuario,$id_tipo_novedad);
		$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
		header('location: ../../views/admin/listadoRetiro.php');
	}

}
?>