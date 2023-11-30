$(document).ready(function () {
    $(document).on("click", ".editar", function () {

        var id = $(this).attr("id");
        var nroSerie = $("#serie").val();
        var tipoArma = $("#tipo").val();
        var modeloArma = $("#modelo").val();
        var marcaArma = $("#marca").val();
        alert(nroSerie);
        
        $.ajax({
        type: "POST",
        url: "editar_arma.php", 
        data: {id: id,
               nroSerie:nroSerie,
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