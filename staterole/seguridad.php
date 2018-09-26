<?php 
session_start();

if ($_SESSION["documento"] == 0 || $_SESSION["documento"] == "") {
	header('location: views/login.php');
}

?>