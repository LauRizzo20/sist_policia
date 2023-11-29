<?php
// Configuración de la conexión a la base de datos
include('db_config.php');

// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$nroSerie_arma = $_POST["nroSerie_arma"];

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

// Cerrar conexión
$conn->close();
?>

"<br />
<b>Warning</b>:  Undefined array key "nroSerie_arma" in <b>C:\xampp\htdocs\sist_policia\form_arma.php</b> on line <b>7</b><br />
{"status":"success"}"