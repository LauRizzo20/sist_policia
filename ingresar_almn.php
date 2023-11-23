<?php
include('db_config.php');


// Recibir datos del formulario
$dni_almn = mysqli_real_escape_string($conn,$_POST['dni_almn']);
$nom_almn = mysqli_real_escape_string($conn,$_POST['nom_almn']);
$email_almn = mysqli_real_escape_string($conn,$_POST['email_almn']);
$telefono_almn = mysqli_real_escape_string($conn,$_POST['telefono_almn']);
$cp_almn = mysqli_real_escape_string($conn,$_POST['cp_almn']);
$distrito_almn = mysqli_real_escape_string($conn,$_POST['distrito_almn']);
$domicilio_almn = mysqli_real_escape_string($conn,$_POST['domicilio_almn']);
$compania_almn = mysqli_real_escape_string($conn,$_POST['compania_almn']);
$legajo_almn = mysqli_real_escape_string($conn,$_POST['legajo_almn']);
$destino_almn = mysqli_real_escape_string($conn,$_POST['destino_almn']);
$comisaria_almn = mysqli_real_escape_string($conn,$_POST['comisaria_almn']);
$secundario_almn = mysqli_real_escape_string($conn,$_POST['secundario_almn']);
$nacionalidad_almn = mysqli_real_escape_string($conn,$_POST['nacionalidad_almn']);
$aula_almn = mysqli_real_escape_string($conn,$_POST['aula_almn']);
$arma_almn = mysqli_real_escape_string($conn,$_POST['arma_almn']);
$condicion_almn = mysqli_real_escape_string($conn,$_POST['condicion_almn']);

// Verificar que ninguna variable esté vacía
if (empty($dni_almn) || empty($nom_almn) || empty($email_almn) || empty($telefono_almn) || empty($cp_almn) || empty($distrito_almn) || empty($domicilio_almn) || empty($compania_almn) || empty($legajo_almn) || empty($destino_almn) || empty($comisaria_almn) || empty($secundario_almn) || empty($nacionalidad_almn) || empty($aula_almn) || empty($arma_almn) || empty($condicion_almn)) {
    die("vacio");
}

// Verificar si hay DNI repetidos en la base de datos
$dni_verificar = mysqli_real_escape_string($conn, $dni_almn);
$verificar_dni_query = "SELECT * FROM `alumnos` WHERE dni_almn = '$dni_verificar'";
$verificar_dni_result = $conn->query($verificar_dni_query);

if ($verificar_dni_result->num_rows > 0) {
    die("repetido");
}

// Preparar la consulta SQL
$sql = "INSERT INTO `alumnos` (dni_almn, nom_almn, email_almn, telefono_almn, cp_almn, distrito_almn, domicilio_almn, compania_almn, legajo_almn, destino_almn, comisaria_almn, secundario_almn, nacionalidad_almn, aula_almn, arma_almn, condicion_almn) VALUES ('$dni_almn', '$nom_almn', '$email_almn', '$telefono_almn', '$cp_almn', '$distrito_almn', '$domicilio_almn', '$compania_almn', '$legajo_almn', '$destino_almn', '$comisaria_almn', '$secundario_almn', '$nacionalidad_almn', '$aula_almn', '$arma_almn', '$condicion_almn')";

$result = mysqli_query($conn, $sql);
// Verificar si la consulta SQL se realizó correctamente
if ($result) {
    echo "exito";
} else {
    echo $sql;
}

// Cerrar la conexión
$conn->close();
?>
