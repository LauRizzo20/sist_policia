<?php
include('db_config.php');
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
    include('header.php');
    ?>
    
    <div style="margin-left:20%">
        <div id="tabla1">
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Carga de profesores</div>
  
  <br>
  <br>
  <form method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nombreProf">Nombre</label>
        <input type="text" class="form-control" id="nombreProf" placeholder="Nombre" required>
      </div>
      <div class="form-group col-md-6">
        <label for="apellidoProf">Apellido</label>
        <input type="text" class="form-control" id="apellidoProf" placeholder="Apellido" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="dniProf">DNI</label>
        <input type="text" class="form-control" id="dniProf" placeholder="DNI" required>
      </div>
      <div class="form-group col-md-6">
        <label for="legajoProf">Legajo</label>
        <input type="text" class="form-control" id="legajoProf" placeholder="Legajo" required>
      </div>
    </div>
    <button type="button" id="cargar" class="btn btn-primary">Agregar Profesor</button>
  </form>
        </div>
    </div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/carga_prof_action.js"></script>
</html>