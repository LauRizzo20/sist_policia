<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'Error';
};

$id = $_POST['id'];
$razon = $_POST['razon'];

if (empty($razon)) {
    echo 'vacio';
} else {

    $sql = "UPDATE `profesores` SET `condicion_prof`=1 WHERE `id_prof`= $id";

    if ($conn->query($sql) === TRUE) {
        $details_query = "SELECT * FROM `profesores` WHERE id_prof = '$id'";
        $details_result = mysqli_query($conn, $details_query);
        $details_row = mysqli_fetch_assoc($details_result);
        $nombre_comp = $details_row['nombre_prof'].' '.$details_row['apellido_prof'];


        $details = "ID: {$details_row['id_prof']}. \nNombre del profesor: {$nombre_comp}. \nDNI: {$details_row['dni_prof']}. \nNro legajo: {$details_row['legajo_prof']}";
        
        $log_delete_query = "INSERT INTO `logs_eliminacion` (nombre_tab, fecha_delete, razon_delete, detalles_delete) VALUES ('profesores', NOW(), '$razon', '$details')";
                    if ($conn->query($log_delete_query) === TRUE) {
                        echo "exito"; 
                    } else {
                        echo "errorLogs";
                    };
    } else {
        echo "error";
    }
};
?>