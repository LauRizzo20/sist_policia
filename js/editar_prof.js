$(document).ready(function(){
    $(document).on("click", ".editar", function(){
        let id = $(this).attr("id");
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var dni = $("#dni").val();
        var legajo = $("#legajo").val();

        // Realiza la petición AJAX para agregar el profesor
        $.ajax({
        type: "POST",
        url: "editar_prof.php",  // Ajusta la URL a tu backend
        data: { id: id,
                nombre: nombre, 
                apellido: apellido, 
                dni: dni, 
                legajo: legajo },
        success: function(data) {
            if (data == 'exito') {
                alert('Editado con exito');
                location.reload();
            } else if (data == 'repetido') {
                alert('DNI o legajo repetidos');
            }  else if (data == 'vacio') {
                alert('Rellene todos los campos');
            }else {
                alert(data);
            };
        },
        error: function(error) {
            console.log("Error al agregar profesor: " + error);
        }
        });
    });
});