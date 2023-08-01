<?php
require_once 'permisos.php';

$variableSesion = $_SESSION['login']['idusuario'];

echo "<script>";
echo "var idusuario = " . json_encode($variableSesion) . ";";
echo "</script>";

?>

<div id="alumno">
    
    <div class="p-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 border bg-primary">
                <li class="breadcrumb-item active text-white" aria-current="page" id="titulo-curso">
                    <i class="fa-solid fa-credit-card fa"></i>
                    <span>Pago de cursos</span>
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
                            <button type="button" class="btn btn-danger mt-1 ml-2" id="reiniciar">Reiniciar</button>
                        </div>
    
                    </div>
            </div>
        </div>
    
    
        <div class="col mt-5 d-none" id="informacion-pago">
            <div class="container">
                <div class="card">
                    <h5 class="card-header bg-dark text-center text-white">Información de pago</h5>
                    <div class="card-body">
                        
                        <form action="" autocomplete="off" id="datos-pago">
                            
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
                                    <label for="">Curso por pagar</label>
                                    <select class="custom-select" name="" id="cursoPagar">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>

                                
                                <div class="col-md-4 mt-3" id="">
                                  <label for="">Método de pago</label>
                                  <select class="custom-select" name="" id="metodoPago">
                                      <option value="0">Seleccione</option>
                                      <option value="1">Efectivo</option>
                                      <option value="2">Transferencia</option>
                                      <option value="3">Yape</option>
                                      <option value="4">Plin</option>
                                    </select>
                              </div>
        
                                <div class="col-md-4 mt-3" id="">
                                    <label for="">Monto</label>
                                    <input type="text" class="form-control" id="montoCurso" aria-describedby="" disabled>
                                </div>

                                <div class="col-md-4 mt-3" id="">
                                    <label for="">Descuento</label>
                                    <select class="custom-select" name="" id="descuentoCurso">
                                        <option value="0">Sin descuento</option>
                                        <option value="1">25%</option>
                                        <option value="2">50%</option>
                                        <option value="3">75%</option>
                                    </select>
                                </div>

                            </div>
                        </form>
                            
                    </div>
                    <div class="card-footer text-center">
                        <h6>Social Creativa ONG - Área de sistemas</h6>
                    </div>
                </div>
    
                <div class="col mt-4" align="center" id="pagar">
                    <button type="button" class="btn btn-primary mt-1" id="pagar">Pagar</button>
                </div>
    
            </div>
        </div>
    
    </div>

</div>

