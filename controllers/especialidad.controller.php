<?php


require_once "../models/Especialidad.php";

if(isset($_POST['operacion'])){

    $especialidad = new Especialidad();

    if($_POST['operacion']=='listarEspecialidades'){
        echo json_encode($especialidad->listarEspecialidades());
    }


    if($_POST['operacion']=='registrarEspecialidades'){
        $datosSolicitados=[
            "nomespecialidad"   =>$_POST['nomespecialidad'],
            "comentario"        =>$_POST['comentario']
        ];
        $respuesta= $especialidad->registrarEspecialidades($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='actualizarEspecialidades'){
        $datosSolicitados=[
            "idespecialidad"   =>$_POST['idespecialidad'],
            "nomespecialidad"   =>$_POST['nomespecialidad'],
            "comentario"        =>$_POST['comentario']
        ];
        $respuesta= $especialidad->actualizarEspecialidades($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='getEspecialidad'){
        $respuesta=$especialidad->getEspecialidad($_POST['idespecialidad']);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='eliminarEspecialidad'){
        $respuesta=$especialidad->eliminarEspecialidad($_POST['idespecialidad']);
        echo json_encode($respuesta);
    }
}