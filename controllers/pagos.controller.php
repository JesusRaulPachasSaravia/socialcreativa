<?php


require_once "../models/Pagos.php";
require_once "../models/Mail.php";


if(isset($_POST['operacion'])){

    $pago = new Pagos();

    if($_POST['operacion']=='listarPagos'){
        echo json_encode($pago->listarPagos());
    }

    if($_POST['operacion']=='listarDeudores'){
        echo json_encode($pago->listarDeudores());
    }



// inicio zona de prueba 


if ($_POST['operacion'] == 'enviarCorreoADeudores') {
    $deudores = $pago->listarDeudores();

    // Recorrer los deudores y enviar correos
    foreach ($deudores as $deudor) {
        $destino = $deudor['correo_destino'];
        $mesesAtraso = $deudor['pagos_totales_pendientes'];

            $mensaje = '';

            if ($deudor['edad_alumno'] < 18) {
                $mensaje .= "¡Hola estimado/a {$deudor['Nombre_Apoderado']}!<br><br>";
                $mensaje .= "Esperamos que te encuentres bien. Queríamos recordarte que tu poderante, {$deudor['Nombre_Alumno']}, está matriculado en el emocionante curso de {$deudor['titulo']}. Sin embargo, hemos notado que en este momento presenta un pequeño retraso de <span style='color: red;'>{$mesesAtraso} meses</span> en el pago del curso.<br>";
                $mensaje .= "Entendemos que pueden surgir imprevistos, pero te animamos a poner al día el pago lo antes posible para que {$deudor['Nombre_Alumno']} pueda seguir aprovechando al máximo su experiencia educativa.<br><br>";
                $mensaje .= "Estamos aquí para apoyarte en todo lo que necesites, así que si requieres alguna ayuda o facilidad de pago, por favor, no dudes en contactarnos. Tu satisfacción y la educación de {$deudor['Nombre_Alumno']} son nuestra prioridad.<br><br>";
                $mensaje .= "¡Gracias por confiar en nosotros y formar parte de nuestra comunidad en Social Creativa!<br><br>";
                $mensaje .= "¡Saludos cordiales!<br>";
                
            } else {
                $mensaje .= "¡Hola {$deudor['Nombre_Alumno']}!<br><br>";
                $mensaje .= "Queríamos recordarte que actualmente presentas un retraso de <span style='color: red;'>{$mesesAtraso} meses</span> en el pago del curso {$deudor['titulo']}. Sabemos que a veces pueden surgir situaciones complicadas, pero te animamos a regularizar tu situación lo antes posible.<br>";
                $mensaje .= "Nuestro equipo está aquí para ayudarte en lo que necesites, así que si tienes alguna duda o requieres alguna facilidad de pago, no dudes en contactarnos. Tu éxito educativo es importante para nosotros y estamos comprometidos contigo en este camino de aprendizaje.<br><br>";
                $mensaje .= "¡Agradecemos tu confianza y esperamos que sigas siendo parte de nuestra comunidad en Social Creativa!<br><br>";
                $mensaje .= "¡Saludos cordiales!<br>";
                
            }

            // Construir el asunto y el mensaje del correo
            $asunto = 'Recordatorio de pago - Social Creativa';
            $mensaje .= "<strong>Atentamente,</strong><br>";
            $mensaje .= "El equipo de Social Creativa";

        // Enviar correo al destinatario
        enviarCorreo($destino, $asunto, $mensaje);
    }

    // Devolver la respuesta JSON
    echo json_encode($deudores);
}

// fin zona de prueba


    if($_POST['operacion']=='pagar'){
        $datosSolicitados=[
            "idusuario"                    =>$_POST['idusuario'],
            "idtipopago"                   =>$_POST['idtipopago'],
            "idmatricula"                  =>$_POST['idmatricula'],
            "importe"                      =>$_POST['importe'],
            "porcentajedescuento"          =>$_POST['porcentajedescuento'],
            "observacion"                  =>$_POST['observacion']
        ];

        $respuesta = $pago->pagar($datosSolicitados);
        echo json_encode($respuesta);
    }

    
    if($_POST['operacion']=='Descuento50%'){

        $datosSolicitados=[
            "idpago"            => $_POST['idpago'],
            "porcentajedescuento" => 50,
            "_descuento"          => 0.50
        ];

        $respuesta = $pago->descuentosPagos($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='Descuento75%'){

        $datosSolicitados=[
            "idpago"            => $_POST['idpago'],
            "porcentajedescuento" => 75,
            "_descuento"          => 0.25
        ];

        $respuesta = $pago->descuentosPagos($datosSolicitados);
        echo json_encode($respuesta);
    }
    if($_POST['operacion']=='Descuento25%'){

        $datosSolicitados=[
            "idpago"            => $_POST['idpago'],
            "porcentajedescuento" => 25,
            "_descuento"          => 0.75
        ];

        $respuesta = $pago->descuentosPagos($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='datosPagosObtener'){
        $datos = [
            'tipodoc'         => $_POST['tipodoc'],
            'nrodoc'          => $_POST['nrodoc']
        ];

        $resultado =$pago->datosPagosObtener($datos);
        echo json_encode($resultado);
    }

}

?>