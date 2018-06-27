<?php 

require_once '../controladorA.php';

$registro = new ControladorActualizar();

$registro -> actualizarDatos($_POST["nombre_nuevo"],$_POST["apellido_nuevo"],$_POST["tipo_nuevo"],$_POST["documento"],$_POST["correo_nuevo"],$_POST["rol_nuevo"]);
?>