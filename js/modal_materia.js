// Muestra de modal
$(document).on("click", ".open", function () {
    // Obtén el valor del ID del botón
    let modalId = $(this).attr("id");
    let modalType = $(this).hasClass('editar') ? 'editar' : 'eliminar';

    $.ajax({
        url: modalType === 'editar' ? 'modal_edit_materia.php' : 'modal_baja_materia.php',
        method: 'POST',
        data: { id: modalId },
        success: function (response) {
            // Actualiza el contenido del modal con los datos obtenidos
            modalContent.innerHTML = response;
            // Muestra el modal
            $('#myModal').modal('show');
        },
        error: function (error) {
            console.error("Error");
        }
    });
});