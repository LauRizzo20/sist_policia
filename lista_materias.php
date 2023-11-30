<?php
include("db_config.php");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Administracion policia</title>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div  style="margin-left:20%; margin-right: 5%; margin-bottom: 150px;">
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de materias</div>
        <br>
        <br>

        <!-- Formulario para ingresar materias -->
        <form id="ingresoMateria" class="form-inline mb-2">
            <div class="form-group mx-sm-3 mb-2">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="cargaHoraria">Carga Horaria:</label>
                <input type="text" class="form-control" name="cargaHoraria" required>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="curricula">Currícula:</label>
                <select class="form-control" name="curricula" required>
                    <option value="Sin Asignar">Sin Asignar</option>
                    <option value="ANUAL">ANUAL</option>
                    <option value="CUATRIMESTRAL">CUATRIMESTRAL</option>
                    <option value="PROMOCIONABLE">PROMOCIONABLE</option>
                    <option value="LIBRE">LIBRE</option>
                    <option value="ÚNICA AL FINAL">ÚNICA AL FINAL</option>
            </select>
            </div>
            <button type="button" id="enviarMateria" class="btn btn-primary mb-2">Agregar Materia</button>
        </form>


        <!-- Tabla de materias -->
        <table class="table tab-pane fade in active" id="tab">
            <thead>
                <tr>
                    <th scope="col">N° Materia</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Carga Horaria</th>
                    <th scope="col">Currícula</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `materias`";
                $query = mysqli_query($conn, $sql);
                $position = 1;

                while ($result = mysqli_fetch_array($query)) {
                    $idMateria = $result['id_mat'];
                    $nombreMateria = $result['nombre_mat'];
                    $cargaHoraria = $result['c_horaria_mat'];
                    $curricula = $result['curricula_mat'];
                ?>
                    <tr>
                        <td><input type="hidden" name='id' value='<?php echo $idMateria; ?>' disabled=""><?php echo $position++; ?></td>
                        <td><input type="hidden" name='nombre' value='<?php echo $nombreMateria; ?>' disabled=""><?php echo $nombreMateria; ?></td>
                        <td><input type="hidden" name='cargaHoraria' value='<?php echo $cargaHoraria; ?>' disabled=""><?php echo $cargaHoraria; ?></td>
                        <td><input type="hidden" name='curricula' value='<?php echo $curricula; ?>' disabled=""><?php echo $curricula; ?></td>
                        <td>
                            <button class="editar btn btn-secondary open" id="<?php echo $idMateria; ?>">Editar</button>
                        <td>
                            <button class="eliminar btn btn-danger open" id="<?php echo $idMateria; ?>">Eliminar</button>
                        </td>
                        </td>    
                    </tr>
                <?php
                };
                ?>
            </tbody>
        </table>

        <div class="pull-right">
            <button class="btn btn-info" id="generarPDF">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Generar PDF
            </button>    
        </div>
    </div>

    <!-- Modal info -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content" id="modalContent">
                
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/ingresar_materia.js"></script>
    <script src="js/editar_materia.js"></script>
    <script src="js/baja_materia.js"></script>
    <script src="js/modal_materia.js"></script>

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="pdf/pdf_materias.js"></script>
</body>
</html>
