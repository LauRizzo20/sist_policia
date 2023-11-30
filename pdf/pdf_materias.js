// Function to generate PDF with given table data and filename
function generatePDF(tableId, title) {
    var tableData = [];
    // Add table headers
    var headers = ['N° Materia', 'Nombre', 'Carga Horaria',	'Currícula'];
    tableData.push(headers);

    $('#' + tableId + ' tbody tr').each(function () {
        var rowData = [];
        $(this).find('td:not(:last-child, :last-child)').each(function () {
            rowData.push($(this).text().trim()); // Trim the text to remove leading/trailing whitespaces
        });

        // Filter out unwanted elements
        rowData = rowData.filter(function (element) {
            return element !== 'Editar'; // Exclude "Editar" button text
        });

        tableData.push(rowData);
    });

    console.log(tableData);

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

// Call the function when the "Generar PDF" button is clicked
$(document).ready(function () {
    $('#generarPDF').click(function () {
        generatePDF('tab', 'Lista de Materias');
    });
});
