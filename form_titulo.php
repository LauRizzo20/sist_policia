<?php
include('db_config.php');

// Obtener datos del formulario
$id_almn = $_POST["id_almn"];
$nom_analit = $_POST["nom_analit"];
$tiltulo_analit = $_POST["tiltulo_analit"];
$resolucion_analit = $_POST["resolucion_analit"];
$escuela_analit = $_POST["escuela_analit"];
$distrito_analit = $_POST["distrito_analit"];
$observaciones_analit = $_POST["observaciones_analit"];
$egreso_analit = $_POST["egreso_analit"];


$sql = "SELECT * FROM secundario_almn WHERE id_almn = '$id_almn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(["status" => "repetido", "message" => $conn->error]);
} else {
    // Insertar datos en la base de datos
    $sql_insert = "INSERT INTO secundario_almn (id_almn,  nom_analit, tiltulo_analit, resolucion_analit, escuela_analit, distrito_analit, observaciones_analit, egreso_analit) 
        VALUES ('$id_almn', '$nom_analit', '$tiltulo_analit', '$resolucion_analit', '$escuela_analit', '$distrito_analit', '$observaciones_analit', '$egreso_analit')";

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
