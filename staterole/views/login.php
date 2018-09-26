<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="utf-8">
	<title> Login</title>
	<link rel="stylesheet" href="css\estilos.css">
</head>
<body>
	<a href="inicio.php"></a>
	<div class="contenedor-form">
		<div class="toggle">
			<span> Crear cuenta </span>
		</div>

		<div class="formulario">
			<h2> Iniciar Sesión </h2>
			<?php
				session_start();
				//este usuario ya se registro
				if ($_SESSION["login"]==2) {
					echo"<div class='alert alert-success'>
							<strong>Aviso!</strong> Este usuario se registro correctamente inicie sesion.
						</div>";
					$_SESSION["login"]=0;
				}
				if ($_SESSION["login"] == 3) {
					echo"<div class='alert alert-danger'>
							<strong>Aviso!</strong> El usuario o la contraseña no coinciden.
						</div>";
					$_SESSION["login"]=0;
				}
				if ($_SESSION["login"] == 4) {
					echo"<div class='alert alert-primary'>
							<strong>Aviso!</strong> Este usuario no puede acceder al sistema.
						</div>";
					$_SESSION["login"]=0;
				}
			?>
			<form action="../negocio/registro/iniciarSesion.php" method="post">
				<input type="text" placeholder="Documento" pattern="[0-9]{5,13}" title="Sólo puede ingresar números" name="documento" required>
				<input type="password" placeholder="Contraseña" name="contrasena" required>
				<input type="submit" value="Iniciar Sesión">
			</form>
		</div>

		<div class="formulario">
			<h2> Crea tu cuenta</h2>
			<form action="../negocio/registro/datosRegistro.php" method="post">
				
					<?php
					//este usuario ya se registro
					if ($_SESSION["habilitado"]==2) {
						echo"<div class='alert alert-danger'>
								<strong>Atención!</strong> Este usuario no ha sido habilitado en el sistema.
							</div>";
						$_SESSION["habilitado"]=0;
					}

					if ($_SESSION["login"] == 1) {
						echo"<div class='alert alert-danger'>
								<strong>Atención!</strong> Las contraseñas no coinciden.
							</div>";
						$_SESSION["login"]=0;

					}

					if ($_SESSION["registrado"] == 2) {
						echo"<div class='alert alert-danger'>
								<strong>Atención!</strong> Este usuario ya se encuentra registrado en el sistema.
							</div>";
						$_SESSION["registrado"]=0;

					}

					?>
  					
				<input type="text" placeholder="Primer Nombre" name="p_nombre" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" required>
				<input type="text" placeholder="Segundo Nombre" name="s_nombre" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" required>
				<input type="text" placeholder="Primer Apellido" name="p_apellido" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" required>

				<input type="text" placeholder="Segundo Apellido" name="s_apellido" pattern="[a-zA-ZÑñáéíóúÁÉÍÓÚ]{3,20}" title="Sólo puede ingresar letras" required>
				<select  name="id_tipo_documento">
					<option value="1" >Cédula de Ciudadania</option>
				<?php
  				include '../model/conexion.php';
				$cxn=Conexion::conectar();
  				$sec=$cxn->query("SELECT * FROM tipo_documento");

  				while ($row=$sec->fetch(PDO::FETCH_ASSOC)) {
  					echo "<option value='$row[id_tipo_documento]'>$row[tipo_documento]</option>";
  				}
  				?>
				</select><br>
				<input type="text" placeholder="Documento" name="documento"pattern="[0-9]{5,13}" title="Sólo puede ingresar números" required>
				<input type="email" placeholder="Correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="ejemplo@example.com" required>
				<input type="password" placeholder="Contraseña" name="contrasena" required>
				<input type="password" placeholder="Confirmar contraseña" name="c_contrasena" required>
				
				<table align="center" >
					<tr>
						<td>
							<a onclick="document.getElementById('contact').style.display='block'" class="w3-button w3-black">Términos y condiciones</a>
							<div id="contact" class="w3-modal">
  							<div class="w3-modal-content w3-animate-zoom">
    						<div class="w3-container w3-black">
      						<span onclick="document.getElementById('contact').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
		           			<div class="w3-container w3-black">
		            			<h1>Términos y Condiciones</h1>
		            		</div>
		            		<div class="w3-container">
			            		<h6>Mediante las directrices de seguridad, términos de uso del servicio y de tratamiento de la información se busca garantizar la adecuada protección de los datos de nuestros usuarios, Esta información registrada en el aplicativo se realiza dentro de los términos y condiciones establecidas y el uso de los servicios implica la aceptación por parte de los usuarios.<br>La aceptación de los términos de uso y la política de confidencialidad de los servicios de la plataforma State Role lo hace responsable en relación con:<br><br>•	La información que registra es verídica, real y corresponde a sus datos personales.<br>•	El usuario y la contraseña asignados son de carácter intransferible, personal y modificable únicamente por su titular<br>•	La suplantación o ingreso de información falsa constituye un fraude el cual implica sanciones e inhabilidades.<br>•	Es responsabilidad del usuario mantener la información actualizada: Tipo y número de identificación, nombres y apellidos, dirección de residencia, números de teléfono de contacto y correo electrónico.<br>•	Como usuario hará buen uso de la información a la que tenga acceso.<br><br></h3>

			            		<h6>AUTORIZACIÓN Y CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES<br><br>State & Role, con domicilio principal en  la ciudad de Bogotá, se permite informar que en cumplimiento de la Ley Estatutaria 1581 del 2012, por la cual se estable el ‘Régimen General de Protección de Datos’ y el Decreto Reglamentario 1377 del 2013”, demanda respetuosamente su autorización para que de manera libre, previa, clara, expresa, voluntaria y debidamente informada permita a la Entidad recolectar, recaudar, almacenar, usar, procesar, compilar, intercambiar con otras Entidades Públicas, dar tratamiento, actualizar y disponer de los datos que serán suministrados y que se incorporen en nuestras bases de datos. Esta información es y será utilizada en el desarrollo de las funciones  propias de la Entidad Sena<br></h6>
			            	</div>
						</td>
						<td width=65%>
							<table>
								<tr>
									<td style="padding:10px"><input type="checkbox" value="1" required></td>
									<td><h5>  Acepto términos</h5></td>
								</tr>
							</table>
						</td>
					</tr>
				</table><br><br>
				
				<input type="submit" value="Crear Sesión">
			</form>
		</div>
		<div class="reset-password">
			<a href="#"> Olvido su contraseña </a>
		</div>
	</div>

	<script src="js-login\jquery-3.1.1.min.js"></script>
	<script src="js-login\main.js"></script>
</body>
</html>