<?php

require_once "../models/Matricula.php";



if(isset($_POST['operacion'])){

    $matricula = new Matricula();


    if($_POST['operacion']=='listarMatriculas'){
        echo json_encode($matricula->listarMatriculas($_POST['idcurso']));
    }


    if ($_POST['operacion'] == 'registrarMatricula') {
        $datosSolicitados = [
            "idalumno"      => $_POST['idalumno'],
            "idapoderado"   => ($_POST['idapoderado'] !== '') ? $_POST['idapoderado'] : null,
            "parentesco"    => ($_POST['parentesco'] !== '') ? $_POST['parentesco'] : null,
            "idcurso"      => $_POST['idcurso'],
            "observacion"   => ($_POST['observacion'] !== '') ? $_POST['observacion'] : null
        ];
    
        $respuesta = $matricula->registrarMatricula($datosSolicitados);
        echo json_encode($respuesta);
    }
    

    if($_POST['operacion']=='getInfoPersona'){
        $datos = [
            'nrodocumento'  => $_POST['nrodocumento'],
            'tipodoc'       => $_POST['tipodoc']
        ];

        $resultado =$matricula->getInfoPersona($datos);
        echo json_encode($resultado);
    }

    if($_POST['operacion']=='matricular'){
        $respuesta = $matricula->matricular($_POST['idMatricula']);
        echo json_encode($respuesta);

    }


    if($_POST['operacion']=="getMatricula"){
        echo json_encode($matricula->getMatricula($_POST['idMatricula']));
    }


}


?>