$(document).ready(function(){
    $(document).on("click", ".editar", function(){
        let id = $(this).attr("id");
        var email = $("#email").val();
        var pass = $("#pass").val();
        var prof = $("#prof").val();
        // Realiza la petición AJAX para agregar el profesor
        $.ajax({
        type: "POST",
        url: "editar_user.php",  // Ajusta la URL a tu backend
        data: { id: id,
                email: email, 
                pass: pass, 
                prof: prof},
        success: function(data) {
            if (data == 'exito') {
                alert('Editado con exito');
                location.reload();
            } else if (data == 'repetido') {
                alert('Email o profesor repetido');
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