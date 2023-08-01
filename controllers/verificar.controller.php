<?php

require_once "../models/Verificar.php";

if (isset($_POST['operacion'])){

    $verificar = new Verificar();
    
    if($_POST['operacion']=='verificarDNI'){
        $datos = [
            'dni' => $_POST['dni']
        ];

        $resultado = $verificar->verificarDNI($datos);
        echo json_encode($resultado);
    }

    if($_POST['operacion']=='verificarCorreo'){
        $datos = [
            'correo' => $_POST['correo']
        ];

        $resultado = $verificar->verificarCorreo($datos);
        echo json_encode($resultado);
    }

    if($_POST['operacion']=='verificarTelefono'){
        $datos = [
            'telefono' => $_POST['telefono']
        ];

        $resultado = $verificar->verificarTelefono($datos);
        echo json_encode($resultado);
    }

    if($_POST['operacion']=='verificarUsuario'){
        $datos = [
            'usuario' => $_POST['usuario']
        ];

        $resultado = $verificar->verificarUsuario($datos);
        echo json_encode($resultado);
    }


}
?>