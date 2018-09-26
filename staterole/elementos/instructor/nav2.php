<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="#inicio"><img src="../../elementos/img/logo.png"  class="navbar-brand"></a>
      <a class="navbar-brand" href="#inicio">State & Role</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <?php
        session_start();
          require_once '../../model/conexion.php';
          $cxn=Conexion::conectar();
          $sec=$cxn->query("SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol=rol.id_rol WHERE documento='$_SESSION[documento]'");

          while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a>Usuario: $row[p_nombre] $row[p_apellido]</a></li>";
            echo "<li><a>Rol: $row[rol]</a></li>";
          }
        ?>
        <li><a class="btn-dark" href="Inicio.php">Inicio</a></li>
        <li><a class="btn-dark" href="../../salir.php">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
