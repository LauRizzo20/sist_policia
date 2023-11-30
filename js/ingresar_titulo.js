$(document).ready(function () {
  // Manejar el clic en el botón de editar en la tabla
  $(".table").on("click", ".btn-primary", function () {
    // Obtener el ID del registro seleccionado
    var idRegistro = $(this).data("id");

    $("#formularioCarga").submit(function (e) {
      e.preventDefault();

      /*// Obtener los datos del formulario
      var formData = {
        id_almn: idRegistro,
        nom_analit: $("#nom_analit").val(),
        tiltulo_analit: $("#tiltulo_analit").val(),
        resolucion_analit: $("#resolucion_analit").val(),
        escuela_analit: $("#escuela_analit").val(),
        distrito_analit: $("#distrito_analit").val(),
        observaciones_analit: $("#observaciones_analit").val(),
        egreso_analit: $("#egreso_analit").val(),
      };
*/
      // Realizar la petición AJAX para cargar los datos en la base de datos
      $.ajax({
        type: "POST",
        url: "form_titulo.php", // Debes crear este archivo para manejar la inserción en la base de datos
        data: {
          id_almn: idRegistro,
          nom_analit: $("#nom_analit").val(),
          tiltulo_analit: $("#tiltulo_analit").val(),
          resolucion_analit: $("#resolucion_analit").val(),
          escuela_analit: $("#escuela_analit").val(),
          distrito_analit: $("#distrito_analit").val(),
          observaciones_analit: $("#observaciones_analit").val(),
          egreso_analit: $("#egreso_analit").val(),
        },
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            // Mostrar SweetAlert2 en caso de éxito
            Swal.fire({
              icon: "success",
              title: "¡Éxito!",
              text: "Los datos del analitico se han guardado correctamente.",
              confirmButtonText: "Aceptar",
            }).then((result) => {
              if (result.isConfirmed) {
                // Limpiar el formulario
                $("#formularioCarga")[0].reset();
              }
            });
          } else if (response.status === "repetido") {
            // Mostrar SweetAlert2 en caso de error
            Swal.fire({
              icon: "error",
              title: "Analitico ya cargado",
              text: "Eliminelo o modifiquelo desde la tabla de alumnos",
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Hubo un error al guardar los datos.",
            });
          }
        },
        error: function (error) {
          console.log("Error al enviar los datos:", error);
          // Puedes manejar el error de acuerdo a tus necesidades
        },
      });
    });
  });
});
