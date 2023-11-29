<?php
include('db_config.php');

if (!isset($_POST['id'])) {
    echo 'errorVar';
};

$id = $_POST['id'];

$query1 = "DELETE FROM `aula_asig` WHERE id_aula = $id";

if ($sql1 = mysqli_query($conn, $query1)) {
    $query2 = "DELETE FROM `aula` WHERE id_aula = $id";

    if ($sql2 = mysqli_query($conn, $query2)) {
        echo 'exito';
    } else {
        echo 'error';
    };
} else {
    echo 'error1';
};

?>