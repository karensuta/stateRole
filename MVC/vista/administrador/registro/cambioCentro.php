<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="formularios-estilos.css">
</head>
<body>

<header>
    <div class="container">
      <h1>CAMBIO DE CENTRO</h1>
    </div>
  </header>
<br><br><br><br>
<div class="cuadro">

	<form action="../../../controlador/registro/datos_cambioCentro.php" method="post" class="form-horizontal">
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationServer01" class="titulo">Nombres</label>
      <input type="text" class="form-control" name="nombre" placeholder="Nombres*" required>
      <div class="valid-feedback">
      </div>
    </div>
    
    <div class="col-md-6 mb-6">
      <label for="validationServer02">Apellidos</label>
      <input type="text" class="form-control" name="apellido" placeholder="Apellidos*" required>
      <div class="valid-feedback">  
      </div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01">Tipo de Documento</label>
      <select class="custom-select" name="tipo_documento">
 		 <option selecteds>Tipo de Documento*</option>
  		<option value="C.C">Cédula de Cuidadania</option>
      <option value="T.I">Tarjeta de Identidad</option>
  		<option value="C.E">Cédula de Extrangeria</option>
		</select>
      <div class="valid-feedback">
      </div>
    </div>
    
    <div class="col-md-6 mb-6">
      <label for="validationServer02">Documento</label>
      <input type="text" class="form-control" name="documento" placeholder="Documento*" required>
      <div class="valid-feedback">  
      </div>
    </div>

     <div class="col-md-6 mb-6">
      <label for="validationServer01">Fecha</label>
      <input type="date" class="form-control" name="fecha" placeholder="AAA-MM-DD" required>
      <div class="valid-feedback">
      </div>
    </div>
    
    <div class="col-md-6 mb-6">
      <label for="validationServerUsername">Correo electrónico</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
        </div>
        <input type="text" class="form-control" name="correo" placeholder="Correo electrónico*" aria-describedby="inputGroupPrepend3" required>
        <div class="invalid-feedback">
        </div>
      </div>
      </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01">Sede Actual</label>
      <select class="custom-select" name="sede">
        <option selected>Sede Actual*</option>
        <option value="Colombia">Colombia</option>
      </select>
      <div class="valid-feedback"></div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01">Sede de Traslado</label>
      <select class="custom-select" name="sede_t">
        <option selected>Sede de traslado*</option>
        <option value="Complejo sur">Complejo Sur</option>
        <option value="Ricaurte">Ricaurte</option>
        <option value="Alamos">Álamos</option>
        <option value="Restrepo">Restrepo</option>
        <option value="Colombia">Colombia</option>
      </select>
      <div class="valid-feedback"></div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01">Formación</label>
      <select class="custom-select" name="formacion">
     <option selecteds>Formación*</option>
      <option value="ADSI">ADSI</option>
      <option value="TPS">TPS</option>
      <option value="DIM">DIM</option>
    </select>
      <div class="valid-feedback">
      </div>
    </div>


    <div class="col-md-6 mb-6">
      <label for="validationServer01">Jornada</label>
      <select class="custom-select" name="jornada">
     <option selecteds>Jornada*</option>
      <option value="Diurna">Diurna</option>
      <option value="Nocturna">Nocturna</option>
      <option value="Fin de semana">Fin de semana</option>
    </select>
      <div class="valid-feedback">
      </div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01" class="titulo">Ficha de Carcaterización</label>
      <input type="text" class="form-control" name="ficha" placeholder="Ficha de Carcaterización*" required>
      <div class="valid-feedback">
      </div>
    </div>

    <div class="col-md-6 mb-6">
      <label for="validationServer01">Trimestre</label>
      <select class="custom-select" name="trimestre">
        <option selected>Trimestre*</option>
        <option value="1">Primer Trimestre</option>
        <option value="2">Segundo Trimestre</option>
        <option value="3">Tercer Trimestre</option>
        <option value="4">Cuarto Trimestre</option>
        <option value="5">Quinto Trimestre</option>
        <option value="6">Sexto Trimestre</option>
      </select>
      <div class="valid-feedback"></div>
    </div>
  
	 
    <div class="col-md-12 mb-12">
      <label for="validationServer01">Descripción:</label><textarea class="form-control" name="descripcion" placeholder="Escriba descripción*" required=""></textarea>
      <div class="valid-feedback">
      </div>
      </div>
    </div>
   
    <div class="form-group">
    <div class="form-check">
      <br>
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
      <label class="form-check-label" for="invalidCheck3">
        ¿Desea continuar?
    </div>
    </div>
    <button class="btn btn-dark form-control" type="submit">Solicitar</button>
  </form>
  <br>
    <form action="../../../vista/administrador/submenuTraslados.php"><button class="btn btn-danger form-control" type="submit">volver</button></form>
  </div>
  

</div>  
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	

</body>
</html>