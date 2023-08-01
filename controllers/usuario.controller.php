<?php
session_start(); // Siempre debe estar en el encabezado del script PHP

if (!isset($_SESSION["login"])) {
    $_SESSION["login"] = [];
}

require_once "../models/Usuario.php";
require_once "../models/Desbloqueo.php";
require_once "../models/Mail.php";

if (isset($_GET['operacion'])) {
    if ($_GET['operacion'] == 'destroy') {
        session_destroy();
        session_unset();
        header("location:../");
        exit;
    }
}

if (isset($_POST['operacion'])) {
    $usuario = new Usuario();

    if ($_POST['operacion'] == 'login') {
        $resultado = [
            "status"        => false,
            "idusuario"        => "",
            "idpersona"        => "",
            "nombres"       => "",
            "nombreusuario"       => "",
            "apepaterno"      => "",
            "apematerno"      => "",
            "email"       => "",
            "telefono"       => "",
            "fechaNac"       => "",
            "direccion"       => "",
            "nivelacceso"   => "",
            "mensaje"       => "",
            "statuscodigo" => ""
        ];

        $datoObtenido = $usuario->login($_POST['emailOrUserName']);

        if ($datoObtenido) {
            $claveEncriptada = $datoObtenido['claveacceso'];
            if (password_verify($_POST['claveacceso'], $claveEncriptada)) {
                $resultado["status"] = true;
                $resultado["idusuario"] = $datoObtenido["idusuario"];
                $resultado["idpersona"] = $datoObtenido["idpersona"];
                $resultado["nombres"] = $datoObtenido["nombres"];
                $resultado["nombreusuario"] = $datoObtenido["nombreusuario"];
                $resultado["apepaterno"] = $datoObtenido["apepaterno"];
                $resultado["apematerno"] = $datoObtenido["apematerno"];
                $resultado["email"] = $datoObtenido["email"];
                $resultado["telefono"] = $datoObtenido["telefono"];
                $resultado["fechaNac"] = $datoObtenido["fechaNac"];
                $resultado["direccion"] = $datoObtenido["direccion"];                
                $resultado["nivelacceso"] = $datoObtenido["nivelacceso"];
            } else {
                $resultado["mensaje"] = "Contraseña incorrecta";
            }
        } else {
            $resultado["mensaje"] = "No se encuentra el usuario";
        }

        $_SESSION["login"] = $resultado;
        echo json_encode($resultado);
    } 

    if ($_POST['operacion'] == 'listarUsuarios') {
        echo json_encode($usuario->listarUsuarios());
    }

    if ($_POST['operacion'] == 'listarColaboradores') {
        echo json_encode($usuario->listarColaboradores());
    }

    if ($_POST['operacion'] == 'registrarUsuarios') {
        $datosSolicitados = [
            "tipodoc"       =>$_POST['tipodoc'],
            "nrodocumento"  =>$_POST['nrodocumento'],
            "apepaterno"    =>$_POST['apepaterno'],
            "apematerno"    =>$_POST['apematerno'],
            "nombres"       =>$_POST['nombres'],
            "fechaNac"      =>$_POST['fechaNac'],
            "telefono"      =>$_POST['telefono'],
            "direccion"     =>$_POST['direccion'],
            "email"         =>$_POST['email'],
            "nombreusuario" => $_POST['nombreusuario'],
            "claveacceso"   => password_hash($_POST['claveacceso'], PASSWORD_BCRYPT),
            "nivelacceso"   => $_POST['nivelacceso']
        ];
        $respuesta = $usuario->registrarUsuarios($datosSolicitados);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'actualizarUsuarios') {
        $datosSolicitados = [
            "idusuario"     => $_POST['idusuario'],
            "nombreusuario" => $_POST['nombreusuario']
        ];
        $respuesta = $usuario->actualizarUsuarios($datosSolicitados);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'actualizarClaveUsuarios') {
        $datosSolicitados = [
            "idusuario"     => $_POST['idusuario'],
            "claveacceso"   => password_hash($_POST['claveacceso'], PASSWORD_BCRYPT)
        ];
        $respuesta = $usuario->actualizarClaveUsuarios($datosSolicitados);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'inhabilitarUsuarios') {
        $respuesta = $usuario->inhabilitarUsuarios($_POST['idusuario']);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'habilitarUsuarios') {
        $respuesta = $usuario->habilitarUsuarios($_POST['idusuario']);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'degradarAdmin') {
        $respuesta = $usuario->degradarAdmin($_POST['idusuario']);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'promoverInvitado') {
        $respuesta = $usuario->promoverInvitado($_POST['idusuario']);
        echo json_encode($respuesta);
    }

    if ($_POST['operacion'] == 'getUsuarios') {
        $datoObtenido = $usuario->getUsuarios($_POST['user']);
        if($datoObtenido){
          echo json_encode($datoObtenido);
        }
    }

    if ($_POST['operacion'] == 'ContarUsuariosColaboradores') {
        $nivelacceso = "C";
        echo json_encode($usuario->contarUsuario($nivelacceso));
    }

    if ($_POST['operacion'] == 'ContarUsuariosProfesores') {
        $nivelacceso = "P";
        echo json_encode($usuario->contarUsuario($nivelacceso));
    }

    if ($_POST['operacion'] == 'ContarUsuariosTutores') {
        $nivelacceso = "T";
        echo json_encode($usuario->contarUsuario($nivelacceso));
    }

    if ($_POST['operacion'] == 'ContarUsuariosAdministradores') {
        $nivelacceso = "A";
        echo json_encode($usuario->contarUsuario($nivelacceso));
    }


    if($_POST['operacion'] == 'enviarCorreo'){
        
        $desbloqueo = new Desbloqueo();

        $respuesta = $desbloqueo->validarTiempo(['idusuario' => $_POST['idusuario']]);
    
        $retornoDatos = ["mensaje" => "Ya se te envió una clave, revisa tu correo"];
    
        if($respuesta['status'] == 'GENERAR'){
          //VALIDAR QUE ESTE PROCESO ¡NO! SE EJECUTE SINO HASTA DESPUES 15MIN
    
          $valorAleatorio = random_int(1000,9999);
    
          $mensaje = "
          <h3> App Social Creativa </h3>
          <strong>Recuperación de cuenta</strong>
          <hr>
          <p>
          Estimado usuario, para recuperar el acceso, utilice la siguiente contraseña:
          </p>
          <h3>{$valorAleatorio}</h3>    
          ";
          
          $data = [
            'idusuario' => $_POST['idusuario'],
            'email' => $_POST['email'],
            'codigodesbloqueo' => $valorAleatorio
          ];
    
          $desbloqueo->registrarDesbloqueo($data);
    
          enviarCorreo($_POST['email'],'Código restauración',$mensaje);
          $retornoDatos["mensaje"] = "Se ha generado y enviado la clave al email indicado";
        }
        echo json_encode($retornoDatos);
      }
}
