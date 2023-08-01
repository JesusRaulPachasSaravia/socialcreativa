<?php
require_once '../config/config.php';

session_start();

require_once '../utils/SessionUtils.php';

SessionUtils::checkSessionTimeout();


if (!isset($_SESSION['login']) || !$_SESSION['login']['status']){
    header("Location:../");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="../favicon/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="../favicon/favicon-32x32.png" sizes="32x32">

    <title>Social Creativa</title>

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/7a0163df78.js" crossorigin="anonymous"></script>

    <!-- FullCalendar -->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>

    <!-- BoxIcons -->

    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <!-- estilo -->
    <link rel="stylesheet" href="../css/estilo.css">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- SIDEBAR -->
        <ul class="navbar-nav fondo sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="../images/logo.png" class="w-75" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">Social Creativa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Inventario
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Opciones del inventario</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lista de opciones:</h6>
                        <a class="collapse-item" href="#">Mirar inventario</a>
                        <a class="collapse-item" href="#">Prestar instrumentos</a>
                        <a class="collapse-item" href="#">Otorgar permisos</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Modulos
            </div>

            <!-- OPCIONES QUE DEBEN SER FILTRADAS DE ACUERD AL PERFIL -->
            <?php require_once './sidebaroptions.php'; ?>
            <!-- FIN OPCIONES DEL SIDEBAR -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Botón circular Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- FIN Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?= $_SESSION['login']['nombres'] ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="./img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar contraseña
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a> -->
                                <a class="dropdown-item" href="../controllers/Usuario.controller.php?operacion=destroy">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Aquí cargará el contenido dinámico -->
                <!-- Begin Page Content -->
                <div class="container-fluid" id="content-dinamics">

 

                    
                </div>
                <!-- /.container-fluid -->
                <!-- Fin contenido dinámico -->

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Todos los derechos reservados &copy; SOCIAL CREATIVA 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>


    <!-- Page level plugins -->
    
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Responsivo -->

    <script src="//cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="../views/js/numberFormat.js"></script>

    <script>



        document.addEventListener("DOMContentLoaded", () => {


            function loadScript(url, callback) {
                var script = document.createElement('script');
                script.src = url;
                script.onload = callback;
                document.head.appendChild(script);
            }

            //Forma 1
            //Crearemos una función que obtenga la URL(vista)
            function getURL(){
                //1. Obtener la URL
                const url = new URL(window.location.href);
                //2. Obtener el valor enviado por la URL
                const vista = url.searchParams.get("view");
                //3. Crear un objeto que referencia contenedor
                const contenedor = document.querySelector("#content-dinamics");

                
                //Cuando el usuario elige una opción...
                if (vista != null){
                    fetch(vista)
                    .then(respuesta => respuesta.text())
                    .then(datos => {
                            contenedor.innerHTML = datos;

                            //Necesitamos recorrer todas las etiquetas <script> y "reactivarlas"
                            const scriptsTag = contenedor.getElementsByTagName("script");
                            for (i = 0; i < scriptsTag.length; i++){
                                eval(scriptsTag[i].innerText);
                            }
                        });
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', './dashboard.php', true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            
                            contenedor.innerHTML = xhr.responseText;

                            const scriptsTag = contenedor.getElementsByTagName("script");
                            for (i = 0; i < scriptsTag.length; i++){
                                eval(scriptsTag[i].innerText);
                            }                            
                            
                            // Buscar todos los scripts en el contenido y cargarlos
                            var scripts = document.getElementById('content-dinamics').querySelectorAll('script[src]');
                            var scriptsLoaded = 0;

                            var onLoadScript = function() {
                                scriptsLoaded++;
                                if (scriptsLoaded === scripts.length) {
                                    // Todos los scripts se han cargado y ejecutado
                                    // Puedes realizar acciones adicionales aquí
                                }
                            };

                            // Cargar y ejecutar cada script
                            for (var i = 0; i < scripts.length; i++) {
                                var scriptSrc = scripts[i].src;
                                loadScript(scriptSrc, onLoadScript);
                            }
                        }
                    };
                    
                    xhr.send();
                }
            }

            //Forma 2. Requiere que el JS de la vista se encuentre en un archivo externo
            //el archivo JS se guardará en la carpeta "js/clientes.js"
            function getURLNew(){
                const url = new URL(window.location.href);
                const vista = url.searchParams.get("view");
                const contenedor = document.querySelector("#content-dinamics");

                if (vista != null){
                    fetch(vista)
                        .then(respuesta => respuesta.text())
                        .then(datos => {
                            //Agregamos el contenido HTML
                            contenedor.innerHTML = datos;
                            //Agregamos JS
                            const nuevoScript = document.createElement("script");
                            nuevoScript.src = './js/clientes.js';
                            document.body.appendChild(nuevoScript);
                        });
                }
            }

            //Invocamos a la función de la FORMA 2
            getURL();

        });
    </script>


</body>

</html>