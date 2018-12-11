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
  <div class="container"><h1 style="color: #fff;">Actualización de Datos</h1></div>
</header>


  <div class="container" style="background-color: #fff; padding: 100px; ">
    
    <table width="100%" border="0">
      <form action="../../negocio/actualizar/datosUsuario.php" method="post">
      <?php 

      require_once '../../controller/adminController.php';
      $rolC=3;
      $usuario = new Administrador();
      $us = $usuario->consultarUsuario($_POST["documento"],$rolC);

      foreach ($us as $x) {
        echo "<table width=100%>
        <tr>
          <td>Primer Nombre:</td>
          <td>".$x["p_nombre"]."</td>
          <td><input type='text' class=form-control name='n_p_nombre' value='$x[p_nombre]' pattern='[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}' title='Sólo puede ingresar letras' required></td>
        </tr>
        <tr>
          <td>Segundo Nombre:</td>
          <td>".$x["s_nombre"]."</td>
          <td><input type='text' class=form-control name='n_s_nombre' value='$x[s_nombre]' pattern='[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}' title='Sólo puede ingresar letras'></td>
        </tr>
        <tr>
          <td>Primer Apellido:</td>
          <td>".$x["p_apellido"]."</td>
          <td><input type='text' class=form-control name='n_p_apellido' value='$x[p_apellido]' pattern='[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}' title='Sólo puede ingresar letras' required></td>
        </tr>
        <tr>
          <td>Segundo Apellido:</td>
          <td>".$x["s_apellido"]."</td>
          <td><input type='text' class=form-control name='n_s_apellido' value='$x[s_apellido]' pattern='[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}' title='Sólo puede ingresar letras'></td>
        </tr>
        <tr>
          <td>Tipo documento:</td>
          <td>".$x["tipo_documento"]."</td>
          <td>
            <select class=form-control name='n_id_tipo_documento'>
              <option value='$x[id_tipo_documento]'>$x[tipo_documento]</option>";
              
              require_once '../../model/conexion.php';
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM tipo_documento");
              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_tipo_documento]'>$row[tipo_documento]</option>";
              }

      echo "</select>
          </td>
        </tr>
        <tr>
          <td>Documento:</td>
          <td>".$x["documento"]."</td>
          <td align=center>".$x["documento"]."<input type='hidden' class=form-control name='doc' value='$x[documento]'></td>
        </tr>
        <tr>
          <td>Correo:</td>
          <td>".$x["correo"]."</td>
          <td><input type='text' class=form-control name='n_correo' value='$x[correo]' required pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' title='ejemplo@example.com'></td>
        </tr>
        <tr>
          <td>Rol:</td>
          <td>".$x["rol"]."<input type='hidden' class=form-control name='rolC' value='$x[id_rol]'></td>
          <td align=center>";

              if ($x["id_rol"] == 5) {
                echo $x["rol"],"<input type='hidden' class=form-control name='n_id_rol' value='$x[id_rol]' required>";

              }else{
                echo "
                <select class=form-control name='n_id_rol'>
                  <option value='$x[id_rol]'>$x[rol]</option>";

                  require_once '../../model/conexion.php';
                  $cxn=Conexion::conectar();
                  $sec=$cxn->query("SELECT * FROM rol");
                  while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='$row[id_rol]'>$row[rol]</option>";
                  }
              }

      echo "</select>
        </tr>
          <tr>
            <td>Sede:</td>
            <td>".$x["sede"]."</td>
            <td>
              <select class=form-control name='n_id_sede'>
              <option value='$x[id_sede]'>$x[sede]</option>";

              require_once '../../model/conexion.php';
              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM sede");
              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_sede]'>$row[sede]</option>";
              }

      echo "</select>
        </td>
          </tr>
          <tr>
            <td>Ficha y Programa de Formación</td>
            <td>".$x["ficha"]." - ".$x["programa"]."</td>
            <td>
              <select class=form-control name='n_id_ficha'>
              <option value='$x[id_ficha]'>$x[ficha] - $x[programa]</option>";

              $cxn=Conexion::conectar();
              $sec=$cxn->query("SELECT * FROM ficha inner join formacion on ficha.id_formacion=formacion.id_formacion");

              while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='$row[id_ficha]'>$row[ficha]- $row[programa]</option>";
              }

      echo" </select>
            </td>
          </tr>
          <tr>
            <td>Jornada:</td>
            <td>".$x["jornada"]."</td>
            <td>
              <select class=form-control name='n_id_jornada'>
              <option value='$x[id_jornada]'>$x[jornada]</option>";

            require_once '../../model/conexion.php';
            $cxn=Conexion::conectar();
            $sec=$cxn->query("SELECT * FROM jornada");
            while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='$row[id_jornada]'>$row[jornada]</option>";
            }

      echo"</select>
            </td>            
          </tr>
          <tr>
            <td>Trimestre:</td>
            <td>".$x["trimestre"]."</td>
            <td>
              <select class=form-control name='n_id_trimestre'>
              <option value='$x[id_trimestre]'>$x[trimestre]</option>";

            require_once '../../model/conexion.php';
            $cxn=Conexion::conectar();
            $sec=$cxn->query("SELECT * FROM trimestre");
            while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
              echo "<option value='$row[id_trimestre]'>$row[trimestre]</option>";
            }

            echo "</select></td>          
          </tr>
      </table>";
      }

      ?>
      <br>
      <table width="100%">
        <tr>
          <td>
            <button class="btn form-control">Actualizar Datos</button>
        </form>
          </td>
          <td>
            <form action="listadoAprendiz.php"><button class="btn form-control">Volver</button></form>
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
