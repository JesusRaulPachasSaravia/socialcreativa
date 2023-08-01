<?php 

require_once "../models/Profesor.php";

if(isset($_POST['operacion'])){

    $profesor = new Profesor();

    if($_POST['operacion']=='listarProfesores'){
        // $dataProfesor = $profesor->listarProfesores();
        echo json_encode($profesor->listarProfesores());
    }

    if($_POST['operacion']=='listarAlumnos'){
        echo json_encode($profesor->listarAlumnos($_POST['idcurso']));
    }


    if($_POST['operacion']=='registrarProfesores'){
        $datosSolicitados=[
            "idpersona"     =>$_POST['idpersona'],
            "nom_banco"     =>$_POST['nom_banco'],
            "num_cuenta"    =>$_POST['num_cuenta'],
            "tipo_cuenta"   =>$_POST['tipo_cuenta']
        ];
        $respuesta=$profesor->registrarProfesores($datosSolicitados);
            echo json_encode($respuesta);
    }

    if($_POST['operacion']=='actualizarProfesores'){
        $datosSolicitados=[
            "idprofesor" =>$_POST['idprofesor'],
            "idpersona" =>$_POST['idpersona'],
            "nom_banco" =>$_POST['nom_banco'],
            "num_cuenta" =>$_POST['num_cuenta'],
            "tipo_cuenta" =>$_POST['tipo_cuenta']
        ];
        $respuesta = $profesor->actualizarProfesores($datosSolicitados);
        echo json_encode($respuesta);
    }

    
    if($_POST['operacion']=='getProfesores'){
        echo json_encode($profesor->getProfesores($_POST['idprofesor']));
    }


    
    if($_POST['operacion']=='eliminarProfesor'){
        $respuesta=$profesor->eliminarProfesor($_POST['idprofesor']);
        echo json_encode($respuesta);
    }

}


?>