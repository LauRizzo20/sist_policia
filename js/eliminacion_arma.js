$(document).ready(function () {
    $(".eliminar").on("click", function () {
        let id = $(this).val();
        
       $.ajax({
        method: 'POST',
        url: 'eliminar_arma.php',
        data: {
            id: id,
        },
        success: function (data) {
            if (data == 'exito') {
                alert('arma eliminada')
                location.reload();
            } else {
                alert(data);
            }
        },
        });
    });
});