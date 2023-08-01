<?php

require_once "../models/Curso.php";


if(isset($_POST['operacion'])){

    $curso = new Curso();


    $operacion = $_POST['operacion'];

    switch($operacion) {
        case 'listarCursosActivos':
            $estado = 'A';
            break;
        case 'listarCursosInactivos':
            $estado = 'I';
            break;
        case 'listarCursosEliminados':
            $estado = 'E';
            break;
        case 'listarCursosFinalizados':
            $estado = 'F';
            break;
        // No hay acciones específicas en el caso por defecto
    }
    
    if (isset($estado)) {
        echo json_encode($curso->listarCursos($estado));
    }




    // if($_POST['operacion']=='listarCursosActivos'){

    //     $estado='A';
    //     echo json_encode($curso->listarCursos($estado));
    // }

    // if($_POST['operacion']=='listarCursosInactivos'){

    //     $estado='I';
    //     echo json_encode($curso->listarCursos($estado));
    // }

    // if($_POST['operacion']=='listarCursosEliminados'){

    //     $estado='E';
    //     echo json_encode($curso->listarCursos($estado));
    // }

    // if($_POST['operacion']=='listarCursosFinalizados'){

    //     $estado='F';
    //     echo json_encode($curso->listarCursos($estado));
    // }

    
    if($_POST['operacion']=='validarVacantesCursos'){
        echo json_encode($curso->validarVacantesCursos($_POST['idcurso']));
    }
    
    

    if($_POST['operacion']=='registrarCursos'){

        $datosSolicitados= [
            "idcategoria"   =>$_POST['idcategoria'],
            "idprofesor"    =>$_POST['idprofesor'],
            "idaula"        =>$_POST['idaula'],
            "titulo"        =>$_POST['titulo'],
            "descripcion"   =>$_POST['descripcion'],
            "nivel"         =>$_POST['nivel'],
            "edadminima"    =>$_POST['edadminima'],
            "edadmaxima"    =>$_POST['edadmaxima'],
            "vacantes"      =>$_POST['vacantes'],
            "totalhoras"    =>$_POST['totalhoras'],
            "precio"        =>$_POST['precio'],
            "fecha_inicio"  =>$_POST['fecha_inicio'],
            "fecha_fin"     =>$_POST['fecha_fin'],
            "imagen"        => ""
        ];

        if(isset($_FILES['imagen'])){
            $rutaDestino = "../views/cursos/";
            $fechaActual = date("c");
            $nombreArchivo = sha1($fechaActual).".jpg";
            $rutaDestino .=$nombreArchivo;

            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)){
                $datosSolicitados["imagen"] = $nombreArchivo;
            }
        }
        $respuesta= $curso->registrarCursos($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='actualizarCursos'){
        $datosSolicitados= [

            "idcurso"       =>$_POST['idcurso'],
            "idcategoria"   =>$_POST['idcategoria'],
            "idprofesor"    =>$_POST['idprofesor'],
            "idaula"        =>$_POST['idaula'],
            "titulo"        =>$_POST['titulo'],
            "descripcion"   =>$_POST['descripcion'],
            "nivel"         =>$_POST['nivel'],
            "edadminima"    =>$_POST['edadminima'],
            "edadmaxima"    =>$_POST['edadmaxima'],
            "vacantes"      =>$_POST['vacantes'],
            "totalhoras"    =>$_POST['totalhoras'],
            "precio"        =>$_POST['precio'],
            "fecha_inicio"  =>$_POST['fecha_inicio'],
            "fecha_fin"     =>$_POST['fecha_fin']
        ];
        $respuesta= $curso->actualizarCursos($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='getCursos'){
        echo json_encode($curso->getCurso($_POST['idcurso']));
    }

    if($_POST['operacion']=='eliminarCurso'){
        echo json_encode($curso->eliminarCurso($_POST['idcurso']));
    }

}