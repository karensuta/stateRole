<?php 
session_start();

//comprueba que este logeado y que que el rol sea admin
if ($_SESSION["documento"] != 0 ) {
	if ( $_SESSION["id_rol"] != 2) {
		header('location: ../../views/rol.php');
	}	
}else{
	header('location: ../../index.php');
}

?>