<script>
      // Alumno Form
      const nrodoc = document.querySelector("#nrodocumento");
      const tipodoc = document.querySelector("#tipodocumento");
      const nomAlum = document.querySelector("#nomAlum");
      const apepat = document.querySelector("#apepat");
      const apemat = document.querySelector("#apemat");
      const cursoPagar = document.querySelector("#cursoPagar");
      const metodoPago = document.querySelector("#metodoPago");
      const descuentoCurso = document.querySelector("#descuentoCurso");
      const montoCurso = document.querySelector("#montoCurso");

      let total = 0;
      let pordesc = "";
      let observa = "";
      let dataId = "";

      // Botones
      const btnPagar = document.querySelector("#pagar");

      // Sweet Alert
      function alertar(textoMensaje = "", titulo = "", icono = "") {
        Swal.fire({
          title: titulo,
          text: textoMensaje,
          icon: icono,
          footer: 'Social Creativa ONG',
          timer: 700,
          showConfirmButton: false,
          timerProgressBar: true
        });
      }

      nrodoc.addEventListener("input", function(event) {
        const valor = event.target.value;
        const nuevoValor = valor.replace(/[^0-9]/g, "");
        event.target.value = nuevoValor;
      });

      function getInfoAlumno() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "datosPagosObtener");
        parametros.append("nrodoc", nrodoc.value);
        parametros.append("tipodoc", tipodoc.value);

        fetch(`../controllers/pagos.controller.php`, {
            method: 'POST',
            body: parametros
          })
          .then(respuesta => respuesta.json())
          .then(datos => {
            if (!datos || datos.length === 0) {
              alertar("Cuidado", "Por favor verifica los datos del alumno", "warning");
              document.querySelector("#informacion-pago").classList.add("d-none");
              document.querySelector("#datos-pago").reset();
            } else {
              nomAlum.value = datos[0].nombres;
              apepat.value = datos[0].apepaterno;
              apemat.value = datos[0].apematerno;
              document.querySelector("#informacion-pago").classList.remove("d-none");
              datos.forEach(element => {
                const optionTag = document.createElement("option");
                optionTag.value = element.idmatricula;
                optionTag.setAttribute("data-idcurso", element.idcurso);
                optionTag.text = element.titulo;
                cursoPagar.appendChild(optionTag);
              });
            }
          });
      }

      cursoPagar.addEventListener("change", function() {
        const parametros = new URLSearchParams();
        parametros.append("operacion", "datosPagosObtener");
        parametros.append("nrodoc", nrodoc.value);
        parametros.append("tipodoc", tipodoc.value);

        fetch(`../controllers/pagos.controller.php`, {
            method: 'POST',
            body: parametros
          })
          .then(respuesta => respuesta.json())
          .then(datos => {
            if (cursoPagar.value == 0) {
              total = 0;
              montoCurso.value = `${total} soles`;
            } else {
              const selectedOption = cursoPagar.options[cursoPagar.selectedIndex];
              dataId = selectedOption.dataset.idcurso;

              const parametros2 = new URLSearchParams();
              parametros2.append("operacion", "getCursos");
              parametros2.append("idcurso", parseInt(dataId));

              fetch(`../controllers/curso.controller.php`, {
                  method: 'POST',
                  body: parametros2
                })
                .then(respuesta => respuesta.json())
                .then(datos => {
                  total = datos.precio;
                  montoCurso.value = `${total} soles`;
                });
            }
          });
      });

      descuentoCurso.addEventListener("change", function() {

        if(cursoPagar.value == 0){
          alertar("Social Creativa", "Debes elegir un curso para generar un descuento", "warning");
          total = 0
          montoCurso.value = `${total} soles`
          descuentoCurso.selectedIndex = 0
        }else{
          
          const parametros = new URLSearchParams();
          parametros.append("operacion", "getCursos");
          parametros.append("idcurso", parseInt(dataId));
  
          fetch(`../controllers/curso.controller.php`, {
              method: 'POST',
              body: parametros
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
  
              if (descuentoCurso.value == "0") {
                total = datos.precio;
                pordesc = 0;
                observa = null;
                montoCurso.value = `${total} soles`;
              } else if (descuentoCurso.value == "1") {
                const precioCurso = parseInt(datos.precio);
                const descuento = precioCurso * 25 / 100;
                total = precioCurso - descuento;
                pordesc = 25;
                observa = "Se aplicó un descuento del 25%";
                montoCurso.value = `${total} soles`;
              } else if (descuentoCurso.value == "2") {
                const precioCurso = parseInt(datos.precio);
                const descuento = precioCurso * 50 / 100;
                total = precioCurso - descuento;
                pordesc = 50;
                observa = "Se aplicó un descuento del 50%";
                montoCurso.value = `${total} soles`;
              } else if (descuentoCurso.value == "3") {
                const precioCurso = parseInt(datos.precio);
                const descuento = precioCurso * 75 / 100;
                total = precioCurso - descuento;
                pordesc = 75;
                observa = "Se aplicó un descuento del 75%";
                montoCurso.value = `${total} soles`;
              }
            });

        }

      });

      function pagarCurso() {
        if (cursoPagar.value == 0) {
          alertar("Social Creativa", "Debes elegir un curso", "warning");
        } else if (metodoPago.value == 0) {
          alertar("Social Creativa", "Debes elegir un método de pago", "warning");
        } else {
          const parametros = new URLSearchParams();
          parametros.append("operacion", "pagar");
          parametros.append("idusuario", idusuario);
          parametros.append("idtipopago", parseInt(metodoPago.value));
          parametros.append("idmatricula", parseInt(cursoPagar.value));
          parametros.append("importe", total);
          parametros.append("porcentajedescuento", pordesc);
          parametros.append("observacion", observa);

          fetch("../controllers/pagos.controller.php", {
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos => {
              if (datos.status) {
                alertar("Social Creativa", "La matrícula ha sido pagada", "success");
                setTimeout(() => {
                  window.location.href = '../views/index.php?view=pagos.php';
                }, 900);
              } else {
                alertar("Social Creativa", "La matrícula no ha sido pagada", "warning");
              }
              console.log(datos)
            })
            .catch(error => {
              console.error("Error en la solicitud fetch:", error);
            });
        }
      }


      document.querySelector("#buscar").addEventListener("click", getInfoAlumno);

      document.querySelector("#reiniciar").addEventListener("click", function() {
        nrodoc.value = "";
        tipodoc.selectedIndex = 0;
        document.querySelector("#informacion-pago").classList.add("d-none")
        document.querySelector("#datos-pago").reset();
      });

      btnPagar.addEventListener("click", pagarCurso);
</script>
