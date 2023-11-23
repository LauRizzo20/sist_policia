<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'Error';
};

$id = $_POST['id'];

$query = "DELETE FROM `alumnos` WHERE dni_almn = $id";

if ($sql = mysqli_query($conn, $query)) {
    echo 'Alumno eliminado';
} else {
    echo 'Vuelva a intentar';
};

?>