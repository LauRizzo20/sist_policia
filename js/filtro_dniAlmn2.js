// Obtén la referencia de la entrada de búsqueda y la tabla
var DNI = document.getElementById("searchDni");
var Nombre = document.getElementById("searchNombre");
var table0 = document.getElementById("tabla0");
var table1 = document.getElementById("tabla1");
var table2 = document.getElementById("tabla2");
var table3 = document.getElementById("tabla3");
var table4 = document.getElementById("tabla4");

// Agrega un evento de entrada para la entrada de búsqueda
DNI.addEventListener("input", function() {
    // Obtén el valor de la entrada de búsqueda
    var filter = DNI.value.toUpperCase();

    // Obtén todas las filas de la tabla
    var rows0 = table0.getElementsByTagName("tr");
    var rows1 = table1.getElementsByTagName("tr");
    var rows2 = table2.getElementsByTagName("tr");
    var rows3 = table3.getElementsByTagName("tr");
    var rows4 = table4.getElementsByTagName("tr");

    // Itera sobre las filas y muestra u oculta según el filtro
    for (var i = 0; i < rows0.length; i++) {
        var cells = rows0[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows0[i].style.display = "";
            } else {
                rows0[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows1.length; i++) {
        var cells = rows1[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows1[i].style.display = "";
            } else {
                rows1[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows2.length; i++) {
        var cells = rows2[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows2[i].style.display = "";
            } else {
                rows2[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows3.length; i++) {
        var cells = rows3[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows3[i].style.display = "";
            } else {
                rows3[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows4.length; i++) {
        var cells = rows4[i].getElementsByTagName("td")[0]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows4[i].style.display = "";
            } else {
                rows4[i].style.display = "none";
            }
        }
    }
});

Nombre.addEventListener("input", function() {
    // Obtén el valor de la entrada de búsqueda
    var filter = Nombre.value.toUpperCase();

    // Obtén todas las filas de la tabla
    var rows0 = table0.getElementsByTagName("tr");
    var rows1 = table1.getElementsByTagName("tr");
    var rows2 = table2.getElementsByTagName("tr");
    var rows3 = table3.getElementsByTagName("tr");
    var rows4 = table4.getElementsByTagName("tr");

    // Itera sobre las filas y muestra u oculta según el filtro
    for (var i = 0; i < rows0.length; i++) {
        var cells = rows0[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows0[i].style.display = "";
            } else {
                rows0[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows1.length; i++) {
        var cells = rows1[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows1[i].style.display = "";
            } else {
                rows1[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows2.length; i++) {
        var cells = rows2[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows2[i].style.display = "";
            } else {
                rows2[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows3.length; i++) {
        var cells = rows3[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows3[i].style.display = "";
            } else {
                rows3[i].style.display = "none";
            }
        }
    }
    for (var i = 0; i < rows4.length; i++) {
        var cells = rows4[i].getElementsByTagName("td")[1]; // Ajusta el índice según la columna que deseas filtrar
        if (cells) {
            var textValue = cells.textContent || cells.innerText;
            if (textValue.toUpperCase().indexOf(filter) > -1) {
                rows4[i].style.display = "";
            } else {
                rows4[i].style.display = "none";
            }
        }
    }
});