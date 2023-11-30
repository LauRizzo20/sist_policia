<?php
include_once('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
    $prof = mysqli_real_escape_string($conn,$_POST["prof"]);

    if (empty($email) || empty($pass)) {
        echo 'vacio';
    } else {
        $check_query = "SELECT * FROM `user` WHERE id != '$id' AND email = '$email'";
        $check_result = mysqli_query($conn, $check_query);
        $check_count = mysqli_num_rows($check_result);
        
        if ($check_count == 0) {
            $details_query = "SELECT * FROM `user` WHERE id = '$id'";
            $details_result = mysqli_query($conn, $details_query);
            $details_row = mysqli_fetch_assoc($details_result);

            $sql = "UPDATE `user` SET `email`='$email',`password`='$pass',`id_prof`='$prof' WHERE `id`= $id";
        
                if ($conn->query($sql) === TRUE) {
                    
                // Get details after the change
                $details_after_query = "SELECT * FROM `user` WHERE `id`=$id";
                $details_after_result = mysqli_query($conn, $details_after_query);
                $details_after_row = mysqli_fetch_assoc($details_after_result);

                // Log the change in logs_cambios table
                $details_before = "Email: {$details_row['email']}. \nid profesor: {$details_row['id_prof']}";
                $details_after = "Email: {$details_row['email']}. \nid profesor: {$details_after_row['id_prof']}";
                $details = "Detalles antes del cambio: \n$details_before \n\nDetalles después del cambio: \n$details_after";

                $log_change_query = "INSERT INTO `logs_cambios` (nombre_tab, fecha_cambio, razon_cambio, detalles_cambio) VALUES ('users', NOW(), 'Actualización de usuario', '$details')";
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
