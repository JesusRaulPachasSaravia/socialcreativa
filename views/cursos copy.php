<?php require_once 'permisos.php'; ?>

<div class="p-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 border bg-warning">
            <li class="breadcrumb-item active text-white" aria-current="page">
                <i class="fa-solid fa-book fa"></i>
                <span>Cursos Inactivos</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Inicio del row -->
<div class="row row-cols-1 row-cols-md-2 g-4 mb-4" id="cursos-inactivos"></div><!-- Fin del row -->

<div class="p-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 border bg-success">
            <li class="breadcrumb-item active text-white" aria-current="page">
                <i class="fa-solid fa-book fa"></i>
                <span>Cursos Activos</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Inicio del row -->
<div class="row row-cols-1 row-cols-md-2 g-4 mb-4" id="cursos"></div><!-- Fin del row -->

<div class="p-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 border bg-danger">
            <li class="breadcrumb-item active text-white" aria-current="page">
                <i class="fa-solid fa-book fa"></i>
                <span>Cursos Finalizados</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Inicio del row -->
<div class="row row-cols-1 row-cols-md-2 g-4 mb-4" id="cursos-finalizados"></div><!-- Fin del row -->

<script>

        function mostrarCursos() {
            var formdata = new FormData();
            formdata.append('operacion', 'listarCursosActivos');

            fetch('../controllers/curso.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(data => {
                
                data.forEach(registro => {
                    
                    imagen = "data:image/jpeg;base64,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"

                    var nuevoCurso = `
                      <!-- Inicio del col -->
                        <div class="col">
                            <div class="container mt-3">
                                <div id="accordion">
                                    <div class="card border-success">
                                        <!-- Imagen del curso -->
                                        <img src=${imagen} class="card-img-top" alt="Guitarra" />
                                        <!-- Header del card -->
                                        <div class="card-header bg-white">
                                            <!-- Titulo del curso -->
                                            <i class="fa-solid fa-guitar text-primary fa-xl"></i>
                                            <span class="card-title text-primary text-lg">${registro.titulo}</>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 
                                                <a class="btn btn-primary" data-toggle="collapse" href="#SC_${registro.idcurso}" role="button" aria-expanded="false" aria-controls="SC_${registro.idcurso}">
                                                    <i class='bx bx-down-arrow-alt'></i>
                                                    <span>Mas información</span>
                                                </a>
                                                
                                                <a class="btn btn-success ml-5" href="./index.php?view=crearmatricula.php&idcurso=${registro.idcurso}" role="button" aria-expanded="false">
                                                    <i class='bx bx-id-card'></i>
                                                    <span>Pre-matricularse</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Informacion del curso -->
                                        <div id="SC_${registro.idcurso}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user'></i>
                                                        <span>Profesor: ${registro.nombreProfesor}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-category'></i>
                                                        <span>Categoria: ${registro.categoria}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-signal-5'></i>
                                                        <span>Nivel: ${registro.nivel}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-compass'></i>
                                                        <span>Ubicación: ${registro.ubicacion}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-book-alt'></i>
                                                        <span>Num Aula: ${registro.numaula}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-calendar'></i>
                                                        <span>Num Meses: ${registro.numMeses}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-minus'></i>
                                                        <span>Edad minima: ${registro.edadminima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-plus'></i>
                                                        <span>Edad maxima: ${registro.edadmaxima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa-solid fa-user-group fa-2xs"></i>
                                                        <span>Vacantes: ${registro.vacantes}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-hourglass'></i>
                                                        <span>Total de horas: ${registro.totalhoras}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-money'></i>
                                                        <span>Precio: ${registro.precio} soles</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Footer del card -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-8 col-sm-9">
                                                    <span class="text-muted">Estado del curso:</span>
                                                </div>
                                                <div class="col-4 col-sm-3 text-success text-right">
                                                    <i class='bx bxs-circle'></i>
                                                    <span>Activo</span>
                                                </div>
                                            </div>
                                        </div><!-- Fin del footer -->
                                    </div><!-- Fin del card -->
                                </div><!-- Fin del acordion -->
                            </div><!-- Fin del container -->
                        </div><!-- Fin del col -->
                    `;

                    document.querySelector("#cursos").innerHTML += nuevoCurso;
                });
            })
            .catch(error => console.error(error));
        }

        function mostrarCursosInactivos(){
            var formdata = new FormData();
            formdata.append('operacion', 'listarCursosInactivos');

            fetch('../controllers/curso.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(data => {

                document.querySelector("#cursos-inactivos").innerHTML = "";

                data.forEach(registro => {
                    
                    imagen = "https://static.wixstatic.com/media/4980f0_f3b7e68408bc47cd8ad2f512a35553c5~mv2.jpg/v1/fill/w_600,h_316,al_c,q_85/4980f0_f3b7e68408bc47cd8ad2f512a35553c5~mv2.jpg"
                 

                    var nuevoCurso = `
                      <!-- Inicio del col -->
                        <div class="col">
                            <div class="container mt-3">
                                <div id="accordion">
                                    <div class="card border-warning">
                                        <!-- Imagen del curso -->
                                        <img src="${imagen}" class="card-img-top" alt="Imagen del curso" />
                                        <!-- Header del card -->
                                        <div class="card-header bg-white">
                                            <!-- Titulo del curso -->
                                            <i class="fa-solid fa-guitar text-primary fa-xl"></i>
                                            <span class="card-title text-primary text-lg">${registro.titulo}</>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 
                                                <a class="btn btn-primary mt-4 mt-md-0 mt-sm-0 mt-lg-0" data-toggle="collapse" href="#SC_${registro.idcurso}" role="button" aria-expanded="false" aria-controls="SC_${registro.idcurso}">
                                                    <i class='bx bx-down-arrow-alt'></i>
                                                    <span>Mas información</span>
                                                </a>
                                                
                                                <a class="btn btn-success mt-4 mt-md-4 mt-sm-0 mt-lg-0" href="./index.php?view=crearmatricula.php&idcurso=${registro.idcurso}" role="button" aria-expanded="false">
                                                    <i class='bx bx-id-card'></i>
                                                    <span>Pre-matricularse</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Informacion del curso -->
                                        <div id="SC_${registro.idcurso}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user'></i>
                                                        <span>Profesor: ${registro.nombreProfesor}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-category'></i>
                                                        <span>Categoria: ${registro.categoria}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-signal-5'></i>
                                                        <span>Nivel: ${registro.nivel}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-compass'></i>
                                                        <span>Ubicación: ${registro.ubicacion}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-book-alt'></i>
                                                        <span>Num Aula: ${registro.numaula}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-calendar'></i>
                                                        <span>Num Meses: ${registro.duracion_meses}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-minus'></i>
                                                        <span>Edad minima: ${registro.edadminima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-plus'></i>
                                                        <span>Edad maxima: ${registro.edadmaxima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa-solid fa-user-group fa-2xs"></i>
                                                        <span>Vacantes: ${registro.vacantes}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-hourglass'></i>
                                                        <span>Total de horas: ${registro.totalhoras}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-money'></i>
                                                        <span>Precio: ${registro.precio} soles</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Footer del card -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-8 col-sm-9">
                                                    <span class="text-muted">Estado del curso:</span>
                                                </div>
                                                <div class="col-4 col-sm-3 text-warning text-right">
                                                    <i class='bx bxs-circle'></i>
                                                    <span>Inactivo</span>
                                                </div>
                                            </div>
                                        </div><!-- Fin del footer -->
                                    </div><!-- Fin del card -->
                                </div><!-- Fin del acordion -->
                            </div><!-- Fin del container -->
                        </div><!-- Fin del col -->
                    `;

                    document.querySelector("#cursos-inactivos").innerHTML += nuevoCurso;
                });
            })
            .catch(error => console.error(error));
        }        

        function mostrarCursosFinalizados(){
            var formdata = new FormData();
            formdata.append('operacion', 'listarCursosFinalizados');

            fetch('../controllers/curso.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(data => {

                document.querySelector("#cursos-finalizados").innerHTML = "";

                data.forEach(registro => {
                    

                        imagen = "data:image/jpeg;base64,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"
                

                    var nuevoCurso = `
                      <!-- Inicio del col -->
                        <div class="col">
                            <div class="container mt-3">
                                <div id="accordion">
                                    <div class="card border-danger">
                                        <!-- Imagen del curso -->
                                        <img src="${imagen}" class="card-img-top" alt="Imagen del curso" />
                                        <!-- Header del card -->
                                        <div class="card-header bg-white">
                                            <!-- Titulo del curso -->
                                            <i class="fa-solid fa-guitar text-primary fa-xl"></i>
                                            <span class="card-title text-primary text-lg">${registro.titulo}</>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 
                                                <a class="btn btn-primary mt-4 mt-md-0 mt-sm-0 mt-lg-0" data-toggle="collapse" href="#SC_${registro.idcurso}" role="button" aria-expanded="false" aria-controls="SC_${registro.idcurso}">
                                                    <i class='bx bx-down-arrow-alt'></i>
                                                    <span>Mas información</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Informacion del curso -->
                                        <div id="SC_${registro.idcurso}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user'></i>
                                                        <span>Profesor: ${registro.nombreProfesor}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-category'></i>
                                                        <span>Categoria: ${registro.categoria}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-signal-5'></i>
                                                        <span>Nivel: ${registro.nivel}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-compass'></i>
                                                        <span>Ubicación: ${registro.ubicacion}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-book-alt'></i>
                                                        <span>Num Aula: ${registro.numaula}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-calendar'></i>
                                                        <span>Num Meses: ${registro.duracion_meses}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-minus'></i>
                                                        <span>Edad minima: ${registro.edadminima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-user-plus'></i>
                                                        <span>Edad maxima: ${registro.edadmaxima} años</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="fa-solid fa-user-group fa-2xs"></i>
                                                        <span>Vacantes: ${registro.vacantes}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bxs-hourglass'></i>
                                                        <span>Total de horas: ${registro.totalhoras}</span>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class='bx bx-money'></i>
                                                        <span>Precio: ${registro.precio} soles</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Footer del card -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-8 col-sm-9">
                                                    <span class="text-muted">Estado del curso:</span>
                                                </div>
                                                <div class="col-4 col-sm-3 text-danger text-right">
                                                    <i class='bx bxs-circle'></i>
                                                    <span>Finalizado</span>
                                                </div>
                                            </div>
                                        </div><!-- Fin del footer -->
                                    </div><!-- Fin del card -->
                                </div><!-- Fin del acordion -->
                            </div><!-- Fin del container -->
                        </div><!-- Fin del col -->
                    `;

                    document.querySelector("#cursos-finalizados").innerHTML += nuevoCurso;
                });
            })
            .catch(error => console.error(error));
        }        

        mostrarCursosInactivos();
        mostrarCursos();
        mostrarCursosFinalizados(); 

</script>

