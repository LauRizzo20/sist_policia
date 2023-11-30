
function enviarFormulario() {
  console.log("AAA");
  // Obtener los datos del formulario
  var formData = {
    dni: $("#dni").val(),
    nombre: $("#nombre").val(),
    apellido: $("#apellido").val(),
    aula: $("#aula").val(),
    condicion: $("#condicion").val()
  };

  // Realizar la petición AJAX
  $.ajax({
    type: "POST",
    url: "./ingresar_almn.php", // Debes cambiar esto al archivo PHP que maneje el guardado en la base de datos
    data: formData,
    dataType: "json",
    success: function(response) {
      if (response.status === "success") {
          // Mostrar SweetAlert2 en caso de éxito
          Swal.fire({
              icon: 'success',
              title: '¡Éxito!',
              text: 'Los datos se han guardado correctamente.',
              confirmButtonText: 'Recargar',
          }).then((result) => {
              if (result.isConfirmed) {
                  // Si el usuario confirma, recargar la página
                  location.reload();
              }
          });
      } else if(response.status === "repetido"){
          // Mostrar SweetAlert2 en caso de error
          Swal.fire({
              icon: 'error',
              title: 'Alumno ya existente',
              text: 'Este alumno ya esta ingresado en la base de datos',
          });
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Hubo un error al guardar los datos.',
      });
      }
    },
    error: function(error) {
      console.log("Error al enviar los datos:", error);
      // Puedes manejar el error de acuerdo a tus necesidades
    }
  });
}
/*
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
  */