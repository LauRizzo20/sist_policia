<?php
include('connection.php');

header('Content-Type: application/json');
 if ($_SERVER['REQUEST_METHOD']=='POST') {
   $input =filter_input_array(INPUT_POST);
 } else {
   $input =filter_input_array(INPUT_GET);
 }

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

if ($input['action'] == 'edit') {
    var_dump($input);

    $sql = "UPDATE armas SET tipo_arma='{$input['tipo']}', modelo_arma='{$input['modelo']}', marca_arma='{$input['marca']}' WHERE nroSerie_arma={$input['id']}";
    print_r($sql);
    $conn->query($sql);
} else if ($input['action'] == 'delete') {
    var_dump($input);
    $sql = "DELETE FROM `armas` WHERE nroSerie_arma={$input['id']}";
    print_r($sql);
    $conn->query($sql);
} 
mysqli_close($conn);
?>