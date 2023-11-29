<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $cargaHoraria = mysqli_real_escape_string($conn, $_POST["cargaHoraria"]);
    $curricula = mysqli_real_escape_string($conn, $_POST["curricula"]);

    if (empty($nombre) || empty($cargaHoraria) || empty($curricula)) {
        echo 'vacio';
    } else {
        // Get details before the change
        $details_query = "SELECT * FROM `materias` WHERE `id_mat`=$id";
        $details_result = mysqli_query($conn, $details_query);
        $details_row = mysqli_fetch_assoc($details_result);

        $sql = "UPDATE `materias` SET `nombre_mat`='$nombre', `c_horaria_mat`='$cargaHoraria', `curricula_mat`='$curricula' WHERE `id_mat`= $id";

        if ($conn->query($sql) === TRUE) {
            // Get details after the change
            $details_after_query = "SELECT * FROM `materias` WHERE `id_mat`=$id";
            $details_after_result = mysqli_query($conn, $details_after_query);
            $details_after_row = mysqli_fetch_assoc($details_after_result);

            // Log the change in logs_cambios table
            $details_before = "ID: {$details_row['id_mat']}. \nNombre de Materia: {$details_row['nombre_mat']}. \nCarga Horaria: {$details_row['c_horaria_mat']}. \nCurrícula: {$details_row['curricula_mat']}";
            $details_after = "ID: {$details_after_row['id_mat']}. \nNombre de Materia: {$details_after_row['nombre_mat']}. \nCarga Horaria: {$details_after_row['c_horaria_mat']}. \nCurrícula: {$details_after_row['curricula_mat']}";
            $details = "Detalles antes del cambio: \n$details_before \n\nDetalles después del cambio: \n$details_after";

            $log_change_query = "INSERT INTO `logs_cambios` (nombre_tab, fecha_cambio, razon_cambio, detalles_cambio) VALUES ('materias', NOW(), 'Actualización de materia', '$details')";
            $conn->query($log_change_query);

            echo "exito";
        } else {
            echo "errorInsert";
        }
    }
} else {
    echo 'error1';
}
?>
