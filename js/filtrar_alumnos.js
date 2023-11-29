$(document).ready(function () {
    // Función para cargar dinámicamente la tabla de alumnos
    function cargarTablaAlumnos(filtros) {
        $.ajax({
            type: 'POST',
            url: 'filtrar_alumnos.php',
            data: filtros,
            dataType: 'html',
            success: function (response) {
                $('#tablaAlumnos tbody').html(response);

                $('#tablaAlumnos tbody tr').each(function () {
                    $(this).prepend('<td><input type="checkbox" class="alumno-checkbox" data-id="' + $(this).find('td:first-child').text() + '"></td>');
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    // Evento de clic en el botón de filtrar
    $('#btnFiltrar').click(function () {
        var filtros = {
            dni: $('#filtroDNI').val(),
            nombre: $('#filtroNombre').val(),
            apellido: $('#filtroApellido').val(),
            sexo: $('#filtroSexo').val(),
            aulas: $('input[id^="filtroAula"]:checked').map(function () {
                return $(this).val();
            }).get()
        };

        cargarTablaAlumnos(filtros);
    });

    $("#resetFiltros").click(function () {
        // Vaciar los campos de input
        $("#dni, #nombre, #apellido").val('');

        // Establecer los selects en la primera opción
        $("#sexo, #aulas").val('');

        // Desmarcar todas las checkboxes
        $("input[type='checkbox']").prop('checked', false);

        // Llamar a la función para cargar la tabla con los filtros restablecidos
        cargarTablaAlumnos();
    });

    // Evento para seleccionar/deseleccionar todos los checkboxes de alumnos
    $('#seleccionarAlumnos').click(function () {
        // Verificar si al menos una checkbox de alumno está deseleccionada
        var algunaDeseleccionada = $('input[type="checkbox"].alumno-checkbox:not(:checked)').length > 0;
    
        // Seleccionar todas las checkboxes de alumno si al menos una está deseleccionada
        // De lo contrario, deseleccionar todas las checkboxes de alumno
        $('input[type="checkbox"].alumno-checkbox').prop('checked', algunaDeseleccionada);
    });

    $('#cargarInasistencias').click(function () {
        var alumnosSeleccionados = [];
    
        // Obtener DNI de alumnos seleccionados
        $('input[type="checkbox"].alumno-checkbox:checked').each(function () {
            alumnosSeleccionados.push($(this).data('id'));
        });
    
        // Lógica para cargar inasistencias de alumnos seleccionados
        if (alumnosSeleccionados.length > 0) {
            // Redirigir a lista_inasistencias.php y pasar datos por POST
            window.location.href = 'lista_inasistencias.php?alumnosSeleccionados=' + JSON.stringify(alumnosSeleccionados);
        } else {
            // No hay alumnos seleccionados, mostrar un mensaje o realizar la lógica necesaria
            alert('No se han seleccionado alumnos.');
        }
    });

    // Cargar la tabla de alumnos al cargar la página
    cargarTablaAlumnos({});
});
