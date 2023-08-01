<?php require_once 'permisos.php'; ?>

<div class="p-2">
    <!-- Button trigger modal -->
    <button id="boton-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-curso">
      Crear nuevo curso
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="crear-curso" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="crear-curso" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div id="color-modal" class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="titulo-curso">Registrar nuevo curso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" autocomplete="off" id="form-curso-crear" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6 mt-3">
                        <label for="nomCurso">Nombre del curso</label>
                        <input type="text" class="form-control" id="nomCurso" aria-describedby="">
                    </div>

                    <div class="col-md-6 mt-3">
                            <label for="profCurso">Seleccione el profesor</label>
                            <select class="custom-select" name="" id="profCurso">
                                <option value="0">Seleccione</option>
                            </select>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="descCurso">Descripcion del curso</label>
                        <textarea id="descCurso" cols="10" rows="3" class="form-control"></textarea>
                    </div>
                    

                    <div class="col-md-6 mt-3">
                            <label for="nivelCurso">Seleccione el nivel del curso</label>
                            <select class="custom-select" name="" id="nivelCurso">
                                <option value="0">Seleccione</option>
                                <option value="introductorio">Introductorio</option>
                                <option value="basico">Básico</option>
                                <option value="intermedio">Intermedio</option>
                                <option value="avanzado">Avanzado</option>
                            </select>
                    </div>


                    <div class="col-md-6 mt-3">
                            <label for="catCurso">Seleccione la categoria</label>
                            <select class="custom-select" name="" id="catCurso">
                                <option value="0">Seleccione</option>
                            </select>
                    </div>

                    <div class="col-md-4 mt-3">
                            <label for="aulaCurso">Seleccione el aula</label>
                            <select class="custom-select" name="" id="aulaCurso">
                                <option value="0">Seleccione</option>
                            </select>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="edadMin">Edad minima para el curso</label>
                        <input type="text"  maxlength="2" class="form-control" id="edadMin" aria-describedby="">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="edadMax">Edad maxima para el curso</label>
                        <input type="text" maxlength="2" class="form-control" id="edadMax" aria-describedby="">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="totalHoras">Total de horas del curso</label>
                        <input type="text" maxlength="2" class="form-control" id="totalHoras" aria-describedby="">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="vacCurso">Vacantes para el curso</label>
                        <input type="text" maxlength="2" class="form-control" id="vacCurso" aria-describedby="">
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="precCurso">Precio del curso</label>
                        <input type="text" class="form-control" id="precCurso" aria-describedby="">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="fechInicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fechInicio" aria-describedby="">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="fechFin">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fechFin" aria-describedby="">
                    </div>

                                    <!-- Subir imagen -->

                    <div class="col-md-12 mt-3 form-group">
                        <label for="imgCurso" >Subir una imagen</label>
                        <input type="file" id="imgCurso" accept="image/*" class="form-control">
                    </div>


                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="crear">Crear curso</button>
            <button type="button" class="btn btn-info d-none" id="actualizar">Actualizar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal mas info -->
    <div class="modal fade" id="info-curso" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="info-curso" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div id="color-modal" class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="titulo-curso-info"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" autocomplete="off" id="form-curso-crear" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6 mt-3">
                        <label for="prof-info">Profesor</label>
                        <input type="text" id="prof-info" cols="10" rows="3" class="form-control" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="cat-info">Categoria</label>
                        <input type="text" id="cat-info" cols="10" rows="3" class="form-control" disabled>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="desc-info">Descripcion del curso</label>
                        <textarea id="desc-info" cols="10" rows="3" class="form-control" disabled></textarea>
                    </div>
                    

                    <div class="col-md-6 mt-3">
                        <label for="niv-info">Nivel del curso</label>
                        <input type="text" id="niv-info" cols="10" rows="3" class="form-control" disabled>
                    </div>



                    <div class="col-md-6 mt-3">
                        <label for="aula-info">Aula del curso</label>
                        <input type="text" id="aula-info" cols="10" rows="3" class="form-control" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="ubi-info">Ubicacion</label>
                        <input type="text" id="ubi-info" cols="10" rows="3" class="form-control" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="meses-info">Meses de duración</label>
                        <input type="text" id="meses-info" cols="10" rows="3" class="form-control" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="edadmin-info">Edad minima para el curso</label>
                        <input type="text"  maxlength="2" class="form-control" id="edadmin-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="edadmax-info">Edad maxima para el curso</label>
                        <input type="text" maxlength="2" class="form-control" id="edadmax-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="totalHoras-info">Total de horas del curso</label>
                        <input type="text" maxlength="2" class="form-control" id="totalHoras-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="vacCurso-info">Vacantes para el curso</label>
                        <input type="text" maxlength="2" class="form-control" id="vacCurso-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="fechInicio-info">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fechInicio-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="fechFin-info">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fechFin-info" aria-describedby="" disabled>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="prec-info">Precio del curso</label>
                        <input type="text" class="form-control" id="prec-info" aria-describedby="" disabled>
                    </div>

                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

