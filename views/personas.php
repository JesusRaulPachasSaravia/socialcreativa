<?php require_once 'permisos.php'; 

$variableSesion = $_SESSION['login']['nivelacceso'];

echo "<script>";
echo "var nivelaccesousu = " . json_encode($variableSesion) . ";";
echo "</script>";


?>

<div class="container text-center text-primary mb-2">
    <h4>Listado de Personas</h4>
</div>

<div class="table-responsive">
    <table class="table display responsive nowrap table-striped" width="100%" id="tabla-personas">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tipo de Doc.</th>
                <th>Nro de Doc.</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Nivel de Acceso</th>
                <th>Comandos</th>
            </tr>
        </thead>
        <tbody class=""></tbody>
    </table>
</div>

    <!-- Modal mas info -->
    <div class="modal fade" id="info-curso" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="info-curso" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div id="color-modal" class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="titulo-curso-info">Editar nivel de acceso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" autocomplete="off" id="form-curso-crear" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-12 mt-3">
                        <label for="prof-info">Nivel de acceso</label>
                        <select class="custom-select" name="" id="nivelAcceso">
                                <option value="0">Seleccione</option>
                        </select>
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

<script>

    let idusuario = 0

    let nivelAcceso = document.querySelector("#nivelAcceso")

    function getRoleName(nivelacceso) {
        switch (nivelacceso) {
            case 'R':
                return 'Root';
            case 'A':
                return 'Admin';
            case 'C':
                return 'Colaborador';
            case 'P':
                return 'Profesor';
            case 'T':
                return 'Tutor';
            default:
                return 'No tiene ningún tipo de acceso';
        }
    }

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

    function mostrarPersonas() {
        var formdata = new FormData();
        formdata.append('operacion', 'listarPersonas');

        fetch('../controllers/persona.controller.php', {
            method: 'POST',
            body: formdata
        })
        .then(response => response.json())
        .then(registros => {
            let tabla = $("#tabla-personas").DataTable();
            tabla.destroy();

            $("#tabla-personas tbody").html("");

            registros.forEach(registro => {
                
                if(registro.nivelacceso != "R"){
                    
                    let nuevaFila = `
                    <tr>
                            <td>${registro['idpersona']}</td>
                            <td>${registro['tipodoc'] != null ? registro['tipodoc'] : ''}</td>
                            <td>${registro['nrodocumento'] != null ? registro['nrodocumento'] : ''}</td>
                            <td>${registro['nombrePila'] != null ? registro['nombrePila'] : ''}</td>
                            <td>${registro['telefono'] != null ? registro['telefono'] : 'No asignó un número de celular'}</td>
                            <td>${registro['email'] != null ? registro['email'] : 'No asignó un correo'}</td>
                            <td>${getRoleName(registro['nivelacceso'])}</td>
                            <td class="text-center">
                                <button data-idpersona="${registro['idpersona']}" type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    
                    $("#tabla-personas tbody").append(nuevaFila);
                }

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

            if (event.target.id === 'eliminar') {

                idpersona = event.target.getAttribute('data-idpersona');

                const parametros = new URLSearchParams();
                parametros.append("operacion","eliminarPersona")
                parametros.append("idpersona",idpersona)

                Swal.fire({
                title: 'Social Creativa',
                text: "¿Estás seguro de eliminar a esta persona?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {                

                if (result.isConfirmed) {

                    fetch(`../controllers/persona.controller.php`,{
                        method: 'POST',
                        body: parametros
                    })
                    .then(respuesta => respuesta.json())
                    .then(datos => {

                        if(datos.status){
                            alertarToast("Se eliminó correctamente a la persona", "Personas", "success");
                            mostrarPersonas();
                        }else{
                            console.log(datos)
                        }

                    })

                }                

                }
            )
        }
        
            if (event.target.id === 'editar-nivel') {

                idusuario = event.target.getAttribute('data-idusuario');

                if(idusuario == "null"){

                    alertar("Este usuario no se puede editar su nivel de acceso","Personas","warning")

                }else{
                    $('#info-curso').modal('show');
            }

        }
        
        function getNiveles() {

            if(nivelaccesousu == "A"){

                datos.forEach(element => {
                    const optionTag = document.createElement("option");
                    optionTag.value = element.idcurso;
                    optionTag.text = element.titulo;
                    selectCursos.appendChild(optionTag);
                });

            }
        

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

    })    

    mostrarPersonas();
</script>
