<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM `profesores` WHERE `id_prof`=$id";
    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $row = mysqli_fetch_array($result);
       ?>
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Razon de baja de "<?php echo $row['nombre_prof'].' '.$row['apellido_prof']; ?>"</h5>
      </div>
       <div class="modal-body">
        <textarea name="razon" id="razon" cols="90" rows="3"></textarea>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="<?php echo $row['id_prof']; ?>" class="baja btn btn-danger">Listo</button>
      </div>
       <?php
        
    } else {
        echo 'error2';
    };

} else {
    echo 'error1';
};

?>