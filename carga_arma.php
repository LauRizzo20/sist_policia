<?php
include('db_config.php');

// Obtener datos del formulario
$nroSerie = mysqli_real_escape_string($conn,$_POST['nroSerie']);
$tipoArma = mysqli_real_escape_string($conn,$_POST['tipoArma']);
$modeloArma = mysqli_real_escape_string($conn,$_POST['modeloArma']);
$marcaArma = mysqli_real_escape_string($conn,$_POST['marcaArma']);

if (empty($nroSerie) || empty($tipoArma) || empty($modeloArma) || empty($marcaArma)) {
    echo 'vacio';
} else {
    $check_query = "SELECT * FROM `armas` WHERE nroSerie_arma='$nroSerie'";
    $check_result = mysqli_query($conn, $check_query);
    $check_count = mysqli_num_rows($check_result);
    
    if ($check_count == 0) {
        $sql = "INSERT INTO armas (nroSerie_arma, tipo_arma, modelo_arma, marca_arma) VALUES ('$nroSerie', '$tipoArma', '$modeloArma', '$marcaArma')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            $details = "Nro de serie: {$nroSerie}. \nTipo: {$tipoArma}. \nModelo: {$modeloArma}. \nMarca: {$marcaArma}";
            
            $log_creacion_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('armas', NOW(), 'Carga de arma', '$details')";
            if ($conn->query($log_creacion_query) === TRUE) {
                echo "exito"; 
            } else {
                echo "errorLogs";
            };
            
        } else {
        echo "errorInsert";
        }
    } else {
        echo 'repetido';
    }
}



// Cerrar la conexión
$conn->close();
?>
