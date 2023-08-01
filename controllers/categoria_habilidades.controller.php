<?php

require_once "../models/Categoria_Habilidad.php";

if(isset($_POST['operacion'])){

    $categoria_habilidad = new Categoria_Habilidad;


    
    if($_POST['operacion']=='listarCategoriaHabilidades'){
        echo json_encode($categoria_habilidad->listarCategoriaHabilidades());
    }


     
    if($_POST['operacion']=='registrarCategoriaHabilidades'){   

        $datoSolicitado=[
            "categoria_habilida" =>$_POST['categoria_habilida']
        ];

       $respuesta=$categoria_habilidad->registrarCategoriaHabilidades($datoSolicitado);
        echo json_encode($respuesta);
    }
     
    if($_POST['operacion']=='actualizarCategoriaHabilidades'){   

        $datosSolicitado=[
            "idcategoria_habi"   =>$_POST['idcategoria_habi'],
            "categoria_habilida" =>$_POST['categoria_habilida']
        ];

       $respuesta=$categoria_habilidad->actualizarCategoriaHabilidades($datosSolicitado);
        echo json_encode($respuesta);
    }


    if($_POST['operacion']=='getCategoriaHabilidades'){
            echo json_encode($categoria_habilidad->getCategoriaHabilidades($_POST['idcategoria_habi']));
    }

    if($_POST['operacion']=='eliminarCategoriaHabilidades'){
           $respuesta= $categoria_habilidad->eliminarCategoriaHabilidades($_POST['idcategoria_habi']);
            echo json_encode($respuesta);
        }




}

?>