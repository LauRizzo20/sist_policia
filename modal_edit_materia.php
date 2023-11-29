<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM `materias` WHERE `id_mat`=$id";
    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $row = mysqli_fetch_array($result);
?>

        <!-- Contenido del modal de edición -->
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Editar Materia "<?php echo $row['nombre_mat']; ?>"</h5>
        </div>
        <div class="modal-body">
            <!-- Formulario con campos para editar -->
            <!-- Ajusta los campos según tus necesidades -->
            <input type="text" id="nombre" value="<?php echo $row['nombre_mat']; ?>" />
            <input type="number" id="cargaHoraria" value="<?php echo $row['c_horaria_mat']; ?>" />

            <!-- Dropdown for Currícula -->
            <select id="curricula">
                <option value="Sin Asignar" <?php if ($row['curricula_mat'] == "Sin Asignar") echo "selected"; ?>>Sin Asignar</option>
                <option value="ANUAL" <?php if ($row['curricula_mat'] == "ANUAL") echo "selected"; ?>>ANUAL</option>
                <option value="CUATRIMESTRAL" <?php if ($row['curricula_mat'] == "CUATRIMESTRAL") echo "selected"; ?>>CUATRIMESTRAL</option>
                <option value="PROMOCIONABLE" <?php if ($row['curricula_mat'] == "PROMOCIONABLE") echo "selected"; ?>>PROMOCIONABLE</option>
                <option value="LIBRE" <?php if ($row['curricula_mat'] == "LIBRE") echo "selected"; ?>>LIBRE</option>
                <option value="ÚNICA AL FINAL" <?php if ($row['curricula_mat'] == "ÚNICA AL FINAL") echo "selected"; ?>>ÚNICA AL FINAL</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" id="<?php echo $id; ?>" class="editarMateria btn btn-primary">Guardar Cambios</button>
        </div>
<?php
    } else {
        echo 'error2';
    };
} else {
    echo 'error1';
};
?>
