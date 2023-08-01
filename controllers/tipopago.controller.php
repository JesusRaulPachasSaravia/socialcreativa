<?php


require_once "../models/TipoPago.php";



if(isset($_POST['operacion'])){

    $tipopago = new TipoPago();

    if($_POST['operacion']=='listarTipoPagos'){
        echo json_encode($tipopago->listarTipoPagos());
    }


    if($_POST['operacion']=='pagar'){
        $datosSolicitados=[
            "idusuario"        =>$_POST['idusuario'],
            "idtipopago"       =>$_POST['idtipopago'],
            "idmatricula"      =>$_POST['idmatricula'],
            "importe"          =>$_POST['importe'],
            "num_operacion"    =>$_POST['num_operacion']
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
}

?>