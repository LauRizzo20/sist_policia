<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'Error';
};

$id = $_POST['id'];

$details_query = "SELECT * FROM `user` WHERE id = '$id'";
$details_result = mysqli_query($conn, $details_query);
$details_row = mysqli_fetch_assoc($details_result);

    $sql = "DELETE FROM `user` WHERE `id`= $id";

    if ($conn->query($sql) === TRUE) {


        $details = "Email: {$details_row['email']}. \nid profesor: {$details_row['id_prof']}";
        
        $log_delete_query = "INSERT INTO `logs_eliminacion` (nombre_tab, fecha_delete, razon_delete, detalles_delete) VALUES ('user', NOW(), 'Eliminacion usuario', '$details')";
                    if ($conn->query($log_delete_query) === TRUE) {
                        echo "exito"; 
                    } else {
                        echo "errorLogs";
                    };
    } else {
        echo "error";
    };
?>