<?php
include('db_config.php');

// Obtener la lista de materias
$query_materias = "SELECT * FROM materias";
$result_materias = mysqli_query($conn, $query_materias);

if (!$result_materias) {
    die('Error en la consulta: ' . mysqli_error($conn));
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
    <title>Elegir Materia</title>
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
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
</body>

</html>
