<?php


require_once "../models/Alumno.php";





if(isset($_POST['operacion'])){

    $alumno = new Alumno();

    if($_POST['operacion']=='listarAlumnos'){
        echo json_encode($alumno->listarAlumnos());
    }

    if($_POST['operacion']=='ContarAlumnosPorCurso'){
        echo json_encode($alumno->contarAlumnosPorCurso());
    }


    // if($_POST['operacion']=='contarAlumnosEntreFechas'){

    //     $datosSolicitados=[
    //         "_fechaDesde" =>$_POST['_fechaDesde'],
    //         "_fechaHasta" =>$_POST['_fechaHasta']
    //     ];
    //     echo json_encode($alumno->contarAlumnosEntreFechas($datosSolicitados));
    // }


    // if($_POST['operacion']=='registrarAlumnos'){
    //     $datosSolicitados=[

    //         "idpersona"     =>$_POST['idpersona'],
    //         "esMayordeEdad" =>$_POST['esMayordeEdad'],
    //         "parentesco"    =>$_POST['parentesco']
    //     ];
    //     $respuesta = $alumno->registrarAlumnos($datosSolicitados);
    //     echo json_encode($respuesta);
    // }

    if($_POST['operacion']=='actualizarAlumnos'){
        $datosSolicitados=[

            "idmatricula"       =>$_POST['idmatricula'],
            "idalumno"          =>$_POST['idalumno'],
            "idapoderado"       =>$_POST['idapoderado'],
            "parentesco"        =>$_POST['parentesco'],
            "observacion"       =>$_POST['observacion'],
        ];
        $respuesta = $alumno->actualizarAlumnos($datosSolicitados);
        echo json_encode($respuesta);
    }


    // if($_POST['operacion']=='getAlumnos'){
    //     echo json_encode($alumno->getAlumno($_POST['idalumno']));
    // }

    // if($_POST['operacion']=='eliminarAlumno'){
    //     $respuesta=$alumno->eliminarAlumno($_POST['idalumno']);
    //     echo json_encode($respuesta);
    // }
}