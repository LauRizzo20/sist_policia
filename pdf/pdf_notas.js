// Function to generate PDF with given table data and filename
var headers = ['Documento', 'Nombre', 'Apellido', 'Género', 'Aula', '1er Parcial', 'Rec. 1', '2do Parcial', 'Rec. 2', 'Final', 'Conducta'];
var nombreMateria = $('#notasMateria').text();

function generatePDF(tableId, title, tableData) {
    // Add table headers
    tableData.unshift(headers); // Add headers at the beginning of the array

    // Generate a timestamp for the filename
    var timestamp = new Date().toISOString().replace(/[-T:Z]/g, '');

    // Define the PDF document structure
    var docDefinition = {
        content: [
            { text: title, style: 'header' },
            {
                table: {
                    headerRows: 1,
                    widths: Array(headers.length).fill('auto'),
                    body: tableData
                },
                style: 'tableHeader'
            }
        ],
        styles: {
            header: {
                fontSize: 18,
                bold: true,
                margin: [0, 0, 0, 10]
            },
            tableHeader: {
                bold: true,
                fillColor: '#EEEEEE'
            }
        }
    };

    // Generate and download the PDF with timestamped filename
    pdfMake.createPdf(docDefinition).download(title.replace(/\s+/g, '') + '_' + timestamp + '.pdf');
}

// Function to fetch notas data for all alumnos in the table via AJAX
function fetchNotasData() {
    var tableData = [];
    var materiaID = getParameterByName('materia'); // Function to get URL parameters

    // Iterate over each row in the table
    $('#tab tbody tr').each(function () {
        var rowData = [];

        // Iterate over each cell in the row
        $(this).find('td:not(:last-child)').each(function () {
            var cellText = $(this).text().trim();
            rowData.push(cellText);
        });

        // Fetch notas data for the alumno
        $.ajax({
            url: 'fetch_notas.php',
            type: 'POST',
            async: false, // Ensure synchronous execution to wait for the AJAX response
            data: {
                dniAlumno: rowData[0], // Assuming DNI is the first column
                materiaID: materiaID
            },
            success: function (data) {
                var notasData = JSON.parse(data);

                // Remove unnecessary properties from notasData
                delete notasData['id_mat'];
                delete notasData['dni_almn'];

                // Push the rowData (alumno data) and notasData to the tableData array
                tableData.push(rowData.concat(Object.values(notasData)));
            },
            error: function (error) {
                console.log('Error fetching notas data:', error);
            }
        });
    });

    return tableData;
}

// Function to get URL parameters
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}



// Call the function when the "Generar PDF" button is clicked
$(document).ready(function () {
    // Assuming headers is defined globally
    $('#generarPDF').click(function () {
        // Fetch notas data for all alumnos in the table
        var tableData = fetchNotasData();
        console.log(tableData);

        // Modify the parameters based on your actual table ID and title
        generatePDF('tab', nombreMateria, tableData);
    });
});
