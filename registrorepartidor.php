<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>
<body style="background-image: url(img/fondo.jpg);">
    <div class="container" style="max-width: 910px;">
        <p class="text-center mt-3">
            <img src="img/logo.png" alt="" width="250" style="background-color: rgba(255, 255, 255, 0.55);">
        </p>
        
        <div class="row bg-light mx-auto mt-4 border border-dark rounded-3 pb-3">
            <div class="col-12 pt-3">
                <h5 class="h4 text-center pb-4">Registrate</h5>
            </div>
                

            <div class="col-sm-6 px-4">
                <label for="inputrr" class="form-label">Cedula de identidad (RUT)</label>
                <input type="text" class="form-control mb-3" id="rr" style="max-width: 400px;" placeholder="11.111.111-1">

                <label for="inputnombre" class="form-label">Nombre</label>
                <input type="text" class="form-control mb-3" id="inputnombre" style="max-width: 400px;">

                <label for="inputape" class="form-label">Apellidos</label>
                <input type="text" class="form-control mb-3" id="inputape" style="max-width: 400px;">

                <label for="inputemail" class="form-label">Email</label>
                <input type="text" class="form-control mb-3" id="inputemail" style="max-width: 400px;" placeholder="correo@example.com">

            </div>
            <div class="col-sm-6 px-4">

                <label for="inputcelu" class="form-label">Celular</label>
                <input type="text" class="form-control mb-3" id="inputcelu" style="max-width: 400px;" placeholder="+56987654321">

                <label for="inputdir" class="form-label">Dirección</label>
                <input type="text" class="form-control mb-3" id="inputdir" style="max-width: 400px;" placeholder="Calle #numero">

                <label for="inputpw" class="form-label">Contraseña</label>
                <input type="password" class="form-control mb-3" id="inputpw" style="max-width: 400px;" placeholder="Debe contener de 8 a 20 caracteres">
                    
                <br>
                <p class="lead text-decoration-underline text-center"> 
                    Al registrarte aceptas los Términos & Condiciones y la Política de Privacidad 
                </p>
            </div>
    
            <div class="row row row-cols-2 row-cols-sm-1 row-cols-md-3">
                <div class="col-sm-4 mt-4">
                    <a href="index.php" class="ms-5 mt-3"><i class="fas fa-chevron-circle-left display-6 text-dark"></i></a>
                </div>
        
                <div class="col-sm-4 mt-4">
                    <button type="button" class="btn btn-dark">REGISTRARSE</button>
                </div>
        
                <div class="col-sm-4 text-center mt-4 mx-auto">
                    <p class="text-center"> 
                        ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>

                

        </div>

    </div>
    
    <?php include_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/40e29f2951.js" crossorigin="anonymous"></script>
</body>
</html>