<?php
include('session.php');
?>
<div class="w3-sidebar w3-bar-block containerA" style="width: 15%;" id="mySidebar">

        <?php
        if ($cargo == 0) {
            ?>
        <div role="group" aria-label="Basic example" style="margin-top: 25%;">
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="dashboard.php"><div class="w3-bar-item w3-button">Lista de alumnos</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="ingresar_alumno.php"><div class="w3-bar-item w3-button">Carga de alumnos</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_armas.php"><div class="w3-bar-item w3-button">Lista de armas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_profesores.php"><div class="w3-bar-item w3-button">Lista de profesores</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="carga_prof.php"><div class="w3-bar-item w3-button">Carga de profesores</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_aulas.php"><div class="w3-bar-item w3-button">Lista de aulas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_materias.php"><div class="w3-bar-item w3-button">Lista de materias</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="materia_notas.php"><div class="w3-bar-item w3-button">Cargar Notas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="asignacion_form.php"><div class="w3-bar-item w3-button">Asignacion de aulas</div></a>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="inasistencias_totales.php"><div class="w3-bar-item w3-button">Inasistencias Totales</div></a>
            <br>
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="lista_usuarios.php"><div class="w3-bar-item w3-button">Usuarios activos</div></a>
        </div>
            <?php
        } else {
            ?>
            <div role="group" aria-label="Basic example" style="margin-top: 25%;">

            </div>

            <?php
        }
        
        
        
        ?>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light navbarA">
        <h2 style="color: white;
    margin-left: 17.5%">Administracion</h2>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul style="margin-left: 80%;" class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <button type="button" href="logout.php" class="btn btn-outline-light mr-md-3 mb-2 mb-md-0"><a href="logout.php">Cerrar sesion</a></button>
                </li>
            </ul>
        </div>
    </nav>

    <br>