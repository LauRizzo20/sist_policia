$(document).ready(function () {
    $(".eliminar").on("click", function () {
        // Obtén el valor del atributo data-id del botón
        var idAlumno = $(this).data("id");
        console.log(idAlumno);

        // Realiza la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "baja_alumno.php",
            data: { idAlumno: idAlumno },
            success: function (response) {
                // Muestra SweetAlert al recibir la respuesta del servidor
                swal({
                    icon: "success",
                    title: "Alumno dado de baja",
                    timer: 1100,
                    button: false
                }).then(function () {
                    // Refrescar la página después de cerrar la alerta
                    location.reload();
                });
            },
            error: function (error) {
                console.error("Error en la solicitud AJAX", error);
            }
        });
    });
    $(".restaurar").on("click", function () {
        // Obtén el valor del atributo data-id del botón
        var idAlumno = $(this).data("id");
        console.log(idAlumno);

        // Realiza la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "restaurar_alumno.php",
            data: { idAlumno: idAlumno },
            success: function (response) {
                // Muestra SweetAlert al recibir la respuesta del servidor
                swal({
                    icon: "success",
                    title: "Alumno restaurado",
                    timer: 1100,
                    button: false
                }).then(function () {
                    // Refrescar la página después de cerrar la alerta
                    location.reload();
                });
            },
            error: function (error) {
                console.error("Error en la solicitud AJAX", error);
            }
        });
    });
});