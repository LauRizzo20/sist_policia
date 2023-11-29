<?php
include('db_config.php');

// Obtener datos del formulario
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$aula = $_POST["aula"];
$condicion = $_POST["condicion"];

// Insertar datos en la base de datos
$sql = "INSERT INTO alumnos (dni_almn, nombre_almn, apellido_almn, id_aula, condicion_almn) VALUES ('$dni', '$nombre', '$apellido', '$aula', '$condicion')";

if ($conn->query($sql) === TRUE) {
    // Si la inserción fue exitosa, responder con un JSON indicando éxito
    echo json_encode(["status" => "success"]);
} else {
    // Si hubo un error en la inserción, responder con un JSON indicando el error
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

// Cerrar conexión
$conn->close();
?>
