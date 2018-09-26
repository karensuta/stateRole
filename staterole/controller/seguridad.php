<?php 
require_once '../model/seguridad.php';

class Seguridad 
{
	
	public function compararDatos($docu)
	{
		$us =$res = Segurity::compararDatos($docu);

		foreach ($us as $x) {
			
			if ($x["id_rol"] <= 0) {
				header('location: ../views/login.php');
			}
			
			if ($x["id_rol"] == 1) {
				header('location: ../views/admin/inicio.php');
			}

			if ($x["id_rol"] == 2) {
				header('location: ../views/instructor/inicio.php');
			}

			if ($x["id_rol"] >= 3) {
				$_SESSION["login"]=$_SESSION["login"]+4;
				header('location: ../views/admin/inicio.php');
			}

		}

	}
}




?>