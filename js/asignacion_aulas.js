$(document).ready(function(){
    $("#cargar").click(function(){
        
            var idAula = $('#aula').val();
            var idMateria = $('#materia').val();
            var idProfesor = $('#prof').val();
            var cuatrimestre = $('#cuatrimestre').val();
        
            $.ajax({
                type: 'POST',
                url: 'asignacion_aulas.php', // Ajusta la URL según tu estructura de archivos
                data: {
                    idAula: idAula,
                    idMateria: idMateria,
                    idProfesor: idProfesor,
                    cuatrimestre: cuatrimestre
                },
                success: function (data) {
                    if (data == 'exito') {
                        alert('Asignación guardada con éxito');
                        window.location='lista_aulas.php';
                    } else {
                        alert(data);
                    };
                },
                error: function (error) {
                    // Manejar errores
                    alert('Error al guardar la asignación');
                }
            });
        
        
    });
});