<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `user` WHERE `id` = $id";
    $result = mysqli_query($conn, $query);


    if (!empty($result)) {
        $row = mysqli_fetch_array($result);


       ?>
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar usuario</h5>
      </div>
       <div class="modal-body">
        <div class="form-row">
          <div class="form-group col">
              <label>Nombre:</label>
              <input type="text" class="form-control" value="<?php echo $row['email']; ?>" id="email" required>
          </div>
          <div class="form-group col">
              <label>Apellido:</label>
              <input type="text" class="form-control" value="<?php echo $row['password']; ?>" id="pass"  required>
          </div>
          <div class="form-group col">
            <div class="form-group">
                <label for="prof">Profesor (en caso de tener que asignarlo):</label>
                <select class="escribir form-control" id="prof" name="prof" required>
                    <option value="<? echo $row['id_prof']; ?>" ><? echo $row['id_prof']; ?></option>
                    <?php
                    $queryC = "SELECT * FROM profesores WHERE condicion_prof = 0";
                    $resultadoC = $conn->query($queryC);
                    while ($prof = $resultadoC->fetch_assoc()) {
                        echo "<option value='" . $prof['id_prof'] . "'>" . $prof['nombre_prof'] ." " . $prof['apellido_prof'] .  "</option>";
                    }
                    ?>
                </select>
            </div>
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