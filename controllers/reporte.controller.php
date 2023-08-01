<?php
require_once "../models/Reporte.php";
require_once "../helpers/functions.php";

if(isset($_POST['operacion'])){ 

    $reporte = new Reporte();




// Cantidad de alumnos inscritos por taller (mensual).
    if($_POST['operacion'] == 'contarAlumnosMesAño'){

        $datosSolicitados =[
            "mesDesde" => $_POST['mesDesde'],
            "mesHasta" => $_POST['mesHasta'] !== '' ? $_POST['mesHasta'] : $_POST['mesDesde'],
            "anio" => $_POST['anio'] !== '' ? $_POST['anio'] : date("Y")
        ];

        if(validarNumeroMes($datosSolicitados['mesDesde']) && validarNumeroMes($datosSolicitados['mesHasta'])){

            if(verificarOrdenMeses($datosSolicitados['mesDesde'], $datosSolicitados['mesHasta'])){


                $respuesta = $reporte->contarAlumnosMensualEntreFechas($datosSolicitados);
                    
                echo json_encode($respuesta);


            }else{
                    echo "Revise los meses";
            }

        }else {
            echo "Mes de matricula invalido";
        }
    }




// Cantidad de alumnos inscritos por taller (mensual).
    if($_POST['operacion'] == 'dineroRecaudadoMesAño'){

        $datosSolicitados =[
            "mesDesde" => $_POST['mesDesde'],
            "mesHasta" => $_POST['mesHasta'] !== '' ? $_POST['mesHasta'] : $_POST['mesDesde'],
            "anio" => $_POST['anio'] !== '' ? $_POST['anio'] : date("Y")
        ];

        if(validarNumeroMes($datosSolicitados['mesDesde']) && validarNumeroMes($datosSolicitados['mesHasta'])){

            if(verificarOrdenMeses($datosSolicitados['mesDesde'], $datosSolicitados['mesHasta'])){


                $respuesta = $reporte->cantidadDineroRecaudadoMensualEntreFechas($datosSolicitados);
                    
                echo json_encode($respuesta);


            }else{
                    echo "Revise los meses";
            }

        }else {
            echo "Mes de matricula invalido";
        }
    }


// curso con mas  alumnos inscritos por taller (mensual).
    if($_POST['operacion'] == 'masIncritosMesAño'){

        $datosSolicitados =[
            "mesDesde" => $_POST['mesDesde'],
            "mesHasta" => $_POST['mesHasta'] !== '' ? $_POST['mesHasta'] : $_POST['mesDesde'],
            "anio" => $_POST['anio'] !== '' ? $_POST['anio'] : date("Y")
        ];

            if(validarNumeroMes($datosSolicitados['mesDesde']) && validarNumeroMes($datosSolicitados['mesHasta'])){

                if(verificarOrdenMeses($datosSolicitados['mesDesde'], $datosSolicitados['mesHasta'])){

                    
                    $respuesta = $reporte->cursoMasInscritosEntreFechas($datosSolicitados);
                    
                    echo json_encode($respuesta);

                }else{
                    echo "Revise los meses ";
                }

            }else {
                echo "Mes de matricula invalido";
            }
    }


// Cursos con poca afluencia de inscritos
    if($_POST['operacion'] == 'pocaAfluencia'){

        $datosSolicitados =[
            "mesDesde" => $_POST['mesDesde'],
            "mesHasta" => $_POST['mesHasta'] !== '' ? $_POST['mesHasta'] : $_POST['mesDesde'],
            "anio" => $_POST['anio'] !== '' ? $_POST['anio'] : date("Y")
        ];

            if(validarNumeroMes($datosSolicitados['mesDesde']) && validarNumeroMes($datosSolicitados['mesHasta'])){

                if(verificarOrdenMeses($datosSolicitados['mesDesde'], $datosSolicitados['mesHasta'])){

                    
                    $respuesta = $reporte->cursosPocosInscritosEntreFechas($datosSolicitados);
                    
                    echo json_encode($respuesta);

                }else{
                    echo "Revise los meses ";
                }

            }else {
                echo "Mes de matricula invalido";
            }
    }



// Comparaciones sobre qué taller tuvo más ingresos
    if($_POST['operacion'] == 'cursosMayorIngresos'){

        $datosSolicitados = [
            "mes" => $_POST['mes'],
            "anio" => $_POST['anio'] !== '' ? $_POST['anio'] : date("Y")
        ];

        if(validarNumeroMes($datosSolicitados['mes'])){

            $respuesta = $reporte->cursosMayorIngreso($datosSolicitados);

            echo json_encode($respuesta);

        }else {
            echo "Mes de matricula invalido";
        }


    }












    // if($_POST['operacion']=='contarAlumnosPorFechas'){

    //     $mesMatricula = $_POST['mesMatricula'];

    //     if(validarNumeroMes($mesMatricula)){
    //         echo json_encode($reporte->contarAlumnosPorFechas($mesMatricula));
    //     }else { 
    //         echo "Mes de matricula indvalido";
    //     }

    //     // echo json_encode($reporte->contarAlumnosPorFechas($_POST['mesMatricula']));
    // }

    // if($_POST['operacion']=='ingresosMensualPorCurso'){

    //     $mesPago = $_POST['mesPago'];


    //     if(validarNumeroMes($mesPago)){
    //         echo json_encode($reporte->ingresoTotalMensualPorCurso($mesPago));
    //     }else {
    //         echo "Mes de Pago invalido";
    //     }
        
    // }


    
}



