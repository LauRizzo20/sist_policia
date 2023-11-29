<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'errorVar';
};

$id = $_POST['id'];

$details_query = "SELECT * FROM `armas` WHERE nroSerie_arma = '$id'";
$details_result = mysqli_query($conn, $details_query);
$details_row = mysqli_fetch_assoc($details_result);
$details = "Nro de serie: {$details_row['nroSerie_arma']}. \nTipo: {$details_row['tipo_arma']}. \nModelo: {$details_row['modelo_arma']}. \nMarca: {$details_row['marca_arma']}";

$query1 = "DELETE FROM `arma_asig` WHERE nroSerie_arma = $id";

if ($conn->query($query1) === TRUE) {
    $query2 = "DELETE FROM `armas` WHERE nroSerie_arma = $id";

    if ($conn->query($query2) === TRUE) {

        $log_delete_query = "INSERT INTO `logs_eliminacion` (nombre_tab, fecha_delete, razon_delete, detalles_delete) VALUES ('armas', NOW(), 'Arma eliminada', '$details')";
                    if ($conn->query($log_delete_query) === TRUE) {
                        echo "exito"; 
                    } else {
                        echo "errorLogs";
                    };
    } else {
        echo 'error2';
    };
} else {
    echo 'error1';
};

?>