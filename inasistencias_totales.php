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
    <title>Administración Policía</title>
</head>

<body>
    <?php include('header.php'); ?>

    <div style="margin-left:20%; margin-right: 5%;">
        <h2>Inasistencias Totales</h2>
        <div class="row">
    <!-- Filtrar por DNI -->
    <div class="col-md-3 form-group">
        <label for="filtroDNI">Buscar por DNI:</label>
        <input type="text" class="form-control" id="filtroDNI">
    </div>

    <!-- Filtrar por Nombre -->
    <div class="col-md-3 form-group">
        <label for="filtroNombre">Filtrar por Nombre:</label>
        <input type="text" class="form-control" id="filtroNombre">
    </div>

    <!-- Filtrar por Apellido -->
    <div class="col-md-3 form-group">
        <label for="filtroApellido">Filtrar por Apellido:</label>
        <input type="text" class="form-control" id="filtroApellido">
    </div>

    <!-- Filtrar por Sexo -->
    <div class="col-md-3 form-group">
        <label for="filtroSexo">Filtrar por Sexo:</label>
        <select class="form-control" id="filtroSexo">
            <option value="">Todos</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
    </div>
</div>

<!-- Filtrar por Aula -->
<div class="form-group">
    <label for="filtroAula">Filtrar por Aula:</label>
    <div class="checkbox-inline">
        <?php
        // Obtener la lista de aulas
        $query_aulas = "SELECT * FROM aula";
        $result_aulas = mysqli_query($conn, $query_aulas);

        if ($result_aulas) {
            while ($row_aula = mysqli_fetch_assoc($result_aulas)) {
                echo '<div class="form-check form-check-inline">';
                echo '<input type="checkbox" class="form-check-input" id="filtroAula' . $row_aula['id_aula'] . '" value="' . $row_aula['id_aula'] . '">';
                echo '<label class="form-check-label" for="filtroAula' . $row_aula['id_aula'] . '">' . $row_aula['nro_aula'] . '</label>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>


        <button type="button" class="btn btn-primary" id="btnFiltrar">Filtrar</button>
        <button type="button" class="btn btn-danger" id="resetFiltros">Restablecer Filtros</button>
        <div class="pull-right">
            <button class="btn btn-primary" id="seleccionarAlumnos">Seleccionar Alumnos Visibles</button>
            <button class="btn btn-success" id="cargarInasistencias">Cargar Inasistencias de Alumnos Seleccionados</button>
        </div>

        <table class="table mt-3" style="margin-bottom: 150px" id="tablaAlumnos">
            <thead>
                <tr>
                    <th></th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Sexo</th>
                    <th>Aula</th>
                    <th>Inasistencias</th>
                </tr>
            </thead>
            <tbody  id="tablaAlumnos">
                <!-- Contenido de la tabla cargado dinámicamente con jQuery -->
            </tbody>
        </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/filtrar_alumnos.js"></script>
</body>

</html>
