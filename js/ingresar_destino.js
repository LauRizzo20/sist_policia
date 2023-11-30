$(document).ready(function () {
    // Manejar el envío del formulario de carga
    $(".table").on("click", ".btn-info", function () {
      // Obtener el ID del registro seleccionado
      var idRegistro = $(this).data("id");
      console.log(idRegistro);
      $("#formularioCargaDestino").submit(function (e) {
        e.preventDefault();
  
        // Obtener los datos del formulario
        var formData = {
            id_almn: idRegistro,
            domicilio: $("#domicilio").val(),
            localidad: $("#localidad").val(),
            cp: $("#cp").val(),
            comisaria: $("#comisaria").val(),
            destino: $("#destino").val(),
            telefono_dest: $("#telefono_dest").val()
        };
        // Realizar la petición AJAX para cargar los datos en la base de datos
        $.ajax({
          type: "POST",
          url: "form_destino.php", // Debes crear este archivo para manejar la inserción en la base de datos
          data: formData,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              // Mostrar SweetAlert2 en caso de éxito
              Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Los datos de destino se han guardado correctamente.",
                confirmButtonText: "Aceptar",
              }).then((result) => {
                if (result.isConfirmed) {
                  // Limpiar el formulario
                  $("#formularioCargaDestino")[0].reset();
                }
              });
            } else if (response.status === "repetido") {
              // Mostrar SweetAlert2 en caso de error
              Swal.fire({
                icon: "error",
                title: "Destino ya cargado",
                text: "Eliminelo o modifiquelo desde la tabla de alumnos",
              });
              $("#formularioCarga")[0].reset();
            } else {
              Swal.fire({
                icon: "error",
                title: "Error",
                text: "Hubo un error al guardar los datos.",
              });
              $("#formularioCarga")[0].reset();
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