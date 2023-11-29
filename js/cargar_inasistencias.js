$(document).ready(function () {

    function cargarInasistencias() {
        $.ajax({
            type: 'POST',
            url: 'obtener_inasistencias.php',
            data: { alumnosSeleccionados: alumnosSeleccionados },
            dataType: 'json',
            success: function (response) {
                $('#tablaInasistencias').empty();

                $.each(response.data, function (index, alumno) {
                    var row = '<tr>' +
                        '<td>' + alumno.dni_almn + '</td>' +
                        '<td>' + alumno.nombre_almn + '</td>' +
                        '<td>' + alumno.apellido_almn + '</td>' +
                        '<td>' + alumno.sexo_almn + '</td>' +
                        '<td>' + alumno.id_aula + '</td>' +
                        '<td><input type="text" class="form-control inasistencias-input" data-dni="' + alumno.dni_almn + '" value="' + (alumno.inasistencias_totales || 0) + '"></td>' +
                        '</tr>';

                    $('#tablaInasistencias').append(row);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    $('#cargarInasistencias').click(function () {
        var inasistenciasData = [];

        // Collect data from inputs
        $('.inasistencias-input').each(function () {
            var dni = $(this).data('dni');
            var inasistencias = $(this).val();

            // Only add data for which inasistencias is not empty
            if (inasistencias !== '') {
                inasistenciasData.push({ dni: dni, inasistencias: inasistencias });
            }
        });

        // Make AJAX request to cargar_inasistencias.php
        $.ajax({
            type: 'POST',
            url: 'cargar_inasistencias.php',
            data: { inasistenciasData: inasistenciasData },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Show success message
                    swal({
                        icon: "success",
                        title: "Inasistencias guardadas con éxito",
                        timer: 1100,
                        button: false
                    }).then(function () {
                        cambiosRealizados = false;
                        // Redirect to inasistencias_totales.php
                        window.location.href = 'inasistencias_totales.php';
                    });
                } else {
                    // Show error message
                    swal("Error", response.message, "error");
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    cambiosRealizados = true;

    // Añadir el evento onbeforeunload
    window.onbeforeunload = function (event) {
        if (cambiosRealizados) {
            var message = "Tienes cambios no guardados. ¿Estás seguro de que quieres salir?";
            event.returnValue = message; // Standard
            return message; // Para navegadores más antiguos
        }
    };

    cargarInasistencias();
});
