<?php
include("db_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dniAlumno = $_POST['dniAlumno'];
    $materiaID = $_POST['materiaID'];

    // Assuming you have a table structure like notas(id_nota, id_mat, tipo_nota, dni_almn, num_nota, fecha_nota, comentario_nota)
    $query = "SELECT * FROM notas WHERE dni_almn = '$dniAlumno' AND id_mat = $materiaID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Initialize an array to store nota data
        $notasData = array();

        $rowData = array(
            'Primer Parcial' => '-',
            'Recuperatorio 1' => '-',
            'Segundo Parcial' => '-',
            'Recuperatorio 2' => '-',
            'Final' => '-',
            'Conducta' => '-',
        );

        // Fetch all relevant nota records for the alumno
        while ($row = mysqli_fetch_assoc($result)) {

            // Iterate through the $row values and update $rowData based on tipo_nota
            foreach ($row as $key => $value) {
                // Check if the key corresponds to tipo_nota
                if ($key === 'tipo_nota' && array_key_exists($value, $rowData)) {
                    // Update the corresponding value in $rowData
                    $rowData[$value] = $row['num_nota'];
                }
            }
        }

        // Send notas data as JSON response
        echo json_encode($rowData);
    } else {
        // Handle query error
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>
