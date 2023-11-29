$(document).ready(function(){
    $(document).on("click", ".baja", function(){
        let dni = $(this).attr("id");
        var razon = $("#razon").val();

        $.ajax({
        type: "POST",
        url: "baja_prof.php",  
        data: { dni: dni,
                razon: razon, 
                },
        success: function(data) {
            if (data == 'exito') {
                alert('Baja exitosa');
                location.reload();
            } else if (data == 'vacio') {
                alert('Indique la razon de la baja');
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