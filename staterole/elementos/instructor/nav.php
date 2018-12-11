<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="#inicio"><img src="../../elementos/img/logo.png" class="navbar-brand"></a>
      <a class="navbar-brand" href="#inicio">State & Role</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <?php
          require_once '../../model/conexion.php';
          $cxn=Conexion::conectar();
          $sec=$cxn->query("SELECT * FROM usuario INNER JOIN rol ON usuario.id_rol=rol.id_rol WHERE documento='$_SESSION[documento]'");

          while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
            echo "<li><a>Usuario: $row[p_nombre] $row[p_apellido]</a></li>";
            echo "<li><a>Rol: $row[rol]</a></li>";
          }
        ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Novedades<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#desercion">Desercion</a></li>
            <li><a href="#traslado">Traslado</a></li>
            <li><a href="#aplazamiento">Aplazamiento</a></li>
            <li><a href="#reingreso">Reingreso</a></li>
            <li><a href="#retiro">Retiro Voluntario</a></li> 
          </ul>
        </li>
        <li><a class="btn-dark" href="../../salir.php">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

