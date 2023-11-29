$(document).ready(function () {
    $('#enviarMateria').click(function () {
        let formData = $("#ingresoMateria").serialize();

        $.ajax({
            type: 'POST',
            url: 'ingresar_materia.php',
            data: formData,
            success: function (data) {
                if (data == "exito") {
                    swal({
                        icon: "success",
                        title: "Materia registrada",
                        timer: 1100,
                        button: false
                    }).then(function () {
                        // Refrescar la página después de cerrar la alerta
                        location.reload();
                    });
                } else if (data == "vacio") {
                    swal({
                        icon: "error",
                        text: "Rellene todos los campos.",
                        timer: 1500,
                        button: false
                    });
                } else {
                    swal({
                        icon: "error",
                        text: data,
                        button: false
                    });
                }
            },
            error: function (error) {
                alert('Error en la petición AJAX');
                console.log(error);
            },
        });
    });
});
