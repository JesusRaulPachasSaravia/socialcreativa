<?php
session_start();
if (isset($_SESSION['login'])){
  if(isset($_SESSION['login']['status']) && $_SESSION['login']['status']){
    header('Location:./views/');
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="16x16">
    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="32x32">

    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="./views/css/sb-admin-2.css">

    <!-- SweetAlert -->

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>

    

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="fondo">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-10 p-4 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="m-4 p-5">
                                <div class="text-center">
                                    <h2 class="text-center text-gray-900">Inicio de sesión</h2>
                                    <p>Por favor complete la información solicitada</p>
                                </div>
                                <form class="user" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nombreusuario" aria-describedby="" placeholder="Nombre de usuario o correo" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" class="form-control form-control-user password1" id="claveacceso" placeholder="Contraseña">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-fw fa-eye show-password"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

        
                                    <button type="button" id="iniciar" class="btn btn-primary btn-user btn-block">
                                        Iniciar Sesión
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="./forgot-password.php">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.php">Crea una cuenta!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="./views/vendor/jquery/jquery.min.js"></script>
    <script src="./views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="./views/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="./views/js/sb-admin-2.min.js"></script>

    
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const botonIniciarSesion = document.querySelector("#iniciar");
            const textPassword = document.querySelector("#claveacceso");

            function alertar(textoMensaje = "", titulo= "", icono=""){
                Swal.fire({
                            title   :   titulo,
                            text    :   textoMensaje,
                            icon    :   icono,
                            footer  :   'Social Creativa ONG',
                            timer   :   1200,
                            showConfirmButton: false,
                            timerProgressBar    : true
                });
            }

            function validarDatos() {
                const usuario = document.querySelector("#nombreusuario");
                const claveacceso = document.querySelector("#claveacceso");

                const parametros = new URLSearchParams();
                parametros.append("operacion", "login");
                parametros.append("emailOrUserName", usuario.value);
                parametros.append("claveacceso", claveacceso.value);

                fetch(`./controllers/usuario.controller.php`, {
                        method: 'POST',
                        body: parametros
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        if (!datos.status) {
                            alertar(datos.mensaje,"Login","warning");
                            usuario.focus();
                        } else {

                            alertar(`Bienvenido al sistema ${datos.apepaterno} ${datos.apematerno}, ${datos.nombres}`,'Login','success')

                            setTimeout(() => {

                                window.location.href = './views/';

                            }, 1300);

                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }

            textPassword.addEventListener("keypress", (evt) => {
                if (evt.charCode == 13) validarDatos();
            });

            // icono para poder interaccionar con el elemento
            showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {
        
                // elementos input de tipo password
                password1 = document.querySelector('.password1');
        
                if (password1.type === "text") {
                    password1.type = "password"
                    showPassword.classList.remove('fa-eye-slash');
                    showPassword.classList.add('fa-eye');
                } else {
                    password1.type = "text"
                    showPassword.classList.remove('fa-eye');
                    showPassword.classList.toggle("fa-eye-slash");
                }
            });

            botonIniciarSesion.addEventListener("click", validarDatos);
        });
    </script>
</body>

</html>
