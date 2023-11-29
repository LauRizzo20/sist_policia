<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `profesores` WHERE `id_prof` = $id";
    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $row = mysqli_fetch_array($result);
       ?>
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar profesor</h5>
      </div>
       <div class="modal-body">
        <div class="form-row">
          <div class="form-group col">
              <label>Nombre:</label>
              <input type="text" class="form-control" value="<?php echo $row['nombre_prof']; ?>" id="nombre" required>
          </div>
          <div class="form-group col">
              <label>Apellido:</label>
              <input type="text" class="form-control" value="<?php echo $row['apellido_prof']; ?>" id="apellido"  required>
          </div>
          <div class="form-group col">
              <label for="localidad">DNI:</label>
              <input type="text" class="form-control" value="<?php echo $row['dni_prof']; ?>" id="dni" required>
          </div>
          <div class="form-group col">
              <label for="localidad">Nro de Legajo:</label>
              <input type="text" class="form-control" value="<?php echo $row['legajo_prof']; ?>" id="legajo" required>
          </div>
        </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" id="<?php echo $id; ?>" class="editar btn btn-primary">Listo</button>
      </div>
       <?php
        
    } else {
        echo 'error2';
    };

} else {
    echo 'error1';
};



?>