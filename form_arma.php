<?php
// Configuración de la conexión a la base de datos
include('db_config.php');

// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$nroSerie_arma = $_POST["nroSerie_arma"];


$sql = "SELECT * FROM arma_asig WHERE id_almn = '$id_almn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $sql_ver = "SELECT * FROM arma_asig WHERE id_almn = '$id_almn' AND nroSerie_arma = '$nroSerie_arma'";
    $result_ver = $conn->query($sql);

    if ($result_ver->num_rows > 0) {
        echo json_encode(["status" => "same", "message" => $conn->error]);
    } else{
        $sql = "UPDATE arma_asig SET nroSerie_arma = $nroSerie_arma WHERE id_almn = '$id_almn'";

        if ($conn->query($sql) === TRUE) {
            // Si la inserción fue exitosa, responder con un JSON indicando éxito
            echo json_encode(["status" => "actualizado"]);
        } else {
            // Si hubo un error en la inserción, responder con un JSON indicando el error
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
    }
} else {
    // Insertar datos en la base de datos
    // Insertar datos en la base de datos
    $sql = "INSERT INTO arma_asig (id_almn, nroSerie_arma) 
        VALUES ('$id_almn', '$nroSerie_arma')";

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
