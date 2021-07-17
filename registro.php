<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'header.php' ?>
    <title>Registrarse | BEC Market</title>
</head>

<body>
    <?php session_start();
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['tipo'] == 1) {
            header("Location: vistas/cliente/cliente-inicio.php");
        } else {
            header("Location: vistas/vendedor/vendedor-inicio.php");
        }
    }
    ?>
    <div class="container" style="max-width: 910px;" id="app">
        <h2 class="display-5 text-center pt-5">BEC Market</h2>

        <form @submit.prevent="guardar">
            <div class="row bg-light mx-auto mt-5 border border-dark rounded-3 pb-3">
                <div class="col-12 pt-3">
                    <h5 class="h4 text-center pb-4">Registrate</h5>
                </div>

                <div class="col-sm-6 px-4">
                    <label for="inputnombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control mb-3" id="inputnombre" style="max-width: 400px;" v-model="nombre" required>

                    <label for="inputape" class="form-label">Apellidos</label>
                    <input type="text" class="form-control mb-3" id="inputape" style="max-width: 400px;" v-model="apellidos" required>

                    <label for="inputdir" class="form-label">Dirección</label>
                    <input type="text" class="form-control mb-3" id="inputdir" style="max-width: 400px;" placeholder="Calle #numero" v-model="direccion" required>
                </div>

                <div class="col-sm-6 px-4">
                    <label for="inputcelu" class="form-label">Celular</label>
                    <input type="text" class="form-control mb-3" id="inputcelu" style="max-width: 400px;" placeholder="+56987654321" v-model="telefono" required>

                    <label for="inputemail" class="form-label">Email</label>
                    <input type="text" class="form-control mb-3" id="inputemail" style="max-width: 400px;" placeholder="correo@example.com" v-model="email" required>

                    <label for="inputpw" class="form-label">Contraseña</label>
                    <input type="password" class="form-control mb-3" id="inputpw" style="max-width: 400px;" placeholder="Debe contener de 8 a 20 caracteres" v-model="contrasena" pattern="[A-Za-z0-9!?-]{8,12}" required>
                </div>

                <div class="col-12 px-3 mt-3">
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
                        <?php
                        if (isset($_SESSION['respuesta'])) {
                            echo $_SESSION['respuesta'];
                        }
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        }
                        ?>
                    </div>
                    <div class="col-sm-4 text-center mt-4 mx-auto">
                        <p class="text-center">
                            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="js/NuevoComprador.js"></script>

</body>

</html>