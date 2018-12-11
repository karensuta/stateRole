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
  <div class="container"><h1 style="color: #fff;">Lista de fichas registradas</h1></div>
</header>

<?php
  //las contraseñas no coinsiden con el usuario
  if ($_SESSION["usuario"]==1) {
    echo"<div class='alert alert-danger text-center'>
          <strong>Aviso!</strong> La contraseña no coincide.
        </div>";
      $_SESSION["usuario"]=0;
  }

  //se elimino correctamente
  if ($_SESSION["usuario"]==2) {
    echo"<div class='alert alert-success text-center'>
          <strong>Exito!</strong> La ficha se elimino correctamente del sistema.
        </div>";
      $_SESSION["usuario"]=0;
  }
?>


  <div class="container-fluid table-responsive" style="background-color: #fff; padding: 150px; ">
    
    <table width="100%" border="0">
      <?php 

      require_once '../../controller/adminController.php';

      $lista = new Administrador();
      $res = $lista->listadoFicha();

      echo "<table class='table'>
              <thead>
                <th>Ficha</th>
                <th>Programa</th>
                <th>Eliminar</th>
              </thead>";

      foreach ($res as $x) {
        echo "
        <tr>
          <td>".$x["ficha"]."</td>
          <td>".$x["programa"]."</td>
          <td>
            <a data-toggle='modal' data-target='#$x[id_ficha]'>
              <button class='btn fa fa-times-circle'></button>
            </a>
          </td>

        </tr>

        <div class='modal fade' id='$x[id_ficha]' role='dialog'>
          <div class='modal-dialog'>
            <!--Confirma la contraseña para borrar lo que desea-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>×</button>
                  <h4><span class='glyphicon glyphicon-ok'></span> Confirmar</h4>
                </div>
                <div class='modal-body'>
                  <form action='../../negocio/eliminar/ficha.php' method='post'>

                    <div class='form-group'>
                      <p align='center'>¿Desea eliminar esta ficha del sistema?</p>
                      <p align='center'>Para poder continuar por favor digite su contraseña.</p>
                    </div>
                    <div class='form-group'>
                      <label for='usrname'><span class='glyphicon glyphicon-lock'></span> Contraseña:</label>
                      <input type='password' name='contrasena' class='form-control' placeholder='Contraseña' required>
                      <input type='checkbox' value='1' required> Estoy seguro.
                    </div>
                      <input type=hidden name=ficha value=".$x["id_ficha"].">
                      <button type='submit' class='btn btn-block'>Continuar</button>
                  </form>
                </div>
                <div class='modal-footer'>
                  <button type='submit' class='btn btn-danger btn-default pull-center' data-dismiss='modal'>
                    <span class='glyphicon glyphicon-remove'></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

        ";
      }

      ?>
      </table> 
      <table width="100%">
        <tr>
          <form action="inicio.php">
          <td colspan="8"><br><button class="btn form-control">Volver</button></td>
          </form>
        </tr>
      </table>     
      
  </div>


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
