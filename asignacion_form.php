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
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Asignacion de aulas</div>
        <br>
        <?php
         if (isset($_GET['num'])) {
            $nro_aula = $_GET['num'];
            
            echo "Aula a editar: " . $nro_aula . "";
        }
        ?>
  <br>
  <br>
  <div class="container mt-5">
        <form action="" method="post">
            <div class="form-group">
                <label for="aula">Aula:</label>
                <select class="escribir form-control" id="aula" name="aula" required>
                    <?php
                    $queryA = "SELECT * FROM aula";
                    $resultadoA = $conn->query($queryA);
                    while ($aula = $resultadoA->fetch_assoc()) {
                        echo "<option value='" . $aula['id_aula'] . "'>" . $aula['nro_aula'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="materia">Materia:</label>
                <select class="escribir form-control" id="materia" name="materia" required>
                    <?php
                    $queryB = "SELECT * FROM materias";
                    $resultadoB = $conn->query($queryB);
                    while ($materias = $resultadoB->fetch_assoc()) {
                        echo "<option value='" . $materias['id_mat'] . "'>" . $materias['nombre_mat'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prof">Profesor:</label>
                <select class="escribir form-control" id="prof" name="prof" required>
                    <?php
                    $queryC = "SELECT * FROM profesores";
                    $resultadoC = $conn->query($queryC);
                    while ($prof = $resultadoC->fetch_assoc()) {
                        echo "<option value='" . $prof['id_prof'] . "'>" . $prof['nombre_prof'] ." " . $prof['apellido_prof'] .  "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cuatrimestre">Cuatrimestre:</label>
                <input type="text" class="form-control" id="cuatrimestre" name="cuatrimestre" required>
            </div>
            <button type="button" id="cargar" class="btn btn-primary">Guardar Asignación</button>
        </form>
    </div>
        </div>
    </div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/asignacion_aulas.js"></script>
<!-- Scripts -->
    <!-- Script de Select2 para busqueda en los selects -->
    <script>
        $(document).ready(function () {
            $(".escribir").select2(); // Aplicar Select2 al select
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</html>