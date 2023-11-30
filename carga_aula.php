<?php
include('db_config.php');


// Recibir datos del formulario
$nro = mysqli_real_escape_string($conn,$_POST['nro']);


// Verificar que ninguna variable esté vacía
if (empty($nro)) {
    die("vacio");
}

$verificar_query = "SELECT * FROM `aula` WHERE nro_aula = '$nro'";
$verificar_result = $conn->query($verificar_query);

if ($verificar_result->num_rows > 0) {
    die("repetido");
}

// Preparar la consulta SQL
$sql = "INSERT INTO `aula`(`nro_aula`) VALUES ('$nro')";


// Verificar si la consulta SQL se realizó correctamente
if ($conn->query($sql) === TRUE) {
    $details = "Aula numero: {$nro}";
            
    $log_creacion_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('aula', NOW(), 'Creacion de aula', '$details')";
                if ($conn->query($log_creacion_query) === TRUE) {
                    echo "exito"; 
                } else {
                    echo "errorLogs";
                };
} else {
    echo $sql;
}

// Cerrar la conexión
$conn->close();
?>
