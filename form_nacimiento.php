<?php
include('db_config.php');
// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$fecha = $_POST["fecha"];
$lugar = $_POST["lugar"];
$grupo_sanguineo = $_POST["grupo_sanguineo"];
$provincia = $_POST["provincia"];
$pais = $_POST["pais"];


$sql = "SELECT * FROM nacimiento_almn WHERE id_almn = '$id_almn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "repetido", "message" => $conn->error]);
} else {
    // Insertar datos en la base de datos
    $sql = "INSERT INTO nacimiento_almn (id_almn, fecha, lugar, grupo_sanguineo, provincia, pais) 
    VALUES ('$id_almn', '$fecha', '$lugar', '$grupo_sanguineo', '$provincia', '$pais')";

    if ($conn->query($sql) === TRUE) {
        // Si la inserción fue exitosa, responder con un JSON indicando éxito
        echo json_encode(["status" => "success"]);
    } else {
        // Si hubo un error en la inserción, responder con un JSON indicando el error
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}
// Cerrar conexión
$conn->close();
