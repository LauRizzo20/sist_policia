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
    $row_nombre_mat = mysqli_fetch_assoc($result_nombre_mat);
    $nombreMat = $row_nombre_mat['nombre_mat'];
    $sql_alumnos = "SELECT dni_almn, nom_almn, apell_almn, sex_almn, aula_almn FROM alumnos";
    $query_alumnos = mysqli_query($conn, $sql_alumnos);
} else {
    // Redirect or handle the case when id_mat is not provided
    // For now, let's redirect to materia_notas.php
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

    <div style="margin-left:20%">
    <div id="tabla1">
            <h2>Seleccione la materia para cargar las notas:</h2>
            <form action="lista_notas_por_materia.php" method="GET"> <!-- Change POST to GET -->
                <select name="materia" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_materias)) {
                        echo "<option value='{$row['id_mat']}'>{$row['nombre_mat']}</option>";
                    }
                    ?>
                </select>
                <button type="submit">Ver Notas</button>
            </form>
        </div>
    <div class="container">
        <h2><?php echo "Notas de la Materia: $nombreMat"; ?></h2>

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
        ?>
            <tr>
                <td><?php echo $alumno['dni_almn']; ?></td>
                <td><?php echo $alumno['nom_almn']; ?></td>
                <td><?php echo $alumno['apell_almn']; ?></td>
                <td><?php echo $alumno['sex_almn']; ?></td>
                <td><?php echo $alumno['aula_almn']; ?></td>
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
</body>
</html>
