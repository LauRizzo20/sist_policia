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
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <title>Administracion policia</title>
</head>

<body>
  <?php
  include("header.php");
  ?>
  <div style="margin-left:20%">
    <div id="tabla1">
      <div class="display-4 d-flex justify-content-center h-100 align-items-center">Registro de alumnos</div>

      <br>
      <br>
      <div class="container mt-5">
        <form>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="aula">Aula:</label>
                <select class="form-control" id="aula" name="aula" required>
                  <?php
                  // Consulta para obtener opciones desde la base de datos
                  $sql = "SELECT * FROM aula";
                  $result = $conn->query($sql);

                  // Verificar si hay resultados
                  if ($result->num_rows > 0) {
                    // Mostrar opciones en el select
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row["id_aula"] . "'>" . $row["nro_aula"] . "</option>";
                    }
                  } else {
                    echo "<option value='' disabled>No hay opciones disponibles</option>";
                  }

                  ?>
                </select>
              </div>
            </div>
          </div>
          <button type="button" onclick="enviarFormulario()" class="btn btn-primary">Enviar</button>
        </form>
        <br>
        <br>

        <table class="table">
          <thead>
            <tr>
              <th>DNI</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Titulo</th>
              <th>Nacimiento</th>
              <th>Contacto</th>
              <th>Arma</th>
              <th>Destino</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Realiza la consulta para obtener los datos
            $sql = "SELECT id_almn, dni_almn, nombre_almn, apellido_almn FROM alumnos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["dni_almn"] . "</td>";
                echo "<td>" . $row["nombre_almn"] . "</td>";
                echo "<td>" . $row["apellido_almn"] . "</td>";
                echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#tituloModal' data-id='" . $row["id_almn"] . "'>Cargar Titulo</button></td>";
                echo "<td><button class='btn btn-success' data-toggle='modal' data-target='#nacimientoModal' data-id='" . $row["id_almn"] . "'>Cargar Nacimiento</button></td>";
                echo "<td><button class='btn btn-warning' data-toggle='modal' data-target='#contactoModal' data-id='" . $row["id_almn"] . "'>Cargar Contacto</button></td>";
                echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#armaModal' data-id='" . $row["id_almn"] . "'>Cargar Arma</button></td>";
                echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#destinoModal' data-id='" . $row["id_almn"] . "'>Cargar Destino</button></td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='7'>No hay datos en la base de datos.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- Modal para Titulo -->
  <div class="modal fade" id="tituloModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel">Analitico</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioCarga">
            <div class="form-group">
              <label for="nom_analit">Nombre en el Analitico:</label>
              <input type="text" class="form-control" id="nom_analit" name="nom_analit" required>
            </div>
            <div class="form-group">
              <label for="tiltulo_analit">Título en el Analitico:</label>
              <input type="text" class="form-control" id="tiltulo_analit" name="tiltulo_analit" required>
            </div>
            <div class="form-group">
              <label for="resolucion_analit">Resolución del Analitico:</label>
              <textarea class="form-control" id="resolucion_analit" name="resolucion_analit" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="escuela_analit">Escuela del Analitico:</label>
              <input type="text" class="form-control" id="escuela_analit" name="escuela_analit" required>
            </div>
            <div class="form-group">
              <label for="distrito_analit">Distrito del Analitico:</label>
              <input type="text" class="form-control" id="distrito_analit" name="distrito_analit" required>
            </div>
            <div class="form-group">
              <label for="observaciones_analit">Observaciones del Analitico:</label>
              <textarea class="form-control" id="observaciones_analit" name="observaciones_analit" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="egreso_analit">Fecha de Egreso del Analitico:</label>
              <input type="date" class="form-control" id="egreso_analit" name="egreso_analit" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="nacimientoModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel">Datos de nacimiento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioCargaNacimiento">
            <div class="form-group">
              <label for="fecha">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
              <label for="lugar">Lugar de Nacimiento:</label>
              <textarea class="form-control" id="lugar" name="lugar" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
              <input type="text" class="form-control" id="grupo_sanguineo" name="grupo_sanguineo" required>
            </div>
            <div class="form-group">
              <label for="provincia">Provincia:</label>
              <input type="text" class="form-control" id="provincia" name="provincia" required>
            </div>
            <div class="form-group">
              <label for="pais">País:</label>
              <input type="text" class="form-control" id="pais" name="pais" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="contactoModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel">Datos de nacimiento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioCargaContacto">
            <div class="form-group">
              <label for="email">Correo Electrónico:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="telefono">Teléfono Principal:</label>
              <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
              <label for="telefono_resp">Teléfono de Respuesta:</label>
              <input type="tel" class="form-control" id="telefono_resp" name="telefono_resp" required>
            </div>
            <div class="form-group">
              <label for="legajo">Número de Legajo:</label>
              <input type="number" class="form-control" id="legajo" name="legajo" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="armaModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel">Asignacion de arma</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioArmaAsig">
            <div class="form-group">
              <label for="arma">Arma:</label>
              <select class="form-control" id="arma" name="arma" required>
                <?php
                // Consulta para obtener opciones desde la base de datos
                $sql = "SELECT * FROM armas";
                $result = $conn->query($sql);

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                  // Mostrar opciones en el select
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["nroSerie_arma"] . "'>" . $row["nroSerie_arma"] . " " . $row["modelo_arma"] . "</option>";
                  }
                } else {
                  echo "<option value='' disabled>No hay opciones disponibles</option>";
                }

                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Asignar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="destinoModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel">Asignacion de arma</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formularioCargaDestino">
            <div class="form-group">
              <label for="domicilio">Domicilio:</label>
              <input type="text" class="form-control" id="domicilio" name="domicilio" required>
            </div>
            <div class="form-group">
              <label for="localidad">Localidad:</label>
              <input type="text" class="form-control" id="localidad" name="localidad" required>
            </div>
            <div class="form-group">
              <label for="cp">Código Postal:</label>
              <input type="text" class="form-control" id="cp" name="cp" required>
            </div>
            <div class="form-group">
              <label for="comisaria">Comisaría más cercana:</label>
              <input type="text" class="form-control" id="comisaria" name="comisaria" required>
            </div>
            <div class="form-group">
              <label for="destino">Destino:</label>
              <input type="text" class="form-control" id="destino" name="destino" required>
            </div>
            <div class="form-group">
              <label for="telefono_dest">Teléfono de Destino:</label>
              <input type="number" class="form-control" id="telefono_dest" name="telefono_dest" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Datos</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/ingresar_almn.js"></script>
  <script src="js/ingresar_titulo.js"></script>
  <script src="js/ingresar_nacimiento.js"></script>
  <script src="js/ingresar_contacto.js"></script>
  <script src="js/ingresar_arma.js"></script>
  <script src="js/ingresar_destino.js"></script>
</body>

</html>