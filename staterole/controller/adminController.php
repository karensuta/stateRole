<?php 
require_once '../../model/admin.php';

class Administrador
{
//-------------------------------------------
	//Usuarios
//-------------------------------------------
	//consulta datos de los usuarios
	public function consultarUsuario($documento,$rolC){

		$res = Admin::existeUsuario($documento);

		if ($_SESSION["usuario"] != 0) {
			$_SESSION["usuario"]=0;
				$us = Admin::usuario($documento,$rolC);
				return $us;
			
		}else{
			$_SESSION["usuario"]=$_SESSION["usuario"]+2;
			if ($_SESSION["id_rol"]==1) {
				header('location: ../../views/admin/inicio.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/informacionUsuario.php');
			}
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
			if ($_SESSION["id_rol"]==1) {
				header('location: ../../views/admin/habilitar.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/habilitar.php');
			}
		}else{
			if ($_SESSION["id_rol"]==1) {
				header('location: ../../views/admin/habilitar.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/habilitar.php');
			}
		}
	}

	public function listaHabilitado(){

		$ha = Admin::listaHabilitado('habilitados');

		return $ha;
	}

	//elimina los usuarios que estan habilitados
	public function eliminarHabilitado($doc){
		$res = Admin::eliminarHabilitado($doc);
		$_SESSION["usuario"]=$_SESSION["usuario"]+2;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/listadoHabilitado.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/listadoHabilitado.php');
		}
	}

	//elimina los usuarios del sistema
	public function eliminarUsuario($doc){
		$res = Admin::eliminarUsuario($doc);
		$_SESSION["usuario"]=$_SESSION["usuario"]+2;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/listadoUsuarios.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/listadoUsuarios.php');
		}
	}

	//elimina el aprendiz del sistema
	public function eliminarAprendiz($doc){
		$res = Admin::eliminarAprendiz($doc);
		$_SESSION["usuario"]=$_SESSION["usuario"]+2;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/listadoAprendiz.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/listadoAprendiz.php');
		}
	}

	//elimina programa de formacion del sistema
	public function eliminarPrograma($for){
		$res = Admin::eliminarPrograma($for);
		$_SESSION["programa"]=$_SESSION["programa"]+2;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/programa.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/programa.php');
		}
	}

	//elimina programa de formacion del sistema
	public function eliminarFicha($ficha){
		$res = Admin::eliminarFicha($ficha);
		$_SESSION["usuario"]=$_SESSION["usuario"]+2;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/listadoFicha.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/listadoFicha.php');
		}
	}

	//----------------
	// 	Actualizar
	//----------------


	//actualizar datos del usuario incluyendo el rol (rol)
	public function actualizarDatosU($n_p_nombre,$n_s_nombre,$n_p_apellido,$n_s_apellido,$n_id_tipo_documento,$doc,$n_correo,$n_id_rol,$rolC){

		$datos = array('p_nombre' => $_POST["n_p_nombre"],
						's_nombre' => $_POST["n_s_nombre"],
						'p_apellido' => $_POST["n_p_apellido"],
						's_apellido' => $_POST["n_s_apellido"],
						'id_tipo_documento' => $_POST["n_id_tipo_documento"],
						'correo' => $_POST["n_correo"],
						'id_rol' => $_POST["n_id_rol"]);

		$res = Admin::actualizarDatos($datos,$doc,"usuario",$rolC);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/inicio.php');
		}
		if ($_SESSION["id_rol"]==5) {
			header('location: ../../views/super/informacionUsuario.php');
		}
	}

	//actualizar datos del usuario incluyendo el rol (rol)
	public function actualizarDatosA($n_p_nombre,$n_s_nombre,$n_p_apellido,$n_s_apellido,$n_id_tipo_documento,$doc,$n_correo,$n_id_rol,$n_id_sede,$n_id_ficha,$n_id_jornada,$n_id_trimestre,$rolC,$volver){

		$datos = array('p_nombre' => $_POST["n_p_nombre"],
						's_nombre' => $_POST["n_s_nombre"],
						'p_apellido' => $_POST["n_p_apellido"],
						's_apellido' => $_POST["n_s_apellido"],
						'id_tipo_documento' => $_POST["n_id_tipo_documento"],
						'correo' => $_POST["n_correo"],
						'id_rol' => $_POST["n_id_rol"],
						'id_sede' => $_POST["n_id_sede"],
						'id_ficha' => $_POST["n_id_ficha"],
						'id_jornada' => $_POST["n_id_jornada"],
						'id_trimestre' => $_POST["n_id_trimestre"]);
		
		$res = Admin::actualizarDatos($datos,$doc,"usuario",$rolC);

		if ($volver==0) {
			
			if ($_SESSION["id_rol"]==1) {
				$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
				header('location: ../../views/admin/inicio.php');
			}
			if ($_SESSION["id_rol"]==5) {
				$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
				header('location: ../../views/super/informacionUsuario.php');
			}
		}else{
			if ($_SESSION["id_rol"]==5) {
				$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
				header('location: ../../views/super/listadoAprendiz.php');
			}
		}

		
	}

//-------------------------------------------
	//APRENDICES
