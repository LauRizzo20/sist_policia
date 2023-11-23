//console.log('entrada');
$(document).ready(function(){
    //console.log('seguida');

    $('#ingresar').click(function(){
        //console.log('boton');

        let email = $('#email').val();
        let pass = $('#password').val();

        if (email == '' || pass == '') {
            swal({
                icon: "error",
                text: 'Rellene todos los campos',
                });
            return false;
        };

        $.ajax({
            method: 'POST',
            url: 'login_action.php',
            data: {
                email: email,
                pass: pass,
            },
            success: function (data) {
                if (data == 'exito') {
                    swal({
                        icon: "success",
                        text: 'Bienvenido',
                        })
                    window.location = "dashboard.php";
                } else if (data == 'error') {
                    swal({
                        icon: "error",
                        text: 'Email o contraseña erroneos',
                        })

                }
                }
        });
    });
});