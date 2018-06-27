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
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
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
      border-radius: 0;
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
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="#inicio"><img src="imagenes\state role.png"  class="navbar-brand"></a>
      <a class="navbar-brand" href="#inicio">State & Role</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a><?php echo "Usuario: ",$_SESSION['n']," ",$_SESSION['a'];?></a></li>
        <li><a><?php echo "Rol: ", $_SESSION['r'];?></a></li>
        <li><a href="#inicio">Inicio</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Novedades
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#desercion">Desercion</a></li>
            <li><a href="#traslado">Traslado</a></li>
            <li><a href="#aplazamiento">Aplazamiento</a></li>
            <li><a href="#reingreso">Reingreso</a></li>
            <li><a href="#retiro">Retiro Voluntario</a></li> 
          </ul>
        </li>
        <li><a class="btn-dark" data-toggle="modal" data-target="#buscar">Buscar</a></li>
        <li><a class="btn-dark" onclick="window.location.href='../salir.php'">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="buscar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span>BUSCAR</h4>
        </div>
        <div class="modal-body">
          <form action="../vista/administrador/mostrar/buscar.php" method="post">

            <div class="form-group">
              <label>Aqui podra buscar la información de los usuarios y asignar el rol</label>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Documento del Usuario</label>
              <input type="text" name="documento" class="form-control" placeholder="Número de Documento">
            </div>
              <button type="submit" class="btn btn-block">Buscar
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-center" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancelar
          </button>
        </div>
      </div>
    </div>
  </div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="http://www.efronconsulting.com/.galleries/images/arquitectural.jpg" alt="New York"  style=" height: 70vh;">
        <div class="carousel-caption">
           <h3>State & Role</h3>
          <p>Sistema de gestión de novedades SENA</p>
        </div>      
      </div>

      <div class="item">
        <img src="http://2.bp.blogspot.com/-hYy1qEkmBy4/Tbrj9i2D0eI/AAAAAAAAAAg/6ZVv-V7jkGE/s1600/logo.jpg" alt="Chicago"  style=" height: 70vh;">
        <div class="carousel-caption">
           <h3>State & Role</h3>
          <p>Sistema de gestión de novedades SENA</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="https://3.bp.blogspot.com/-uepXfjaWMBk/VNOXzQkiS_I/AAAAAAAAAzE/3o4Xbv83VJM/s1600/baner-2.jpg" alt="Los Angeles" style=" height: 70vh;">
        <div class="carousel-caption">
           <h3>State & Role</h3>
          <p>Sistema de gestión de novedades SENA</p>
        </div>      
      </div>
    </div>


     <!-- dlick-->
  <div>
  <a title="Facebook" href="https://www.facebook.com/" style=" z-index: 1000; padding: 0; top: 25rem; position: fixed; background: rgb(170, 170, 170); color: rgb(255, 255, 255);"> 
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAaVBMVEU6VZ////81Up0yT5xgc61+jbsvTZyXo8hFXaOirM0nSJmlrs7O1OUkRpkfQ5doerLr7fTHzeE9WKHV2umHlcDy9Pnd4eyut9O1vtdZbat5ibmWoceGk7/M0eSrs9G/xtxMY6ZvgLVIYaWJ8OFBAAAC40lEQVR4nO3c63KqMBRAYU9iqaLg/d7W2vd/yE5nzt/ihjTsvTNrPQDDNxIDJDqZEBERERERERERERERERFZL4QYqydF7ZMcXKyadju97m/zzhZ7n8SqCY/T8Z+kXa19sv2LdbztRLqflu6EsXm8i3kOhbF9WffxeROG9tHT50xYbTd9fb6E7Vt/nydhqO9DgH6EcdZ7BPoSVpdhPjfCajUU6EQYhwN9COPncKALYdgeChe2socIv8LmnAJ0IIzXJKADYZMyCD0IE69R+8Iw+F7Gi7CVv67wKQzTVKB1YbMsXBhSbtdcCOtT6cLUudC8MD7SgbaFdepsb17YDHw140YYZn8ANC2M+78QWl57qvoMw8PuvHC3fljL70k3q7qu/a0Bt9LZ8HhpgvbJDioKgffWp28SvqRA7TMdmvDJ6egWKBV+Ob1EJ1LhyfB09yyZ0PFHKBMeG+3TTEgkPFXap5mQSGj5nuxpIuELQsshRGg/hAjthxCh/RAitB9ChPZDiNB+CBHarwxh6PiJci3ZWnptnv3SWRm4ev2920IgPN86jvDTfKsqrD4EiMR0V98qyceU1kF3iXgEofLy2wjCe/FX6Yful+kIwn3xwpXuOv8Iws/ihcr3NPmFa+UdU/mFS+XdKPmFZ+UtU/mFr8WPQ+3nx/zCi/K2t/xC7VcA2YUH7b2Z2YXqWxezCzfFf4bqmzOzC2/Ff9M8ihdqT4f5hdrDMLtQ+VXiCEL93x7mFiq/ShxBOC9+HL5pTxbZhVPtySK7UNuXXXhQH4a5hWvtZ6fswnf1ySL3GvBZ/yqdbGcdSf4O8q3rCLpL+P8LvxdFu02qjiNo455Vxn6arhAitB9ChPZDiNB+CBHaDyFC+yFEaD+ECO2HEKH9ECK0H0KE9kOI0H4IEdoPIUL7IURoP4QI7YcQof0QIrQfQoT2Q4jQfggR2g8hQvshRGg/hAjthxCh/RAitB9ChPZDiNB+CBH26BsaQkVVLImVewAAAABJRU5ErkJggg==" height="70px" width="70px" alt="Holas">
  </a> 
