<?php
include('db_config.php');
// Recoge los datos del formulario

$email = mysqli_real_escape_string($conn,$_POST["email"]);
$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
$prof = mysqli_real_escape_string($conn,$_POST["prof"]);

if (empty($email) || empty($pass) || empty($prof)) {
    echo 'vacio';
} else {
    $check_query = "SELECT * FROM `user` WHERE email = '$email' OR id_prof = '$prof'";
    $check_result = mysqli_query($conn, $check_query);
    $check_count = mysqli_num_rows($check_result);
    
    if ($check_count == 0) {
        $sql = "INSERT INTO `user`(`email`, `password`, `id_prof`) VALUES ('$email','$pass','$prof')";
    
        if ($conn->query($sql) === TRUE) {
    
    
            $details = "Email: {$email}. \nid profesorr: {$prof}";
            
            $log_creacion_query = "INSERT INTO `logs_creacion` (nombre_tab, fecha_creacion, razon_creacion, detalles_creacion) VALUES ('user', NOW(), 'Carga de usuario', '$details')";
                        if ($conn->query($log_creacion_query) === TRUE) {
                            echo "exito"; 
                        } else {
                            echo "errorLogs";
                        };
        } else {
            echo "errorInsert";
        };
    } else {
            echo "repetido";
    };
};



$conn->close();
?>
