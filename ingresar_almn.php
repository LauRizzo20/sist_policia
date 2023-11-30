<?php
include('db_config.php');

// Obtener datos del formulario
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$aula = $_POST["aula"];

$sql = "SELECT * FROM alumnos WHERE dni_almn = '$dni'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "repetido", "message" => $conn->error]);
} else {
    // Insertar datos en la base de datos
    $sql_insert = "INSERT INTO alumnos (dni_almn, nombre_almn, apellido_almn, id_aula) VALUES ('$dni', '$nombre', '$apellido', '$aula')";

    if ($conn->query($sql_insert) === TRUE) {
        // Si la inserción fue exitosa, responder con un JSON indicando éxito
        echo json_encode(["status" => "success"]);
    } else {
        // Si hubo un error en la inserción, responder con un JSON indicando el error
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

// Cerrar conexión
$conn->close();
