$(document).ready(function () {
    $(document).on("click", ".bajaMateria", function () {
        let id = $(this).attr("id");
        let razon = $("#razon").val();

        // Realiza la petición AJAX para dar de baja la materia
        $.ajax({
            type: "POST",
            url: "baja_materia.php",
            data: {
                id: id,
                razon: razon
            },
            success: function (data) {
                if (data == 'exito') {
                    swal({
                        icon: "success",
                        title: "Baja de materia exitosa",
                        timer: 1100,
                        button: false
                    }).then(function () {
                        // Refrescar la página después de cerrar la alerta
                        location.reload();
                    });
                } else if (data == 'vacio') {
                    swal({
                        icon: "error",
                        text: "Indique la razón de la baja.",
                        timer: 1500,
                        button: false
                    });
                } else {
                    swal({
                        icon: "error",
                        text: "Error al dar de baja la materia: " + data,
                        button: false
                    });
                }
            },
            error: function (error) {
                console.log("Error en la petición AJAX");
                console.log(error);
            },
        });
    });
});
