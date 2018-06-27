<?php 
require '../../../controlador/controladorE.php';

$eliminar = new ControladorEliminar();
$eliminar->eliminarDesercion($_POST["documento"]);

?>