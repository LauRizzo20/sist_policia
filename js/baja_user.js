$(document).ready(function(){
    $(document).on("click", ".eliminar", function(){
        let id = $(this).attr("id");

        $.ajax({
        type: "POST",
        url: "baja_user.php",  
        data: { id: id, 
                },
        success: function(data) {
            if (data == 'exito') {
                alert('Baja exitosa');
                location.reload();
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