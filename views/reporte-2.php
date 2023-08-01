<?php 
require_once 'permisos.php'; 
?>

<div>
    
    <div class="p-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 border bg-primary">
                <li class="breadcrumb-item active text-white" aria-current="page">
                    <i class="fa-solid fa-chart-simple fa"></i>
                    <span>Reporte de cantidad de dinero recaudado por curso</span>
                </li>
            </ol>
        </nav>
    </div>
    
    <div class="row row-cols-1 row-cols-md-1 g-4 mb-4">
    
        <div class="col">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        <label for="">Mes inicial</label>
                        <select class="custom-select" name="" id="mesInicial">
                            <option value="0">Seleccione</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="">Mes final</label>
                        <select class="custom-select" name="" id="mesFinal">
                            <option value=''>Seleccione</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="">Año</label>
                        <select class="custom-select" name="" id="anioReporte">
                            <option value=''>Seleccione</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>

                    <div class="col-md-4 mt-4">
                        <button type="button" class="btn btn-success mt-2" id="buscar">Buscar</button>
                        <button type="button" class="btn btn-danger mt-2 ml-0 ml-md-2" id="generarPDF">Generar PDF</button>
                    </div>

                </div>
            </div>
        </div>
    
        
        <div class="col mt-5">
            <div class="container">
                
                <div class="table-responsive">
                    <table class="table display responsive nowrap table-striped" width="100%" id="tabla-inscritos-cursos">
                        <colgroup>
                            <col width="30%">
                            <col width="35%">
                            <col width="35%">
                        </colgroup>
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Título del curso</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class=""></tbody>
                    </table>
                </div>    
    
            </div>
        </div>

        <div class="col-xl-1 col-lg-1"></div>

        <div class="p-5 col-xl-10 col-lg-10 d-none" id="grafico">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Social Creativa</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                <canvas id="myBarChart"></canvas>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-1 col-lg-1"></div>        
    
    </div>

</div>

<script>

let selectMesInicial = document.querySelector("#mesInicial");
let selectMesFinal = document.querySelector("#mesFinal");
let selectAnioReporte = document.querySelector("#anioReporte");
let btnBuscar = document.querySelector("#buscar");
const btnGenerar = document.querySelector("#generarPDF");
let grafico = document.querySelector("#grafico")
let permitir = 0;




function alertar(textoMensaje = "", titulo= "", icono=""){
        Swal.fire({
                    title   :   titulo,
                    text    :   textoMensaje,
                    icon    :   icono,
                    footer  :   'Social Creativa ONG',
                    timer   :   900,
                    showConfirmButton: false,
                    timerProgressBar    : true
        });
    }


function reporte() {

        if(selectMesInicial.value == 0){
            alertar("Reportes","Debes elegir como mínimo el mes inicial","warning")
        }else{
            const parametros = new URLSearchParams();
            parametros.append("operacion", "dineroRecaudadoMesAño");
            parametros.append("mesDesde", selectMesInicial.value);
            parametros.append("mesHasta", selectMesFinal.value);
            parametros.append("anio", selectAnioReporte.value);
            
            console.log(selectAnioReporte.value)
            
            fetch(`../controllers/reporte.controller.php`, {
                method: 'POST',
                body: parametros
            })
            .then(respuesta => respuesta.json())
            .then(datos => {
                if (datos.length === 0) {
                    alertar("Reportes","No hay datos para generar un reporte","warning")
                    permitir = 1
                    // Restablecer el DataTable
                    $('#tabla-inscritos-cursos').DataTable().destroy()
                    $("#tabla-inscritos-cursos tbody").html("");
                    grafico.classList.add('d-none');
                    $('#tabla-inscritos-cursos').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                        }
                    });
                } else {
                    console.log(datos)
                    $('#tabla-inscritos-cursos').DataTable().destroy();
                    $("#tabla-inscritos-cursos tbody").html("");
                    grafico.classList.remove('d-none');
                    permitir = 2
                    datos.forEach(registro => {
                        let nuevaFila = `
                            <tr>
                                <td>${registro['idcurso']}</td>
                                <td>${registro['titulo']}</td>
                                <td>${registro['ingreso_mensual']} soles</td>
                            </tr>
                        `;
    
                        $("#tabla-inscritos-cursos tbody").append(nuevaFila);
                    });

                    generarGrafico(datos)

                    $('#tabla-inscritos-cursos').DataTable({
                        language: {
                            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
                        }
                    });
                }
            })
            .catch(error => console.error(error));

        }

    }

    function generarGrafico(datos) {

        const titulos = [];
        const ingreso = [];

        datos.forEach(registro => {
            titulos.push(registro['titulo']);
            ingreso.push(registro['ingreso_mensual']);
        });

        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: titulos,
            datasets: [{
            label: "Ingreso mensual",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: ingreso,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
            },
            scales: {
            xAxes: [{
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 10
                },
                maxBarThickness: 70,
            }],
            yAxes: [{
                ticks: {
                min: 0,
                max: 1000,
                maxTicksLimit: 6,
                padding: 10,
                callback: function(value, index, values) {
                    return number_format(value);
                }
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 5,
            yPadding: 5,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ": " + number_format(tooltipItem.yLabel);
                }
            }
            },
        }
        });

    }    

    function PDFBuild() {

        if(selectMesInicial.value == 0){
            alertar("Reportes","Debes elegir como mínimo el mes inicial para generar el PDF","warning")
        }else if(permitir < 2){
            alertar("Reportes","No hay datos disponibles para generar el PDF","warning")
        }else{
        const parametros = new URLSearchParams();
        parametros.append("mesDesde", selectMesInicial.value);
        parametros.append("mesHasta", selectMesFinal.value);
        parametros.append("anio", selectAnioReporte.value);
        //Abrimos en una ventana aparte el PDF generado
        window.open(`../reports/content-report-cursos-dinero/reporte.php?${parametros}`, '_blank')

        }
    }
    


btnBuscar.addEventListener("click", reporte);
btnGenerar.addEventListener('click', PDFBuild)




</script>
