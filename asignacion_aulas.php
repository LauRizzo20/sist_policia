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
        echo "exito1";
    } else {
        echo "errorInsert";
    };
} else {
    $update = "UPDATE `aula_asig` SET `id_mat`='$idMateria',`id_prof`='$idProfesor',`cuatrimestre_asig`='$cuatrimestre' WHERE `id_aula`='$idAula'";

    if ($conn->query($update) === TRUE) {
        echo "exito2";
    } else {
        echo "errorUpdate";
    };
};


$conn->close();
?>
