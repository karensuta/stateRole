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
  <div class="container"><h1 style="color: #fff;">Historial de las Fichas Registradas en el Sistema</h1></div>
</header>

  <div class="container-fluid table-responsive" style="background-color: #fff; padding: 150px; ">
    
    <table width="100%" border="0">
      <?php 

      require_once '../../controller/adminController.php';
      $his="ficha";
      $historial = new Administrador();
      $res = $historial->historial($his);

      echo "<table class='table'>
              <thead>
                <th>ID</th>
                <th>Ficha</th>
                <th>Estado</th>
              </thead>";

      foreach ($res as $x) {
        echo "
        <tr>
          <td>".$x["id_ficha"]."</td>
          <td>".$x["ficha"]."</td>
          <td>";
          if ($x["estado_ficha"]==1) {
            echo "<p style='color:#009900;'>Activo</p>";
          }
          if ($x["estado_ficha"]==0) {
            echo "<p style='color:#ff0000;'>Eliminado</p>";
          }
          echo "</td>
        </tr>
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
