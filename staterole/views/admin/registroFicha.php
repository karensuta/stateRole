<?php include '../../seguridad/seguridadAdmin.php'; ?>
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
  <div class="container"><h1 style="color: #fff;">Registro de Fichas de Formación</h1></div>
</header>

<?php
//este aprendiz se registro correctamente
if ($_SESSION["ficha"]==1) {
  echo"<div class='alert alert-success text-center'>
      <strong>Exitoso!</strong> Esta ficha se registro correctamente.
            </div>";
  $_SESSION["ficha"]=0;
}

//este aprendiz ya esta registrado
if ($_SESSION["repetir"]==1) {
  echo"<div class='alert alert-danger text-center'>
      <strong>Aviso!</strong> Esta ficha ya se encuentra registrada.
            </div>";
  $_SESSION["repetir"]=0;
}
?>



<div class="cuadro" style="padding: 100px;">
  <div class="container" style="background-color: #fff">
    
    <table width="100%" border="0">
      <form action="../../negocio/registro/datosFicha.php" method="post">
        <tr>
          <td>Número de Ficha:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="ficha" pattern="[0-9]{5,10}" title="Sólo puede ingresar números" style="width: 100%;" required>
            <div class="text-center"><strong>Recuerde!!</strong> La ficha que se va registrar tiene que ser de algunos de estos programas de formación</div>
          </td>

        </tr>

        <tr>
          <td>Programas de formacion:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_formacion" style="width: 100%;">
            <?php
              require_once '../../model/conexion.php';
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM formacion WHERE estado=1");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_formacion]'>$row[programa]</option>";
              }
            ?>
          </select>
        </tr>

       </table>
    <table width="100%">
        <tr>
          <td><br><button class="btn form-control">Registrar</button></td>
          </form>

          <td>
            <form action="listadoFicha.php">
              <br><button class="btn form-control">Listado de Fichas</button>
            </form>
          </td>

          <td>
            <form action="inicio.php">
              <br><button class="btn form-control">Volver</button>
            </form>
          </td>
    </table>  
      
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
