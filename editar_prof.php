<?php
include_once('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conn,$_POST["apellido"]);
    $dni = mysqli_real_escape_string($conn,$_POST["dni"]);
    $legajo = mysqli_real_escape_string($conn,$_POST["legajo"]);

    if (empty($nombre) || empty($apellido) || empty($dni) || empty($legajo)) {
        echo 'vacio';
    } else {
        $check_query = "SELECT * FROM `profesores` WHERE id_prof != '$id' AND dni_prof = '$dni'";
        $check_result = mysqli_query($conn, $check_query);
        $check_count = mysqli_num_rows($check_result);
        
        if ($check_count == 0) {
            $sql = "UPDATE `profesores` SET `nombre_prof`='$nombre',`apellido_prof`='$apellido',`dni_prof`='$dni',`legajo_prof`='$legajo' WHERE `id_prof`= $id";
        
            if ($conn->query($sql) === TRUE) {
                echo "exito";
            } else {
                echo "errorInsert";
            };
        } else {
                echo "repetido";
        };
    };
};

?>
