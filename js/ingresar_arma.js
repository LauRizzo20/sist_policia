$(document).ready(function () {
    // Manejar el envío del formulario de carga
    $(".table").on("click", ".btn-danger", function () {
      // Obtener el ID del registro seleccionado
      var idRegistro = $(this).data("id");
      console.log(idRegistro);
      $("#formularioArmaAsig").submit(function (e) {
        e.preventDefault();
  
        // Obtener los datos del formulario
        var formData = {
          id_almn: idRegistro,
          nroSerie_arma: $("#arma").val(),
        };
        // Realizar la petición AJAX para cargar los datos en la base de datos
        $.ajax({
          type: "POST",
          url: "form_arma.php", // Debes crear este archivo para manejar la inserción en la base de datos
          data: formData,
          dataType: "json",
          success: function (response) {
            if (response.status === "success") {
              // Mostrar SweetAlert2 en caso de éxito
              Swal.fire({
                icon: "success",
                title: "¡Éxito!",
                text: "Los datos del arma se asignaron correctamente.",
                confirmButtonText: "Aceptar",
              }).then((result) => {
                if (result.isConfirmed) {
                  // Limpiar el formulario
                  $("#formularioArmaAsig")[0].reset();
                }
              });
            } else if (response.status === "actualizado") {
              // Mostrar SweetAlert2 en caso de error
              Swal.fire({
                icon: "success",
                title: "Arma actualizada",
                text: "Los datos del arma se asignaron correctamente.",
              });
            } else if (response.status === "same") {
              // Mostrar SweetAlert2 en caso de error
              Swal.fire({
                icon: "error",
                title: "Misma arma",
                text: "Estas asignando la misma arma que ya esta asignada",
              });
            }else {
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