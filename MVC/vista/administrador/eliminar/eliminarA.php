<?php 
require '../../../controlador/controladorE.php';

$eliminar = new ControladorEliminar();
$eliminar->eliminarAplazamiento($_POST["documento"]);

?>