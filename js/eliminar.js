    //Eliminacion de listas
    $(document).ready(function () {
        $(".eliminar").on("click", function () {
            let id = $(this).val();
            
           $.ajax({
            method: 'POST',
            url: 'eliminar.php',
            data: {
                id: id,
            },
            success: function (data) {
                swal({
                    icon: "success",
                    text: (data),
                    })
                window.location = "dashboard.php";
            },
            });
        });
    });