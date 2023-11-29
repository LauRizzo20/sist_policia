<?php
include('db_config.php');

if (!isset($_POST['dni'])) {
    echo 'Error';
};

$dni = $_POST['dni'];
$razon = $_POST['razon'];

if (empty($razon)) {
    echo 'vacio';
} else {
    $baja_sql = "INSERT INTO `bajas_prof`(`dni_prof`, `razon_baja`) VALUES ('$dni','$razon')";

    if ($baja_response = mysqli_query($conn, $baja_sql)) {
        $del_sql = "DELETE FROM `profesores` WHERE dni_prof = $dni";

        if ($del_response = mysqli_query($conn, $del_sql)) {
            echo 'exito';
        } else {
            echo 'Vuelva a intentar';
        };
    } else {
        echo "error";
    }
};
?>