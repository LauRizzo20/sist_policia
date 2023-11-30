<?php
include('db_config.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `armas` WHERE `nroSerie_arma` = $id";
    $result = mysqli_query($conn, $query);

    if (!empty($result)) {
        $row = mysqli_fetch_array($result);
       ?>
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Editar arma</h5>
      </div>
       <div class="modal-body">
        <div class="form-row">
          <div class="form-group col">
              <label>Numero de serie:</label>
              <input type="text" class="form-control" value="<?php echo $row['nroSerie_arma']; ?>" id="serie" required>
          </div>
          <div class="form-group col">
              <label>Tipo:</label>
              <input type="text" class="form-control" value="<?php echo $row['tipo_arma']; ?>" id="tipo"  required>
          </div>
          <div class="form-group col">
              <label for="localidad">Modelo:</label>
              <input type="text" class="form-control" value="<?php echo $row['modelo_arma']; ?>" id="modelo" required>
          </div>
          <div class="form-group col">
              <label for="localidad">Marca:</label>
              <input type="text" class="form-control" value="<?php echo $row['marca_arma']; ?>" id="marca" required>
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