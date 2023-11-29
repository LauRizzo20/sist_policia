<?php
include('db_config.php');

if (isset($_POST['dniAlumno'])) {
    $dniAlumno = $_POST['dniAlumno'];
    $idMat = $_POST['idMat'];

    $response = [];

    $tipoNotas = ["Primer Parcial", "Recuperatorio 1", "Segundo Parcial", "Recuperatorio 2", "Final", "Conducta"];

    foreach ($tipoNotas as $tipoNota) {
        $sql = "SELECT * FROM `notas` WHERE `dni_almn`='$dniAlumno' AND `id_mat`='$idMat' AND `tipo_nota`='$tipoNota'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        } else {
            $response[] = [
                'tipo_nota' => $tipoNota,
                'num_nota' => '',
                'fecha_nota' => '',
                'comentario_nota' => ''
            ];
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Missing dniAlumno parameter']);
}

mysqli_close($conn);
?>
