<?php
require_once 'permisos.php';
$variableSesion = $_SESSION['login']['nivelacceso'];

echo "<script>";
echo "var nivelacceso = " . json_encode($variableSesion) . ";";
echo "</script>";

?>


<div class="row">

    
        <div class="col-12">
            <h5 class="text-center text-primary">Matriculas en este curso</h5>
            <div class="table-responsive">
                <table class="table display responsive nowrap table-striped" width="100%" id="tabla-matriculados">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Tipo de Doc.</th>
                            <th>Nro de Doc.</th>
                            <th>Nombres</th>
                            <th>Parenteso</th>
                            <th>Nom. Apoderado</th>
                            <th>Estado</th>
                            <th>Curso</th>
                            <th>Total horas</th>
                            <th>Fecha de matricula</th>
                            <th>Comandos</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 border bg-primary">
                    <li class="breadcrumb-item active text-white" aria-current="page" id="titulo-curso">
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            
            <div id="alumno">
        
            
                <div class="row row-cols-1 row-cols-md-1 g-4 mb-4">
            
                    <div class="col">
                        <div class="container">
                            <div class="row">
            
                                <div class="col-md-4">
                                    <label for="">Seleccione su tipo de documento</label>
                                    <select class="custom-select" name="" id="tipodocumento">
                                        <option value="DNI">DNI</option>
                                        <option value="CE">CE</option>
                                        <option value="CI">CI</option>
                                        <option value="PTP">PTP</option>
                                        <option value="CPP">CPP</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Ingrese su número de documento</label>
                                    <input type="text" class="form-control" maxlength="10" id="nrodocumento" placeholder="XXXX-XXXX-XXXX" autofocus>
                                </div>
        
            
                                <div class="col-md-4 mt-4">
                                    <button type="button" class="btn btn-success mt-1" id="buscar">Buscar</button>
                                    <button type="reset" class="btn btn-danger mt-1 ml-2" id="reiniciar">Reiniciar</button>
                                </div>
            
                            </div>
                        </div>
                    </div>
            
            
                    <div class="col mt-5 d-none" id="informacion-alumno">
                        <div class="container">
                            <div class="card">
                                <h5 class="card-header bg-dark text-center text-white">Información del alumno</h5>
                                <div class="card-body">
            
                                    <form action="" autocomplete="off" id="datos-alumno">
            
                                        <div class="row" id="row-alumno">
                                            <!-- Nombres y apellidos -->
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" id="nomAlum" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="apepat" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" id="apemat" aria-describedby="" disabled>
                                            </div>
            
                                            <!-- Información adicional -->
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Edad</label>
                                                <input type="text" class="form-control" id="edadAlum" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3" id="celularDiv">
            
                                            </div>
            
                                            <div class="col-md-4 mt-3" id="emailDiv">
            
                                            </div>
            
                                        </div>
                                    </form>
            
                                </div>
                                <div class="card-footer text-center">
                                    <h6>Social Creativa ONG - Área de sistemas</h6>
                                </div>
                            </div>
            
                            <div class="col mt-4" align="center" id="matricularmayor">
                                <button type="button" class="btn btn-primary mt-1" id="matricular">Matricularse</button>
                            </div>
            
                        </div>
                    </div>
            
                </div>
            
            </div>
            
            <div id="padre" class="d-none">
            
                <div class="p-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-3 border bg-primary">
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                <i class="fa-solid fa-address-card fa"></i>
                                <span>Buscar apoderado</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            
                <div class="row row-cols-1 row-cols-md-1 g-4 mb-4">
            
                    <div class="col">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-4">
                                    <label for="">Seleccione su tipo de documento</label>
                                    <select class="custom-select" name="" id="tipodocumento-apod">
                                        <option value="DNI">DNI</option>
                                        <option value="CE">CE</option>
                                        <option value="CI">CI</option>
                                        <option value="PTP">PTP</option>
                                        <option value="CPP">CPP</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Ingrese su número de documento</label>
                                    <input type="text" class="form-control" maxlength="10" autocomplete="off" id="nrodocumento-apod" aria-describedby="" placeholder="XXXX-XXXX-XXXX" autofocus>
                                </div>
            
            
                                <div class="col-md-4 mt-4">
                                    <button type="button" class="btn btn-success mt-1" id="buscar-apod">Buscar</button>
                                    <button type="reset" class="btn btn-danger mt-1 ml-2" id="reiniciar-apod">Reiniciar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                    <div class="col mt-5 d-none" id="informacion-apod">
                        <div class="container">
                            <div class="card">
                                <h5 class="card-header bg-dark text-center text-white">Información del apoderado</h5>
                                <div class="card-body">
            
                                    <form action="" autocomplete="off" id="datos-apod">
            
                                        <div class="row" id="row-apod">
                                            <!-- Nombres y apellidos -->
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" id="nomApod" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" id="apepat-apod" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" id="apemat-apod" aria-describedby="" disabled>
                                            </div>
            
                                            <!-- Información adicional -->
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Edad</label>
                                                <input type="text" class="form-control" id="edadApod" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" id="celApod" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" id="emailApod" aria-describedby="" disabled>
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Tipo de parentesco</label>
                                                <input type="text" class="form-control" maxlength="10" id="parentesco" aria-describedby="">
                                            </div>
            
                                            <div class="col-md-4 mt-3">
                                                <label for="">Observación</label>
                                                <input type="text" class="form-control" id="observacion" aria-describedby="">
                                            </div>
            
                                        </div>
                                    </form>
            
                                </div>
                                <div class="card-footer text-center">
                                    <h6>Social Creativa ONG - Área de sistemas</h6>
                                </div>
                            </div>
            
                            <div class="col mt-4" align="center" id="matricularmenor">
                                <button type="button" class="btn btn-primary mt-1" id="matricular">Matricularse</button>
                            </div>
            
                        </div>
                    </div>
            
                </div>
            
            </div>
        </div>

