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
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../elementos/estiloInicio.css">
</head>
<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
//nav
include '../../elementos/super/nav.php';

//Barra de redes
include '../../elementos/redes.php';
?>
<!-- cabecera -->
<div id="traslado" style="background-color: #29292c; right: 0%;">
  <div class="container-fuid">
    <div class="row mb-12" style="padding: 100px;">
      
      <div align="center" class="col-md-1 col-1">
        <img src="../../elementos/img/logo.png" style="width: 350px;"></img>
      </div>
      
      <div class="col-md-11 col-11 ">
        <p class="text-warning" style="font-family: Montserrat; font-size: 90px; text-align: center;">
          STATE & ROLE
        </p>
      </div>
      <div class="col-md-11 col-11 ">
        <p class="text-warning" style="font-family: Montserrat; font-size: 50px; text-align: center;">
          Sistema de gestión de novedades SENA
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container" style="background-color: #fff;">
  <div class="row" style="padding: 10px;">

    <h2 align="center">SERVICIOS</h2>
    <hr>
    <br>
    <div class="col-md-4 col-4 text-center">
      <a data-toggle="modal" data-target="#novedades">
        <span class="glyphicon glyphicon-folder-open" style="font-size: 100px; color: #e6b800;"></span>
      </a>  
        <h2>NOVEDADES</h2>
        <p>Aqui se encuentrar las novedades que se pueden realizar en el sistema</p>

        <div class="modal fade" id="novedades" role="dialog">
          <div class="modal-dialog">
            <!-- el buscar que aperece-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4><span class="glyphicon glyphicon-lock"></span>Novedades</h4>
                </div>
                <div class="modal-body">
                  <label>Registro de novedades</label>
                  <br><br>
                  <form action="../../views/super/registroDesercion.php"><button type="submit" class="btn btn-block">Desercion</button></form>
                  <br>
                  <form action="../../views/super/registroCJornada.php"><button type="submit" class="btn btn-block">Cambio Jornada</button></form>
                  <br>
                  <form action="../../views/super/registroCSede.php"><button type="submit" class="btn btn-block">Cambio Sede</button></form>
                  <br>
                  <form action="../../views/super/registroAplazamiento.php"><button type="submit" class="btn btn-block">Aplazamiento</button></form>
                  <br>
                  <form action="../../views/super/registroReingreso.php"><button type="submit" class="btn btn-block">Reingreso</button></form>
                  <br>
                  <form action="../../views/super/registroRetiro.php"><button type="submit" class="btn btn-block">Retiro Voluntario</button></form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

    </div>
    <div class="col-md-4 col-4 text-center">
        <a data-toggle="modal" data-target="#registrar">
          <span class="glyphicon glyphicon-pencil" style="font-size: 100px; color: #737373;"></span>
        </a>
        <h2>REGISTRAR</h2>
        <p>Aqui se encuentrar los registros que se pueden hacer en el sistema</p>

        <div class="modal fade" id="registrar" role="dialog">
          <div class="modal-dialog">
            <!-- el buscar que aperece-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4><span class="glyphicon glyphicon-pencil"></span>Registrar</h4>
                </div>
                <div class="modal-body">
                  <label>Aqui podra buscar la información de los usuarios y asignar el rol</label>
                  <br><br>
                  <form action="../../views/super/registroAprendiz.php"><button type="submit" class="btn btn-block">Registrar Aprendiz</button></form>
                  <br>
                  <form action="../../views/super/programa.php" method="post"><input type="hidden" name="listaP" value="0"><button type="submit" class="btn btn-block">Registrar Programa de Formación</button></form>
                  <br>
                  <form action="../../views/super/registroFicha.php"><button type="submit" class="btn btn-block">Registrar Ficha</button></form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

    </div>
    <div class="col-md-4 col-4 text-center">
        <a data-toggle="modal" data-target="#usuarios">
          <span class="glyphicon glyphicon-user" style="font-size: 100px; color: #737373;"></span>
        </a>
        <h2>USUARIOS</h2>
        <p>Aqui se encuentrar todos los usuarios que se encuentren en el sistema</p>

        <div class="modal fade" id="usuarios" role="dialog">
          <div class="modal-dialog">
            <!-- el buscar que aperece-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4><span class="glyphicon glyphicon-user"></span>Usuarios</h4>
                </div>
                <div class="modal-body">
                  <label>Aqui podra buscar la información de los usuarios y asignar el rol</label>
                  <br><br>
                  <form action="../../views/super/informacionUsuario.php"><button type="submit" class="btn btn-block">Informacion de Usuarios</button></form>
                  <br>
                  <form action="../../views/super/habilitar.php"><button type="submit" class="btn btn-block">Hablilitar Usuarios</button></form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

    </div>
  </div>

  <div class="row" style="padding: 10px;">
    <div class="col-md-4 col-4 text-center">
        <a data-toggle="modal" data-target="#listas">
          <span class="glyphicon glyphicon-list-alt" style="font-size: 100px; color: #737373;"></span>
        </a>
        <h2>Listas</h2>
        <p>Aqui se encuentras las listas de usuarios, aprendices y usuarios que han sido habilitados para ingresar al sistema</p>

        <div class="modal fade" id="listas" role="dialog">
          <div class="modal-dialog">
            <!-- el buscar que aperece-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4><span class="glyphicon glyphicon-list-alt"></span>Listas</h4>
                </div>
                <div class="modal-body">
                  <label>Aqui podra encontrar las listas que se encuentran en el sistema</label>
                  <br><br>
                  <form action="../../views/super/listadoHabilitado.php"><button type="submit" class="btn btn-block">Lista de Habilitados</button></form>
                  <br>
                  <form action="../../views/super/listadoUsuarios.php"><button type="submit" class="btn btn-block">Lista de Usuarios</button></form>
                  <br>
                  <form action="../../views/super/listadoAprendiz.php"><button type="submit" class="btn btn-block">Lista de Aprendices</button></form>
                  <br>
                  <form action="../../views/super/listadoFicha.php"><button type="submit" class="btn btn-block">Lista de Fichas</button></form>
                  <br>
                  <form action="../../views/super/programa.php" method="post"><input type="hidden" name="listaP" value="1"><button type="submit" class="btn btn-block">Lista de Programas de Formación</button></form>
                  <br>
                  <form action='../../views/super/listadoNovedad.php'><button type='submit' class='btn btn-block'>Lista de Novedades</button></form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

    </div>
    <div class="col-md-4 col-4 text-center">
        <a data-toggle="modal" data-target="#historial">
          <span class="glyphicon glyphicon-book" style="font-size: 100px; color: #737373;"></span>
        </a>
        <h2>Historial</h2>
        <p>Aqui se encuentra el historias de todos los procesos que se llevan en el sistema.</p>

        <div class="modal fade" id="historial" role="dialog">
          <div class="modal-dialog">
            <!-- el buscar que aperece-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4><span class="glyphicon glyphicon-book"></span>Historial</h4>
                </div>
                <div class="modal-body">
                  <label>Aqui podra encontrar el historial de todos los registros del sistema.</label>
                  <br><br>
                  <form action="../../views/super/historialHabilitado.php"><button type="submit" class="btn btn-block">Historial de Habilitados</button></form>
                  <br>
                  <form action="../../views/super/historialUsuarios.php"><button type="submit" class="btn btn-block">Historial de Usuarios</button></form>
                  <br>
                  <form action="../../views/super/historialAprendiz.php"><button type="submit" class="btn btn-block">Historial de Aprendices</button></form>
                  <br>
                  <form action="../../views/super/historialFicha.php"><button type="submit" class="btn btn-block">Historial de Fichas</button></form>
                  <br>
                  <form action="../../views/super/historialprograma.php" method="post"><input type="hidden" name="listaP" value="1"><button type="submit" class="btn btn-block">Historial de Programas de Formación</button></form>
                  <br>
                  <form action='../../views/super/historialNovedad.php'><button type='submit' class='btn btn-block'>Historial de Novedades</button></form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

    </div>
    <div class="col-md-4 col-4 text-center">
      <?php
          require_once '../../model/conexion.php';
          
          $nt=Conexion::conectar()->prepare("SELECT * FROM novedad INNER JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad WHERE estado_novedad=1");
          $nt->execute();
          $cont=0;
          echo "<a data-toggle=modal data-target='#notificacion'><span class=badge>";

          foreach ($nt as $n) {
            $cont=$cont+1;
            
          }

          echo "$cont</span><span class='glyphicon  glyphicon glyphicon-bell' style='font-size:100px; color: #737373;'></span></a>";
        ?>
        <h2>Procesos</h2>
        <p>Aqui se encuentras las novedades que se encuentran en proceso</p>
    </div>

    
  </div>
</div>


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
