<?php include '../../seguridad/seguridadSuper.php'; ?>
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
      <h1>CAMBIO DE JORNADA</h1>
    </div>
  </header>
<br><br><br><br>
<div class="cuadro table-responsive">

  <?php
  require_once '../../controller/adminController.php';
  $novedad=6;

  $apre = new Administrador();
  $res = $apre->aprendiz($_POST["documento"],$novedad);

  foreach ($res as $x) {
    echo "
    <form action='../../negocio/registro/cJornada.php' method='post' class='form-horizontal'>
      <div class='form-row'>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align=center>Primer Nombre</h4>
          <h5 align=center>".$x["p_nombre"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Segundo Nombre</h4>
          <h5 align=center>".$x["s_nombre"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align=center>Primer Apellido</h4>
          <h5 align=center>".$x["p_apellido"]."</h5>
          <hr width=500px>
        </div>


        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Segundo Apellido</h4>
          <h5 align=center>".$x["s_apellido"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Tipo de Documento</h4>
          <h5 align=center>".$x["tipo_documento"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Documento</h4>
          <h5 align=center>".$x["documento"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Correo electrónico</h4>
          <h5 align=center>".$x["correo"]."</h5>
           <hr width=500px>
        </div>


         <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Sede</h4>
          <h5 align=center>".$x["sede"]."</h5>
           <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Ficha de Carcaterización</h4>
          <h5 align=center>".$x["ficha"]."</h5>
           <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Formación</h4>
          <h5 align=center>".$x["programa"]."</h5>
          <hr width=500px>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Jornada</h4>
          <h5 align=center>".$x["jornada"]."</h5>
        </div>

        <div class='col-md-6 mb-6'>
          <h4 class='titulo' align='center'>Trimestre</h4>
          <h5 align=center>".$x["trimestre"]."</h5>
        </div>

        <hr width=100%>

        <div class='col-md-2'>
          <h4 class='titulo'>Fecha</h4>
        </div>
        <div class='col-md-10'>
          <input type='date' class='form-control text-center' name='fecha' placeholder='AAA-MM-DD' required>
        </div>

        <hr width=100%>

        <div class='col-md-2'>
          <h4 class='titulo'>Observación:</h4>
        </div>
        <div class='col-md-10'>
          <p align=center><strong>Recuerde!</strong> Las jornadas disponibles son: Diurna, Nocturna y Fines de Semana.</p>
          <textarea class='form-control text-center' name='observacion' placeholder='Escriba a cual jornada y el porque desea hacer el cambio.' required</></textarea>
        </div>

        <hr width=100%>

      </div>

      <div class='form-group text-center'>
      <div class='form-check'>
        <input class='form-check-input' type='checkbox' value=' id='invalidCheck3' required>
        <label class='form-check-label' for='invalidCheck3'>
          ¿Desea continuar?
      </div>
      </div>

      <div class=form-row>
        <div class=col-md-6>
          <input type='hidden' name='id_usuario' value=$x[id_usuario]>
          <input type='hidden' name='id_tipo_novedad' value='6'>
          <button class='btn btn-primary form-control' type='submit'>Registrar</button>
    </form>
        </div>
        <div class=col-md-6>
        <form action='registroCJornada.php'><button class='btn btn-danger form-control' type='submit'>volver</button></form>
        </div>
      </div>
      
    </div>";
  }

?>
  
<br><br><br>

</div>  
</body>
</html>