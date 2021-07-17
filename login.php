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
    <?php session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['tipo'] == 1){
                header("Location: vistas/cliente/cliente-inicio.php");
            } else {
                header("Location: vistas/vendedor/vendedor-inicio.php");
            }
        }
    ?>
    <div class="container" style="max-width: 450px;">
        <p class="text-center mt-5">
            <img src="img/logo.png" alt="" width="250" style="background-color: rgba(255, 255, 255, 0.55);">
        </p>

        <div class="row bg-light mx-auto mt-5 border border-dark rounded-3 pb-3">
            <form action="controladores/ControlLogin.php" method="POST">
                <div class="col-sm-12 pt-3">
                    <h5 class="h4 text-center pb-4">Inicia sesión</h5>
                </div>

                <div class="row">
                    <div class="col-12">
                        <p class="text-danger text-center">
                            <?php
                                if(isset($_SESSION['error'])){
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                }
                            ?>
                        </p>
                    </div>
                    
                    <div class="col-12 ms-4">
                        <span>Email</span>
                    </div>
                    <div class="col-12  ms-4">
                        <input type="text" class="form-control mb-3" id="email" name="email" style="max-width: 350px;">
                    </div>
                    <div class="col-12 ms-4">
                        <span>Contraseña</span>

                    </div>
                    <div class="col-12 ms-4">
                        <input type="password" class="form-control mb-3" id="contrasena" name="contrasena" style="max-width: 350px;">
                    </div>
                </div>

                <div class="row mx-2 my-3">
                    <div class="col-7">
                        <a href="#" class="text-decoration-none">¿Olvidaste la contraseña?</a>
                    </div>
                    <div class="col-5">
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Recuerdame
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-2 mt-4 ms-3">
                        <a href="index.php"><i class="fas fa-chevron-circle-left display-6 text-dark"></i></a>
                    </div>
                    <div class="col-6 mt-4 mx-auto">
                        <button class="btn btn-dark">Iniciar Sesión</button>
                    </div>
                </div>
                <p class="text-center mt-4">
                    ¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>
                </p>
            </form>

        </div>

    </div>

    <?php include_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/40e29f2951.js" crossorigin="anonymous"></script>
</body>

</html>