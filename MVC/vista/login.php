<!DOCTYPE html>
<html lang="en">
<head>
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
			<form action="" method="post">
				<input type="text" placeholder="Documento" name="documento" required>
				<input type="password" placeholder="Contraseña" name="contrasena" required>
				<input type="submit" value="Iniciar Sesión">
			</form>
		</div>

		<div class="formulario">
			<h2> Crea tu cuenta</h2>
			<form action="../controlador/datos_registro.php" method="post">
				<input type="text" placeholder="Nombre" name="nombre" required>
				<input type="text" placeholder="Apellido" name="apellido" required>
				<select name="tipo_documento" class="elect">
					<option value="C.C">Cédula Ciudadania</option>
					<option value="T.I">Tarjeta de Identidad</option>
					<option value="C.E">Cédula Extrangeria</option>
				</select><br>
				<input type="text" placeholder="Documento" name="documento" required>
				<input type="email" placeholder="Correo" name="correo" required>
				<input type="password" placeholder="Contraseña" name="contrasena" required>
				<input type="password" placeholder="Confirmar contraseña" name="c_contrasena" required>
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