//-------------------------------------------

	//imprime aprendiz
	public function aprendiz($documento,$novedad){

		$res = Admin::existeAprendiz($documento);
		if ($_SESSION["aprendiz"]!=0) {
			$_SESSION["aprendiz"]=0;

			if ($novedad == 10) {
				$res = Admin::aprendiz($documento);
				return $res;
			}
			$op = $res = Admin::verificaNovedad($documento);
			
			if ($op) {
				switch ($novedad) {
					case '1':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroDesercion.php');
						}
						if ($_SESSION["id_rol"]==2) {
							header('location: ../../views/instructor/registroDesercion.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroDesercion.php');
						}
						break;
					
					case '2':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroAplazamiento.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroAplazamiento.php');
						}
						break;

					case '3':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroReingreso.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroReingreso.php');
						}
						break;

					case '4':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroRetiro.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroRetiro.php');
						}
						break;

					case '5':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroCSede.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroCSede.php');
						}
						break;

					case '6':
						$_SESSION["novedad"]=$_SESSION["novedad"]+1;
						if ($_SESSION["id_rol"]==1) {
							header('location: ../../views/admin/registroCJornada.php');
						}
						if ($_SESSION["id_rol"]==5) {
							header('location: ../../views/super/registroCJornada.php');
						}
						break;
				}
			}if (!$op) {
				$res = Admin::aprendiz($documento);
				return $res;
			}


		}else{
			switch ($novedad) {
				case '1':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroDesercion.php');
					}
					if ($_SESSION["id_rol"]==2) {
							header('location: ../../views/instructor/registroDesercion.php');
						}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroDesercion.php');
					}
					break;
					
				case '2':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroAplazamiento.php');
					}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroAplazamiento.php');
					}
					break;

				case '3':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroReingreso.php');
					}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroReingreso.php');
					}
					break;

				case '4':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroRetiro.php');
					}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroRetiro.php');
					}
					break;

				case '5':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroCSede.php');
					}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroCSede.php');
					}
					break;

				case '6':
					$_SESSION["aprendiz"]=$_SESSION["aprendiz"]+1;
					if ($_SESSION["id_rol"]==1) {
						header('location: ../../views/admin/registroCJornada.php');
					}
					if ($_SESSION["id_rol"]==5) {
						header('location: ../../views/super/registroCJornada.php');
					}
					break;
			}
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
			if ($_SESSION["id_rol"]==1) {
				header('location: ../../views/admin/registroAprendiz.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/registroAprendiz.php');
			}
		}else{
			if ($_SESSION["id_rol"]==1) {
				header('location: ../../views/admin/registroAprendiz.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/registroAprendiz.php');
			}
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
	public function registrarPrograma($programa,$id_tipo_programa){

		$res = Admin::registrarPrograma($programa,$id_tipo_programa);
		
		if ($_SESSION["id_rol"]==1) {
			$_SESSION["programa"]=$_SESSION["programa"]+1;
			header('location: ../../views/admin/registroPrograma.php');
		}
		if ($_SESSION["id_rol"]==5) {
			$_SESSION["programa"]=$_SESSION["programa"]+1;
			header('location: ../../views/super/registroPrograma.php');
		}
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
			if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/registroFicha.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/registroFicha.php');
			}
		}else{
			if ($_SESSION["id_rol"]==1) {
			header('location: ../../views/admin/registroFicha.php');
			}
			if ($_SESSION["id_rol"]==5) {
				header('location: ../../views/super/registroFicha.php');
			}
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

	//registra el estado de las novedades
	public function estadoNovedad($id_usuario,$novedad){
		$res=Admin::estadoNovedad($id_usuario,$novedad);
		
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
			header('location: ../../views/admin/registroNovedades.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
			header('location: ../../views/super/registroNovedades.php');
		}

	}

	public function eliminarNovedad($nov){
		$no=Admin::eliminarNovedad($nov);

		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION["eliminar"]=$_SESSION["eliminar"]+1;
			header('location: ../../views/super/listadoNovedad.php');
		}
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
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroDesercion.php');
		}
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 2) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/instructor/registroDesercion.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroDesercion.php');
		}	
	}

	//imprime el listado de las deserciones
	public static function listadoDesercion(){

		$res = Admin::consultarDesercion("novedad");

		return $res;
	}

	//actualiza desercion
	public function actualizarDesercion($n_fecha,$n_observacion,$id_usuario,$id_tipo_novedad){

		$datos = array('fecha' => $_POST["n_fecha"],
						'observacion' => $_POST["n_observacion"]);

		$res = Admin::actualizarDesercion($datos,$id_usuario,$id_tipo_novedad);
		$_SESSION["actualizar"]=$_SESSION["actualizar"]+1;
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
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

		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroCJornada.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroCJornada.php');
		}
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
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
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
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroCSede.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroCSede.php');
		}
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
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
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
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroAplazamiento.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroAplazamiento.php');
		}
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
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
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
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroReingreso.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroReingreso.php');
		}
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
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
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
		//este redirecciona a la vista del super administrador
		if ($_SESSION["id_rol"] == 1) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/admin/registroRetiro.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			$_SESSION['novedad']=$_SESSION['novedad']+2;
			header('location: ../../views/super/registroRetiro.php');
		}
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
		if ($_SESSION["id_rol"] == 1) {
			header('location: ../../views/admin/listadoNovedad.php');
		}
		//este redirecciona a la vista del administrador
		if ($_SESSION["id_rol"] == 5) {
			header('location: ../../views/super/listadoNovedad.php');
		}
	}

	//----------------
	// 	Listado Novedades
	//----------------


	//imprime el listado de las novedades
	public static function listadoNovedad($novedad){

		$res = Admin::consultarNovedad("novedad",$novedad);

		return $res;
	}

	//historial del sistema
	public function historial($his){
		$res=Admin::historial($his);
		return $res;
	}

	//----------------
	// 	FPDF
	//----------------

	//imprime las actas

	public static function listadoPdf($id_usuario){

		$res = Admin::consultarPdf($id_usuario);

		return $res;
	}

}
?>