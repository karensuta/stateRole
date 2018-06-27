<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="formularios-estilos.css">
</head>
<body>

<header>
    <div class="container">
    	<h1>
	    <?php
	    	require_once '../../../controlador/controladorM.php';
	    	$nombre = new ControladorMostrar();
	    	$nombre -> nombreRetiroV($_POST["documento"]);
	    ?>
	    	
		</h1>
    </div>
  </header>
  <br><br><br><br>

	<div class="container">
		<div class="consulta">
	
	<div class="form-group">
	<?php
    	$consulta = new ControladorMostrar();
    	$mostrar = $consulta -> mostrarRetiroV($_POST["documento"]);
  		
	    	foreach ($mostrar as $key ) {
	 	echo "<table width=\"100%\" border=\"0\">
	  			<tbody>
				    <tr>
				      <td width=\"250px\">Nombre:</td>
				      <td width=\"250px\">$key[nombre]</td>
				    </tr>
				    <tr>
				      <td>Apellido:</td>
				      <td>$key[apellido]</td>
				    </tr>
				    <tr>
				      <td>Documento:</td>
				      <td>$key[documento]</td>
				    </tr>
				    <tr>
				      <td>Tipo de documento:</td>
				      <td>$key[tipo_documento]</td>
				    </tr>
				    <tr>
				      <td>Fecha:</td>
				      <td>$key[fecha]</td>
				    </tr>
				    <tr>
				      <td>Correo electrónico:</td>
				      <td>$key[correo]</td>
				    </tr>
				    <tr>
				      <td>Sede:</td>
				      <td>$key[sede]</td>
				    </tr>
				    <tr>
				      <td>Formación:</td>
				      <td>$key[formacion]</td>
				    </tr>
				    <tr>
				      <td>Jornada:</td>
				      <td>$key[jornada]</td>
				    </tr>
				    <tr>
				      <td>Ficha:</td>
				      <td>$key[ficha]</td>
				    </tr>
				    <tr>
				      <td>Trimestre:</td>
				      <td>$key[trimestre]</td>
				    </tr>
				    <tr>
				      <td>Causas:</td>
				      <td>$key[causas]</td>
				    </tr>
  				</tbody>
			</table>";}
  	?>

</div>

	<div class="form-row">
		<div class="col-md-4 mb-4">
			<form action="../../../vista/administrador/actualizar/editarRV.php" method="post"><input class="btn btn-info form-control" type="submit" value="Actualizar"><input type="hidden" name="documento" value="<?php echo $_POST['documento']; ?>"></form>
		</div>

		<div class="col-md-4 mb-4">
			<form action="../../../vista/administrador/eliminar/eliminarRV.php" method="post"><input class="btn btn-secondary form-control" type="submit" value="Eliminar"><input type="hidden" name="documento" value="<?php echo $_POST['documento']; ?>"></form>
		</div>

		<div class="col-md-4 mb-4">
			<form action="../../../vista/administrador/submenuRetiroVoluntario.php"><button class="btn btn-danger form-control" type="submit">Volver</button></form>
		</div>
	</div>

</div>
</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> 

</body>
</html>