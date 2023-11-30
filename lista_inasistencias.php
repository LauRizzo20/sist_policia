<?php
include('db_config.php');
// Verifica si se recibieron datos por GET
if (isset($_GET['alumnosSeleccionados'])) {
    // Obtiene los datos de la URL
    $alumnosSeleccionados = json_decode($_GET['alumnosSeleccionados'], true);
} else {
    // Si no se recibieron datos, muestra un mensaje o realiza la lógica necesaria
    echo 'No se recibieron datos de alumnos seleccionados.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <title>Lista de Inasistencias</title>
</head>
<body>
<?php include('header.php') ?>
<div style="margin-left:20%; margin-right: 5%;">
    <h2>Lista de Inasistencias</h2>
    <div class="pull-right">
        <button class="btn btn-primary" id="cargarInasistencias">Cargar Inasistencias</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Aula</th>
                <th>Inasistencias</th>
            </tr>
        </thead>
        <tbody id="tablaInasistencias">
            <!-- Aquí se cargarán dinámicamente las filas de la tabla -->
        </tbody>
    </table>
</div>

<script>
    let alumnosSeleccionados = <?php echo json_encode($alumnosSeleccionados); ?>;
    console.log(alumnosSeleccionados);
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/cargar_inasistencias.js"></script>

</body>
</html>
