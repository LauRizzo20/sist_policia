<?php
include("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Administracion policia</title>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div  style="margin-left:20%">
        <div id="tabla1">
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Registro de alumnos</div>
  
  <br>
  <br>
        <div class="container mt-5">
  <form id="ingresoAlmn" action="" method="post">
    <div class="form-group">
      <label for="dni_almn">DNI:</label>
      <input type="text" class="form-control" id="dni_almn" name="dni_almn" required>
    </div>
    <div class="form-group">
      <label for="nom_almn">Nombre:</label>
      <input type="text" class="form-control" id="nom_almn" name="nom_almn" required>
    </div>
    <div class="form-group">
      <label for="email_almn">Email:</label>
      <input type="email" class="form-control" id="email_almn" name="email_almn" required>
    </div>
    <div class="form-group">
      <label for="telefono_almn">Teléfono:</label>
      <input type="tel" class="form-control" id="telefono_almn" name="telefono_almn" required>
    </div>
    <div class="form-group">
      <label for="cp_almn">Código Postal:</label>
      <input type="text" class="form-control" id="cp_almn" name="cp_almn" required>
    </div>
    <div class="form-group">
      <label for="distrito_almn">Distrito:</label>
      <input type="text" class="form-control" id="distrito_almn" name="distrito_almn" required>
    </div>
    <div class="form-group">
      <label for="domicilio_almn">Domicilio:</label>
      <input type="text" class="form-control" id="domicilio_almn" name="domicilio_almn" required>
    </div>
    <div class="form-group">
      <label for="compañia_almn">Compañía:</label>
      <input type="text" class="form-control" id="compania_almn" name="compania_almn" required>
    </div>
    <div class="form-group">
      <label for="legajo_almn">Legajo:</label>
      <input type="text" class="form-control" id="legajo_almn" name="legajo_almn" required>
    </div>
    <div class="form-group">
      <label for="destino_almn">Destino:</label>
      <input type="text" class="form-control" id="destino_almn" name="destino_almn" required>
    </div>
    <div class="form-group">
      <label for="comisaria_almn">Comisaría:</label>
      <input type="text" class="form-control" id="comisaria_almn" name="comisaria_almn" required>
    </div>
    <div class="form-group">
      <label for="secundario_almn">Secundario:</label>
      <textarea class="form-control" id="secundario_almn" name="secundario_almn" required></textarea>
    </div>
    <div class="form-group">
      <label for="nacionalidad_almn">Nacionalidad:</label>
      <input type="text" class="form-control" id="nacionalidad_almn" name="nacionalidad_almn" required>
    </div>
    <div class="form-group">
      <label for="aula_almn">Aula:</label>
      <input type="text" class="form-control" id="aula_almn" name="aula_almn" required>
    </div>
    <div class="form-group">
      <label for="arma_almn">Arma:</label>
      <input type="text" class="form-control" id="arma_almn" name="arma_almn" required>
    </div>
    <div class="form-group">
      <label for="condicion_almn">Condición:</label>
      <input type="text" class="form-control" id="condicion_almn" name="condicion_almn" required>
    </div>
    <button type="button" id="enviar" class="btn btn-primary">Enviar</button>
  </form>
</div>

        </div>
    </div>


<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/ingresar_almn.js"></script>
</body>
</html>