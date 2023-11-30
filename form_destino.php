<?php
include('db_config.php');
// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$domicilio = $_POST["domicilio"];
$localidad = $_POST["localidad"];
$cp = $_POST["cp"];
$comisaria = $_POST["comisaria"];
$destino = $_POST["destino"];
$telefono_dest = $_POST["telefono_dest"];



$sql = "SELECT * FROM destino_almn WHERE id_almn = '$id_almn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "repetido", "message" => $conn->error]);
} else {
    // Insertar datos en la base de datos
    // Insertar datos en la base de datos
    $sql_insert = "INSERT INTO destino_almn (id_almn, domicilio, localidad, cp, comisaria, destino, telefono_dest) 
        VALUES ('$id_almn', '$domicilio', '$localidad', '$cp', '$comisaria', '$destino', '$telefono_dest')";

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
