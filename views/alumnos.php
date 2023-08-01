<?php
require_once 'permisos.php';
$variableSesion = $_SESSION['login']['nivelacceso'];

echo "<script>";
echo "var nivelacceso = " . json_encode($variableSesion) . ";";
echo "</script>";

?>


<div class="row">

    <div class="col-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 border bg-primary">
                <li class="breadcrumb-item active text-white" aria-current="page" id="titulo-curso">
                </li>
            </ol>
        </nav>
    </div>
    
        <div class="col-12">
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
                            <th>Fecha de matricula</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>



</div>




<script>


    let url = new URL(window.location.href);
    let idcurso = url.searchParams.get("idcurso");
    //Titulo del curso

    let titulocurso = document.querySelector("#titulo-curso")
    

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
                    <span>Alumos del curso de ${datos.titulo}</span>
                    `

            titulocurso.innerHTML += curso
            })

    }

    function mostrarMatriculados() {
            var formdata = new FormData();
            formdata.append('operacion', 'listarAlumnos');
            formdata.append('idcurso', idcurso);

            fetch('../controllers/profesor.controller.php', {
                method: 'POST',
                body: formdata
            })
            .then(response => response.json())
            .then(registros => {
                let tabla = $("#tabla-matriculados").DataTable();
                tabla.destroy();

                $("#tabla-matriculados tbody").html("");

                registros.forEach(registro => {

                        let nuevaFila = `
                            <tr>
                                <td>${registro['idpersona']}</td>
                                <td>${registro['tipodoc']}</td>
                                <td>${registro['nrodocumento']}</td>
                                <td>${registro['nombreAlumno']}</td>
                                <td>${registro['parentesco'] != null ? registro['parentesco'] : ""}</td>
                                <td>${registro['nombreApoderado']}</td>
                                <td>Matriculado</td>
                                <td>${registro['fechamatricula'] != null ? registro['fechamatricula'] : "No esta matriculado"}</td>
                            </tr>
                        `;
                        $("#tabla-matriculados tbody").append(nuevaFila);
                    
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

    tituloCurso();


</script>
