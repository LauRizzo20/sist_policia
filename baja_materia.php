<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'Error';
}

$id = $_POST['id'];
$razon = $_POST['razon'];

if (empty($razon)) {
    echo 'vacio';
} else {
    // Get details of the materia before deleting
    $get_details_query = "SELECT * FROM `materias` WHERE id_mat = $id";
    $get_details_result = mysqli_query($conn, $get_details_query);

    if ($get_details_result) {
        $details_row = mysqli_fetch_assoc($get_details_result);

        // Prepare details for the log
        $details = "ID: {$details_row['id_mat']}. \nNombre de Materia: {$details_row['nombre_mat']}. \nCarga Horaria: {$details_row['c_horaria_mat']}. \nCurrícula: {$details_row['curricula_mat']}";

        // Insert log into logs_eliminacion table
        $log_insert_query = "INSERT INTO `logs_eliminacion` (nombre_tab, fecha_delete, razon_delete, detalles_delete) VALUES ('materias', NOW(), '$razon', '$details')";
        $log_insert_result = mysqli_query($conn, $log_insert_query);

        if ($log_insert_result) {
            // Now, delete the materia from the materias table
            $delete_query = "DELETE FROM `materias` WHERE id_mat = $id";

            if (mysqli_query($conn, $delete_query)) {
                echo 'exito';
            } else {
                echo 'Vuelva a intentar';
            }
        } else {
            echo "error_log_insert";
        }
    } else {
        echo "error_get_details";
    }
}
?>
