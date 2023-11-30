$(document).ready(function () {
    $("#cargar").click(function () {
        var nroSerie = $("#nroSerie").val();
        var tipoArma = $("#tipoArma").val();
        var modeloArma = $("#modeloArma").val();
        var marcaArma = $("#marcaArma").val();

        // Enviar la solicitud AJAX
        $.ajax({
        type: "POST",
        url: "carga_arma.php", // Cambia esto al nombre de tu script PHP
        data: {nroSerie:nroSerie,
               tipoArma:tipoArma,
               modeloArma:modeloArma,
               marcaArma:marcaArma},
        success: function(data) {
            if (data == 'exito') {
                alert('arma cargada');
                location.reload();
            } else if (data == 'repetido') {
                alert('numero de serie repetido');
            }  else if (data == 'vacio') {
                alert('rellene todos los campos');
            }else {
                alert(data);
            };
        }
        });
    })
});