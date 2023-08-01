<?php 
require_once 'permisos.php'; 

$variableSesion = $_SESSION['login']['idpersona'];

echo "<script>";
echo "var idusuario = " . json_encode($variableSesion) . ";";
echo "</script>";

$variableSesion = $_SESSION['login']['nivelacceso'];

echo "<script>";
echo "var nivelacceso = " . json_encode($variableSesion) . ";";
echo "</script>";

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb p-3 border bg-primary">
      <li class="breadcrumb-item active text-white" aria-current="page">
          <i class="fa-solid fa-calendar fa"></i>
          <span>Mis Horarios</span>
      </li>
  </ol>
</nav>


<div class="row row-cols-1 row-cols-md-3 mt-4 g-4 mb-4" id="horarios">


</div>

<script>

    function mostrarHorariosUsuarios() {
        var formdata = new FormData();
        formdata.append('operacion', 'listarHorarioUsuarios');
        formdata.append('idusuario', idusuario);

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
                                <img src="../views/cursos/banner_default.png" class="card-img-top" alt="Default"/>
                                <!-- Header del card -->
                                <div class="card-header bg-white">
                                    <!-- Título del curso -->
                                    <h4 class="card-title text-center text-primary">${registro['titulo']}</h4>
                                    <!-- Descripción del curso -->
                                    <h5 class="card-text text-secondary mt-2">Profesor:</h5>
                                    <h6 class="card-text">${registro['nombreProfesor']}</h6>

                                    <h5 class="card-text text-secondary mt-2">Ubicacion - Aula:</h5>
                                    <h6 class="card-text">${registro['ubicacion']} - ${registro['numaula']}</h6>

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

                            </div><!-- Fin del card -->
                        </div><!-- Fin del col -->
                    `;
                    
                    document.querySelector("#horarios").innerHTML += nuevoHorario;
                


            });

        }).catch(error => 
        document.querySelector("#horarios").innerHTML += `
        <div class="container text-center">
          <h5>No estás matriculado en ningún curso</h5>
        </div>
        `
        );

    }


    function mostrarHorariosProfesores() {
        var formdata = new FormData();
        formdata.append('operacion', 'listarHorarioProfesores');
        formdata.append('idprofesor', idusuario);

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

                if(nivelacceso == "P"){

                    var diasHorarios = registro['dias_horarios'].split(',');

                    var nuevoHorario = `
                        <div class="col mb-3">
                            <div class="card border-success">
                                <!-- Imagen del curso -->
                                <img src="../views/cursos/banner_default.png" class="card-img-top" alt="Default"/>
                                <!-- Header del card -->
                                <div class="card-header bg-white">
                                    <!-- Título del curso -->
                                    <h4 class="card-title text-center text-primary">${registro['titulo']}</h4>
                                    <!-- Descripción del curso -->
                                    <h5 class="card-text text-secondary mt-2">Profesor:</h5>
                                    <h6 class="card-text">${registro['nombreProfesor']}</h6>
                                    <h5 class="card-text text-secondary mt-2">Ubicacion:</h5>
                                    <h6 class="card-text">${registro['ubicacion']}</h6>
                                    <h5 class="card-text text-secondary mt-2">Aula:</h5>
                                    <h6 class="card-text">${registro['numaula']}</h6>
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

                                        <div class="col-md-12 col-12 text-center">
                                            <a class="btn btn-info mt-4 mt-md-4 mt-sm-0 mt-lg-2" href="./index.php?view=alumnos.php&idcurso=${registro['idcurso']}" role="button" aria-expanded="false">
                                                <i class='bx bx-id-card'></i>
                                                <span>Ver alumnos</span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- Fin del card -->
                        </div><!-- Fin del col -->
                    `;
                    
                    document.querySelector("#horarios").innerHTML += nuevoHorario;
                }


            });

        }).catch(error => 
        document.querySelector("#horarios").innerHTML += `
        <div class="container text-center">
          <h5>No estás matriculado en ningún curso</h5>
        </div>
        `
        );

    }

    if(nivelacceso == "T" || nivelacceso == "R" || nivelacceso == "A" || nivelacceso == "C"){
        mostrarHorariosUsuarios();
    }

    if(nivelacceso == "P"){
        mostrarHorariosProfesores();
    }

</script>
