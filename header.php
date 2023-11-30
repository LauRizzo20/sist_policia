
<?php
include('session.php');
?>
<div class="w3-sidebar w3-bar-block containerA" style="width: 15%;" id="mySidebar">

        <div role="group" aria-label="Basic example" style="margin-top: 25%;">
            <div class="d-flex justify-content-center">
                <img src="img/icon.png" alt="logo" style="width: 45%;">
            </div>
            <br>
            <a class="sideButtons d-flex align-items-center" href="dashboard.php">Lista de alumnos</a>
            <a class="sideButtons d-flex align-items-center" href="ingresar_alumno.php"><div>Carga de alumnos</div></a>
            <a class="sideButtons d-flex align-items-center" href="lista_armas.php"><div >Lista de armas</div></a>
            <a class="sideButtons d-flex align-items-center" href="lista_profesores.php"><div>Lista de profesores</div></a>
            <a class="sideButtons d-flex align-items-center" href="carga_prof.php"><div>Carga de profesores</div></a>
            <a class="sideButtons d-flex align-items-center" href="lista_aulas.php"><div>Lista de aulas</div></a>
            <a class="sideButtons d-flex align-items-center" href="lista_materias.php"><div>Lista de materias</div></a>
            <a class="sideButtons d-flex align-items-center" href="materia_notas.php"><div>Cargar Notas</div></a>
            <a class="sideButtons d-flex align-items-center" href="asignacion_form.php"><div>Asignacion de aulas</div></a>
            <a class="sideButtons d-flex align-items-center" href="inasistencias_totales.php"><div>Inasistencias Totales</div></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light navbarA">
        <h2 style="color: white;
    margin-left: 17.5%">Administracion</h2>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul style="margin-left: 80%;" class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <button type="button" href="logout.php" class="btn-header">Cerrar sesion</button>
                </li>
            </ul>
        </div>
    </nav>

    <br>