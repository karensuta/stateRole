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
  <div class="container"><h1 style="color: #fff;">Programas de Formación</h1></div>
</header>


  <div class="container-fluid" style="background-color: #fff; padding: 100px; ">
    
    <table width="100%" border="0">
      <?php 

      require_once '../../controller/adminController.php';

      $lista = new Administrador();
      $res = $lista->listadoPrograma();

      echo "<table class='table'>
              <thead>
                <th>ID</th>
                <th>Programa</th>
                <th>Eliminar</th>
              </thead>";

      foreach ($res as $x) {
        echo "
        <tr>
          <td>".$x["id_formacion"]."</td>
          <td>".$x["programa"]."</td>
          <td>
            <form action='' method='post'>
          <input type='hidden' name='id_formacion' value=".$x['id_formacion'].">
          <button class='btn fa fa-times-circle'></button>
        </form>
          </td>

        </tr>";
      }

      ?>
      </table> 
      <table width="100%">
        <tr>
          <td>
            <form action="registroPrograma.php">
            <br><button class="btn form-control">Registrar Programa de Formación</button>
            </form>         
          </td>
        </tr>
        <tr>
          <td>
            <form action="inicio.php">
            <br><button class="btn form-control">Volver</button>
            </form>
          </td>
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
