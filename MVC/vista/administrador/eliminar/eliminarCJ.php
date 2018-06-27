<?php 
require '../../../controlador/controladorE.php';

$eliminar = new ControladorEliminar();
$eliminar->eliminarCambioJ($_POST["documento"]);

?>