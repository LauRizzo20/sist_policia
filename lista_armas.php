<?php
include("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
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
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de armas</div>
        <br>
        <form method="post">
            <label for="">Ingresar arma:</label>
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="nroSerie">Número de Serie</label>
                <input type="text" class="form-control" id="nroSerie" name="nroSerie" required>
            </div>
            <div class="form-group col-md-3">
                <label for="tipoArma">Tipo de Arma</label>
                <input type="text" class="form-control" id="tipoArma" name="tipoArma" required>
            </div>
            <div class="form-group col-md-3">
                <label for="modeloArma">Modelo de Arma</label>
                <input type="text" class="form-control" id="modeloArma" name="modeloArma" required>
            </div>
            <div class="form-group col-md-3">
                <label for="marcaArma">Marca de Arma</label>
                <input type="text" class="form-control" id="marcaArma" name="marcaArma" required>
            </div>
            </div>
            <button type="button" class="btn btn-primary" id="cargar">Cargar</button>
        </form>
        <br>
        <br>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Numero de serie</th>
      <th scope="col">Tipo</th>
      <th scope="col">Modelo</th>
      <th scope="col">Marca</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM `armas` WHERE 1");


    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['nroSerie_arma'];
    ?>
    <tr>
      <td>
        <?php echo $id?>
      </td>
      <td>
        <?php echo $row['tipo_arma']?>
      </td>
      <td>
        <?php echo $row['modelo_arma']?>
      </td>
      <td>
        <?php echo $row['marca_arma']?>
      </td>
      <td>
        <button id="<?php echo $id; ?>" value="<?php echo $id; ?>"  class="open btn btn-secondary">Editar</button>
      </td>
      <td>
        <button class="eliminar btn btn-danger" id="<?php echo $id ?>" value="<?php echo $id ?>">Eliminar</button>
      </td>
    </tr>
    <?php
    };
    ?>
  </tbody>
</table>
</div>
    <!-- Modal info -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/carga_arma.js"></script>
<script src="js/eliminacion_arma.js"></script>
<script src="js/modal_armas.js"></script>
<script src="js/editar_arma.js"></script>
</body>
</html>