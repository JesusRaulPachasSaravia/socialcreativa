<?php

require_once "../models/Habilidad.php";

if(isset($_POST['operacion'])){

    $habilidad= new Habilidad;
    
    if($_POST['operacion']=='listarHabilidades'){
        echo json_encode($habilidad->listarHabilidades());
    }

    if($_POST['operacion']=='registrarHabilidades'){

        $datosSolicitados=[
            "idcategoria_habi"  =>$_POST['idcategoria_habi'],
            "idprofesor"        =>$_POST['idprofesor'],
            "habilidad"         =>$_POST['habilidad'],
            "comentario"        =>$_POST['comentario']
        ];
        $respuesta = $habilidad->registrarHabilidades($datosSolicitados);
        echo json_encode($respuesta);
    }


    if($_POST['operacion']=='actualizarHabilidades'){

        $datosSolicitados=[
            "idhabilidades"     =>$_POST['idhabilidades'],
            "idcategoria_habi"  =>$_POST['idcategoria_habi'],
            "idprofesor"        =>$_POST['idprofesor'],
            "habilidad"         =>$_POST['habilidad'],
            "comentario"        =>$_POST['comentario']
        ];
       $respuesta = $habilidad->actualizarHabilidades($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='getHabilidad'){
        echo json_encode( $habilidad->getHabilidad($_POST['idhabilidades']));
    }
    
    if($_POST['operacion']=='eliminarHabilidad'){
         $respuesta =$habilidad->eliminarHabilidad($_POST['idhabilidades']);
        echo json_encode($respuesta);    
    }

}

?>