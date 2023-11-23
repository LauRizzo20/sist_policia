//console.log('inicio');
$(document).ready(function () {
    //console.log('entrada');

    $('#enviar').click(function () {
      //console.log('boton');

        let formData = $("#ingresoAlmn").serialize();

      $.ajax({
        type: 'POST',
        url: 'ingresar_almn.php',
        data: formData,
        success: function (data) {
            if (data == "exito") {
                swal({
                    icon: "success",
                    title: "Alumno registrado",
                    timer: 1100,
                    button: false
                });
                window.location = 'dashboard.php';
            } else if (data == "vacio") {
                swal({
                    icon: "error",
                    text: "Rellene todos los campos.",
                    timer: 1500,
                    button: false
                });
            } else if (data == "repetido") {
                swal({
                    icon: "error",
                    text: "DNI repetido.",
                    timer: 1500,
                    button: false
                });
            }  else {
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
  