<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtain data from the form
    $dniAlumno = mysqli_real_escape_string($conn, $_POST['dniAlumno']);
    $idMat = mysqli_real_escape_string($conn, $_POST['idMat']);  // Add this line to get id_mat
    $tipoNota = $_POST['tipoNota'];
    $inputNota = $_POST['inputNota'];
    $inputComentario = $_POST['inputComentario'];

    // Check if inputNota is not empty before saving and idMat is valid
    if (!empty($inputNota) && is_numeric($idMat)) {
        // Check if a note of this type already exists for this student and idMat
        $sqlCheck = "SELECT * FROM `notas` WHERE `dni_almn`='$dniAlumno' AND `tipo_nota`='$tipoNota' AND `id_mat`='$idMat'";
        $resultCheck = mysqli_query($conn, $sqlCheck);

        if ($resultCheck && mysqli_num_rows($resultCheck) > 0) {
            // Update the note if it already exists
            $sqlUpdate = "UPDATE `notas` SET `num_nota`='$inputNota', `comentario_nota`='$inputComentario' WHERE `dni_almn`='$dniAlumno' AND `tipo_nota`='$tipoNota' AND `id_mat`='$idMat'";
            mysqli_query($conn, $sqlUpdate);
        } else {
            // Insert a new note if it doesn't exist
            $sqlInsert = "INSERT INTO `notas` (`fecha_nota`, `tipo_nota`, `dni_almn`, `num_nota`, `comentario_nota`, `id_mat`) VALUES (NOW(), '$tipoNota', '$dniAlumno', '$inputNota', '$inputComentario', '$idMat')";
            mysqli_query($conn, $sqlInsert);
        }

        // If we reach here, everything went well
        echo "success";
    } else {
        // If inputNota is empty or idMat is not valid, show an error
        echo "error1";
    }
} else {
    // If the request is not POST, show an error
    echo "error2";
}

// Close the connection
mysqli_close($conn);
?>
