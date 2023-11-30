$(document).ready(function () {
    // Event handler for the "Generar PDF" button
    $('#generarPDF').click(function () {
        // Get data from #tablaAlumnos
        var tableData = [];
        // Add table headers
        var headers = ['DNI', 'Nombre', 'Apellido', 'Sexo', 'Aula', 'Inasistencias'];
        tableData.push(headers);

        $('#tablaAlumnos tbody tr').each(function () {
            var rowData = [];
            // Include the first cell (checkbox) if needed
            // rowData.push($(this).find('td:first-child').text());
            $(this).find('td:not(:first-child)').each(function () {
                rowData.push($(this).text());
            });
            tableData.push(rowData);
        });

        // Generate a timestamp for the filename
        var timestamp = new Date().toISOString().replace(/[-T:Z]/g, '');

        // Define the PDF document structure
        var docDefinition = {
            content: [
                { text: 'Inasistencias Totales', style: 'header' },
                {
                    table: {
                        headerRows: 1,
                        widths: ['auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
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
        pdfMake.createPdf(docDefinition).download('InasistenciasTotales_' + timestamp + '.pdf');


    });
});
