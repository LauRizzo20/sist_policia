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
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de profesores</div>
  
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
    $query = mysqli_query($conn, "SELECT * FROM `profesores` WHERE condicion_prof = 0");


    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id_prof'];
    ?>
    <tr>
      <td>
        <?php echo $row['nombre_prof'].' '.$row['apellido_prof']; ?>
      </td>
      <td>
        DNI: <?php echo $row['dni_prof']; ?>
      </td>
      <td>
        Nro Legajo: <?php echo $row['legajo_prof']; ?>
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
    </div>

    <!-- Modal info -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/editar_prof.js"></script>
<script src="js/baja_prof.js"></script>
<script src="js/modal_prof.js"></script>
</html>