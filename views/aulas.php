<?php require_once 'permisos.php'; ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-3 border bg-primary">
      <li class="breadcrumb-item active text-white" aria-current="page">
          <i class="fa-solid fa-landmark fa"></i>
          <span>Aulas</span>
      </li>
  </ol>
</nav>

<div class="mt-3">
    <button id="btn-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#crear-aula">
        Crear nueva aula
    </button>

    <!-- Modal -->
    <div class="modal fade" id="crear-aula" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="crear-curso" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div id="color-modal" class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="titulo-modal">Registrar nuevo aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off" id="form-aula-crear">
                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <label for="">Número de aula</label>
                                <input type="text" class="form-control" id="numaula" aria-describedby="">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="">Aforo</label>
                                <input type="number" class="form-control" id="aforo" aria-describedby="">
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="">Ubicación</label>
                                <input type="text" class="form-control" id="ubicacion" aria-describedby="">
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

<div class="container text-center text-primary mb-2">
    <h4>Listado de Aulas</h4>
</div>

<div class="table-responsive">
    <table class="table display responsive nowrap table-striped" width="100%" id="tabla-personas">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Número de aula</th>
                <th>Aforo</th>
                <th>Ubicación</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody class=""></tbody>
    </table>
</div>

<script>

    let btnCrear = document.querySelector("#crear");
    let btnEditar = document.querySelector("#editar");


    let btnModal = document.querySelector("#btn-modal")
    let tituloModal = document.querySelector("#titulo-modal")
    let colorModal = document.querySelector("#color-modal")

    let numaula = document.querySelector("#numaula");
    let aforo = document.querySelector("#aforo");
    let ubicacion = document.querySelector("#ubicacion");

    let idaula = 0
    

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


        function alertarToast(titulo = "",textoMensaje = "", icono = ""){
                Swal.fire({
                    title   : titulo,
                    text    : textoMensaje,
                    icon    : icono,
                    toast   : true,
                    position : 'bottom-end',
                    showConfirmButton   : false,
                    timer   : 1600,
                    timerProgressBar    : true
                });
        }        



        function validarCampo(campo, mensaje) {
                if (campo.value === "" || campo.value  === "0") {
                    alertar(mensaje, "Aula", "warning");
                    return false;
                }
                return true;
        }

        function crearAula(){

            let formdata = new URLSearchParams();
            formdata.append('operacion','registrarAulas');
            formdata.append('numaula',numaula.value);
            formdata.append('aforo',aforo.value);
            formdata.append('ubicacion',ubicacion.value);


            const campos = [
                    { campo: numaula, mensaje: "El número de aula no puede estar vacío" },
                    { campo: aforo, mensaje: "El aforo no puede estar vacío" },
                    { campo: ubicacion, mensaje: "Debe colocar una ubicación" }
            ];


            for (const campoInfo of campos) {
                if (!validarCampo(campoInfo.campo, campoInfo.mensaje)) {
                    return;
                }
            }
            Swal.fire({
                title: 'Aulas',
                text: "¿Estás seguro de crear un nuevo aula?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`../controllers/aula.controller.php`,{
                        method: 'POST',
                        body: formdata
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {

                        if(datos.status){
                            mostrarAulas();
                            alertarToast("Aulas", "Se creó un nuevo aula", "success");
                            document.querySelector("#form-aula-crear").reset();
                            $('#crear-aula').modal('hide');
                        }else{
                            console.log(datos)
                        }

                    })

                }
            })
        }

        btnCrear.addEventListener("click", crearAula)

        function mostrarAulas() {
            var formdata = new FormData();
            formdata.append('operacion', 'listarAulas');

            fetch('../controllers/aula.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(registros => {
                let tabla = $("#tabla-personas").DataTable();
                tabla.destroy();

                $("#tabla-personas tbody").html("");

                registros.forEach(registro => {
                    let nuevaFila = `
                        <tr>
                        <td>${registro['idaula']}</td>
                        <td>${registro['numaula']}</td>
                        <td>${registro['aforo']}</td>
                        <td>${registro['ubicacion']}</td>
                        <td class="text-center">
                                <button data-idaula="${registro['idaula']}" type="button" class="btn mr-4 btn-info" id="editar-aula">Editar</button>
                                <button data-idaula="${registro['idaula']}" type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    $("#tabla-personas tbody").append(nuevaFila);
                });

                $('#tabla-personas').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                    }
                });
            })
            .catch(error => console.error(error));
        }

        document.addEventListener('click', function(event) {
            if (event.target.id === 'editar-aula') {

                idaula = event.target.getAttribute('data-idaula');

                btnCrear.classList.add('d-none')
                btnEditar.classList.remove('d-none')

                colorModal.classList.remove('bg-primary')
                colorModal.classList.add('bg-info')

                tituloModal.textContent = "Editar aula"

                const parametros = new URLSearchParams();
                parametros.append("operacion","getAulas")
                parametros.append("idaula",idaula)

                fetch(`../controllers/aula.controller.php`,{
                    method: 'POST',
                    body: parametros
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    numaula.value = datos.numaula
                    aforo.value = datos.aforo
                    ubicacion.value = datos.ubicacion
                    $('#crear-aula').modal('show');
                })

            }

            if (event.target.id === 'eliminar') {

                idaula = event.target.getAttribute('data-idaula');

                const parametros = new URLSearchParams();
                parametros.append("operacion","eliminarAula")
                parametros.append("idaula",idaula)

                Swal.fire({
                title: 'Aulas',
                text: "¿Estás seguro de eliminar el aula?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {                

                if (result.isConfirmed) {

                    fetch(`../controllers/aula.controller.php`,{
                        method: 'POST',
                        body: parametros
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {

                        if(datos.status){
                            alertarToast("Se eliminó correctamente el aula", "Aula", "success");
                            mostrarAulas();
                        }else{
                            console.log(datos)
                        }

                    })

                }                

            }
        )}            

        })

        function editarAula(){

            let formdata = new URLSearchParams();
            formdata.append('operacion','actualizarAulas');
            formdata.append('idaula',idaula);
            formdata.append('numaula',numaula.value);
            formdata.append('aforo',aforo.value);
            formdata.append('ubicacion',ubicacion.value);

            Swal.fire({
                title: 'Aulas',
                text: "¿Estás seguro de editar el aula?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch(`../controllers/aula.controller.php`,{
                        method: 'POST',
                        body: formdata
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {

                        if(datos.status){
                            mostrarAulas();
                            alertarToast("Aulas", "Se editó la información del aula", "success");
                            document.querySelector("#form-aula-crear").reset();
                            $('#crear-aula').modal('hide');
                        }else{
                            console.log(datos)
                        }

                    })

                }
            })
        }
        
        btnEditar.addEventListener("click",editarAula)

        btnModal.addEventListener("click", function (){

            btnCrear.classList.remove('d-none')
            btnEditar.classList.add('d-none')

            colorModal.classList.add('bg-primary')
            colorModal.classList.remove('bg-info')

            tituloModal.textContent = "Crear aula"

            document.querySelector("#form-aula-crear").reset()
        })

        mostrarAulas();


</script>
