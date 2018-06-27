<?php
class Conexion{
	// conexion a la base de datos

public static function conectar(){
	try{
		$cn = new PDO("mysql:host=localhost;dbname=staterole","root","");
		return $cn;
	}
	catch(PDOException $ex){
		die($ex->getMessage());
	}
}
	
}

