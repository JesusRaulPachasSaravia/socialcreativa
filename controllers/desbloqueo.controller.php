<?php

require_once "../models/Desbloqueo.php";

if (isset($_POST['operacion'])){

    $desbloqueo= new Desbloqueo();
    
    if($_POST['operacion']=='validarCodigo'){
        $datos = [
            'idusuario'         => $_POST['idusuario'],
            'codigodesbloqueo'  => $_POST['codigodesbloqueo']
        ];

        $resultado =$desbloqueo->validarCodigo($datos);
        echo json_encode($resultado);
    }

    if($_POST['operacion'] == 'actualizarClave'){

        $claveEncriptada = password_hash($_POST['claveacceso'],PASSWORD_BCRYPT);
        $idusuario = $_POST['idusuario'];
    
        $datos = [
          "idusuario" => $idusuario,
          "claveacceso" => $claveEncriptada
        ];
    
        echo json_encode($desbloqueo->actualizarClave($datos));
    
      }
}
?>