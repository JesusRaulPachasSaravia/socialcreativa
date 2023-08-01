<?php require_once 'permisos.php'; ?>

<div class="container text-center text-primary mb-2">
    <h4>Listado de Deudores</h4>
</div>

<div class="mt-2 mb-4">
    <button type="button" class="btn btn-success" id="enviar-correo">Enviar correo a los deudores</button>
</div>

<div class="table-responsive">
    <table class="table display responsive nowrap table-striped" width="100%" id="tabla-personas">
        <thead class="table-dark">
            <tr>
                <th>Nombres Alumno</th>
                <th>Nombres Apoderado</th>
                <th>Pagos Realizados</th>
                <th>Pagos Pendientes</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody class=""></tbody>
    </table>
</div>

<script>

    let btnDeudores = document.querySelector("#enviar-correo")

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


    function enviarCorreoDeudores(){

        var formdata = new FormData();
        formdata.append('operacion', 'enviarCorreoADeudores');

        Swal.fire({
                title: 'Social Creativa',
                text: "¿Estás seguro de enviar los correos a los deudores?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    fetch('../controllers/pagos.controller.php', {
                        method: 'POST',
                        body: formdata
                    })
                    .then(response => response.json())
                    .then(datos => {
                            alertarToast("Social Creativa", "Se enviaron los correos", "success");
                    })
                }
                })


    }

    btnDeudores.addEventListener("click",enviarCorreoDeudores)

    function mostrarPersonas() {
        var formdata = new FormData();
        formdata.append('operacion', 'listarDeudores');

        fetch('../controllers/pagos.controller.php', {
            method: 'POST',
            body: formdata
        })
        .then(response => response.json())
        .then(registros => {
            console.log(registros);
            let tabla = $("#tabla-personas").DataTable();
            tabla.destroy();

            $("#tabla-personas tbody").html("");

            registros.forEach(registro => {
                let nuevaFila = `
                    <tr>
                        <td>${registro['Nombre_Alumno']}</td>
                        <td>${registro['Nombre_Apoderado']}</td>
                        <td>${registro['pagos_realizados']}</td>
                        <td>${registro['pagos_totales_pendientes']}</td>
                        <td>${registro['titulo']}</td>
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

    mostrarPersonas();
</script>
