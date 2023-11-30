<?php
include('db_config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Administracion policia</title>
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div style="margin-left:20%">
        <div id="tabla1">
            <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de usuarios</div>

            <br>

            <form method="post">
                <div class="container">
                    <label for="">Creacion de usuarios</label>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="email">Correo:</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pass">Contraseña:</label>
                            <input type="text" class="form-control" id="pass" name="pass" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pass">Cargo:</label>
                            <select class="escribir form-control" id="cargo" name="cargo" required>
                                <option value="0">Administrador</option>
                                <option value="1">Profesor</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="prof">Profesor (opcional):</label>
                            <select class="escribir form-control" id="prof" name="prof" required>
                                <option value="false">Vacio</option>
                                <?php
                                $queryC = "SELECT * FROM profesores WHERE condicion_prof = 0";
                                $resultadoC = $conn->query($queryC);
                                while ($prof = $resultadoC->fetch_assoc()) {
                                    echo "<option value='" . $prof['id_prof'] . "'>" . $prof['nombre_prof'] . " " . $prof['apellido_prof'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="col-md-6 btn btn-primary" id="crear">Cargar</button>
                    </div>
                </div>
            </form>


            <br>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Cargo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE 1");


                    while ($row = mysqli_fetch_assoc($query)) {
                        $id = $row['id'];
                        $cargo_user = $row['id_prof'];
                    ?>
                        <tr>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                ************
                            </td>
                            <td>
                                <?php
                                if ($cargo_user == 0) {
                                    echo 'Administrador';
                                } else {
                                    echo 'Profesor';
                                }
                                ?>
                            </td>
                            <td>
                                <button id="<?php echo $id; ?>" value="<?php echo $id; ?>" class="open btn btn-secondary">Editar</button>
                            </td>
                            <td>
                                <button class="eliminar btn btn-danger" id="<?php echo $id ?>" value="<?php echo $id ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal info -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content" id="modalContent">

            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/editar_user.js"></script>
<script src="js/baja_user.js"></script>
<script src="js/modal_user.js"></script>
<script src="js/carga_user.js"></script>

</html>