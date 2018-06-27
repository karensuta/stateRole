<?php
session_start();
if ($_SESSION['documentoo']!="") {
}
else {
    header("location: login.php");
  }

?>
<?php
 $conexion=mysqli_connect("localhost","root","") or die (mysqli_error($conexion));
mysqli_select_db($conexion,"staterole") or die (mysqli_error($conexion));

$registros=mysqli_query($conexion,"select nombre,apellido,rol from usuarios where documento='$_SESSION[documentoo]'") or die (mysqli_error($conexion));

if ($reg=mysqli_fetch_array($registros)){

$_SESSION['n']=$reg['nombre'];
$_SESSION['a']=$reg['apellido'];
$_SESSION['r']=$reg['rol'];}

mysqli_close($conexion);
?>
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
  <link rel="stylesheet" type="text/css" href="css\estilosinicio.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h1 {
      margin: 10px 0 30px 0;
      font-family: Lato;      
      font-size: 30px;
      color: #000;
      text-align: center;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #f1f1f1;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(0%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: top;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #09c;
      color: #fff;
  }
  .bg-1 h1 {color: #fff;}

  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 10px !important;
      letter-spacing: 3px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0; 
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="inicio.php"><img src="imagenes\state role.png"  class="navbar-brand"></a>
      <a class="navbar-brand" href="inicio.php">State & Role</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a><?php echo "Usuario: ",$_SESSION['n']," ",$_SESSION['a'];?></a></li>
        <li><a><?php echo "Rol: ", $_SESSION['r'];?></a></li>
        <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<br><br><br><br>
<div class="cuadro">
 
  <div class="container" style="background-color: #fff">
      
      <h1>Seleccione la opción deseada:</h1>
      <form action="../../vista/administrador/registro/cambioDeJornada.php" method="post" class="form-horizontal">
      <div class="form-group">
        <button class="btn btn-dark form-control" type="submit">Crear cambio de jornada</button>
      </div>
      </form>

      <form action="../../vista/administrador/consultaCambioJornada.php" method="post" class="form-horizontal">
      <div class="form-group">
        <button class="btn btn-dark form-control" type="submit">Consultar cambio de jornada</button>
      </div>
      </form>

      <form action="../../vista/administrador/registro/cambioCentro.php" method="post" class="form-horizontal">
      <div class="form-group">
        <button class="btn btn-dark form-control" type="submit">Crear cambio de centro</button>
      </div>
      </form>

      <form action="../../vista/administrador/consultaCambioCentro.php" method="post" class="form-horizontal">
      <div class="form-group">
        <button class="btn btn-dark form-control" type="submit">Consultar cambio de centro</button>
      </div>
      </form>

      <form action="../../vista/inicio.php" method="post" class="form-horizontal">
      <div class="form-group">
        <button class="btn btn form-control" type="submit">Volver</button>
      </div>
      </form>
  </div>
 
</div>
<br><br><br><br><br><br><br><br><br><br>
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href= data-toggle="tooltip" title="">
    <span class="glyphicon glyphicon-chevron"></span>
  </a>
  <p> Autores <br>
        Brayan Stiven Martinez Torres <br>
        Karen Jineth Suta Anzola <br>
        Jeisson Farid Sanchez Mora <br>
     </p> 
</footer>
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
