<?php include '../../seguridad/seguridadSuper.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>State & Role</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../elementos/estiloInicio.css">
</head>
<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
//nav
include '../../elementos/admin/nav2.php';
?>  

<header>
  <div class="container"><h1 style="color: #fff;">Lista de Novedades</h1></div>
</header>

<div class='text-center' style="background-color: #cce6ff;">
  <strong>Aviso!</strong> Recuerde que si desea actualizar una novedad el estado de la novedad cambiara a:<p style='color:#0080ff;'>En proceso...</p>
</div>

<?php 
//actualizacion de la desercion
if ($_SESSION["actualizar"]==1) {
  echo "<div class='alert alert-success alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Exito!</strong> La novedad se actualizo correctamente.
        </div>";
  $_SESSION["actualizar"]=0;
}
//afirma que la novedad se elimino
if ($_SESSION["eliminar"]==1) {
  echo "<div class='alert alert-danger alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Aviso!</strong> La novedad se elimino correctamente.
        </div>";
  $_SESSION["eliminar"]=0;
}
//la contraseña no coincide
if ($_SESSION["usuario"]==1) {
  echo "<div class='alert alert-danger alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Aviso!</strong> La contraseña no coincide.
        </div>";
  $_SESSION["usuario"]=0;
}
?>

  <div class="container-fluid table-responsive" style="background-color: #fff; padding: 70px; ">
    
    <table width="100%" border="0">
      <?php 

      require_once '../../controller/adminController.php';
      $novedad=0;
      $lista = new Administrador();
      $res = $lista->listadoNovedad($novedad);

      echo "<table class='table'>
              <thead>
                <th>Novedad</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Observación</th>
                <th>Estado</th>
                <th>Acta</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </thead>";

      foreach ($res as $x) {
        echo "
        <tr>
          <td>".$x["tipo_novedad"]."</td>
          <td>".$x["p_nombre"]."</td>
          <td>".$x["s_nombre"]."</td>
          <td>".$x["p_apellido"]."</td>
          <td>".$x["s_apellido"]."</td>
          <td>".$x["tipo_documento"]."</td>
          <td>".$x["documento"]."</td>
          <td>".$x["correo"]."</td>
          <td>".$x["fecha"]."</td>
          <td>".$x["observacion"]."</td>
          <td>";
          if ($x["estado_novedad"]==1) {
            echo "<p style='color:#0080ff;'>En proceso...</p>";
          }
          if ($x["estado_novedad"]==2) {
            echo "<p style='color:#009900;'>Aprovado</p>";
          }
          if ($x["estado_novedad"]==3) {
            echo "<p style='color:#ff0000;'>Rechazado</p>";
          }

        echo "
          </td>
          <td align=center>";
            if ($x["estado_novedad"]==1 || $x["estado_novedad"]==3) {
                echo "N.A";
              }
            if ($x["estado_novedad"]==2) {
              echo "
              <form action='.php' method='post'>
                <span class='fa fa-download' style='font-size:25px; color:#009900;'></span>
              </form>";
            }
        echo"</td>
          <td>
              ";
              
              if ($x["id_tipo_novedad"]==1) {
                echo "<form action='actualizarDesercion.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              if ($x["id_tipo_novedad"]==2) {
                echo "<form action='actualizarAplazamiento.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              if ($x["id_tipo_novedad"]==3) {
                echo "<form action='actualizarReingreso.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              if ($x["id_tipo_novedad"]==4) {
                echo "<form action='actualizarRetiro.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              if ($x["id_tipo_novedad"]==5) {
                echo "<form action='actualizarCSede.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              if ($x["id_tipo_novedad"]==6) {
                echo "<form action='actualizarCJornada.php' method='post'>
                        <button class='btn  fa fa-edit'>
                          <input type=hidden name=documento value=".$x["documento"].">
                          <input type=hidden name=id_usuario value=".$x["id_usuario"].">
                          <input type=hidden name=id_tipo_novedad value=".$x["id_tipo_novedad"].">
                        </button>
                      </form>";
              }
              echo "
          </td>
          <td>
            <a data-toggle='modal' data-target='#$x[documento]'>
              <button class='btn fa fa-times-circle'></button>
            </a>
          </td>
        </tr>

        <div class='modal fade' id='$x[documento]' role='dialog'>
          <div class='modal-dialog'>
            <!--Confirma la contraseña para borrar lo que desea-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>×</button>
                  <h4><span class='glyphicon glyphicon-ok'></span> Confirmar</h4>
                </div>
                <div class='modal-body'>
                  <form action='../../negocio/eliminar/novedades.php' method='post'>

                    <div class='form-group'>
                      <p align='center'>¿Desea eliminar esta novedad del sistema?.</p>
                      <p align='center'>Para poder continuar por favor digite su contraseña.</p>
                    </div>
                    <div class='form-group'>
                      <label for='usrname'><span class='glyphicon glyphicon-lock'></span> Contraseña:</label>
                      <input type='password' name='contrasena' class='form-control' placeholder='Contraseña' required>
                      <input type='checkbox' value='1' required> Estoy seguro.
                    </div>
                      <input type=hidden name=nov value=".$x["id_novedad"].">
                      <button type='submit' class='btn btn-block'>Continuar</button>
                  </form>
                </div>
                <div class='modal-footer'>
                  <button type='submit' class='btn btn-default pull-center' data-dismiss='modal'>
                    <span class='glyphicon glyphicon-remove'></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>";
      }

      ?>
      </table> 
      <table width="100%">
        <tr>
          <form action="inicio.php">
          <td colspan="8"><br><button class="btn form-control">Volver</button></td>
          </form><div style="color: blue;"></div>
        </tr>
      </table>     
      
  </div>

<div style="padding: 2%;"></div>
<br><br><br>
<!-- Footer -->
<?php include '../../elementos/footer.php'; ?>
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>