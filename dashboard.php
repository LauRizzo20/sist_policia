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
  <style>
    .tab-content {
      display: none;
    }

    .active-tab {
      display: block;
    }

    .tab-buttons {
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <?php
  include('header.php');
  ?>

  <div style="margin-left:20%">

    <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de alumnos</div>

    <br>
    <br>
    <br><br>
    <div class="tab-buttons row">
      <div class="col-md-1"></div>
      <button class="col-md-1 btn btn-danger" onclick="changeTab('tabla0')">Datos basicos</button>
      <div class="col-md-1"></div>
      <button class="col-md-1 btn btn-primary" onclick="changeTab('tabla1')">Titulo</button>
      <div class="col-md-1"></div>
      <button class="col-md-1 btn btn-success" onclick="changeTab('tabla2')">Nacimiento</button>
      <div class="col-md-1"></div>
      <button class="col-md-1 btn btn-warning" onclick="changeTab('tabla3')">Contacto</button>
      <div class="col-md-1"></div>
      <button class="col-md-1 btn btn-info" onclick="changeTab('tabla4')">Destino</button>
      <!-- Agrega más botones según sea necesario -->
    </div>
    <br><br>
    <div class="row">
      <div class="col-md-3">
      <input type="text" class="form-control rounded" id="searchDni" placeholder="Buscar por DNI">
      </div>
      <div class="col-md-3">
      <input type="text" class="form-control rounded" id="searchNombre" placeholder="Buscar por Nombre">
    </div>
    <br><br>
    <table id="tabla0" class="table tab-content active-tab">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Editar</th>
          <th scope="col">Baja</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_alumnos = "SELECT * FROM alumnos";

        $result_alumnos = $conn->query($sql_alumnos);

        if ($result_alumnos->num_rows > 0) {
          // Mostrar datos en la tabla
          while ($row = $result_alumnos->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row['dni_almn'] . "</td>
                        <td>" . $row['nombre_almn'] . "</td>
                        <td>" . $row['apellido_almn'] . "</td>
                        <td><button class='editar btn btn-warning' id='<?php echo " . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Editar</button></td>
                        <td><button class='eliminar btn btn-danger' id='<?php echo $" . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Dar de baja</button></td>
                      </tr>";
          }

          echo "</table>";
        } else {
          echo "No se encontraron resultados.";
        }


        ?>
      </tbody>
    </table>
    <table id="tabla1" class="table tab-content">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nombre en Analitico</th>
          <th scope="col">Titulo</th>
          <th scope="col">Resolucion</th>
          <th scope="col">Escuela</th>
          <th scope="col">Distrito</th>
          <th scope="col">Observaciones</th>
          <th scope="col">Fecha egreso</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_titulo = "SELECT  secundario_almn.*, alumnos.* FROM secundario_almn
          LEFT JOIN alumnos ON secundario_almn.id_almn = alumnos.id_almn";

        $result_titulo = $conn->query($sql_titulo);

        if ($result_titulo->num_rows > 0) {
          // Mostrar datos en la tabla
          while ($row = $result_titulo->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row['dni_almn'] . "</td>
                        <td>" . $row['nombre_almn'] . "</td>
                        <td>" . $row['apellido_almn'] . "</td>
                        <td>" . $row['nom_analit'] . "</td>
                        <td>" . $row['tiltulo_analit'] . "</td>
                        <td>" . $row['resolucion_analit'] . "</td>
                        <td>" . $row['escuela_analit'] . "</td>
                        <td>" . $row['distrito_analit'] . "</td>
                        <td>" . $row['observaciones_analit'] . "</td>
                        <td>" . $row['egreso_analit'] . "</td>
                        <td><button class='editar btn btn-warning' id='<?php echo " . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Editar</button></td>
                        <td><button class='eliminar btn btn-danger' id='<?php echo $" . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Borrar datos de analitico</button></td>
                      </tr>";
          }

          echo "</table>";
        } else {
          echo "No se encontraron resultados.";
        }


        ?>
      </tbody>
    </table>
    <table id="tabla2" class="table tab-content">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Fecha de nacimiento</th>
          <th scope="col">Lugar de nacimiento</th>
          <th scope="col">Grupo sanguineo</th>
          <th scope="col">Provincia</th>
          <th scope="col">Pais</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_nac = "SELECT nacimiento_almn.*, alumnos.* FROM nacimiento_almn
          LEFT JOIN alumnos ON nacimiento_almn.id_almn = alumnos.id_almn";

        $result_nac = $conn->query($sql_nac);

        if ($result_nac->num_rows > 0) {
          // Mostrar datos en la tabla
          while ($row = $result_nac->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row['dni_almn'] . "</td>
                        <td>" . $row['nombre_almn'] . "</td>
                        <td>" . $row['apellido_almn'] . "</td>
                        <td>" . $row['fecha'] . "</td>
                        <td>" . $row['lugar'] . "</td>
                        <td>" . $row['grupo_sanguineo'] . "</td>
                        <td>" . $row['provincia'] . "</td>
                        <td>" . $row['pais'] . "</td>
                        <td><button class='editar btn btn-warning' id='<?php echo " . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Editar</button></td>
                        <td><button class='eliminar btn btn-danger' id='<?php echo $" . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Borrar datos de nacimiento</button></td>
                      </tr>";
          }

          echo "</table>";
        } else {
          echo "No se encontraron resultados.";
        }
        ?>
      </tbody>
    </table>
    <table id="tabla3" class="table tab-content">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Mail</th>
          <th scope="col">Telefono principal</th>
          <th scope="col">Telefono de respaldo</th>
          <th scope="col">Legajo</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_contacto = "SELECT contacto_almn.*, alumnos.* FROM contacto_almn
          LEFT JOIN alumnos ON contacto_almn.id_almn = alumnos.id_almn";

        $result_contacto = $conn->query($sql_contacto);

        if ($result_contacto->num_rows > 0) {
          // Mostrar datos en la tabla
          while ($row = $result_contacto->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row['dni_almn'] . "</td>
                        <td>" . $row['nombre_almn'] . "</td>
                        <td>" . $row['apellido_almn'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['telefono'] . "</td>
                        <td>" . $row['telefono_resp'] . "</td>
                        <td>" . $row['legajo'] . "</td>
                        <td><button class='editar btn btn-warning' id='<?php echo " . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Editar</button></td>
                        <td><button class='eliminar btn btn-danger' id='<?php echo $" . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Borrar datos de contacto</button></td>
                      </tr>";
          }

          echo "</table>";
        } else {
          echo "No se encontraron resultados.";
        }
        ?>
      </tbody>
    </table>
    <table id="tabla4" class="table tab-content">
      <thead>
        <tr>
          <th scope="col">DNI</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Domicilio</th>
          <th scope="col">Localidad</th>
          <th scope="col">CP</th>
          <th scope="col">Comisaria</th>
          <th scope="col">Destino</th>
          <th scope="col">Telefono de destino</th>
          <th scope="col">Editar</th>
          <th scope="col">Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_dest = "SELECT destino_almn.*, alumnos.* FROM destino_almn
          LEFT JOIN alumnos ON destino_almn.id_almn = alumnos.id_almn";

        $result_dest = $conn->query($sql_dest);

        if ($result_dest->num_rows > 0) {
          // Mostrar datos en la tabla
          while ($row = $result_dest->fetch_assoc()) {
            echo "<tr>
                        <td>" . $row['dni_almn'] . "</td>
                        <td>" . $row['nombre_almn'] . "</td>
                        <td>" . $row['apellido_almn'] . "</td>
                        <td>" . $row['domicilio'] . "</td>
                        <td>" . $row['localidad'] . "</td>
                        <td>" . $row['cp'] . "</td>
                        <td>" . $row['comisaria'] . "</td>
                        <td>" . $row['destino'] . "</td>
                        <td>" . $row['telefono_dest'] . "</td>
                        <td><button class='editar btn btn-warning' id='<?php echo " . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Editar</button></td>
                        <td><button class='eliminar btn btn-danger' id='<?php echo $" . $row['dni_almn'] . " ?>' value='<?php echo " . $row['dni_almn'] . " ?>'>Borrar datos de destino</button></td>
                      </tr>";
          }

          echo "</table>";
        } else {
          echo "No se encontraron resultados.";
        }
        ?>
      </tbody>
    </table>

  </div>

  <script>
    function changeTab(tabId) {
      // Oculta todos los contenidos de las pestañas
      var tabContents = document.getElementsByClassName('tab-content');
      for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove('active-tab');
      }
      // Muestra el contenido de la pestaña seleccionada
      document.getElementById(tabId).classList.add('active-tab');
    }
  </script>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="js/eliminar.js"></script>
<script src="js/filtro_dniAlmn2.js"></script>

</html>