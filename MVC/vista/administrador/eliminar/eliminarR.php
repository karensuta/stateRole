<?php 
require '../../../controlador/controladorE.php';

$eliminar = new ControladorEliminar();
$eliminar->eliminarReingreso($_POST["documento"]);

?>