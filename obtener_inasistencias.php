<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumnosSeleccionados = isset($_POST['alumnosSeleccionados']) ? $_POST['alumnosSeleccionados'] : [];

    if (!empty($alumnosSeleccionados)) {
        $alumnosSeleccionados = array_map(function ($dni) {
            return intval($dni);
        }, $alumnosSeleccionados);

        $dniList = implode(',', $alumnosSeleccionados);

        $sql = "SELECT a.dni_almn, a.nombre_almn, a.apellido_almn, a.sexo_almn, a.id_aula, i.inasistencias_totales
                FROM alumnos a
                LEFT JOIN inasistencias i ON a.dni_almn = i.dni_almn
                WHERE a.dni_almn IN ($dniList)";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $inasistenciasData = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode(['success' => true, 'data' => $inasistenciasData]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error executing query: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No students selected']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

mysqli_close($conn);
?>
