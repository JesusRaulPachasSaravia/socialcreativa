<?php require_once 'permisos.php'; ?>

<div class="align-items-center justify-content-between mb-4">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-3 border bg-primary">
              <li class="breadcrumb-item active text-white" aria-current="page">
                  <i class="fa-solid fa-gauge-high fa"></i>
                  <span> Dashboard</span>
              </li>
          </ol>
      </nav>
</div>

<div class="row">
  <!-- Profesores -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Profesores
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><p id="profesores"></p></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard-user fa-2x text-dark"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Usuarios -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Usuarios
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><p id="usuarios"></p></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-dark"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cursos -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Cursos
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><p id="cursos"></p></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book fa-2x text-dark"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Colaboradores -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
              Colaboradores
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><p id="colaboradores"></p></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-group fa-2x text-dark"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin del row -->

<script>

let profesores = document.querySelector("#profesores")
let usuarios = document.querySelector("#usuarios")
let cursos = document.querySelector("#cursos")
let colaboradores = document.querySelector("#colaboradores")

let totalCursos = [0]

function nroProf(){

      const parametros = new URLSearchParams();
      parametros.append("operacion","listarProfesores")

      fetch(`../controllers/profesor.controller.php`,{
        method: 'POST',
        body: parametros
      })
      .then(respuesta => respuesta.json())
      .then(datos => {
        profesores.textContent = datos.length
      })
  
}

function nroUsuarios(){

  const parametros = new URLSearchParams();
  parametros.append("operacion","listarUsuarios")

  fetch(`../controllers/usuario.controller.php`,{
    method: 'POST',
    body: parametros
  })
  .then(respuesta => respuesta.json())
  .then(datos => {
    usuarios.textContent = datos.length
  })

}

async function nroCursos(){

  const parametros = new URLSearchParams();
  parametros.append("operacion","listarCursosInactivos")

  const parametros2 = new URLSearchParams();
  parametros2.append("operacion","listarCursosActivos")

  fetch(`../controllers/curso.controller.php`,{
    method: 'POST',
    body: parametros
  })
  .then(respuesta => respuesta.json())
  .then(datos => {
    totalCursos.push(datos.length)
  })

fetch(`../controllers/curso.controller.php`,{
    method: 'POST',
    body: parametros2
  })
  .then(respuesta => respuesta.json())
  .then(datos => {
    totalCursos.push(datos.length)
    const suma = totalCursos.reduce((valorAnterior, valorActual) => {
    return valorAnterior + valorActual;
  }, 0);

  cursos.textContent = suma

  })

}

function nroColab(){

  const parametros = new URLSearchParams();
  parametros.append("operacion","listarColaboradores")

  fetch(`../controllers/usuario.controller.php`,{
    method: 'POST',
    body: parametros
  })
  .then(respuesta => respuesta.json())
  .then(datos => {
    colaboradores.textContent = datos.length
  })

}

nroProf()
nroUsuarios()
nroCursos()
nroColab()

</script>
