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
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de alumnos</div>
  
  <br>
  <br>
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM `alumnos` WHERE 1");


    while ($row = mysqli_fetch_assoc($query)) {
        $dni = $row['dni_almn'];
    ?>
    <tr>
      <td><?php echo $row['nombre_almn'].' '.$row['apellido_almn']; ?></td>
      <td>
        <button id="<?php echo $dni; ?>" value="<?php echo $dni; ?>" class="btn btn-success open">Ver info</button>
      </td>
      <td>
        <a href="modif_cde.php?id=<?php echo $dni; ?>"><button class="btn btn-secondary">Editar</button></a>
      </td>
      <td>
        <button class="eliminar btn btn-danger" id="<?php echo $dni ?>" value="<?php echo $dni ?>">Eliminar</button>
      </td>
    </tr>
    <?php
    };
    ?>
  </tbody>
</table>
        </div>
    </div>

</body>
<script src="js/jquery.tabledit.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/eliminar.js"></script>
</html>