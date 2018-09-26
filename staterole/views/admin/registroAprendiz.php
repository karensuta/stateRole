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
  <div class="container"><h1 style="color: #fff;">Registro Aprendiz</h1></div>
</header>

<?php

//este aprendiz se registro correctamente
if ($_SESSION["registroA"]==1) {
  echo"<div class='alert alert-success text-center'>
      <strong>Exitoso!</strong> Este aprendiz se registro correctamente.
            </div>";
  $_SESSION["registroA"]=0;
}

//este aprendiz ya esta registrado
if ($_SESSION["repetir"]!=0) {
  echo"<div class='alert alert-danger text-center'>
      <strong>Aviso!</strong> Este aprendiz ya se encuentra registrado.
            </div>";
  $_SESSION["repetir"]=0;
}
?>



<div class="cuadro">
  <div class="container" style="background-color: #fff">
    
    <table width="100%" border="0">
      <form action="../../negocio/registro/datosAprendiz.php" method="post">
        <tr>
          <td>Primer Nombre:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="p_nombre" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" style="width: 100%;" required></td>
        </tr>

        <tr>
          <td>Segundo Nombre:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="s_nombre" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" style="width: 100%;" required></td>
        </tr>

        <tr>
          <td>Primer Apellido:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="p_apellido" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" style="width: 100%;" required></td>
        </tr>

        <tr>
          <td>Segundo Apellido:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="s_apellido" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" style="width: 100%;" required></td>
        </tr>

        <tr>
          <td>Tipo de Documento:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_tipo_documento" style="width: 100%;">
            <?php
              require_once '../../model/conexion.php';
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM tipo_documento");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_tipo_documento]'>$row[tipo_documento]</option>";
              }
            ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Documento:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="documento" pattern="[0-9]{5,13}" title="Sólo puede ingresar números" style="width: 100%;" required></td>
        </tr>

        <tr>
          <td>Correo:</td>
        </tr>
        <tr>
          <td><input autocomplete="off" type="tex" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="ejemplo@example.com" style="width: 100%;" required></td>
        </tr><tr>
          <td><input type="hidden" name="id_rol" value="3"></td>
        </tr>

        <tr>
          <td>Sede:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_sede" style="width: 100%;">
            <?php
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM sede");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_sede]'>$row[sede]</option>";
              }
            ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Ficha y Programa de Formación:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_ficha" style="width: 100%;">
            <?php
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM ficha inner join formacion on ficha.id_formacion=formacion.id_formacion");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_ficha]'>$row[ficha]- $row[programa]</option>";
              }
            ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Jornada:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_jornada" style="width: 100%;">
            <?php
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM jornada");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_jornada]'>$row[jornada]</option>";
              }
            ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>Trimestre:</td>
        </tr>
        <tr>
          <td>
            <select  name="id_trimestre" style="width: 100%;">
            <?php
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM trimestre");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_trimestre]'>$row[trimestre]</option>";
              }
            ?>
          </select>
          </td>
        </tr>

    </table>
    <table width="100%">
        <tr>
          <td><br><button class="btn form-control">Registrar</button></td>
          </form>

          <td>
            <form action="listadoAprendiz.php">
              <br><button class="btn form-control">Lista de Aprendices</button>
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