</div>


<div class="p-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 border bg-warning">
            <li class="breadcrumb-item active text-white" aria-current="page">
                <i class="fa-solid fa-book fa"></i>
                <span>Cursos Proximos</span>
            </li>
        </ol>
    </nav>
</div>

<!-- Inicio del row -->
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4" id="cursos-inactivos"></div><!-- Fin del row -->

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
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4" id="cursos"></div><!-- Fin del row -->

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
<div class="row row-cols-1 row-cols-md-3 g-4 mb-4" id="cursos-finalizados"></div><!-- Fin del row -->

<script>

    let nomCurso = document.querySelector("#nomCurso")
    let profCurso = document.querySelector("#profCurso")
    let descCurso = document.querySelector("#descCurso")
    let nivelCurso = document.querySelector("#nivelCurso")
    let catCurso = document.querySelector("#catCurso")
    let aulaCurso = document.querySelector("#aulaCurso")
    let edadMin = document.querySelector("#edadMin")
    let edadMax = document.querySelector("#edadMax")
    let totalHoras = document.querySelector("#totalHoras")
    let vacCurso = document.querySelector("#vacCurso")
    let precCurso = document.querySelector("#precCurso")
    let fechInicio = document.querySelector("#fechInicio")
    let fechFin = document.querySelector("#fechFin")
    let imgCurso = document.querySelector("#imgCurso")
    let btnCrear = document.querySelector("#crear")
    let btnAct = document.querySelector("#actualizar")


    let profCursoInf = document.querySelector("#prof-info")
    let catCursoInf = document.querySelector("#cat-info")
    let descCursoInf = document.querySelector("#desc-info")
    let nivelCursoInf = document.querySelector("#niv-info")
    let aulaCursoInf = document.querySelector("#aula-info")
    let ubiCursoInf = document.querySelector("#ubi-info")
    let edadMinInf = document.querySelector("#edadmin-info")
    let edadMaxInf = document.querySelector("#edadmax-info")
    let totalHorasInf = document.querySelector("#totalHoras-info")
    let vacCursoInf = document.querySelector("#vacCurso-info")
    let fechInicioInf = document.querySelector("#fechInicio-info")
    let fechFinInf = document.querySelector("#fechFin-info")
    let precCursoInf = document.querySelector("#prec-info")
    let mesesCursoInf = document.querySelector("#meses-info")
    

    let colorModal = document.querySelector("#color-modal")
    let tituloModal = document.querySelector("#titulo-curso")

    let tituloInfo = document.querySelector("#titulo-curso-info")

    let btnModal = document.querySelector("#boton-modal")

    let idcurso = 0

    edadMin.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })

    edadMax.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })    

    totalHoras.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })
    
    precCurso.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })
    
    vacCurso.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })    

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

    function validarCampo(campo, mensaje) {
        if (campo.value === "" || campo.value  === "0") {
            alertar(mensaje, "Cursos", "warning");
            return false;
        }
        return true;
    }

        function profesoresListar(){
            var formdata = new FormData();
                formdata.append('operacion', 'listarProfesores');

                fetch('../controllers/profesor.controller.php', {
                    method: 'POST',
                    body: formdata
                })
                .then(response => response.json())
                .then(registros => {

                    registros.forEach(registro => {
                        const optionTag = document.createElement("option");
                        optionTag.value = registro.idprofesor;
                        optionTag.text = registro.nombrePila;
                        profCurso.appendChild(optionTag);
                    })

                })
                .catch(error => console.error(error));
        }

        function categoriasListar(){
            var formdata = new FormData();
                formdata.append('operacion', 'listarCategorias');

                fetch('../controllers/categoria.controller.php', {
                    method: 'POST',
                    body: formdata
                })
                .then(response => response.json())
                .then(registros => {

                    registros.forEach(registro => {
                        const optionTag = document.createElement("option");
                        optionTag.value = registro.idcategoria;
                        optionTag.text = registro.categoria;
                        catCurso.appendChild(optionTag);
                    })

                })
                .catch(error => console.error(error));
        }

        function aulasListar(){
        var formdata = new FormData();
            formdata.append('operacion', 'listarAulas');

            fetch('../controllers/aula.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(registros => {

                registros.forEach(registro => {
                    const optionTag = document.createElement("option");
                    optionTag.value = registro.idaula;
                    optionTag.text = `N° ${registro.numaula} - ${registro.ubicacion} - Aforo: ${registro.aforo}`;
                    aulaCurso.appendChild(optionTag);
                })

            })
            .catch(error => console.error(error));
    }

        function crearCurso() {
            const campos = [
                { campo: nomCurso, mensaje: "El nombre del curso no puede estar vacío" },
                { campo: profCurso, mensaje: "Debe seleccionar un profesor para el curso" },
                { campo: descCurso, mensaje: "La descripción del curso no puede estar vacía" },
                { campo: nivelCurso, mensaje: "Debe seleccionar un nivel para el curso" },
                { campo: catCurso, mensaje: "Debe seleccionar una categoría para el curso" },
                { campo: aulaCurso, mensaje: "Debe seleccionar un aula para el curso" },
                { campo: edadMin, mensaje: "La edad mínima del curso no puede estar vacía" },
                { campo: edadMax, mensaje: "La edad máxima del curso no puede estar vacía" },
                { campo: vacCurso, mensaje: "Debe poner un número de vacantes válido" },
                { campo: precCurso, mensaje: "Debe asignar un precio al curso" },
                { campo: fechInicio, mensaje: "Debe determinar la fecha de inicio del curso" },
                { campo: fechFin, mensaje: "Debe determinar la fecha de fin del curso" }
            ];

            for (const campoInfo of campos) {
                if (!validarCampo(campoInfo.campo, campoInfo.mensaje)) {
                    return;
                }
            }

            if (edadMin.value > edadMax.value) {
                alertar("La edad mínima del curso no puede ser mayor a la edad máxima", "Cursos", "warning");
                return;
            }

            if (fechFin.value <= fechInicio.value) {
                alertar("La fecha de fin no puede ser menor a la fecha de inicio", "Cursos", "warning");
                return;
            }

            const parametros = new FormData();
            parametros.append("operacion", "registrarCursos");
            parametros.append("idprofesor", profCurso.value);
            parametros.append("idaula", aulaCurso.value);
            parametros.append("titulo", nomCurso.value);
            parametros.append("idcategoria", catCurso.value);
            parametros.append("descripcion", descCurso.value);
            parametros.append("nivel", nivelCurso.value);
            parametros.append("edadminima", edadMin.value);
            parametros.append("edadmaxima", edadMax.value);
            parametros.append("vacantes", vacCurso.value);
            parametros.append("totalhoras", totalHoras.value);
            parametros.append("precio", precCurso.value);
            parametros.append("fecha_inicio", fechInicio.value);
            parametros.append("fecha_fin", fechFin.value);
            parametros.append("imagen", $('#imgCurso')[0].files[0]);


            Swal.fire({
                title: 'Social Creativa',
                text: "¿Estás seguro de crear un nuevo curso?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`../controllers/curso.controller.php`, {
                        method: 'POST',
                        body: parametros
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        if (datos.status) {
                            document.querySelector("#form-curso-crear").reset();
                            alertar(`El curso de ${nomCurso.value} fue creado exitosamente`, "Cursos", "success");
                            mostrarCursosInactivos();
                            $('#crear-curso').modal('hide');
                        }
                    });
                }
            })


        }

        function actualizarCurso() {

            const parametros = new FormData();
            parametros.append("operacion", "actualizarCursos");
            parametros.append("idcurso", idcurso);
            parametros.append("idprofesor", profCurso.value);
            parametros.append("idaula", aulaCurso.value);
            parametros.append("titulo", nomCurso.value);
            parametros.append("idcategoria", catCurso.value);
            parametros.append("descripcion", descCurso.value);
            parametros.append("nivel", nivelCurso.value);
            parametros.append("edadminima", edadMin.value);
            parametros.append("edadmaxima", edadMax.value);
            parametros.append("vacantes", vacCurso.value);
            parametros.append("totalhoras", totalHoras.value);
            parametros.append("precio", precCurso.value);
            parametros.append("fecha_inicio", fechInicio.value);
            parametros.append("fecha_fin", fechFin.value);

            fetch(`../controllers/curso.controller.php`, {
                method: 'POST',
                body: parametros
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
                if (datos.status) {
                    document.querySelector("#form-curso-crear").reset();
                    alertar(`El curso de ${nomCurso.value} fue editado exitosamente`, "Cursos", "success");
                    mostrarCursosInactivos();
                    $('#crear-curso').modal('hide');
                }else{
                    console.log(datos)
                }
            });
        }


        function mostrarCursosActivos() {
            var formdata = new FormData();
            formdata.append('operacion', 'listarCursosActivos');

            fetch('../controllers/curso.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(data => {
                data.forEach(registro => {
                     

                    if(registro.imagen != ""){
                        imagen = `./cursos/${registro.imagen}`
                    }else{
                        imagen = "data:image/jpeg;base64,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"
                    }
                    

                    var nuevoCurso = `
                      <!-- Inicio del col -->
                        <div class="col">
                            <div class="container mt-3">
                                <div id="accordion">
                                    <div class="card border-success">
                                        <!-- Imagen del curso -->
                                        <img src="${imagen}" class="card-img-top" alt="Guitarra" />
                                        <!-- Header del card -->
                                        <div class="card-header bg-white">
                                            <!-- Titulo del curso -->
                                            <h4 class="card-title text-primary">${registro.titulo}</h4>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 

                                                <button id="masinfo" data-masifo="${registro.idcurso}" type="button" class="btn btn-primary mt-4 mt-md-0 mt-sm-0 mt-lg-2" data-toggle="modal" data-target="#info-curso">
                                                    <i id="masinfo" data-masifo="${registro.idcurso}" class='bx bx-down-arrow-alt'></i>
                                                    <span id="masinfo" data-masifo="${registro.idcurso}" >Mas información</span>
                                                </button>

                                                <a class="btn btn-info mt-4 mt-md-4 mt-sm-0 mt-lg-2" href="./index.php?view=alumnos.php&idcurso=${registro.idcurso}" role="button" aria-expanded="false">
                                                    <i class='bx bx-id-card'></i>
                                                    <span>Ver alumnos</span>
                                                </a>
                                        
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

                    
                    imagen = "";

                                        
                    let btnPrematricular = `
                    <a class="btn btn-success mt-4 mt-md-4 mt-sm-0 mt-lg-2" href="./index.php?view=crearmatricula-admin.php&idcurso=${registro.idcurso}" role="button" aria-expanded="false">
                        <i class='bx bx-id-card'></i>
                        <span>Pre-matricularse</span>
                    </a>
                    `;
                    
                    imagen = "";
                    
                    if(registro.vacantes == 0){
                        btnPrematricular = "";
                    }
                     

                    if(registro.imagen != ""){
                        imagen = `./cursos/${registro.imagen}`
                    }else{
                        imagen = "data:image/jpeg;base64,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"
                    }
                    
                 

                    var nuevoCurso = `
                      <!-- Inicio del col -->
                        <div class="col">
                            <div class="container mt-3">
                                <div id="accordion">
                                    <div class="card border-warning">
                                        <!-- Imagen del curso -->
                                        <img src="${imagen}" class="card-img-top w-100" alt="Imagen del curso" />
                                        <!-- Header del card -->
                                        <div class="card-header bg-white">
                                            <!-- Titulo del curso -->
                                            <h4 class="card-title text-primary">${registro.titulo}</h4>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 

                                                <button id="masinfo" data-masifo="${registro.idcurso}" type="button" class="btn btn-primary mt-4 mt-md-0 mt-sm-0 mt-lg-2" data-toggle="modal" data-target="#info-curso">
                                                    <i id="masinfo" data-masifo="${registro.idcurso}" class='bx bx-down-arrow-alt'></i>
                                                    <span id="masinfo" data-masifo="${registro.idcurso}" >Mas información</span>
                                                </button>
                                                
                                                ${btnPrematricular}


                                                <button type="button" data-editar="${registro.idcurso}" class="btn btn-info mt-4 mt-md-4 mt-sm-0 mt-lg-2" id="editar">
                                                    <i data-editar="${registro.idcurso}" class='bx bx-book' id="editar"></i>
                                                    <span data-editar="${registro.idcurso}" id="editar" >Editar Curso</span>
                                                </button>


                                            </div>
                                        </div>
                                        <!-- Footer del card -->
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-8 col-sm-7">
                                                    <span class="text-muted">Estado del curso:</span>
                                                </div>
                                                <div class="col-4 col-sm-5 text-warning text-right">
                                                    <i class='bx bxs-circle'></i>
                                                    <span>Proximamente</span>
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

                    imagen = "";
                     

                     if(registro.imagen != ""){
                         imagen = `./cursos/${registro.imagen}`
                     }else{
                         imagen = "data:image/jpeg;base64,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"
                     }
                

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
                                            <h4 class="card-title text-primary">${registro.titulo}</h4>
                                            <!-- Descripcion del curso -->
                                            <h5 class="card-text text-secondary mt-2">Descripcion:</h5>
                                            <h6 class="card-text">${registro.descripcion}</h6>
                                            <!-- Boton de mas informacion -->
                                            <div class="text-center"> 

                                                <button id="masinfo" data-masifo="${registro.idcurso}" type="button" class="btn btn-primary mt-4 mt-md-0 mt-sm-0 mt-lg-2" data-toggle="modal" data-target="#info-curso">
                                                    <i id="masinfo" data-masifo="${registro.idcurso}" class='bx bx-down-arrow-alt'></i>
                                                    <span id="masinfo" data-masifo="${registro.idcurso}" >Mas información</span>
                                                </button>

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


        btnCrear.addEventListener("click",crearCurso)

        btnAct.addEventListener("click",actualizarCurso)

        document.addEventListener('click', function(event) {
            if (event.target.id === 'editar') {

                idcurso = event.target.getAttribute('data-editar');
                colorModal.classList.remove("bg-primary")
                colorModal.classList.add("bg-info")

                tituloModal.textContent = "Actualizar curso"

                btnAct.classList.remove("d-none")
                btnCrear.classList.add("d-none")

                const parametros = new URLSearchParams();
                parametros.append("operacion","getCursos")
                parametros.append("idcurso",idcurso)

                fetch(`../controllers/curso.controller.php`,{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    console.log(datos)
                    nomCurso.value = datos.titulo
                    profCurso.value = `${datos.idprofesor}`
                    descCurso.value = datos.descripcion
                    nivelCurso.value = datos.nivel
                    catCurso.value = `${datos.idcategoria}`
                    aulaCurso.value = `${datos.idaula}`
                    edadMin.value = datos.edadminima
                    edadMax.value = datos.edadmaxima
                    totalHoras.value = datos.totalhoras
                    vacCurso.value = datos.vacantes
                    precCurso.value = datos.precio
                    fechInicio.value = datos.fecha_inicio
                    fechFin.value = datos.fecha_fin
                    $('#crear-curso').modal('show');
                })

            }

            if(event.target.id === 'masinfo') {
                idcurso = event.target.getAttribute('data-masifo');

                const parametros = new URLSearchParams();
                parametros.append("operacion","getCursos")
                parametros.append("idcurso",idcurso)

                fetch(`../controllers/curso.controller.php`,{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    console.log(datos)
                    tituloInfo.textContent = `Información del curso de ${datos.titulo}`
                    profCursoInf.value = `${datos.nombreProfesor}`
                    descCursoInf.value = datos.descripcion
                    nivelCursoInf.value = datos.nivel
                    catCursoInf.value = `${datos.categoria}`
                    mesesCursoInf.value = datos.duracion_meses
                    aulaCursoInf.value = `${datos.numaula}`
                    ubiCursoInf.value = `${datos.ubicacion}`
                    edadMinInf.value = datos.edadminima
                    edadMaxInf.value = datos.edadmaxima
                    totalHorasInf.value = datos.totalhoras
                    vacCursoInf.value = datos.vacantes
                    precCursoInf.value = `${datos.precio} soles`
                    fechInicioInf.value = datos.fecha_inicio
                    fechFinInf.value = datos.fecha_fin
                })                
            }            
        })

        btnModal.addEventListener("click", function (){
            colorModal.classList.add("bg-primary")
            colorModal.classList.remove("bg-info")

            tituloModal.textContent = "Registrar nuevo curso"

            btnAct.classList.add("d-none")
            btnCrear.classList.remove("d-none")

            document.querySelector("#form-curso-crear").reset()
        })

        profesoresListar();
        categoriasListar();
        aulasListar();


        mostrarCursosInactivos();
        mostrarCursosActivos(); 
        mostrarCursosFinalizados(); 

</script>

