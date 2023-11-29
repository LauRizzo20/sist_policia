<?php
include('db_config.php');

// Recibir datos del formulario
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$cargaHoraria = mysqli_real_escape_string($conn, $_POST['cargaHoraria']);
$curricula = mysqli_real_escape_string($conn, $_POST['curricula']);

// Verificar que ninguna variable esté vacía
if (empty($nombre) || empty($cargaHoraria) || empty($curricula)) {
    die("vacio");
}

// Preparar la consulta SQL
$sql = "INSERT INTO `materias` (nombre_mat, c_horaria_mat, curricula_mat) VALUES ('$nombre', '$cargaHoraria', '$curricula')";

$result = mysqli_query($conn, $sql);

// Verificar si la consulta SQL se realizó correctamente
if ($result) {
    // Log the creation in logs_creacion table
    $log_creation_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('materias', NOW(), 'Creación de materia', 'Nombre de Materia: $nombre \nCarga Horaria: $cargaHoraria \nCurrícula: $curricula')";
    $conn->query($log_creation_query);

    echo "exito";
} else {
    echo $sql;
}

// Cerrar la conexión
$conn->close();
?>
