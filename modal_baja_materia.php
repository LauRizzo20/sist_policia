<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Sanitize the input
    $query = "SELECT * FROM `materias` WHERE `id_mat`='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        ?>
        <!-- Contenido del modal de baja -->
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Razón de baja de "<?php echo $row['nombre_mat']; ?>"</h5>
        </div>
        <div class="modal-body">
            <textarea name="razon" id="razon" cols="90" rows="3"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" id="<?php echo $row['id_mat']; ?>" class="bajaMateria btn btn-danger">Listo</button>
        </div>
        <?php
    } else {
        echo 'error2: ' . mysqli_error($conn);
    }
} else {
    echo 'error1';
}
?>
