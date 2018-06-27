<?php 
require '../../../controlador/controladorE.php';

$eliminar = new ControladorEliminar();
$eliminar->eliminarCambioC($_POST["documento"]);

?>