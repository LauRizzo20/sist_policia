<?php
include('db_config.php');

// Recibir datos del formulario
$idAula = $_POST['idAula'];
$idMateria = $_POST['idMateria'];
$idProfesor = $_POST['idProfesor'];
$cuatrimestre = $_POST['cuatrimestre'];

$check_query = "SELECT * FROM `aula_asig` WHERE id_aula = '$idAula'";
$check_result = mysqli_query($conn, $check_query);
$check_count = mysqli_num_rows($check_result);

if ($check_count == 0) {
    $sql = "INSERT INTO aula_asig (id_aula, id_mat, id_prof, cuatrimestre_asig) VALUES ('$idAula', '$idMateria', '$idProfesor', '$cuatrimestre')";

    if ($conn->query($sql) === TRUE) {
        $details = "Aula asignada: {$idAula}. \nID profesor: {$idProfesor}. \nID materia: {$idMateria}. \nCuatrimestre: {$cuatrimestre}";
            
        $log_creacion_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('profesores', NOW(), 'Asignacion de aula', '$details')";
                    if ($conn->query($log_creacion_query) === TRUE) {
                        echo "exito"; 
                    } else {
                        echo "errorLogs";
                    };
    } else {
        echo "errorInsert";
    };
} else {
    $details_query = "SELECT * FROM `aula_asig` WHERE id_aula = '$idAula'";
    $details_result = mysqli_query($conn, $details_query);
    $details_row = mysqli_fetch_assoc($details_result);

    $update = "UPDATE `aula_asig` SET `id_mat`='$idMateria',`id_prof`='$idProfesor',`cuatrimestre_asig`='$cuatrimestre' WHERE `id_aula`='$idAula'";

    if ($conn->query($update) === TRUE) {
        
       $details_before = "Aula asignada: {$details_row['id_aula']}. \nID profesor: {$details_row['id_prof']}. \nID materia: {$details_row['id_mat']}. \nCuatrimestre: {$details_row['cuatrimestre_asig']}";
       $details_after = "Aula asignada: {$idAula}. \nID profesor: {$idProfesor}. \nID materia: {$idMateria}. \nCuatrimestre: {$cuatrimestre}";
       $details = "Detalles antes del cambio: \n$details_before \n\nDetalles después del cambio: \n$details_after";

       $log_change_query = "INSERT INTO `logs_cambios` (nombre_tab, fecha_cambio, razon_cambio, detalles_cambio) VALUES ('aula_asig', NOW(), 'Asignacion de aula modificada', '$details')";
           if ($conn->query($log_change_query) === TRUE) {
               echo "exito"; 
           } else {
               echo "errorLogs";
           }
    } else {
        echo "errorUpdate";
    };
};


$conn->close();
?>
