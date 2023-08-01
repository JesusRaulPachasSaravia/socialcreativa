    <?php
    session_start();
    ?>
    <div class="p-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 border bg-primary">
                <li class="breadcrumb-item active text-white" aria-current="page">
                    <i class="fa-solid fa-pen fa"></i>
                    <span>Administración de la cuenta</span>
                </li>
            </ol>
        </nav>
    </div>

    <div class="container mt-5" id="informacion">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 bg-gray-900 text-white p-5">
                        <h3 class="text-center mt-5">Información personal</h3>
                        <h6 class="mb-5 text-center text-xs">Esta información es privada y no se compartirá 
                        con otras personas.</h6>
                    </div>
                    <div class="col-lg-7">
                        <div class="container mt-3">
                    
                            <div class="row">
                                
                                <!-- Primera Seccion -->

                                <div class="col-md-1"></div>

                                <div class="mt-4 col-md-5">
                                    <span>Nombres</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder="<?= $_SESSION['login']['nombres'] ?>">
                                </div>
                                <div class="mt-4 col-md-5">
                                    <span>Apellido paterno</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['apepaterno']?>>
                                </div>

                                <div class="col-md-1"></div>

                                <!-- Segunda Seccion -->

                                <div class="col-md-1"></div>

                                <div class="mt-4 col-md-5">
                                    <span>Apellido materno</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['apematerno']?>>
                                </div>

                                <div class="mt-4 mb-sm-4 col-md-5">
                                    <span>Correo</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['email']?>>
                                </div>
                                
                                <div class="col-md-1"></div>

                                <!-- Tercera seccion -->

                                <div class="col-md-1"></div>

                                <div class="mt-sm-0 mt-4 mb-sm-4 col-md-5">
                                    <span>Telefono</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['telefono']?>>
                                </div>

                                <div class="mt-sm-0 mt-4 mb-sm-4 col-md-5">
                                    <span>Fecha de nacimiento</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['fechaNac']?>>
                                </div>

                                <div class="col-md-1"></div>

                                <!-- Cuarta Seccion -->

                                <div class="col-md-1"></div>

                                <div class="mt-sm-0 mt-4 mb-4 col-md-10">
                                    <span>Direccion</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder="<?= $_SESSION['login']['direccion']?>">
                                </div>

                                <div class="col-md-1"></div>

                                <!-- Seccion del boton -->

                                <div class="col-md-4"></div>
                                <div class="col-md-4 mb-4 mt-4">
                                    <button type="button" id="registrar" class="btn btn-primary btn-user btn-block ">
                                        Guardar cambios
                                    </button>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5" id="informacion">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 bg-gray-900 text-white p-5">
                        <h4 class="mt-5 text-center">Inicio de sesión con cuenta de Social Creativa</h4>
                        <h6 class="mb-5 text-center text-xs">Te recomendamos que actualices periódicamente tu contraseña 
                        para evitar el acceso no autorizado a tu cuenta.</h6>
                    </div>
                    <div class="col-lg-7">
                        <div class="container mt-3">
                    
                            <div class="row">

                                <!-- Seccion usuario -->
                                <div class="col-md-1"></div>
                                <div class="mt-4 mb-2 col-md-10">
                                    <span>Nombre de usuario</span>
                                    <input type="text" class="form-control"
                                    id="" placeholder=<?= $_SESSION['login']['nombreusuario']?>>
                                </div>
                                <div class="col-md-1"></div>

                                <!-- Seccion Contraseña -->

                                <div class="col-md-1"></div>
                                <div class="mt-4 mb-2 col-md-10">
                                    <input type="text" class="form-control"
                                    id="" placeholder="Contraseña actual">
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-1"></div>
                                <div class="mt-4 mb-2 col-md-10">
                                    <input type="text" class="form-control"
                                    id="" placeholder="Nueva contraseña">
                                </div>
                                <div class="col-md-1"></div>

                                <div class="col-md-1"></div>
                                <div class="mt-4 mb-4 col-md-10">
                                    <input type="text" class="form-control"
                                    id="" placeholder="Confirmar nueva contraseña">
                                </div>
                                <div class="col-md-1"></div>
                                
                                <!-- Seccion del boton -->

                                <div class="col-md-4"></div>
                                <div class="col-md-4 mb-4 mt-4">
                                    <button type="button" id="registrar" class="btn btn-primary btn-user btn-block ">
                                        Guardar cambios
                                    </button>
                                </div>                            
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    