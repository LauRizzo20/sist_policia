<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $nroSerie = mysqli_real_escape_string($conn,$_POST['nroSerie']);
    $tipoArma = mysqli_real_escape_string($conn,$_POST['tipoArma']);
    $modeloArma = mysqli_real_escape_string($conn,$_POST['modeloArma']);
    $marcaArma = mysqli_real_escape_string($conn,$_POST['marcaArma']);

    if (empty($nroSerie) || empty($tipoArma) || empty($modeloArma) || empty($marcaArma)) {
        echo 'vacio';
    } else {
        $check_query = "SELECT * FROM `armas` WHERE nroSerie_arma != $id AND nroSerie_arma = $nroSerie";
        $check_result = mysqli_query($conn, $check_query);
        $check_count = mysqli_num_rows($check_result);

       if ($check_count == 0) {
            // Get details before the change
            $details_query = "SELECT * FROM `armas` WHERE `nroSerie_arma`=$id";
            $details_result = mysqli_query($conn, $details_query);
            $details_row = mysqli_fetch_assoc($details_result);

            $sql = "UPDATE `armas` SET `nroSerie_arma`='$nroSerie',`tipo_arma`='$tipoArma',`modelo_arma`='$modeloArma',`marca_arma`='$marcaArma' WHERE `nroSerie_arma` = $id";

            if ($conn->query($sql) === TRUE) {
                // Get details after the change
                $details_after_query = "SELECT * FROM `armas` WHERE `nroSerie_arma`=$nroSerie";
                $details_after_result = mysqli_query($conn, $details_after_query);
                $details_after_row = mysqli_fetch_assoc($details_after_result);

                // Log the change in logs_cambios table
                $details_before = "Nro de serie: {$details_row['nroSerie_arma']}. \nTipo: {$details_row['tipo_arma']}. \nModelo: {$details_row['modelo_arma']}. \nMarca: {$details_row['marca_arma']}";
                $details_after = "Nro de serie: {$details_after_row['nroSerie_arma']}. \nTipo: {$details_after_row['tipo_arma']}. \nModelo: {$details_after_row['modelo_arma']}. \nMarca: {$details_after_row['marca_arma']}";
                $details = "Detalles antes del cambio: \n$details_before \n\nDetalles después del cambio: \n$details_after";

                $log_change_query = "INSERT INTO `logs_cambios` (nombre_tab, fecha_cambio, razon_cambio, detalles_cambio) VALUES ('armas', NOW(), 'Actualización de arma', '$details')";
                $conn->query($log_change_query);

                echo "exito";
            } else {
                echo "errorInsert";
            };
       } else {
        echo 'repetido';
       }
    }
} else {
    echo 'error1';
}
?>
