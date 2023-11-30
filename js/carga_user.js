$(document).ready(function(){
    $('#crear').click(function(){
        var email = $("#email").val();
        var pass = $("#pass").val();
        var prof = $("#prof").val();
        var cargo = $("#cargo").val();

        // Realiza la petición AJAX para agregar el profesor
        $.ajax({
        type: "POST",
        url: "carga_user.php",  // Ajusta la URL a tu backend
        data: { email: email, 
                pass: pass, 
                prof: prof,
            cargo: cargo},
        success: function(data) {
            if (data == 'exito') {
                alert('Usuario cargado');
                location.reload();
            } else if (data == 'repetido') {
                alert('Email o profesor repetidos');
            }  else if (data == 'vacio') {
                alert('Rellene todos los campos');
            }else {
                alert(data);
            };
        },
        error: function(error) {
            console.log("Error");
        }
        });
    });
});