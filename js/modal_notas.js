$(document).ready(function () {
    $('.verNotas').click(function () {
        var dniAlumno = $(this).data('id');
        $('#guardarCambios').attr('data-id', dniAlumno);

        $.ajax({
            type: 'POST',
            url: 'cargar_notas.php',
            data: {
                dniAlumno: dniAlumno,
                idMat: idMat
            },
            dataType: 'json',
            success: function (response) {
    // Clear the table before adding new rows
    $('#tablaNotas').empty();

    // Iterate over the array of notes and build HTML rows
    $.each(response, function (i, nota) {
        var row = '<tr>' +
            '<td class="tipoNota">' + nota.tipo_nota + '</td>' +
            '<td>' + nota.fecha_nota + '</td>';
    
        // Dynamically create input elements based on nota values
        if (nota.num_nota !== "") {
            row += '<td><input type="text" class="form-control inputNota" name="numNota[]" placeholder="Número de Nota" value="' + nota.num_nota + '"></td>';
        } else {
            row += '<td><input type="text" class="form-control inputNota" name="numNota[]" placeholder="Número de Nota"></td>';
        }
    
        if (nota.comentario_nota !== "") {
            row += '<td><input type="text" class="form-control inputComentario" name="comentario[]" placeholder="Comentario" value="' + nota.comentario_nota + '"></td>';
        } else {
            row += '<td><input type="text" class="form-control inputComentario" name="comentario[]" placeholder="Comentario"></td>';
        }
    
        row += '</tr>';
    
        // Add the row to the table
        $('#tablaNotas').append(row);
    });

    // Open the modal
    $('#modalNotas').modal('show');
},
        });
    });

    // Lógica para guardar los cambios en las notas
    $("#guardarCambios").click(function () {
        var dniAlumno = $(this).data('id');
        // Recorremos las filas de la tabla para obtener las notas ingresadas
        $("#tablaNotas tr").each(function () {
            var tipoNota = $(this).find(".tipoNota").text();
            var inputNota = $(this).find(".inputNota").val();
            var inputComentario = $(this).find(".inputComentario").val();

            // Verificamos si hay una nota ingresada
            if (inputNota !== "") {
                // Hacemos la solicitud AJAX para insertar o actualizar la nota
                $.ajax({
                    type: "POST",
                    url: "guardar_notas.php",
                    data: {
                        dniAlumno: dniAlumno, 
                        idMat: idMat,  // Add this line to pass id_mat
                        tipoNota: tipoNota,
                        inputNota: inputNota,
                        inputComentario: inputComentario
                    },
                    success: function (response) {

                    },
                    error: function () {
                        // Puedes mostrar una alerta de éxito si lo deseas
                        alert("Cambios guardados exitosamente.");
                    },
                    error: function () {
                        alert("Error al guardar los cambios.");
                    }
                });
            }
        });
        // Cerramos el modal de notas después de guardar cambios
        $("#modalNotas").modal("hide");
    });
});
