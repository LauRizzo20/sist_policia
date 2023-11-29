<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = isset($_POST['dni']) ? mysqli_real_escape_string($conn, $_POST['dni']) : '';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conn, $_POST['apellido']) : '';
    $sexo = isset($_POST['sexo']) ? mysqli_real_escape_string($conn, $_POST['sexo']) : '';
    $aulas = isset($_POST['aulas']) ? $_POST['aulas'] : array();

    $sql = "SELECT * FROM alumnos WHERE 1";

    // Agregar condiciones de filtro según los valores proporcionados
    if (!empty($dni)) {
        $sql .= " AND dni_almn = '$dni'";
    }
    if (!empty($nombre)) {
        $sql .= " AND nombre_almn LIKE '%$nombre%'";
    }
    if (!empty($apellido)) {
        $sql .= " AND apellido_almn LIKE '%$apellido%'";
    }
    if (!empty($sexo)) {
        $sql .= " AND sexo_almn = '$sexo'";
    }
    if (!empty($aulas)) {
        $aulasString = implode(",", $aulas);
        $sql .= " AND id_aula IN ($aulasString)";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $aulaId = $row['id_aula'];
        
            // Obtener el número de aula correspondiente a la ID de aula
            $query_aula = mysqli_query($conn, "SELECT nro_aula FROM aula WHERE id_aula = $aulaId");
            $row_aula = mysqli_fetch_assoc($query_aula);
            $nroAula = $row_aula['nro_aula'];
        
            // Imprimir los datos (puedes ajustar esto según tu estructura de HTML)
            echo '<tr>';
            echo '<td>' . $row['dni_almn'] . '</td>';
            echo '<td>' . $row['nombre_almn'] . '</td>';
            echo '<td>' . $row['apellido_almn'] . '</td>';
            echo '<td>' . $row['sexo_almn'] . '</td>';
            echo '<td>' . $nroAula . '</td>';
            echo '<td class="inasistencias-td">'; // Nueva celda para inasistencias
            
            // Lógica para obtener e imprimir las inasistencias
            $dniAlumno = $row['dni_almn'];
            $query_inasistencias = mysqli_query($conn, "SELECT inasistencias_totales FROM inasistencias WHERE dni_almn = $dniAlumno");
            $row_inasistencias = mysqli_fetch_assoc($query_inasistencias);
            $inasistencias = isset($row_inasistencias['inasistencias_totales']) ? $row_inasistencias['inasistencias_totales'] : 0;
            
            echo '<span class="inasistencias-text">' . $inasistencias . '</span>';
            echo '</td>';
            echo '</tr>';
            
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
