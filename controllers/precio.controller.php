<?php

require_once "../models/Precio.php";

if(isset($_POST['operacion'])){


    $precio = new Precio();

    if($_POST['operacion']=='listarPrecios'){
        echo json_encode($precio->listarPrecios());
    }

    if($_POST['operacion']=='registrarPrecios'){

        $datosSolicitados=[
            "idcurso" =>$_POST['idcurso'],
            "porcentajedescuento" =>$_POST['porcentajedescuento'],
            "monto" =>$_POST['monto']
        ];

        $respuesta = $precio->registrarPrecios($datosSolicitados);
        echo json_encode($respuesta);
    }

    if($_POST['operacion']=='eliminarPrecio'){
        $respuesta=$precio->eliminarPrecios($_POST['idprecio']);
        echo json_encode($respuesta);
    }

}