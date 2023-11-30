// Obtén la referencia de la entrada de búsqueda y la tabla
var DNI = document.getElementById("searchDni");
var Nombre = document.getElementById("searchNombre");
var table = document.getElementById("almnTable");

// Agrega un evento de entrada para la entrada de búsqueda
DNI.addEventListener("input", function() {
    // Obtén el valor de la entrada de búsqueda
    var filter = DNI.value.toUpperCase();

    // Obtén todas las filas de la tabla
    var rows = table.getElementsByTagName("tr");

    // Itera sobre las filas y muestra u oculta según el filtro
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
});

Nombre.addEventListener("input", function() {
    // Obtén el valor de la entrada de búsqueda
    var filter = Nombre.value.toUpperCase();

    // Obtén todas las filas de la tabla
    var rows = table.getElementsByTagName("tr");

    // Itera sobre las filas y muestra u oculta según el filtro
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
});