<?php

require_once "../models/Horario.php";

if(isset($_POST['operacion'])){

    $horario = new Horario();

    if($_POST['operacion']=='listarHorarios'){
        echo json_encode($horario->listarHorarios());
    }

    if($_POST['operacion']=='listarCursosSinHorarios'){
        echo json_encode($horario->listarCursosSinHorarios());
    }



    if ($_POST['operacion'] == 'registrarHorarios') {
        $horarios = json_decode($_POST['horarios'], true);
        $resultado = array("status" => false, "message" => "");
    
        foreach ($horarios as $registro) {
            $datosSolicitados = array(
                "idcurso"    => $_POST['idcurso'],
                "dia"        => $registro[0], // Acceder al primer elemento del array $horario
                "horainicio" => $registro[1], // Acceder al segundo elemento del array $horario
                "horafin"    => $registro[2]  // Acceder al tercer elemento del array $horario
            );
    
            $resultado = $horario->registrarHorarios($datosSolicitados);
    
            if (!$resultado["status"]) {
                $resultado["message"] = "Error al registrar los horarios";
                break;
            }

        }
        echo json_encode($resultado);
    
    }
        
    if($_POST['operacion']=='listarHorarioUsuarios'){
        echo json_encode($horario->listarHorarioUsuarios($_POST['idusuario']));
    }

    if($_POST['operacion']=='listarHorarioProfesores'){
        echo json_encode($horario->listarHorarioProfesores($_POST['idprofesor']));
    }
        
        


    if($_POST['operacion']=='actualizarHorarios'){
        $datosSolicitados=[

            "idhorario"  =>$_POST['idhorario'],
            "idcurso"    =>$_POST['idcurso'],
            "dia"        =>$_POST['dia'],
            "horainicio" =>$_POST['horainicio'],
            "horafin"    =>$_POST['horafin']
        ];
        $respuesta = $horario->actualizarHorarios($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='getHorario'){
        echo json_encode($horario->getHorario($_POST['idhorario']));
    }

    if($_POST['operacion']=='eliminarHorario'){
        $respuesta=$horario->eliminarHorario($_POST['idhorario']);
        echo json_encode($respuesta);
    }

}