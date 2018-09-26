<?php
require_once ('conexion.php');

class Segurity extends Conexion
{
	public static function compararDatos($doc){

		$us = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE documento='$doc'");
		$us->execute();
		return $us;
	}

}
?>