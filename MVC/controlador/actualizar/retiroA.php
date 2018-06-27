<?php 

require_once '../controladorA.php';

$registro = new ControladorActualizar();

$registro -> actualizarRetiroV($_POST["nombre_nuevo"],$_POST["apellido_nuevo"],$_POST["tipo_nuevo"],$_POST["documento_nuevo"],$_POST["fecha_nuevo"],$_POST["correo_nuevo"],$_POST["sede_nuevo"],$_POST["formacion_nuevo"],$_POST["jornada_nuevo"],$_POST["ficha_nuevo"],$_POST["trimestre_nuevo"],$_POST["causas_nuevo"]);
?>