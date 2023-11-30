$(document).ready(function () {
    $('#enviarMateria').click(function () {
        let formData = $("#ingresoMateria").serialize();

        $.ajax({
            type: 'POST',
            url: 'ingresar_materia.php',
            data: formData,
            success: function (data) {
                if (data == "exito") {
                    Swal.fire({
                        icon: "success",
                        title: "¡Éxito!",
                        text: "¡Materia registrada!",
                        confirmButtonText: "Aceptar",
                      }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                      });
                } else if (data == "vacio") {
                    Swal.fire({
                        icon: "error",
                        title: "Formulario vacio",
                        text: "Rellene todos los campos",
                      });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error,
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
