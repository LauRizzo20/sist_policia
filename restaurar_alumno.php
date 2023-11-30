<?php
include('db_config.php');

// Obtén el ID del alumno desde la solicitud POST
$idAlumno = $_POST['idAlumno'];

// Actualiza la condición del alumno a 1
$sql = "UPDATE alumnos SET condicion_almn = 0 WHERE dni_almn = $idAlumno";

if ($conn->query($sql) === TRUE) {
    echo "La condición del alumno se actualizó correctamente.";
} else {
    echo "Error al actualizar la condición del alumno: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
