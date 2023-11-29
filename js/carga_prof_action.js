$(document).ready(function(){
    $('#cargar').click(function(){
        var nombre = $("#nombreProf").val();
        var apellido = $("#apellidoProf").val();
        var dni = $("#dniProf").val();
        var legajo = $("#legajoProf").val();

        // Realiza la petición AJAX para agregar el profesor
        $.ajax({
        type: "POST",
        url: "carga_prof_action.php",  // Ajusta la URL a tu backend
        data: { nombre: nombre, 
                apellido: apellido, 
                dni: dni, 
                legajo: legajo },
        success: function(data) {
            if (data == 'exito') {
                alert('Profesor cargado');
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