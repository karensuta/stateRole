<?php 
session_start();
require_once '../../controller/adminController.php';

$iniciar = new Administrador();
$iniciar->actualizarDatos($_POST["n_p_nombre"],$_POST["n_s_nombre"],$_POST["n_p_apellido"],$_POST["n_s_apellido"],$_POST["n_id_tipo_documento"],$_POST["doc"],$_POST["n_docuemnto"],$_POST["n_correo"],$_POST["n_id_rol"]);

?>