<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadatos -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="16x16">
    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="32x32">

    <title>Restablecer mi contraseña</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./views/css/sb-admin-2.css">
    
    <!-- SweetAlert -->

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Fuentes personalizadas -->
    <script src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>

    <!-- Fuentes de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>

<body class="fondo">
    <div class="container mt-5">
        <!-- Fila externa -->
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Fila anidada dentro del cuerpo de la tarjeta -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, esas cosas pasan. Sólo tienes que introducir tu dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña!</p>
                                    </div>
                                    <form class="user" id="form-idusuario">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <!-- Campo de entrada de texto para el usuario -->
                                                <input type="text" class="form-control" id="user" placeholder="Ingrese correo o nombre de usuario" autofocus>
                                                <div class="input-group-append">
                                                    <!-- Botones para buscar y reiniciar -->
                                                    <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
                                                    <button type="reset" class="btn btn-primary" id="reiniciar">Reiniciar</button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <!-- Campo de entrada de texto para mostrar los datos del usuario -->
                                                <input type="email" class="form-control" id="datosusuario" placeholder="Datos del usuario" readonly="true">
                                            </div>
                                            <div class="mb-3">
                                                <!-- Campo de entrada de texto para mostrar el correo electrónico del usuario -->
                                                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" readonly="true">
                                            </div>
                                        </div>
                                        <div class="row w-100 align-items-center">
                                            <!-- Botón para enviar el mensaje de restauración -->
                                            <div class="col text-center">
                                                <button class="btn btn-outline-primary text-end" type="button" id="enviar">Enviar mensaje de restauración</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- Enlace para crear una cuenta -->
                                        <a class="small" href="register.php">¡Crea una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <!-- Enlace para iniciar sesión si ya se tiene una cuenta -->
                                        <a class="small" href="./index.php">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-validacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="titleModal">Validar código</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" autocomplete="off" id="form-clave">
                    <div class="form-group mb-4">
                        <input type="tel" style="font-size: 2em;" maxlength="4" class="form-control text-center" id="clave" placeholder="Escriba el codigo">
                    </div>
                    <div id="inputs-clave" class="d-none">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-user password1" id="clave1" placeholder="Escriba su nueva contraseña">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-fw fa-eye show-password"></i>
                                </span>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-user password2" id="clave2" placeholder="Vuelva a escribir su nueva contraseña">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-fw fa-eye show-password2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-primary" id="comprobar">Comprobar</button>
                <button type="button" class="btn btn-sm btn-primary d-none" id="actualizar">Actualizar clave</button>
            </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

    <!-- Bibliotecas de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Scripts personalizados para todas las páginas -->
    <script src="./views/js/sb-admin-2.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            
            let idusuario = -1;
            let codigoCorreo = -1;

            function alertar(textoMensaje = "", titulo= "", icono=""){
                Swal.fire({
                    title   :   titulo,
                    text    :   textoMensaje,
                    icon    :   icono,
                    footer  :   'Social Creativa ONG',
                    timer   :   1500,
                    showConfirmButton: false,
                    timerProgressBar    : true
                });
            }

            function alertarToast(titulo = "",textoMensaje = "", icono = ""){
                Swal.fire({
                    title   : titulo,
                    text    : textoMensaje,
                    icon    : icono,
                    toast   : true,
                    position : 'bottom-end',
                    showConfirmButton   : false,
                    timer   : 5500,
                    timerProgressBar    : true
                });
            }

            function buscador() {
                let usuario = document.querySelector("#user").value;
                const parametros = new URLSearchParams();
                parametros.append("operacion", "getUsuarios")
                parametros.append("user", usuario)

                fetch(`./controllers/usuario.controller.php`, {
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.text())
                .then(datos => {
                    if (datos != "") {
                        const registro = JSON.parse(datos);

                        idusuario = registro.idusuario;
                        let datosusuario = document.querySelector("#datosusuario");
                        let email = document.querySelector("#email");
                        // Mostrar los datos del usuario y el correo electrónico en los campos correspondientes
                        datosusuario.value = `${registro.apellidos} ${registro.nombres}`
                        email.value = registro.email
                    }else{
                        let idusuario = -1;
                        alertar("Error","No se encontro al usuario","error")
                        datosusuario.value = '';
                        email.value = '';
                    }
                })
            }

            
            function generarEnviarCodigo(){
                const parametros = new URLSearchParams();
                parametros.append("operacion","enviarCorreo");
                parametros.append("email", document.querySelector("#email").value);
                parametros.append("idusuario", idusuario);
                fetch("./controllers/usuario.controller.php",{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos => {

                    if(codigoCorreo < 0){
                        alertarToast("Correo","Se envio un codigo a su correo","info")
                        codigoCorreo = 1
                    }else if(codigoCorreo > 0){
                        alertarToast("Correo","El codigo ya esta en su correo","info")
                    }

                    console.log(datos);
                }).catch(error => {
                    console.log(error);
          });
            }

            function validarClave(){
                const parametros = new URLSearchParams();
                parametros.append("operacion","validarCodigo");
                parametros.append("idusuario",idusuario);
                parametros.append("codigodesbloqueo",document.querySelector("#clave").value)

                fetch("./controllers/desbloqueo.controller.php",{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos =>{

                    // Analizando los datos
                    console.log(datos)
                    if(datos.status == "PERMITIDO"){
                        document.querySelector("#inputs-clave").classList.remove("d-none")
                        document.querySelector("#comprobar").classList.add("d-none")
                        document.querySelector("#actualizar").classList.remove("d-none")
                    }else{
                        alertar("Error","Codigo incorrecto, revise su correo","error")
                        document.querySelector("#inputs-clave").classList.add("d-none");
                        document.querySelector("#comprobar").classList.remove("d-none")
                        document.querySelector("#actualizar").classList.add("d-none")
                    }
                })
            }

            function actualizarClave(){
                const clave1 = document.querySelector("#clave1").value;
                const clave2 = document.querySelector("#clave2").value;

                if(clave1 != "" && clave2 != ""){

                    if(clave1 !== clave2){
                        alertar("Error","Las contraseñas no coinciden, verifique por favor","error");
                    }

                    else if(clave1 == clave2){
                        const parametros = new URLSearchParams();
                        parametros.append("operacion","actualizarClave");
                        parametros.append("idusuario",idusuario);
                        parametros.append("claveacceso",clave1);

                        fetch(`./controllers/desbloqueo.controller.php`,{
                            method : 'POST',
                            body: parametros
                        })
                        .then(respuesta => respuesta.json())
                        .then(datos => {
                            if(datos.status){
                                alertar("Usuario","Se ha actualizado su contraseña","info");
                                setTimeout(() => {
                                    window.location.href= './index.php';
                                }, "1600");
                            }
                        })

                    }

                }

            }

            $('#modal-validacion').on('shown.bs.modal', function () {
                document.querySelector("#clave").focus();
            })

            $('#modal-validacion').on('hidden.bs.modal', function () {
                document.querySelector("#form-clave").reset();
                //  var input = document.querySelector("#clave");
                //  input.disabled = true
                // document.querySelector("#form-idusuario").reset();
                document.querySelector("#inputs-clave").classList.add("d-none");
                document.querySelector("#comprobar").classList.remove("d-none")
                document.querySelector("#actualizar").classList.add("d-none")
            })
            
            document.querySelector("#enviar").addEventListener("click",()=>{
                if(idusuario != -1){
                    generarEnviarCodigo();
                    $("#modal-validacion").modal('show');
                }else{
                    alert("Debe buscar el nombre de usuario")
                }
            });
            
            
            var filtroclave = document.querySelector("#clave");
            
            filtroclave.addEventListener("input",function(event){
                
                var valor = event.target.value;
                
                var nuevoValor = valor.replace(/[^0-9]/g, "")
                
                event.target.value = nuevoValor;
                
            })
            
            // Manejar el evento de hacer clic en el botón de búsqueda
            document.querySelector("#comprobar").addEventListener("click", validarClave)
            document.querySelector("#buscar").addEventListener("click", buscador)
            document.querySelector("#actualizar").addEventListener("click", actualizarClave)

            // Manejar el evento de presionar la tecla Enter en el campo de entrada de texto del usuario
            document.querySelector("#user").addEventListener("keypress", (key) => {
                if (key.keyCode == "13") {
                    buscador()
                }
            });

            document.querySelector("#clave").addEventListener("keypress", (key) => {
                if (key.keyCode == "13") {
                    validarClave()
                }
            });


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

            showPassword2 = document.querySelector('.show-password2');
            showPassword2.addEventListener('click', () => {
        
                // elementos input de tipo password
                password2 = document.querySelector('.password2');
        
                if (password2.type === "text") {
                    password2.type = "password"
                    showPassword2.classList.remove('fa-eye-slash');
                    showPassword2.classList.add('fa-eye');
                } else {
                    password2.type = "text"
                    showPassword2.classList.remove('fa-eye');
                    showPassword2.classList.toggle("fa-eye-slash");
                }
                

            });


        });
    </script>
</body>
</html>