</div>

<div>
  <a title="Youtube" href="https://www.youtube.com/user/SENATV" style=" z-index:1000;  padding: 0; top: 32rem; position: fixed; background: rgb(170, 170, 170); color: rgb(255, 255, 255);"> 
      <img src="https://vignette.wikia.nocookie.net/telenovelas/images/5/53/Youtube-Icon.png/revision/latest?cb=20151211081213&path-prefix=es" height="70px" width="70px" alt="Holas">
    </a>
</div>

<div>
  <a title="instagram" href="https://www.instagram.com/senacomunica/" style="z-index:1000; padding: 0; top: 39rem; position: fixed; background: rgb(170, 170, 170); color: rgb(255, 255, 255) ;"> 
    <img src="http://götterkinder.de/wp-content/uploads/2018/03/instagram-1675670_640.png" height="70px" width="70px" alt="Holas">
  </a>
</div>

<div>
  <a title="twitter" href="https://twitter.com/senacomunica?lang=es" style="z-index:1000; padding: 0; top: 46rem; position: fixed; background: rgb(170, 170, 170); color: rgb(255, 255, 255);"> 
    <img src="https://images-eu.ssl-images-amazon.com/images/I/31KluT5nBkL.png" height="70px" width="70px" alt="Holas">
  </a>
</div>


  <!--fin dlick-->

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (DESERCION) -->
<div id="desercion" class="container">
  <h1 class="col-md-12 col-12">DESERCIÓN</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br><br>
    <img src="imagenes/123.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8">
      <p>Señor usuario usted podrá realizar la novedad de deserción si cuenta con alguno de los siguientes parámetros:</p>
        <p>-Cuando el Aprendiz injustificadamente no se presente por tres (3) días consecutivos al Centro de Formación o empresa en su proceso formativo.</p>
        <p>-Cuando al terminar el periodo de aplazamiento aprobado por el Sena, el Aprendiz no reingresa al programa de formación.</p>
        <p>-Cuando transcurridos dos (2) años, contados a partir de la fecha de terminación de la etapa lectiva del programa, el Aprendiz no ha presentado la evidencia de la realización de la etapa productiva.</p>
        <p>El instructor será el responsable del respectivo seguimiento, quien reportara el caso al coordinador académico, el proceso será informado al aprendiz con el fin de justificar plenamente el incumplimiento aportando evidencias o soportes respectivos en un lapso de cinco (5) días, si el aprendiz no da reporte que justifique plenamente el incumplimiento será declarado como desertado por el subdirector del centro de formación, ordenando la respectiva cancelación de matrícula. La cancelación de la matricula le implica al aprendiz no poder participar en programas de formación titulada dentro de los seis(6) meses siguientes.</p>
        <br>
        <form action="../vista/administrador/submenuDesercion.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  <br>
  <div class="row">
  </div>
</div>

