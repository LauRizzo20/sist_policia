<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inasistenciasData = isset($_POST['inasistenciasData']) ? $_POST['inasistenciasData'] : [];

    if (!empty($inasistenciasData)) {
        $success = true;
        $message = '';

        foreach ($inasistenciasData as $data) {
            $dni = intval($data['dni']);
            $inasistencias = intval($data['inasistencias']);

            // Check if a record already exists for the given DNI
            $existingRecord = mysqli_query($conn, "SELECT * FROM inasistencias WHERE dni_almn = $dni");

            if (mysqli_num_rows($existingRecord) > 0) {
                // Update the existing record
                $updateQuery = "UPDATE inasistencias SET inasistencias_totales = $inasistencias WHERE dni_almn = $dni";
                $result = mysqli_query($conn, $updateQuery);
            } else {
                // Insert a new record
                $insertQuery = "INSERT INTO inasistencias (dni_almn, inasistencias_totales) VALUES ($dni, $inasistencias)";
                $result = mysqli_query($conn, $insertQuery);
            }

            if (!$result) {
                $success = false;
                $message = 'Error executing query: ' . mysqli_error($conn);
                break; // Break the loop if an error occurs
            }
        }

        echo json_encode(['success' => $success, 'message' => $message]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No inasistencias data received']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

mysqli_close($conn);
?>
