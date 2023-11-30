<?php
include('db_config.php');
// Recoge los datos del formulario
$nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
$apellido = mysqli_real_escape_string($conn,$_POST["apellido"]);
$dni = mysqli_real_escape_string($conn,$_POST["dni"]);
$legajo = mysqli_real_escape_string($conn,$_POST["legajo"]);

if (empty($nombre) || empty($apellido) || empty($dni) || empty($legajo)) {
    echo 'vacio';
} else {
    $check_query = "SELECT * FROM `profesores` WHERE dni_prof = '$dni' OR legajo_prof='$legajo'";
    $check_result = mysqli_query($conn, $check_query);
    $check_count = mysqli_num_rows($check_result);
    
    if ($check_count == 0) {
        $sql = "INSERT INTO profesores (nombre_prof, apellido_prof, dni_prof, legajo_prof) VALUES ('$nombre', '$apellido', '$dni', '$legajo')";
    
        if ($conn->query($sql) === TRUE) {
            $nombre_comp = $nombre.' '.$apellido;
    
    
            $details = "Nombre del profesor: {$nombre_comp}. \nDNI: {$dni}. \nNro legajo: {$legajo}";
            
            $log_creacion_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('profesores', NOW(), 'Carga de profesor', '$details')";
                        if ($conn->query($log_creacion_query) === TRUE) {
                            echo "exito"; 
                        } else {
                            echo "errorLogs";
                        };
        } else {
            echo "errorInsert";
        };
    } else {
            echo "repetido";
    };
};



$conn->close();
?>
