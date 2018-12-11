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
<style>
.results tr[visible='false'],
.no-result{
  display:none;
}

.results tr[visible='true']{
  display:table-row;
}

.counter{
  padding:8px; 
  color:#ccc;
}
</style>
<body id="inicio" data-spy="scroll" data-target=".navbar" data-offset="50">

<?php
//nav
include '../../elementos/admin/nav2.php';
?>  

<header>
  <div class="container"><h1 style="color: #fff;">Registro de Aprendices</h1></div>
</header>

<?php
  //las contraseñas no coinsiden con el usuario
  if ($_SESSION["usuario"]==1) {
    echo"<div class='alert alert-danger text-center'>
          <strong>Aviso!</strong> La contraseña no coincide.
        </div>";
      $_SESSION["usuario"]=0;
  }

  //se elimino correctamente
  if ($_SESSION["usuario"]==2) {
    echo"<div class='alert alert-success text-center'>
          <strong>Exito!</strong> El aprendiz se elimino correctamente del sistema.
        </div>";
      $_SESSION["usuario"]=0;
  }

  //actualizacion datos de usuarios
  if ($_SESSION["actualizar"]==1) {
  echo "<div class='alert alert-success alert-dismissible text-center'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Exito!</strong> Este usuario se actualizo correctamente.
        </div>";
  $_SESSION["actualizar"]=0;
}
?>
  

  <div class="container-fluid table-responsive" style="background-color: #fff; padding: 150px; ">
    
    <table width="100%" border="0">
      <tr>
        <td width="150px">¿Que esta buscando?</td>
        <td><input type="text" class="search form-control" placeholder="Documento"></td>
        <td><span class="counter pull-left"></span></td>
      </tr>
      <tr>
        <td colspan="3"><br></td>
      </tr>
      
      <?php 

      require_once '../../controller/adminController.php';

      $lista = new Administrador();
      $res = $lista->listadoAprendiz();

      echo "<table class='table table-hover results'>
              <thead>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Sede</th>
                <th>Ficha</th>
                <th>Jornada</th>
                <th>Trimestre</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
              </thead>";

      foreach ($res as $x) {
        echo "
        <tr>
          <td>".$x["p_nombre"]."</td>
          <td>".$x["s_nombre"]."</td>
          <td>".$x["p_apellido"]."</td>
          <td>".$x["s_apellido"]."</td>
          <td>".$x["tipo_documento"]."</td>
          <td>".$x["documento"]."</td>
          <td>".$x["correo"]."</td>
          <td>".$x["sede"]."</td>
          <td>".$x["ficha"]."</td>
          <td>".$x["jornada"]."</td>
          <td>".$x["trimestre"]."</td>
          <td>
            <form action='actualizacionDatos.php' method='post'>
          <input type='hidden' name='doc' value=".$x['documento'].">
          <input type=hidden name='rolC' value=".$x["id_rol"].">
          <input type=hidden name='volver' value=1>
          <button class='btn fa fa-edit'></button>
        </form>
          </td>
          <td>
            <a data-toggle='modal' data-target='#$x[documento]'>
              <button class='btn fa fa-times-circle'></button>
            </a>
          </td>

        </tr>

        <div class='modal fade' id='$x[documento]' role='dialog'>
          <div class='modal-dialog'>
            <!--Confirma la contraseña para borrar lo que desea-->
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>×</button>
                  <h4><span class='glyphicon glyphicon-ok'></span> Confirmar</h4>
                </div>
                <div class='modal-body'>
                  <form action='../../negocio/eliminar/aprendiz.php' method='post'>

                    <div class='form-group'>
                      <p align='center'>Desea eliminar este aprendiz del sistema.</p>
                      <p align='center'>Para poder continuar por favor digite su contraseña.</p>
                    </div>
                    <div class='form-group'>
                      <label for='usrname'><span class='glyphicon glyphicon-lock'></span> Contraseña:</label>
                      <input type='password' name='contrasena' class='form-control' placeholder='Contraseña' required>
                      <input type='checkbox' value='1' required> Estoy seguro.
                    </div>
                      <input type=hidden name=doc value=".$x["documento"].">
                      <button type='submit' class='btn btn-block'>Continuar</button>
                  </form>
                </div>
                <div class='modal-footer'>
                  <button type='submit' class='btn btn-danger btn-default pull-center' data-dismiss='modal'>
                    <span class='glyphicon glyphicon-remove'></span> Cancelar
                  </button>
                </div>
              </div>
          </div>
        </div>

        ";
      }

      ?>
      </table> 
      <table width="100%" class="table">
        <tr>
          <form action="inicio.php">
          <td align="center"><br><button class="btn form-control">Volver</button></td>
          </form>
        </tr>
      </table>     
      
  </div>


<br><br><br>
<!-- Footer -->
<?php include '../../elementos/footer.php'; ?>

<script>
$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' Item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});



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
