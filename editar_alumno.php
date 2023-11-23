<?php
if (isset($_GET["dni"])) {
    $dni = $_GET["dni"];
    
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "policia");
    
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }
    
    $query = "SELECT * FROM alumnos WHERE dni_almn = $dni";
    $result = $conexion->query($query);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Aquí puedes crear un formulario para editar los datos del alumno
    }
    
    $conexion->close();
}
?>
