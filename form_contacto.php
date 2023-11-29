<?php
// Configuración de la conexión a la base de datos
include('db_config.php');

// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$telefono_resp = $_POST["telefono_resp"];
$legajo = $_POST["legajo"];

// Insertar datos en la base de datos
$sql = "INSERT INTO contacto_almn (id_almn, email, telefono, telefono_resp, legajo) 
        VALUES ('$id_almn', '$email', '$telefono', '$telefono_resp', '$legajo')";

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