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
include '../../elementos/admin/nav2.php';
?>  

<header>
  <div class="container"><h1 style="color: #fff;">Información de los Usuario</h1></div>
</header>
<?php
//actualizacion datos de usuarios
if ($_SESSION["actualizar"]==1) {
  echo "<div class='alert alert-success alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Exito!</strong> Este usuario se actualizo correctamente.
        </div>";
  $_SESSION["actualizar"]=0;
}

//revisa en la copnsulta de datos si el usuario se encuentra registrado
if ($_SESSION["usuario"]==2) {
  echo"<div class='alert alert-danger alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Aviso!</strong> Este usuario no se encuentra registrado.
        </div>";
  $_SESSION["usuario"]=0;
}

//la contrasena no cohinside
if ($_SESSION["usuario"]==1) {
  echo"<div class='alert alert-danger alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Aviso!</strong> La contraseña no coincide.
        </div>";
  $_SESSION["usuario"]=0;
}
?>

<div class="cuadro" style="padding: 80px;">
 
  <div class="container table-responsive" style="background-color: #fff">
      
      <p style="font-size: 19px; text-align: center;">Aqui se acceder a la informacion de los usuarios tenga en cuenta que puede buscar, actualizar y asignar el rol</p>
      
      <form action="../../views/super/informacion.php" method="post" class="form-horizontal">
        <div class="col-md-12 mb-12">
          <div class="form-group">
            <label for="validationServer01" class="titulo"><span class="glyphicon glyphicon-user"></span> Número de documento del usuario</label>
            <input type="text" class="form-control" name="documento" placeholder="Documento*" pattern="[0-9]{5,13}" title="Ingrese solo números" required>
          </div>
          <div class="form-group">
            <button class="btn btn-dark form-control" type="submit">Buscar Usuario</button>
          </div>
      </form>
          <div class="form-group">
            <form action="inicio.php"><button class="btn btn-dark form-control" type="submit">Volver</button></form>
          </div>
        </div>
  </div>
 
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
