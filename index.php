<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia de policia</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    

    <!-- CONTENIDO PRINCIPAL INICIO -->

    <div class="container-fluid login-container" style="padding-left: 0 !important; padding-right: 0 !important;">
      <div class="login-image"></div>
      <div class="login-form">
        <div class="card login-card">
          <div class="card-header">
            <h5 class="card-title text-center cardHeader">Ingreso</h5>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" placeholder="Ingrese su e-mail">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
              </div>
              <br>
              <br>
              <div class="text-center">
                <button type="button" id="ingresar" class="btn btn-primary">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/login_action.js"></script>
</html>