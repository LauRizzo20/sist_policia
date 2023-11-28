   $(document).ready(function () {
        $(".eliminar").on("click", function () {
            let id = $(this).val();
            
           $.ajax({
            method: 'POST',
            url: 'eliminar_aula.php',
            data: {
                id: id,
            },
            success: function (data) {
                if (data == 'exito') {
                    alert('aula eliminada')
                    window.location = "lista_aulas.php";
                } else {
                    alert(data);
                }
            },
            });
        });
    });