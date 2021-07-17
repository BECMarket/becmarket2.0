<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra tu negocio</title>
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
    <div class="container"  style="max-width: 910px;" id="app">
        <p class="text-center mt-3">
            <img src="img/logo.png" alt="" width="250" style="background-color: rgba(255, 255, 255, 0.55);">
        </p>

        <!-- FORMULARIO DE REGISTRO -->
        <form @submit.prevent="guardar">
            <div class="row bg-light mx-auto mt-3 border border-dark rounded-3 pb-3">
                <div class="col-12">
                    <p class="h4 text-center pb-4 pt-4">Registra tu negocio</p>
                </div>
            
                <div class="col-sm-6 px-4">
                    <label for="nn" class="form-label">Nombre negocio</label>
                    <input type="text" required class="form-control mb-3" id="nn" style="max-width: 400px;" name="nombreNegocio" v-model="nombreNegocio">

                    <label for="tn" class="form-label">Tipo de negocio</label>
                    <select class="form-select mb-3" id="tn" style="max-width: 400px;" v-model="tipoNegocio" required>
                        <option value="supermercado">Supermercado</option>
                        <option value="panaderia">Panadería</option>
                        <option value="comida rapida">Comida rápida</option>
                        <option value="restaurante">Restaurante</option>
                    </select>

                    <label for="re" class="form-label">Rut empresa</label>
                    <input type="text" required class="form-control mb-3" id="re" style="max-width: 400px;" placeholder="Sin puntos y con guión" v-model="rutEmpresa" pattern="\d{3,8}-[\d|kK]{1}">

                    <label for="dn" class="form-label">Dirección negocio</label>
                    <input type="text" required class="form-control mb-3" id="dn" style="max-width: 400px;" placeholder="Calle #numero" v-model="direccionNegocio">

                    <label for="rd" class="form-label">Su rut</label>
                    <input type="text" required class="form-control mb-3" id="rd" style="max-width: 400px;" placeholder="Sin puntos y con guión" v-model="rut" pattern="\d{3,8}-[\d|kK]{1}">

                </div>

                <div class="col-sm-6 px-4">
                    <label for="nd" class="form-label">Nombre</label>
                    <input type="text" required class="form-control mb-3" id="nd" style="max-width: 400px;" v-model="nombre">

                    <label for="ad" class="form-label">Apellidos</label>
                    <input type="text" required class="form-control mb-3" id="ad" style="max-width: 400px;" v-model="apellidos">

                    <label for="cd" class="form-label">Celular</label>
                    <input type="text" required class="form-control mb-3" id="cd" style="max-width: 400px;" placeholder="987654321" pattern="[0-9]{9}" v-model="celular">

                    <label for="ed" class="form-label">E-mail</label>
                    <input type="email" required class="form-control mb-3" id="ed" style="max-width: 400px;" placeholder="correo@example.com" v-model="email">

                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" required class="form-control mb-3" id="pass" style="max-width: 400px;" placeholder="Debe contener de 8 a 20 caracteres" v-model="password" pattern="[A-Za-z0-9!?-]{8,12}">

                </div>

                <div class="col-12 px-3 mt-3"> 
                    <p class="text-danger text-center">{{mensaje}}</p>
                    <p class="lead text-decoration-underline text-center"> 
                        Al registrarte aceptas los Términos & Condiciones y la Política de Privacidad 
                    </p>
                </div>

                <div class="row row row-cols-2 row-cols-sm-1 row-cols-md-3">
                    <div class="col-sm-4 mt-4">
                        <a href="index.php" class="ms-5 mt-3"><i class="fas fa-chevron-circle-left display-5 text-dark"></i></a>
                    </div>
        
                    <div class="col-sm-4 mt-4">
                        <button class="btn btn-dark">REGISTRARSE</button>
                    </div>
        
                    <div class="col-sm-4 text-center mt-4 mx-auto">
                        <p class="text-center"> 
                            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <!-- FORMULARIO DE REGISTRO -->
    </div>

    <?php include_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="js/NuevoVendedor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/40e29f2951.js" crossorigin="anonymous"></script>
</body>
</html>