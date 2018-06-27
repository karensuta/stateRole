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
      <h1>arreglar esto tambien</h1>
    </div>
  </header>
  <br><br><br><br>
    


	<div class="container">
		<div class="consulta">
	<div class="form-group">
	<?php
    require '../../../controlador/controladorM.php';

    $consulta = new ControladorMostrar();
    $apla = $consulta -> mostrarAplazamiento($_POST["documento"]);

    foreach ($apla as $key) {
      
      echo "<form action=\"../../../controlador/actualizar/aplazamientoA.php\" method=\"post\">
      <table width=\"1000\" border=\"0\" align=\"center\">
          <tbody>
            <tr>
              <td width=\"250px\">Nombre:</td>
              <td width=\"250px\">$key[nombre]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"nombre_nuevo\" value=\"$key[nombre]\" required></td>
            </tr>
            <tr>
              <td>Apellido:</td>
              <td>$key[apellido]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"apellido_nuevo\" value=\"$key[apellido]\" required></td>
            </tr>
            <tr>
              <td>Documento:</td>
              <td>$key[documento]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"documento_nuevo\" value=\"$key[documento]\" required></td>
            </tr>
            <tr>
              <td>Tipo de documento:</td>
              <td>$key[tipo_documento]</td>
              <td>
              <select class=\"custom-select\" name=\"tipo_nuevo\" required>
               <option selecteds>$key[tipo_documento]</option>
                <option value=\"C.C\">Cédula de Cuidadania</option>
                <option value=\"T.I\">Tarjeta de Identidad</option>
                <option value=\"C.E\">Cédula de Extrangeria</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Fecha:</td>
              <td>$key[fecha]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"fecha_nuevo\" value=\"$key[fecha]\" required></td>
            </tr>
            <tr>
              <td>Correo electrónico:</td>
              <td>$key[correo]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"correo_nuevo\" value=\"$key[correo]\" required></td>
            </tr>
            <tr>
              <td>Sede:</td>
              <td>$key[sede]</td>
              <td>
              <select class=\"custom-select\" name=\"sede_nuevo\" required>
                <option selected>$key[sede]</option>
                <option value=\"Colombia\">Colombia</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Formación:</td>
              <td>$key[formacion]</td>
              <td>
              <select class=\"custom-select\" name=\"formacion_nuevo\" required>
                <option selecteds>$key[formacion]</option>
                <option value=\"ADSI\">ADSI</option>
                <option value=\"TPS\">TPS</option>
                <option value=\"DIM\">DIM</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Jornada:</td>
              <td>$key[jornada]</td>
              <td>
              <select class=\"custom-select\" name=\"jornada_nuevo\" required>
               <option selecteds>$key[jornada]</option>
                <option value=\"Diurna\">Diurna</option>
                <option value=\"Nocturna\">Nocturna</option>
                <option value=\"Fin de semana\">Fin de semana</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Ficha:</td>
              <td>$key[ficha]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"ficha_nuevo\" value=\"$key[ficha]\" required></td>
            </tr>
            <tr>
              <td>Trimestre:</td>
              <td>$key[trimestre]</td>
              <td>
              <select class=\"custom-select\" name=\"trimestre_nuevo\" required>
                <option selected>$key[trimestre]</option>
                <option value=\"1\">Primer Trimestre</option>
                <option value=\"2\">Segundo Trimestre</option>
                <option value=\"3\">Tercer Trimestre</option>
                <option value=\"4\">Cuarto Trimestre</option>
                <option value=\"5\">Quinto Trimestre</option>
                <option value=\"6\">Sexto Trimestre</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Motivos:</td>
              <td>$key[motivos]</td>
              <td><input type=\"text\" class=\"form-control\" name=\"motivos_nuevo\" value=\"$key[motivos]\" required></td>
            </tr>
            <tr>
              <td colspan=\"3\"><br></td>
            </tr>
            <tr>
              <td colspan=\"3\">
                <div class=\"container\">
                  <div class=\"form-row\">
                  <div class=\"col-md-6 mb-6\">
                  <input class=\"btn btn-info form-control\" type=\"submit\" value=\"Guardar\"></form>
                </div>
      </form>
                <div class=\"col-md-6 mb-6\">
                <form action=\"../../../vista/administrador/submenuDesercion.php\"><button class=\"btn btn-danger form-control\" type=\"submit\">Volver</button></form>
                </div>
              </div>  
            </td>
            </tr>
          </tbody>
      </table>
    " ;
    }
  ?>

</div>

</div>
</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script> 

</body>
</html>