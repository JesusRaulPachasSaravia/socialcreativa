<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadatos -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="16x16">
    <link rel="icon" type="image/png" href="./favicon/favicon-32x32.png" sizes="32x32">

    <title>Registrar</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="./views/css/sb-admin-2.css">

    <!-- SweetAlert -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Fuentes personalizadas -->
    <script src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>

    <!-- Fuentes de Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="fondo">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h2 class="text-center text-gray-900">Registrar cuenta</h2>
                                <p>Por favor complete la información solicitada</p>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <!-- Tipo de documento -->
                                    <div class="form-group col-sm-7 mb-3 mb-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <h6 class="input-group-text">Tipo de documento</h6>
                                            </div>
                                            <select class="custom-select" name="" id="tipodocumento">
                                                <option value="0">Seleccione</option>
                                                <option value="DNI">DNI</option>
                                                <option value="CE">CE</option>
                                                <option value="CI">CI</option>
                                                <option value="PTP">PTP</option>
                                                <option value="CPP">CPP</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Número de documento -->
                                    <div class="col-sm-5 mb-3 mb-sm-3">
                                        <input type="text" class="form-control form-control-user"
                                            id="nrodocumento" maxlength="10" placeholder="Nro Documento">
                                    </div>

                                    <!-- Nombres -->
                                    <div class="col-sm-12 mb-3 mb-sm-3">
                                        <input type="text" class="form-control form-control-user" id="nombres"
                                            placeholder="Nombres">
                                    </div>

                                    <!-- Apellido paterno -->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apepat"
                                            placeholder="Apellido paterno">
                                    </div>

                                    <!-- Apellido materno -->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apemat"
                                            placeholder="Apellido materno">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <!-- Direccion -->
                                    <div class="col-sm-12 mb-3 mb-sm-3">
                                        <input type="text" class="form-control form-control-user" id="direccion"
                                            placeholder="Direccion">
                                    </div>                                        

                                    <!-- Correo -->
                                    <div class="col-sm-6 mb-3 mb-sm-3">
                                        <input type="email" class="form-control form-control-user" id="correo"
                                            placeholder="Correo">
                                    </div>

                                    <!-- Número de teléfono -->
                                    <div class="col-sm-6 mb-3 mb-sm-3">
                                        <input type="telf" class="form-control form-control-user" id="telefono"
                                            placeholder="Nro de telefono">
                                    </div>

                                    <!-- Fecha de nacimiento -->
                                    <div class="form-group col-sm-7 mb-3 mb-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <h6 class="input-group-text">Fecha de nacimiento</h6>
                                            </div>
                                            <input type="date" class="form-control form-control-user"
                                                id="fechanac">
                                        </div>
                                    </div>

                                    <!-- Nombre de usuario -->
                                    <div class="col-sm-5 mb-3 mb-sm-3">
                                        <input type="text" class="form-control form-control-user"
                                            id="usuario" placeholder="Nombre de usuario">
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="col-sm-6 mb-3 mb-sm-3">
                                        <input type="password" class="form-control form-control-user"
                                            id="clave1" placeholder="Contraseña">
                                    </div>

                                    <!-- Repetir contraseña -->
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="clave2" placeholder="Repetir contraseña">
                                    </div>
                                </div>
                                <button type="button" id="registrar" class="btn btn-primary btn-user btn-block">
                                    Registrarme
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
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

    <!-- SweetAlert -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

    <script>

        document.addEventListener("DOMContentLoaded", () => {
        
            let tipodocumento = document.querySelector("#tipodocumento");
            let nrodocumento = document.querySelector("#nrodocumento");
            let nombres = document.querySelector("#nombres");
            let apepat = document.querySelector("#apepat");
            let apemat = document.querySelector("#apemat");
            let direccion = document.querySelector("#direccion");
            let correo = document.querySelector("#correo");
            let telefono = document.querySelector("#telefono");
            let fechanac = document.querySelector("#fechanac");
            let usuario = document.querySelector("#usuario");
            let clave1 = document.querySelector("#clave1");
            let clave2 = document.querySelector("#clave2");
            let registrar = document.querySelector("#registrar");

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

            nrodocumento.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
            })

            telefono.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
            })



            function validarCampo(campo, mensaje) {
                if (campo.value === "" || campo.value  === "0") {
                    alertar(mensaje, "Registrar", "warning");
                    return false;
                }
                return true;
            }

            function validarContraseñas(clave1, clave2) {
                if (clave1.value !== clave2.value) {
                    alertar("Las contraseñas no coinciden", "Registrar", "warning");
                    return false;
                }
            return true;
            }

            function validarDNI() {
                const validarDNI = new URLSearchParams();
                validarDNI.append("operacion", "verificarDNI");
                validarDNI.append("dni", nrodocumento.value);

                return fetch(`./controllers/verificar.controller.php`, {
                    method: 'POST',
                    body: validarDNI
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                if (datos.status === "denegar") {
                    alertar("El número de documento ya está registrado", "Registrar", "warning");
                    return false;
                }
                return true;
                });
            }

            function validarCorreo() {
                const validarCorreo = new URLSearchParams();
                validarCorreo.append("operacion", "verificarCorreo");
                validarCorreo.append("correo", correo.value);

                return fetch(`./controllers/verificar.controller.php`, {
                    method: 'POST',
                    body: validarCorreo
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                if (datos.status === "denegar") {
                    alertar("El correo ya está registrado", "Registrar", "warning");
                    return false;
                }
                return true;
                });
            }

            function validarTelefono() {
                const validarTelefono = new URLSearchParams();
                validarTelefono.append("operacion", "verificarTelefono");
                validarTelefono.append("telefono", telefono.value);

                return fetch(`./controllers/verificar.controller.php`, {
                    method: 'POST',
                    body: validarTelefono
                })
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                    if (datos.status === "denegar") {
                        alertar("El teléfono ya está registrado", "Registrar", "warning");
                        return false;
                    }
                    return true;
                    });
            }

            function validarUsuario() {
                const validarUsuario = new URLSearchParams();
                validarUsuario.append("operacion", "verificarUsuario");
                validarUsuario.append("usuario", usuario.value);

                return fetch(`./controllers/verificar.controller.php`, {
                    method: 'POST',
                    body: validarUsuario
                })
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                    if (datos.status === "denegar") {
                        alertar("El usuario ya está registrado", "Registrar", "warning");
                        return false;
                    }
                    return true;
                });
            }

            async function registrarme() {
                const campos = [
                    { campo: tipodocumento, mensaje: "Seleccione un tipo de documento válido" },
                    { campo: nrodocumento, mensaje: "El número de documento no puede estar vacío" },
                    { campo: nombres, mensaje: "Los nombres no pueden estar vacíos" },
                    { campo: apepat, mensaje: "El apellido paterno no puede estar vacío" },
                    { campo: apemat, mensaje: "El apellido materno no puede estar vacío" },
                    { campo: direccion, mensaje: "La dirección no puede estar vacía" },
                    { campo: correo, mensaje: "El correo no puede estar vacío" },
                    { campo: fechanac, mensaje: "La fecha de nacimiento no puede estar vacía" },
                    { campo: usuario, mensaje: "El usuario no puede estar vacío" },
                    { campo: clave1, mensaje: "La contraseña no puede estar vacía" },
                    { campo: clave2, mensaje: "La contraseña repetida no puede estar vacía" }
                ];

                // Validar campos
                for (const campoInfo of campos) {
                    if (!validarCampo(campoInfo.campo, campoInfo.mensaje)) {
                    return;
                    }
                }

                // Validar contraseñas
                if (!validarContraseñas(clave1, clave2)) {
                    return;
                }else {
                    try {
                    const esValidoDNI = await validarDNI();
                    const esValidoCorreo = await validarCorreo();
                    const esValidoTelefono = await validarTelefono();
                    const esValidoUsuario = await validarUsuario();

                    if (esValidoDNI && esValidoCorreo && esValidoTelefono && esValidoUsuario) {
                        // Continuar con el registro
                        const parametros = new URLSearchParams();
                        parametros.append("operacion", "registrarUsuarios");
                        parametros.append("tipodoc", tipodocumento.value);
                        parametros.append("nrodocumento",nrodocumento.value);
                        parametros.append("apepaterno",apepat.value);
                        parametros.append("apematerno",apemat.value);
                        parametros.append("nombres",nombres.value);
                        parametros.append("fechaNac",fechanac.value);
                        parametros.append("telefono",telefono.value);
                        parametros.append("direccion",direccion.value);
                        parametros.append("email",correo.value);
                        parametros.append("nombreusuario",usuario.value);
                        parametros.append("claveacceso", clave1.value);
                        parametros.append("nivelacceso", 'T');

                        fetch(`./controllers/usuario.controller.php`, {
                        method: 'POST',
                        body: parametros
                        })
                        .then(respuesta => respuesta.json())
                        .then(datos => {
                            if(datos.status){
                                alertar("Social Creativa","Se ha registrado correctamente","info");
                                setTimeout(() => {
                                    window.location.href= './index.php';
                                }, "1300");
                            }
                        });
                    }
                    } catch (error) {
                    console.error(error);
                    }
                }
            }




            registrar.addEventListener("click", registrarme)

        })

    </script>

</body>

</html>