<!-- Container (TRASLADO) -->
<div id="traslado" class="bg-1">
  <div class="container">
    <div class="row mb-12">
    <h1 class="col-md-12 col-12">TRASLADO</h1>
    <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
    <div class="col-md-2 col-2">
      <br>
      <img src="imagenes/traslado.png" width="250px"></img>
    </div>
    <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8">
      <p>Señor usuario la novedad de traslado es una solicitud formal que podrá realizar el aprendiz, en el cual registra en el sistema de gestión de formación cuando requiere cambio de jornada, de centro de formación, en el mismo programa y en la misma modalidad de formación u otro que corresponda a la misma red u línea tecnológica.</p>
        <p>Para la solicitud de traslado el aprendiz debe de haber adelantado como minimo el primer trimestre de formación del programa, la correspondiente autorización esta dependiente a la disponibilidad de cupo que exija el programa para la cual requiera el traslado, a demás debe encontrarse a paz y salvo con el centro de formación; Cuando el Aprendiz se encuentre sancionado con condicionamiento de matrícula, no se le autorizará traslado ni aplazamiento del proceso de formación. </p>
        <br>
        <form action="../vista/administrador/submenuTraslados.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  </div>
</div>

<div id="aplazamiento" class="container">
  <h1 class="col-md-12 col-12">APLAZAMIENTO</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br><br>
    <img src="imagenes/aplazado.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
  <div class="col-md-8 col-8">
      <p> Señor usuario la novedad de aplazamiento es una solicitud formal que el aprendiz solicita en el centro de formación y registra en el sistema de gestión de formación para desvincularse temporalmente al programa de formación que está cursando actualmente, por algunas de las siguientes causas: Incapacidad medica, licencia de maternidad, servicio militar, problemas de seguridad, calamidad domestica, debidamente demostradas con sus respectivos soportes legales.</p>
        <p>El aplazamiento es un proceso el cual es autorizado por el comité de evaluación  y seguimiento del centro de formación a través del acto administrativo por un tiempo de seis(6) meses, de acuerdo con el tiempo de la duración del programa contados a partir de la notificación con la respectiva respuesta a la solicitud.</p>
        <p>Cuando se trate de aplazamiento por prestación de servicio militar o incapacidad, el Comité podrá autorizarlo por un tiempo superior a los seis meses mientras permanezca en esta situación.</p>
        <br>
        <form action="../vista/administrador/submenuAplazamiento.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  <br>
  <div class="row">
  </div>
</div>
<div id="reingreso" class="bg-1">
  <div class="container">
    <h1 class="col-md-12 col-12">REINGRESO</h1>
    <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
    <div class="col-md-2 col-2">
      <br><br><br>
      <img src="imagenes/reingreso.png" width="300px"></img>
    </div>
    <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8 text-left">
      <p> Señor usuario la solicitud de reingreso es una solicitud formal que el aprendiz realiza en el centro de formación registra en el sistema de gestión de formación para reanudar su proceso de formación en el programa donde solicito aplazamiento y la fecha  limite para que el aprendiz reingrese será la indicada en el acto administrativo respectivo. El reingreso dependerá a que el programa se encuentre en ejecución y a la disponibilidad de cupo.</p>
        <p>El reingreso solo podrá efectuarse si existe disponibilidad de cupo, llegado el caso de no existir disponibilidad se le informara por escrito al aprendiz su imposibilidad o por el contrario la fecha de reintegro.</p>
        <br>
        <form action="../vista/administrador/submenuReingresos.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="retiro" class="container">
  <h1 class="col-md-12 col-12">RETIRO VOLUNTARIO</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br>
    <img src="imagenes/retiro.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-2">
    <br>
     Señor usuario la solicitud de retiro voluntario es una solicitud formal que el aprendiz realiza en el centro de formación y registra en el sistema de gestión de formación para retirarse definitivamente del programa de formación. El retiro voluntario del programa de formación titulada implica que el aprendiz no pueda participar en procesos de ingreso a la institución en programas de formación titulada dentro los seis meses(6) siguientes.</p>
      <br> 
      <form action="../vista/administrador/submenuRetiroVoluntario.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  <br>
  
</div>


<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#inicio" data-toggle="tooltip" title="Inicio">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p> Autores <br>
        Brayan Stiven Martinez Torres <br>
        Karen Jineth Suta Anzola <br>
        Jeisson Farid Sanchez Mora <br>
        Lorena Casallas
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
