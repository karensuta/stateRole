<?php include '../../seguridad/seguridad.php'; ?>
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
include '../../elementos/admin/nav.php';
//slider
include '../../elementos/slider.php';
//Barra de redes
include '../../elementos/redes.php';
?>
<?php 
//actualizacion datos de usuarios
if ($_SESSION["actualizar"]==1) {
  echo "<div class='alert alert-success alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Exito!</strong> El usuario se actualizo correctamente.
        </div>";
  $_SESSION["actualizar"]=0;
}
?>

<!-- Container (DESERCION) -->
<div id="desercion" class="container">
  <h1 class="col-md-12 col-12">DESERCIÓN</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br><br>
    <img src="../../elementos/img/desercion.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8">
      <p>Señor usuario usted podrá realizar la novedad de deserción si cuenta con alguno de los siguientes parámetros:</p>
        <p>-Cuando el Aprendiz injustificadamente no se presente por tres (3) días consecutivos al Centro de Formación o empresa en su proceso formativo.</p>
        <p>-Cuando al terminar el periodo de aplazamiento aprobado por el Sena, el Aprendiz no reingresa al programa de formación.</p>
        <p>-Cuando transcurridos dos (2) años, contados a partir de la fecha de terminación de la etapa lectiva del programa, el Aprendiz no ha presentado la evidencia de la realización de la etapa productiva.</p>
        <p>El instructor será el responsable del respectivo seguimiento, quien reportara el caso al coordinador académico, el proceso será informado al aprendiz con el fin de justificar plenamente el incumplimiento aportando evidencias o soportes respectivos en un lapso de cinco (5) días, si el aprendiz no da reporte que justifique plenamente el incumplimiento será declarado como desertado por el subdirector del centro de formación, ordenando la respectiva cancelación de matrícula. La cancelación de la matricula le implica al aprendiz no poder participar en programas de formación titulada dentro de los seis(6) meses siguientes.</p>
        <br>
        <form action="submenuDesercion.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  <br>
</div>

<!-- TRASLADO -->
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
      <img src="../../elementos/img/traslado.png" width="250px"></img>
    </div>
    <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8">
      <p>Señor usuario la novedad de traslado es una solicitud formal que podrá realizar el aprendiz, en el cual registra en el sistema de gestión de formación cuando requiere cambio de jornada, de centro de formación, en el mismo programa y en la misma modalidad de formación u otro que corresponda a la misma red u línea tecnológica.</p>
        <p>Para la solicitud de traslado el aprendiz debe de haber adelantado como minimo el primer trimestre de formación del programa, la correspondiente autorización esta dependiente a la disponibilidad de cupo que exija el programa para la cual requiera el traslado, a demás debe encontrarse a paz y salvo con el centro de formación; Cuando el Aprendiz se encuentre sancionado con condicionamiento de matrícula, no se le autorizará traslado ni aplazamiento del proceso de formación. </p>
        <br>
        <form action="submenuTraslado.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  </div>
</div>

<!-- APLAZAMIENTO -->
<div id="aplazamiento" class="container">
  <h1 class="col-md-12 col-12">APLAZAMIENTO</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br><br>
    <img src="../../elementos/img/aplazado.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
  <div class="col-md-8 col-8">
      <p> Señor usuario la novedad de aplazamiento es una solicitud formal que el aprendiz solicita en el centro de formación y registra en el sistema de gestión de formación para desvincularse temporalmente al programa de formación que está cursando actualmente, por algunas de las siguientes causas: Incapacidad medica, licencia de maternidad, servicio militar, problemas de seguridad, calamidad domestica, debidamente demostradas con sus respectivos soportes legales.</p>
        <p>El aplazamiento es un proceso el cual es autorizado por el comité de evaluación  y seguimiento del centro de formación a través del acto administrativo por un tiempo de seis(6) meses, de acuerdo con el tiempo de la duración del programa contados a partir de la notificación con la respectiva respuesta a la solicitud.</p>
        <p>Cuando se trate de aplazamiento por prestación de servicio militar o incapacidad, el Comité podrá autorizarlo por un tiempo superior a los seis meses mientras permanezca en esta situación.</p>
        <br>
        <form action="submenuAplazamiento.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  <br>
</div>

<!-- REINGRESO -->
<div id="reingreso" class="bg-1">
  <div class="container">
    <h1 class="col-md-12 col-12">REINGRESO</h1>
    <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
    <div class="col-md-2 col-2">
      <br><br><br>
      <img src="../../elementos/img/reingreso.png" width="300px"></img>
    </div>
    <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-8 text-left">
      <p> Señor usuario la solicitud de reingreso es una solicitud formal que el aprendiz realiza en el centro de formación registra en el sistema de gestión de formación para reanudar su proceso de formación en el programa donde solicito aplazamiento y la fecha  limite para que el aprendiz reingrese será la indicada en el acto administrativo respectivo. El reingreso dependerá a que el programa se encuentre en ejecución y a la disponibilidad de cupo.</p>
        <p>El reingreso solo podrá efectuarse si existe disponibilidad de cupo, llegado el caso de no existir disponibilidad se le informara por escrito al aprendiz su imposibilidad o por el contrario la fecha de reintegro.</p>
        <br>
        <form action="submenuReingreso.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
</div>

<!-- RETIRO VOLUNTARIO -->
<div id="retiro" class="container">
  <h1 class="col-md-12 col-12">RETIRO VOLUNTARIO</h1>
  <div class="col-md-12 col-12">
    <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/"><span class="badge badge-primary">Sofia Plus</span></a>
    <a href="http://electricidadelectronicaytelecomu.blogspot.com.co/"><span class="badge badge-success">Sena CEET</span></a>
  </div>
  <div class="col-md-2 col-2">
    <br><br>
    <img src="../../elementos/img/retiro.png" width="230px"></img>
  </div>
  <div class="col-md-2 col-2"></div>
    <div class="col-md-8 col-2">
    <br>
     Señor usuario la solicitud de retiro voluntario es una solicitud formal que el aprendiz realiza en el centro de formación y registra en el sistema de gestión de formación para retirarse definitivamente del programa de formación. El retiro voluntario del programa de formación titulada implica que el aprendiz no pueda participar en procesos de ingreso a la institución en programas de formación titulada dentro los seis meses(6) siguientes.</p>
      <br> 
      <form action="submenuRetiro.php"><button class="btn btn-dark form-control " type="submit">Realizar solicitud</button></form>
    </div>
  </div>
  <br>
  
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
