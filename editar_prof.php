<?php
include_once('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = mysqli_real_escape_string($conn,$_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conn,$_POST["apellido"]);
    $dni = mysqli_real_escape_string($conn,$_POST["dni"]);
    $legajo = mysqli_real_escape_string($conn,$_POST["legajo"]);

    if (empty($nombre) || empty($apellido) || empty($dni) || empty($legajo) || empty($razon)) {
        echo 'vacio';
    } else {
        $check_query = "SELECT * FROM `profesores` WHERE id_prof != '$id' AND dni_prof = '$dni'";
        $check_result = mysqli_query($conn, $check_query);
        $check_count = mysqli_num_rows($check_result);
        
        if ($check_count == 0) {
            $details_query = "SELECT * FROM `profesores` WHERE id_prof = '$id'";
            $details_result = mysqli_query($conn, $details_query);
            $details_row = mysqli_fetch_assoc($details_result);
            $nombre_comp = $details_row['nombre_prof'].' '.$details_row['apellido_prof'];

            $sql = "UPDATE `profesores` SET `nombre_prof`='$nombre',`apellido_prof`='$apellido',`dni_prof`='$dni',`legajo_prof`='$legajo' WHERE `id_prof`= $id";
        
                if ($conn->query($sql) === TRUE) {
                    
                // Get details after the change
                $details_after_query = "SELECT * FROM `profesores` WHERE `id_prof`=$id";
                $details_after_result = mysqli_query($conn, $details_after_query);
                $details_after_row = mysqli_fetch_assoc($details_after_result);
                $nombre_comp_after = $details_after_row['nombre_prof'].' '.$details_row['apellido_prof'];

                // Log the change in logs_cambios table
                $details_before = "ID: {$details_row['id_prof']}. \nNombre del profesor: {$nombre_comp}. \nDNI: {$details_row['dni_prof']}. \nNro legajo: {$details_row['legajo_prof']}";
                $details_after = "ID: {$details_after_row['id_prof']}. \nNombre del profesor: {$nombre_comp_after}. \nDNI: {$details_after_row['dni_prof']}. \Nro legajo: {$details_after_row['legajo_prof']}";
                $details = "Detalles antes del cambio: \n$details_before \n\nDetalles después del cambio: \n$details_after";

                $log_change_query = "INSERT INTO `logs_cambios` (nombre_tab, fecha_cambio, razon_cambio, detalles_cambio) VALUES ('profesores', NOW(), 'Actualización de profesor', '$details')";
                    if ($conn->query($log_change_query) === TRUE) {
                        echo "exito"; 
                    } else {
                        echo "errorLogs";
                    }
            } else {
                echo "errorInsert";
            };
        } else {
                echo "repetido";
        };
    };
};

?>
