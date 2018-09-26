<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../elementos/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../elementos/formularios-estilos.css">
</head>
<body>

<header>
    <div class="container">
      <h1>DESERCIÓN</h1>
    </div>
  </header>
<br><br><br><br>
<div class="cuadro">

  <?php
  session_start();
  require_once '../../controller/insController.php';

  $apre = new Instructor();
  $res = $apre->aprendiz($_POST["documento"]);

  foreach ($res as $x) {
    echo "
    <form action='../../negocio/registro/desercion.php' method='post' class='form-horizontal'>
      <div class='form-row'>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align=center>Primer Nombre</h4>
          <h5 align=center>".$x["p_nombre"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'></div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Segundo Nombre</h4>
          <h5 align=center>".$x["s_nombre"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align=center>Primer Apellido</h4>
          <h5 align=center>".$x["p_apellido"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>  
          </div>
        </div>


        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Segundo Apellido</h4>
          <h5 align=center>".$x["s_apellido"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'></div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Tipo de Documento</h4>
          <h5 align=center>".$x["tipo_documento"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Documento</h4>
          <h5 align=center>".$x["documento"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>  
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Correo electrónico</h4>
          <h5 align=center>".$x["correo"]."</h5>
           <hr width=500px>
          <div class='valid-feedback'>  
          </div>
        </div>


         <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Sede</h4>
          <h5 align=center>".$x["sede"]."</h5>
           <hr width=500px>
          <div class='valid-feedback'></div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Ficha de Carcaterización</h4>
          <h5 align=center>".$x["ficha"]."</h5>
           <hr width=500px>
          <div class='valid-feedback'> 
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Formación</h4>
          <h5 align=center>".$x["programa"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Jornada</h4>
          <h5 align=center>".$x["jornada"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>
          </div>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Trimestre</h4>
          <h5 align=center>".$x["trimestre"]."</h5>
          <hr width=500px>
          <div class='valid-feedback'>
          </div>
        </div>

        <div class='col-md-12 mb-12'>
          <h4 class='titulo'>Fecha</h4>
          <input type='date' class='form-control' name='fecha' placeholder='AAA-MM-DD' required>
          <div class='valid-feedback'></div>
        </div>

        <div class='col-md-12 mb-12'>
          <h4 class='titulo'>Observación:</h4><textarea class='form-control' name='observacion' placeholder='Escriba observaciones*' required</></textarea>
          <div class='valid-feedback'></div>
        </div>

      </div>

      <div class='form-group'>
      <div class='form-check'>
        <br>
        <input class='form-check-input' type='checkbox' value=' id='invalidCheck3' required>
        <label class='form-check-label' for='invalidCheck3'>
          ¿Desea continuar?
      </div>
      </div>
      <input type='hidden' name='id_usuario' value=$x[id_usuario]>
      <input type='hidden' name='id_tipo_novedad' value='1'>
      <button class='btn btn-dark form-control' type='submit'>Registrar</button>
    </form>
    <br>
      <form action='registroDesercion.php'><button class='btn btn-danger form-control' type='submit'>volver</button></form>
    </div>";
  }

?>
  
  

</div>  
</body>
</html>