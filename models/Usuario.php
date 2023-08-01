<?php
require_once "Conexion.php";

/**
 * Esta clase es la resonsable de abstraer las funciones que haran los usuarios
 */
class Usuario extends Conexion{
    private $acceso;
    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }

/**
 * Este método se encarga de obtener y retornar una lista de todos los usuarios activos registrados en el sistema
 * 
 * @return array una matriz que contiene la información mas relevante de los usuarios (Nombre Pila, Username y Nivel De Acceso)
 */

    public function listarUsuarios(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarColaboradores(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_colaboradores_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Este método se encarga de obtener y  contar a los usuarios por su nivel de acceso en el sistema (rol)
 * 
 * @return int total de usuarios por rol */

    public function contarUsuario( $nivelAcceso){
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_contar(?)");
            $consulta->execute(array($nivelAcceso));
            $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }


/**
 * Verifica que el email o el username existan en la base de datos
 * @return array datos relevantes del  usuario
 */

    public function login($emailOrUserName){
        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_login(?)");

            $consulta->execute(array($emailOrUserName));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra los nuevos usuarios 
 * @return array  respuesta con la condicion de la operación
 * 
 */        

    public function registrarUsuarios($datosUsuarios=[]){
            
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_crear_PersonaUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
            $respuesta["status"]=$consulta->execute(
                array(
                    $datosUsuarios['tipodoc'],
                    $datosUsuarios['nrodocumento'],
                    $datosUsuarios['apepaterno'],
                    $datosUsuarios['apematerno'],
                    $datosUsuarios['nombres'],
                    $datosUsuarios['fechaNac'],
                    $datosUsuarios['telefono'],
                    $datosUsuarios['direccion'],
                    $datosUsuarios['email'],
                    $datosUsuarios['nombreusuario'],
                    $datosUsuarios['claveacceso'],
                    $datosUsuarios['nivelacceso']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
}

   
/**
 * Actualiza algunos datos de los usuarios ya registrados 
 * @return array  respuesta con la condicion de la operación
 * 
 */   
    public function actualizarUsuarios($datosUsuarios=[]){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_editar(?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosUsuarios['idusuario'],
                $datosUsuarios['nombreusuario'],
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza la clave de acceso del usuario
 * @return array  respuesta con la condicion de la operación
 * 
 */   
    public function actualizarClaveUsuarios($data = []){

        $respuesta =[
            "status" => false
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_usuario_editarClaveAcceso(?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $data['idusuario'],
            $data['claveacceso']
            ));

            return $respuesta;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Actualiza el estado del Usuario a 0 -> (0=inhabilitado y 1=habilitado )
 * @return array  respuesta con la condicion de la operación
 */
    public function inhabilitarUsuarios($idusuario){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_inhabilitar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idusuario));
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza el estado del Usuario a 1 -> (0=inhabilitado y 1=habilitado )
 * @return array  respuesta con la condicion de la operación
 */

    public function habilitarUsuarios($idusuario){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_habilitar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idusuario));
          
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza el nivel de acceso del Usuario (de Administrador a Colaborador )
 * @return array  respuesta con la condicion de la operación
 */

    public function degradarAdmin($idusuario){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_degradarAdmin(?)"); 
            $respuesta["status"]=$consulta->execute(array($idusuario));
          

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza el nivel de acceso del Usuario (de Invitado a Administrador)
 * @return array  respuesta con la condicion de la operación
 */
    public function promoverInvitado($idusuario){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_usuarios_promoverInvitado(?)"); 
            $respuesta["status"]=$consulta->execute(array($idusuario));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Obtiene los datos de un Usuario en especifico mediante su ID
 * @return array  datos del Usuario
 */    
    public function getUsuarios($idusuario){
        try{
            $consulta=$this->acceso->prepare("CALL spu_usuarios_obtener(?)");
            $consulta->execute(array($idusuario));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }


/**
 * obteniene el correo del usuario mediante su número de telefono
 * 
 * @return string email del Usuario
 */   
    public function getEmail($telefono){
        try{
            $consulta=$this->acceso->prepare("CALL spu_usuarios_getEmail(?)");
            $consulta->execute(array($telefono));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }
}
?>