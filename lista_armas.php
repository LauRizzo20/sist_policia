<?php
include("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Administracion policia</title>
</head>
<body>
    <?php
    include("header.php");
    ?>
    <div  style="margin-left:20%">
        <div class="display-4 d-flex justify-content-center h-100 align-items-center">Administracion de armas</div>
        <br>
        <br>
        <table class="table tab-pane fade in active" id="tab">
    <thead>
        <tr>
            <th scope="col">Numero de serie</th>
            <th scope="col">Tipo</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM  `armas` WHERE 1";
    $query = mysqli_query($conn, $sql);

    while ($result = mysqli_fetch_array($query)) {
        $nserie = $result['nroSerie_arma'];
        $tipo = $result['tipo_arma'];
        $modelo = $result['modelo_arma'];
        $marca = $result['marca_arma'];

    ?>
        <tr>
            <td><input class="tabledit-input tabledit-identifier" type="hidden" name='id' value='<?php echo $nserie; ?>' disabled=""><?php echo $nserie; ?></td>
            <td><input class="tabledit-input tabledit-identifier" type="hidden" name='tipo' value='<?php echo  $tipo; ?>' disabled=""><?php echo $tipo; ?></td>
            <td><input class="tabledit-input tabledit-identifier" type="hidden" name='modelo' value='<?php echo $modelo; ?>' disabled=""><?php echo $modelo; ?></td>
            <td><input class="tabledit-input tabledit-identifier" type="hidden" name='marca' value='<?php echo $marca; ?>' disabled=""><?php echo $marca; ?></td>
        </tr>
    <?php
    };
    ?>
    </tbody>
</table>
    </div>

<script>
    $('#tab').Tabledit({
        url: 'editar_armas.php',
        columns: {
            identifier: [0, 'id'],
            editable: [
                [1, 'tipo'],
                [2, 'modelo'],
                [3, 'marca']
            ]
        },
        onDraw: function() {
            console.log('onDraw()');
        },
        onSuccess: function(data, textStatus, jqXHR) {
            /*console.log('onSuccess(data, textStatus, jqXHR)');
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);*/
            //window.location.reload();
        },
        /*onFail: function(jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onAlways: function() {
            console.log('onAlways()');
          
        },*/
        onAjax: function(action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
            //window.location.reload()
        }
    });
</script>
<script src="js/jquery.tabledit.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/sweetalert.min.js"></script>
</body>
</html>