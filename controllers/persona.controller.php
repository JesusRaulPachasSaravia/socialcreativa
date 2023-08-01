<?php

require_once "../models/Persona.php";



    if(isset($_POST['operacion'])){

        $persona = new Persona;

        if ($_POST['operacion']=='listarPersonas')
        echo json_encode($persona->listarPersonas());


        if($_POST['operacion']=='registrarPersonas'){

            $datosSolicitados=[
                "tipodoc"       =>$_POST['tipodoc'],
                "nrodocumento"  =>$_POST['nrodocumento'],
                "apepaterno"    =>$_POST['apepaterno'],
                "apematerno"    =>$_POST['apematerno'],
                "nombres"       =>$_POST['nombres'],
                "fechaNac"      =>$_POST['fechaNac'],
                "telefono"      =>($_POST['telefono']!=='')? $_POST['telefono']:null,
                "direccion"     =>$_POST['direccion'],
                "email"         =>($_POST['email']!=='')? $_POST['email']:null
            ];

            $respuesta = $persona->registrarPersonas($datosSolicitados);
            echo json_encode($respuesta);
        }

        if($_POST['operacion']=='actualizarPersonas'){

            $datosSolicitados=[
                "idpersona" =>$_POST['idpersona'],
                "tipodoc" =>$_POST['tipodoc'],
                "nrodocumento" =>$_POST['nrodocumento'],
                "apepaterno" =>$_POST['apepaterno'],
                "apematerno" =>$_POST['apematerno'],
                "nombres" =>$_POST['nombres'],
                "fechaNac" =>$_POST['fechaNac'],
                "telefono" =>$_POST['telefono'],
                "direccion" =>$_POST['direccion'],
                "email" =>$_POST['email']
            ];

            $respuesta=$persona->actualizarPersonas($datosSolicitados);
            echo json_encode($respuesta);
        }


        if($_POST['operacion']=='getPersonas'){
            echo json_encode( $persona->getPersonas($_POST['idpersona']));
        }

        if($_POST['operacion']=='eliminarPersona'){
        $respuesta= $persona->eliminarPersona($_POST['idpersona']);
        echo json_encode($respuesta);
        }



}
?>