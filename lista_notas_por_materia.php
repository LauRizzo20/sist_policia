<?php
include('db_config.php');

// Obtener la lista de materias
$query_materias = "SELECT * FROM materias";
$result_materias = mysqli_query($conn, $query_materias);

if (!$result_materias) {
    die('Error en la consulta: ' . mysqli_error($conn));
}

if (isset($_GET['materia'])) {
    $idMat = $_GET['materia'];

    // Get the nombre_mat for displaying as title
    $query_nombre_mat = "SELECT nombre_mat FROM materias WHERE id_mat = '$idMat'";
    $result_nombre_mat = mysqli_query($conn, $query_nombre_mat);

    // Check if the query for fetching nombre_mat was successful
    if ($result_nombre_mat) {
        $row_nombre_mat = mysqli_fetch_assoc($result_nombre_mat);

        // Check if the fetched row is not null and 'nombre_mat' is set
        if ($row_nombre_mat && isset($row_nombre_mat['nombre_mat'])) {
            $nombreMat = $row_nombre_mat['nombre_mat'];
            $sql_alumnos = "SELECT dni_almn, nombre_almn, apellido_almn, sexo_almn, id_aula FROM alumnos WHERE condicion_almn = 0";
            $query_alumnos = mysqli_query($conn, $sql_alumnos);
        } else {
            // Redirect if nombre_mat is not available
            header("Location: materia_notas.php");
            exit();
        }
    } else {
        // Redirect if the query for fetching nombre_mat failed
        header("Location: materia_notas.php");
        exit();
    }
} else {
    // Redirect or handle the case when id_mat is not provided
    header("Location: materia_notas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Set up a global JavaScript variable to store idMat
        var idMat = <?php echo json_encode($idMat); ?>;
    </script>
    <title>Lista de Notas</title>
</head>
<body>
    <?php include('header.php'); ?>

    <div style="margin-left:20%; margin-right: 5%; margin-bottom: 150px;">
    <div id="tabla1">
            <h2>Seleccione la materia para cargar las notas:</h2>
            <form action="lista_notas_por_materia.php" method="GET"> <!-- Change POST to GET -->
            <div class="input-group col-xs-6">
            <div class="form-group">
                <select class="form-select form-control" name="materia" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_materias)) {
                        echo "<option value='{$row['id_mat']}'>{$row['nombre_mat']}</option>";
                    }
                    ?>
                </select>
            </div>
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Ver Notas</button>
            </span>
            </div>    
                
            </form>
        </div>
    <div class="container">
        <h2 id="notasMateria"><?php echo "Notas de la Materia: $nombreMat"; ?></h2>

        <table class="table tab-pane fade in active" id="tab">
    <thead>
        <tr>
            <th scope="col">Documento</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Género</th>
            <th scope="col">Aula</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($alumno = mysqli_fetch_assoc($query_alumnos)) {
            $aula_almn = $alumno['id_aula'];
            $sql_aula =  "SELECT nro_aula FROM aula WHERE id_aula = $aula_almn";
            $query_aula = mysqli_query($conn, $sql_aula);    
            if ($query_aula) {
                $aula_data = mysqli_fetch_assoc($query_aula);
        
            } else {
                $aula_data = 'Sin Aula';
            }
        ?>
            <tr>
                <td><?php echo $alumno['dni_almn']; ?></td>
                <td><?php echo $alumno['nombre_almn']; ?></td>
                <td><?php echo $alumno['apellido_almn']; ?></td>
                <td><?php echo $alumno['sexo_almn']; ?></td>
                <td><?php echo $aula_data['nro_aula']; ?></td>
                <td>
                    <button class="verNotas btn btn-info" data-id="<?php echo $alumno['dni_almn']; ?>">Ver Notas</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    </div>

    <div class="pull-right">
            <button class="btn btn-info" id="generarPDF">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Generar PDF
            </button>    
        </div>
    </div>

    <div class="modal" id="modalNotas" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo "Notas de la Materia: $nombreMat"; ?></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de Nota</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Número de Nota</th>
                            <th scope="col">Comentario</th>
                        </tr>
                    </thead>
                    <tbody id="tablaNotas">
                        <!-- Las filas de notas se cargarán aquí -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/modal_notas.js"></script>

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="pdf/pdf_notas.js"></script>
</body>
</html>
