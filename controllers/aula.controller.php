<?php

require_once "../models/Aula.php";


if(isset($_POST['operacion'])){

    $aula = new Aula();

    if($_POST['operacion']=='listarAulas'){
        echo json_encode($aula->listarAulas());
    }

    if($_POST['operacion']=='registrarAulas'){
        $datosSolicitados=[

            "numaula"   =>$_POST['numaula'],
            "aforo"     =>$_POST['aforo'],
            "ubicacion" =>$_POST['ubicacion']
        ];
        $respuesta= $aula->registrarAulas($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='actualizarAulas'){
        $datosSolicitados=[

            "idaula"    =>$_POST['idaula'],
            "numaula"   =>$_POST['numaula'],
            "aforo"     =>$_POST['aforo'],
            "ubicacion" =>$_POST['ubicacion']
        ];
        $respuesta= $aula->actualizarAulas($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='getAulas'){
        $respuesta=$aula->getAula($_POST['idaula']);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='eliminarAula'){
        $respuesta=$aula->eliminarAulas($_POST['idaula']);
        echo json_encode($respuesta);
    }


}

