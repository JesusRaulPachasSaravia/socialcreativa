<?php require_once 'permisos.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-3 border bg-primary">
      <li class="breadcrumb-item active text-white" aria-current="page">
          <i class="fa-solid fa-calendar fa"></i>
          <span>Horarios</span>
      </li>
  </ol>
</nav>

<div class="mt-3">
    <button id="btn-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-horario">
        Crear nuevo horario
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crear-horario" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="crear-curso" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div  id="color-modal"class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="titulo-modal">Registrar nuevo horario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" id="form-horario-crear">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <label for="">Seleccione el curso</label>
                                <select class="custom-select" name="" id="cursos">
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Lunes</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entL" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salL" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Martes</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entM" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salM" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Miercoles</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entX" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salX" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Jueves</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entJ" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salJ" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Viernes</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entV" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salV" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="card">
                                    <h5 class="card-header bg-dark text-center text-white">Sabado</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Hora de entrada</label>
                                                <input type="time" class="form-control" id="entS" aria-describedby="">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="">Hora de salida</label>
                                                <input type="time" class="form-control" id="salS" aria-describedby="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="crear">Crear</button>
                    <button type="button" class="btn btn-info d-none" id="editar">Editar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 mt-4 g-4 mb-4" id="horarios">


</div>

<script>

    let entL = document.querySelector("#entL")
    let salL = document.querySelector("#salL")

    let entM = document.querySelector("#entM")
    let salM = document.querySelector("#salM")

    let entX = document.querySelector("#entX")
    let salX = document.querySelector("#salX")

    let entJ = document.querySelector("#entJ")
    let salJ = document.querySelector("#salJ")

    let entV = document.querySelector("#entV")
    let salV = document.querySelector("#salV")

    let entS = document.querySelector("#entS")
    let salS = document.querySelector("#salS")

    let horarioArray = []

    let btnCrear = document.querySelector("#crear")
    let btnEditar = document.querySelector("#editar");


    let btnModal = document.querySelector("#btn-modal")
    let tituloModal = document.querySelector("#titulo-modal")
    let colorModal = document.querySelector("#color-modal")

    let idcurso = 0

    let idhorarios = []
    let horariosdias = []
    let horariosinicio = []
    let horariosfin = []
    
    const selectCursos = document.querySelector("#cursos");

    
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

    function crearHorario() {
    horarioArray = [];
    let erroresValidacion = false;

    if (entL.value && salL.value) {
        if (!validarHoras(entL.value, salL.value, "Lunes")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["L", entL.value + ":00", salL.value + ":00"]);
        }
    }

    if (entM.value && salM.value) {
        if (!validarHoras(entM.value, salM.value, "Martes")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["M", entM.value + ":00", salM.value + ":00"]);
        }
    }

    if (entX.value && salX.value) {
        if (!validarHoras(entX.value, salX.value, "Miércoles")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["X", entX.value + ":00", salX.value + ":00"]);
        }
    }

    if (entJ.value && salJ.value) {
        if (!validarHoras(entJ.value, salJ.value, "Jueves")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["J", entJ.value + ":00", salJ.value + ":00"]);
        }
    }

    if (entV.value && salV.value) {
        if (!validarHoras(entV.value, salV.value, "Viernes")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["V", entV.value + ":00", salV.value + ":00"]);
        }
    }

    if (entS.value && salS.value) {
        if (!validarHoras(entS.value, salS.value, "Sábado")) {
            erroresValidacion = true;
        } else {
            horarioArray.push(["S", entS.value + ":00", salS.value + ":00"]);
        }
    }

    if (erroresValidacion) {
        alertar("Horarios", "El horario de salida no puede ser menor al horario de entrada.", "warning");
    } else if (selectCursos.value == 0) {
        alertar("Horarios", "Debes elegir un curso para asignarle un horario.", "warning");
    } else if (horarioArray.length === 0) {
        alertar("Horarios", "Debe ingresar al menos un día con valores en los horarios.", "warning");
    } else {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "registrarHorarios");
        parametros.append("horarios", JSON.stringify(horarioArray)); // Convertimos el array a una cadena JSON
        parametros.append("idcurso", selectCursos.value);

        fetch(`../controllers/horario.controller.php`, {
            method: 'POST',
            body: parametros
        })
        .then(respuesta => respuesta.json())
        .then(datos => {
            if (datos.status) {
                mostrarHorarios();
                alertar("Horarios", "Se le asignó el horario al curso.", "success");
                document.querySelector("#form-horario-crear").reset();
                $('#crear-horario').modal('hide');
                getCursos();
            }
        })
    }
}


      function validarHoras(entrada, salida, dia) {

      const horaEntrada = new Date(`1970-01-01T${entrada}:00`);
      const horaSalida = new Date(`1970-01-01T${salida}:00`);

      if (horaSalida < horaEntrada) {

          return false;
      }

      return true;
    }


    function mostrarHorarios() {
        var formdata = new FormData();
        formdata.append('operacion', 'listarHorarios');

        const diasCompletos = {
            L: 'Lunes',
            M: 'Martes',
            X: 'Miércoles',
            J: 'Jueves',
            V: 'Viernes',
            S: 'Sábado',
        };

        fetch('../controllers/horario.controller.php', {
            method: 'POST',
            body: formdata
        })
        .then(response => response.json())
        .then(registros => {
            document.querySelector("#horarios").innerHTML = "";

            registros.forEach(registro => {
            var diasHorarios = registro['dias_horarios'].split(',');

            var nuevoHorario = `
                <div class="col mb-3">
                <div class="card border-success">
                    <!-- Imagen del curso -->
                    <img src="../views/cursos/banner_default.png" class="card-img-top" alt="Guitarra"/>
                    <!-- Header del card -->
                    <div class="card-header bg-white">
                    <!-- Título del curso -->
                    <h4 class="card-title text-center text-primary">${registro['titulo']}</h4>
                    <!-- Descripción del curso -->
                    <h5 class="card-text text-secondary mt-2">Profesor:</h5>
                    <h6 class="card-text">${registro['nombreProfesor']}</h6>
                    <div class="row">
                        <div class="col-md-4 col-4">Día</div>
                        <div class="col-md-4 col-4">Hora Inicio</div>
                        <div class="col-md-4 col-4">Hora Fin</div>
                    </div>
                    </div>
                    <!-- Información del curso -->
                    <div class="card-body">
                    <div class="row">
                    ${diasHorarios.map(diaHora => {
                        var [dia, horario] = diaHora.split(' - ');
                        var [horaInicio, horaFin] = horario.split(' a ');
                        return `
                            <div class="col-md-4 col-4">${diasCompletos[dia]}</div>
                            <div class="col-md-4 col-4">${horaInicio}</div>
                            <div class="col-md-4 col-4">${horaFin}</div>
                        `;
                        }).join('')}
                    </div>
                    </div>
                    <!-- Footer del card -->
                    <div class="card-footer">
                    <div class="row ">

                        <div class="col-md-12 col-12 text-center">
                            <button data-idcurso="${registro['idcurso']}" type="button" class="btn btn-info m-2" id="editar-horario">Editar</button>
                            <button data-idcurso="${registro['idcurso']}" type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
                        </div>

                    </div>
                    </div><!-- Fin del footer -->
                </div><!-- Fin del card -->
                </div><!-- Fin del col -->
            `;

            document.querySelector("#horarios").innerHTML += nuevoHorario;
            });

        })
        .catch(error => console.error(error));
        }

        mostrarHorarios();


    function getCursos() {
        const parametros = new URLSearchParams();
        parametros.append('operacion', 'listarCursosSinHorarios');

        fetch('../controllers/horario.controller.php', {
                method: 'POST',
                body: parametros
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
              const opcionPorDefecto = selectCursos.querySelector('option[value="0"]');
              selectCursos.innerHTML = ''; // Limpiar las opciones excepto la opción por defecto
              selectCursos.appendChild(opcionPorDefecto); // Agregar la opción por defecto al principio

                datos.forEach(element => {
                    const optionTag = document.createElement("option");
                    optionTag.value = element.idcurso;
                    optionTag.text = element.titulo;
                    selectCursos.appendChild(optionTag);
                });
            })
            .catch(error => {
                console.log(error);
            });
    }

        function editarHorario(){

            // Suponiendo que ya tienes los arrays con los datos
            // idhorarios, horariosdias, horariosinicio y horariosfin

            const promesasFetch = idhorarios.map((idhorario, index) => {
            const dia = horariosdias[index];
            const horainicio = horariosinicio[index];
            const horafin = horariosfin[index];

            console.log(idcurso)

            console.log(`${dia + " "  + idhorario + " " + horainicio + " " + horafin}`)

            // Aquí puedes armar el objeto FormData o los parámetros que desees enviar
            // en la petición fetch para actualizar cada horario individualmente
            const formData = new FormData();
            formData.append('operacion', 'actualizarHorarios');
            formData.append('idcurso', idcurso);
            formData.append('idhorario', idhorario);
            formData.append('dia', dia);
            formData.append('horainicio', horainicio);
            formData.append('horafin', horafin);

            return fetch('../controllers/horario.controller.php', {
                method: 'POST',
                body: formData
            })
                .then((respuesta) => respuesta.json())
                .then(datos => {
                    if(datos.status){
                        console.log("Se realizo")
                    }else{
                        console.log(datos)
                    }
                })
                .catch((error) => {
                console.error('Error al actualizar el horario:', error);
                });
            });

            Promise.all(promesasFetch)
            .then((resultados) => {
                console.log('Actualización de horarios completa:', resultados);
                // Aquí puedes realizar alguna acción adicional después de actualizar todos los horarios.

                // Ejecutar SweetAlert solo después de que se completen todas las actualizaciones
                Swal.fire({
                title: 'Aulas',
                text: '¿Estás seguro de editar el aula?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    mostrarHorarios();
                    alertar("Horarios", "Se actualizo el horario del curso.", "success");
                    document.querySelector("#form-horario-crear").reset();
                    $('#crear-horario').modal('hide');
                }
                });
            })
            .catch((error) => {
                console.error('Error al actualizar horarios:', error);
            });


        }    

        document.addEventListener('click', function(event) {

            if (event.target.id === 'editar-horario') {

                idhorarios = []

                horariosdias= []

                horariosinicio = []
                horariosfin = []

                document.querySelector("#form-horario-crear").reset()
                
                idcurso = event.target.getAttribute('data-idcurso')

                btnCrear.classList.add('d-none')
                btnEditar.classList.remove('d-none')

                colorModal.classList.remove('bg-primary')
                colorModal.classList.add('bg-info')

                tituloModal.textContent = "Editar horario"

                const parametros = new URLSearchParams();
                parametros.append("operacion","getHorario")
                parametros.append("idhorario",idcurso)

                fetch(`../controllers/horario.controller.php`,{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    $('#crear-horario').modal('show');
                    
                    datos.forEach(registros => {

                        idhorarios.push(registros.idhorario)

                        horariosdias.push(registros.dia)

                        horariosinicio.push(registros.horainicio)
                        horariosfin.push(registros.horafin)

                        if(registros.dia == "L"){
                            entL.value = registros.horainicio
                            salL.value = registros.horafin
                        }else if(registros.dia == "M"){
                            entM.value = registros.horainicio
                            salM.value = registros.horafin
                        }else if(registros.dia == "X"){
                            entX.value = registros.horainicio
                            salX.value = registros.horafin
                        }else if(registros.dia == "J"){
                            entJ.value = registros.horainicio
                            salJ.value = registros.horafin
                        }else if(registros.dia == "V"){
                            entV.value = registros.horainicio
                            salV.value = registros.horafin
                        }else if(registros.dia == "S"){
                            entS.value = registros.horainicio
                            salS.value = registros.horafin
                        }

                        
                    })

                    
                    console.log(idhorarios)
                    console.log(horariosdias)
                    console.log(horariosinicio)
                    console.log(horariosfin)
                })

            }

        })
        
    btnModal.addEventListener("click", function (){

        btnCrear.classList.remove('d-none')
        btnEditar.classList.add('d-none')

        colorModal.classList.add('bg-primary')
        colorModal.classList.remove('bg-info')

        tituloModal.textContent = "Crear horario"

        document.querySelector("#form-horario-crear").reset()
    })        

    btnCrear.addEventListener("click",crearHorario)
    btnEditar.addEventListener("click",editarHorario)

    getCursos();
</script>
