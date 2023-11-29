<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'errorVar';
};

$id = $_POST['id'];

$details_query = "SELECT * FROM `aula_asig` WHERE id_aula = '$id'";
$details_result = mysqli_query($conn, $details_query);
$details_row = mysqli_fetch_assoc($details_result);
$details = "Aula asignada: {$details_row['id_aula']}. \nID profesor: {$details_row['id_prof']}. \nID materia: {$details_row['id_mat']}. \nCuatrimestre: {$details_row['cuatrimestre_asig']}";

$query1 = "DELETE FROM `aula_asig` WHERE id_aula = $id";

if ($conn->query($query1) === TRUE) {
    $query2 = "DELETE FROM `aula` WHERE id_aula = $id";

    if ($conn->query($query2) === TRUE) {

        $log_delete_query = "INSERT INTO `logs_eliminacion` (nombre_tab, fecha_delete, razon_delete, detalles_delete) VALUES ('aula_asig', NOW(), 'Asignacion de aula eliminada', '$details')";
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