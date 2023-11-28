$(document).ready(function(){
    $('#crearA').click(function(){
        var nro = $("#aulaC").val();

        // Realiza la petición AJAX para agregar el profesor
        $.ajax({
        type: "POST",
        url: "carga_aula.php",  // Ajusta la URL a tu backend
        data: { nro: nro },
        success: function(data) {
            if (data == 'exito') {
                alert('aula cargada');
            } else if (data == 'repetido') {
                alert('numero de aula repetida');
            }  else if (data == 'vacio') {
                alert('campo vacio');
            }else {
                alert(data);
            };
        },
        error: function(error) {
            console.log("Error " + error);
        }
        });
    });
});