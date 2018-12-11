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
  <div class="container"><h1 style="color: #fff;">Programa de Formación</h1></div>
</header>

<?php
//este programa de formacion se registro correctamente
if ($_SESSION["programa"]==1) {
  echo"<div class='alert alert-success text-center'>
      <strong>Exitoso!</strong> Este programa de formación se registro correctamente.
            </div>";
  $_SESSION["programa"]=0;
}
//este programa de formacion y7a se encuentra registrado
if ($_SESSION["programa"]==3) {
  echo"<div class='alert alert-danger text-center'>
      <strong>Aviso!</strong> Este programa de formación ya esta registrado.
            </div>";
  $_SESSION["programa"]=0;
}
?>

<div class="cuadro" style=" padding:100px;">
  <div class="container" style="background-color: #fff;">
    
    <table width="100%">
      <form action="../../negocio/registro/datosPrograma.php" method="post">
        <tr>
          <td>Seleccione el tipo del programa:</td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="id_tipo_programa">
              <option value="1">Técnico</option>
              <option value="2">Tecnólogo</option>
              <option value="3">Especialización</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Nombre para el Programa de Formación:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="programa" pattern="[A-ZÑ ]+" minlength="3" maxlength="80" title="Sólo puede ingresar mayúsculas" style="width: 100%;" required></td>
        </tr>
    </table>
    <table width="100%">
        <tr>
          <td><br><button class="btn form-control">Registrar</button></td>
          </form>

          <td>
            <form action="inicio.php">
              <br><button class="btn form-control">Volver al Inicio</button>
            </form>
          </td>
    </table>  
      
  </div>
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