</div>




<script>


    let url = new URL(window.location.href);
    let idcurso = url.searchParams.get("idcurso");
    //Titulo del curso

    let titulocurso = document.querySelector("#titulo-curso")
    
    //Alumno Form
    let nrodoc = document.querySelector("#nrodocumento")
    let tipodoc = document.querySelector("#tipodocumento")

    let nomAlum = document.querySelector("#nomAlum");
    let apepat = document.querySelector("#apepat");
    let apemat = document.querySelector("#apemat");
    let edadAlum = document.querySelector("#edadAlum");
    let celAlum = document.querySelector("#celAlum");
    let emailAlum = document.querySelector("#emailAlum");

    let apoderado = document.querySelector("#padre");

    //Padre Form
    let nrodocapo = document.querySelector("#nrodocumento-apod")
    let tipodocapo = document.querySelector("#tipodocumento-apod")

    let nomApo = document.querySelector("#nomApod");
    let apepatapo = document.querySelector("#apepat-apod");
    let apematapo = document.querySelector("#apemat-apod");
    let edadApo = document.querySelector("#edadApod");
    let celApo = document.querySelector("#celApod");
    let emailApo = document.querySelector("#emailApod");
    let parentesco = document.querySelector("#parentesco");
    let observacion = document.querySelector("#observacion");

    //Botones dependiendo edad

    let matricularmenor = document.querySelector("#matricularmenor")
    let matricularmayor = document.querySelector("#matricularmayor")
    


    // Divs dependiendo edad
    let emailDiv = document.querySelector("#emailDiv")
    let celularDiv = document.querySelector("#celularDiv")

    // Sweet alertar

    function alertar(textoMensaje = "", titulo= "", icono=""){
        Swal.fire({
                    title   :   titulo,
                    text    :   textoMensaje,
                    icon    :   icono,
                    footer  :   'Social Creativa ONG',
                    timer   :   700,
                    showConfirmButton: false,
                    timerProgressBar    : true
        });
    }

    
    nrodoc.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })

    nrodocapo.addEventListener("input",function(event){
            
            var valor = event.target.value;
            
            var nuevoValor = valor.replace(/[^0-9]/g, "")
            
            event.target.value = nuevoValor;
            
    })

    parentesco.addEventListener("input", function(event) {
        var valor = event.target.value;
        var nuevoValor = valor.replace(/[^a-zA-ZáéíóúÁÉÍÓÚ]/g, "");
        event.target.value = nuevoValor;
    });

    let idalumno = "";
    let idapoderado = "";

    async function tituloCurso() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "getCursos");
        parametros.append("idcurso", idcurso);

        fetch(`../controllers/curso.controller.php`, {
            method: 'POST',
            body: parametros
        })
            .then(respuesta => respuesta.json())
            .then(datos => {

            let curso =
                `
                    <i class="fa-solid fa-book fa"></i>
                    <span>Matrícula: ${datos.titulo}</span>
                    `

            titulocurso.innerHTML += curso
            })

    }

    function mostrarMatriculados() {
            var formdata = new FormData();
            formdata.append('operacion', 'listarMatriculas');
            formdata.append('idcurso', idcurso);

            fetch('../controllers/matricula.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(registros => {
                let tabla = $("#tabla-matriculados").DataTable();
                tabla.destroy();

                $("#tabla-matriculados tbody").html("");

                registros.forEach(registro => {

                    if(registro.estaMatriculado == 1){

                        let nuevaFila = `
                            <tr>
                                <td>${registro['idpersona']}</td>
                                <td>${registro['tipodoc']}</td>
                                <td>${registro['nrodocumento']}</td>
                                <td>${registro['nombreAlumno']}</td>
                                <td>${registro['parentesco'] != null ? registro['parentesco'] : ""}</td>
                                <td>${registro['nombreApoderado']}</td>
                                <td>Matriculado</td>
                                <td>${registro['titulo']}</td>
                                <td>${registro['totalhoras']}</td>
                                <td>${registro['fechamatricula'] != null ? registro['fechamatricula'] : "No esta matriculado"}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        `;
                        $("#tabla-matriculados tbody").append(nuevaFila);

                    }else if (registro.estaMatriculado == 0) {

                        let nuevaFila = `
                            <tr>
                                <td>${registro['idpersona']}</td>
                                <td>${registro['tipodoc']}</td>
                                <td>${registro['nrodocumento']}</td>
                                <td>${registro['nombreAlumno']}</td>
                                <td> ${registro['parentesco'] != null ? registro['parentesco'] : ""}</td>
                                <td>${registro['nombreApoderado']}</td>
                                <td>Prematriculado</td>
                                <td>${registro['titulo']}</td>
                                <td>${registro['totalhoras']}</td>
                                <td>${registro['fechamatricula'] != null ? registro['fechamatricula'] : "No esta matriculado"}</td>
                                <td class="text-center">
                                -
                                </td>
                            </tr>
                        `;
                        $("#tabla-matriculados tbody").append(nuevaFila);

                        

                    }else{
                        console.log("HOLA")
                    }

                });

                $('#tabla-matriculados').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                    }
                });
            })
            .catch(error => console.error(error));
        }
        
        mostrarMatriculados();    

    function getInfoAlumno() {

        const parametros = new URLSearchParams();
        parametros.append("operacion", "getInfoPersona");
        parametros.append("nrodocumento", nrodocumento.value);
        parametros.append("tipodoc", tipodocumento.value);

        fetch(`../controllers/matricula.controller.php`, {
            method: 'POST',
            body: parametros
        })
            .then(respuesta => respuesta.json())
            .then(datos => {

            if (!datos || datos.length === 0) {
                alertar("Cuidado", "Por favor verifica los datos del alumno", "warning")
                document.querySelector("#informacion-alumno").classList.add("d-none");
                document.querySelector("#datos-alumno").reset();
            } else {

                nomAlum.value = datos.nombres;
                apepat.value = datos.apepaterno;
                apemat.value = datos.apematerno;
                edadAlum.value = datos.edad;

                idalumno = datos.idpersona;

                celularDiv.innerHTML = "";
                emailDiv.innerHTML = "";

                if (parseInt(datos.edad) >= 18) {

                let celDiv =
                    `
                                <label for="">Celular</label>
                                <input type="text" class="form-control" id="celAlum" aria-describedby="" value=${datos.telefono} disabled>
                            `;
                let correoDiv =
                    `
                                <label for="">Email</label>
                                <input type="text" class="form-control"  id="emailAlum" aria-describedby="" value=${datos.email} disabled>
                            `;

                celularDiv.innerHTML += celDiv;
                emailDiv.innerHTML += correoDiv;

                apoderado.classList.add("d-none");
                matricularmayor.classList.remove("d-none");

                } else {
                apoderado.classList.remove("d-none");
                matricularmayor.classList.add("d-none");
                }

                document.querySelector("#informacion-alumno").classList.remove("d-none");

            }


            })

    }


    function getInfoPadre() {

        const parametros = new URLSearchParams();
        parametros.append("operacion", "getInfoPersona");
        parametros.append("nrodocumento", nrodocapo.value);
        parametros.append("tipodoc", tipodocapo.value);

        fetch(`../controllers/matricula.controller.php`, {
            method: 'POST',
            body: parametros
        })
            .then(respuesta => respuesta.json())
            .then(datos => {

            if (!datos || datos.length === 0) {
                alertar("Cuidado", "Por favor verifica los datos del apoderado", "warning")
                document.querySelector("#informacion-apod").classList.add("d-none");
                document.querySelector("#datos-apod").reset();
            } else {

                nomApo.value = datos.nombres;
                apepatapo.value = datos.apepaterno;
                apematapo.value = datos.apematerno;
                edadApo.value = datos.edad;
                celApo.value = datos.telefono;
                emailApo.value = datos.email;

                idapoderado = datos.idpersona;


                if (parseInt(datos.edad) <= 17) {

                alertar("Cuidado", "El apoderado no puede ser menor de edad", "warning");
                document.querySelector("#informacion-apod").classList.add("d-none");
                document.querySelector("#datos-apod").reset();
                }
                else if (nrodocapo.value == nrodocumento.value) {
                alertar("Cuidado", "No puedes ser tu propio apoderado", "warning");
                document.querySelector("#informacion-apod").classList.add("d-none");
                document.querySelector("#datos-apod").reset();
                } else {

                document.querySelector("#informacion-apod").classList.remove("d-none");
                }

            }


            })

    }

    function crearMatriculaMayor() {

        const parametros = new URLSearchParams();
        parametros.append("operacion", "registrarMatricula");
        parametros.append("idalumno", idalumno);
        parametros.append("idapoderado", "");
        parametros.append("parentesco", "");
        parametros.append("idcurso", idcurso);
        parametros.append("observacion", "");

        Swal.fire({
                title: 'Social Creativa',
                text: "¿Estás seguro de prematricularte?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`../controllers/matricula.controller.php`, {
                    method: 'POST',
                    body: parametros
                    }).then(respuesta => respuesta.json())
                    .then(datos => {
                        if (datos.mensaje == "PERMITIR") {

                        if (nivelacceso == "R" || nivelacceso == "A") {

                            alertar("Social Creativa", "Se ha registrado correctamente tu pre-matrícula", "info");
                            setTimeout(() => {
                            window.location.href = './index.php?view=cursos-admin.php';
                            }, "800");

                        } else {

                            alertar("Social Creativa", "Se ha registrado correctamente tu pre-matrícula", "info");
                            setTimeout(() => {
                            window.location.href = './index.php?view=cursos.php';
                            }, "800");

                        }
                        } else if (datos.mensaje == "DENEGAR") {
                        alertar("Social Creativa", "Ya estás matriculado en este curso", "warning");
                        }

                    });

                }
            })

    }


    function crearMatriculaMenor() {

        if (parentesco.value == "") {
            alertar("Cuidado", "Tu parentesco con el alumno no puede estar vacío", "warning");
        } else {

            const parametros = new URLSearchParams();
            parametros.append("operacion", "registrarMatricula");
            parametros.append("idalumno", idalumno);
            parametros.append("idapoderado", idapoderado);
            parametros.append("parentesco", parentesco.value);
            parametros.append("idcurso", idcurso);
            parametros.append("observacion", observacion.value);

            Swal.fire({
                title: 'Social Creativa',
                text: "¿Estás seguro de prematricularte?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`../controllers/matricula.controller.php`, {
                    method: 'POST',
                    body: parametros
                    }).then(respuesta => respuesta.json())
                    .then(datos => {
                        if (datos.mensaje == "PERMITIR") {

                        if (nivelacceso == "R" || nivelacceso == "A") {

                            alertar("Social Creativa", "Se ha registrado correctamente tu pre-matrícula", "info");
                            setTimeout(() => {
                            window.location.href = './index.php?view=cursos-admin.php';
                            }, "800");

                        } else {

                            alertar("Social Creativa", "Se ha registrado correctamente tu pre-matrícula", "info");
                            setTimeout(() => {
                            window.location.href = './index.php?view=cursos.php';
                            }, "800");

                        }
                        } else if (datos.mensaje == "DENEGAR") {
                        alertar("Social Creativa", "Ya estás matriculado en este curso", "warning");
                        }

                    });

                }
            })



        }

    }

    tituloCurso();

    matricularmenor.addEventListener("click", crearMatriculaMenor);

    matricularmayor.addEventListener("click", crearMatriculaMayor);

    document.querySelector("#buscar").addEventListener("click", getInfoAlumno);

    document.querySelector("#buscar-apod").addEventListener("click", getInfoPadre);

    document.querySelector("#reiniciar").addEventListener("click", function () {
        document.querySelector("#informacion-alumno").classList.add("d-none");
    });

    document.querySelector("#reiniciar-apod").addEventListener("click", function () {
        document.querySelector("#informacion-apod").classList.add("d-none");
    });


</script>
