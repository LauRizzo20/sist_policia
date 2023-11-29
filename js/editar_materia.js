$(document).ready(function () {
    $(document).on("click", ".editarMateria", function () {
        let id = $(this).attr("id");
        let nombre = $("#nombre").val();
        let cargaHoraria = $("#cargaHoraria").val();
        let curricula = $("#curricula").val();

        // Realiza la petición AJAX para editar la materia
        $.ajax({
            type: "POST",
            url: "editar_materia.php",
            data: {
                id: id,
                nombre: nombre,
                cargaHoraria: cargaHoraria,
                curricula: curricula
            },
            success: function (data) {
                if (data == 'exito') {
                    swal({
                        icon: "success",
                        title: "Materia editada con éxito",
                        timer: 1100,
                        button: false
                    }).then(function () {
                        // Refrescar la página después de cerrar la alerta
                        location.reload();
                    });
                } else if (data == 'vacio') {
                    swal({
                        icon: "error",
                        text: "Rellene todos los campos.",
                        timer: 1500,
                        button: false
                    });
                } else if (data == 'repetido') {
                    swal({
                        icon: "error",
                        text: "Error: Nombre de materia repetido.",
                        timer: 1500,
                        button: false
                    });
                } else {
                    swal({
                        icon: "error",
                        text: "Error al editar la materia: " + data,
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
