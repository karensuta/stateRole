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
        
        <!--Notificacion-->
        <?php
          require_once '../../model/conexion.php';
          
          $nt=Conexion::conectar()->prepare("SELECT * FROM novedad INNER JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad WHERE estado_novedad=1");
          $nt->execute();
          $cont=0;
          echo "<li>
                    <a data-toggle=modal data-target='#notificacion'><span class=badge>";

          foreach ($nt as $n) {
            $cont=$cont+1;
            
          }

          echo "$cont</span><span class='glyphicon  glyphicon glyphicon-bell' style=font-size:20px;></span></a>
                  </li>";
        ?>
        <!--Aqui muestra los datos del usuario-->
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
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Opciones<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a data-toggle="modal" data-target="#buscar">Datos de los Usuarios</a></li>
            <li><a href="../../views/admin/habilitar.php">Habilitar Usuario</a></li>
            <li><a href="../../views/admin/registroAprendiz.php">Registrar Aprendiz</a></li>
            <li><a href="../../views/admin/programa.php">Registrar Programa</a></li>
            <li><a href="../../views/admin/registroFicha.php">Registrar Ficha</a></li>
          </ul>
        </li>
        <li><a class="btn-dark" href="../../salir.php">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Ventana de la informacion -->

<div class="modal fade" id="buscar" role="dialog">
  <div class="modal-dialog">
    <!-- el buscar que aperece-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span>Información</h4>
        </div>
        <div class="modal-body">
          <form action="../../views/admin/informacion.php" method="post">

            <div class="form-group">
              <label>Aqui podra buscar la información de los usuarios y asignar el rol</label>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Documento del Usuario</label>
              <input type="text" name="documento" class="form-control" placeholder="Número de Documento" pattern="[0-9]{5,13}" title="Solo puede ingresar números" required>
            </div>
              <button type="submit" class="btn btn-block">Buscar</button>
          </form>
          <br>
          <form action="../../views/admin/listadoUsuarios.php"><button type="submit" class="btn btn-block">Lista de Usuarios</button></form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancelar
          </button>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="notificacion" role="dialog">
  <div class="modal-dialog">
    <!-- el buscar que aperece-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-bell"></span>NOTIFICACIONES</h4>
        </div>
        <div class="modal-body">
            <div class="form-group text-center">
              <label>Registro de notificaciones</label>
            </div>
            <div class="form-group text-center">
              <?php
                require_once '../../model/conexion.php';
                
                $t=Conexion::conectar()->prepare("SELECT * FROM novedad INNER JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad WHERE estado_novedad=1");
                $t->execute();
                $cont2=0;

                echo "<table class=table>
                  <thead class=thead-dark>
                    <tr>
                      <th scope=col>#</th>
                      <th scope=col >Novedad</th>
                      <th scope=col >Ver</th>
                    </tr>
                  </thead>
                  <tbody>
                    ";                 
                foreach ($t as $d) {
                  $cont2=$cont2+1;
                  echo "
                    <tr>  
                      <th>$cont2</th>
                      <td class=text-left>".$d["tipo_novedad"]."</td>
                      <td class=text-left>
                        <form action='../../views/admin/registroNovedades.php' method='post'>
                          <button class='btn glyphicon glyphicon-search' style=font-size:12px;></button>
                        </form>
                      </td>
                    </tr>";
                }

                echo "
                  </tbody>
                </table>";

                ?>              
            </div>

        <form action='../../views/admin/listadoNovedad.php' method='post'>
          <button class='btn btn-dark form-control'>Lista de Novedades</button>
        </form>    
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default pull-center" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancelar
          </button>
        </div>
      </div>
  </div>
</div>

