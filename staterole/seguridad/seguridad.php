<?php 
session_start();

if ($_SESSION["documento"] == 0) {
	header('location: ../../index.php');
}


?>