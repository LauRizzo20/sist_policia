 //Muestra de modal
 $(document).on("click", ".open", function() {
    // Obtén el valor del ID del botón
    let modalId = $(this).attr("id");
    
    //alert(modalId);
    // Realiza una solicitud AJAX para obtener los datos de la base de datos
   $.ajax({
        url: 'modal_edit_prof.php',
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
$(document).on("click", ".eliminar", function() {
    // Obtén el valor del ID del botón
    let modalId = $(this).attr("id");
    
    //alert(modalId);
    // Realiza una solicitud AJAX para obtener los datos de la base de datos
   $.ajax({
        url: 'modal_baja_prof.php',
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