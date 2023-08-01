<?php
require_once "Conexion.php";

/**Esta clase representa a una persona natural*/
class Persona extends Conexion{

    private $acceso;


    public function __construct()
    {
        $this->acceso= parent::getConexion();
    }

/**
 * Lista las personas activas 
 *  @return array datos personas activas 
 */

    public function listarPersonas(){

        try{

            $consulta = $this->acceso->prepare("CALL spu_personas_listar()");

            $consulta->execute();

            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra las nuevas personas
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */    

    public function registrarPersonas($datosGuardar=[]){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_personas_crear(?,?,?,?,?,?,?,?,?)");

            $respuesta["status"]=$consulta->execute(
                array(
                $datosGuardar['tipodoc'],
                $datosGuardar['nrodocumento'],
                $datosGuardar['apepaterno'],
                $datosGuardar['apematerno'],
                $datosGuardar['nombres'],
                $datosGuardar['fechaNac'],
                $datosGuardar['telefono'],
                $datosGuardar['direccion'],
                $datosGuardar['email']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
            // die($e->getMessage());
        }
        return $respuesta;
    }












    
/**
 * Actualiza los datos de las personas la registradas en el sistema 
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */    

    public function actualizarPersonas($datosActualizar=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_personas_editar(?,?,?,?,?,?,?,?,?,?)");

            $respuesta["status"]=$consulta->execute(array(
                $datosActualizar['idpersona'],
                $datosActualizar['tipodoc'],
                $datosActualizar['nrodocumento'],
                $datosActualizar['apepaterno'],
                $datosActualizar['apematerno'],
                $datosActualizar['nombres'],
                $datosActualizar['fechaNac'],
                $datosActualizar['telefono'],
                $datosActualizar['direccion'],
                $datosActualizar['email']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
           
            // die($e->getMessage());
        }   
        return $respuesta;  
    }
    
/**
 * Obtiene los datos de una Persona en especifico mediante su ID
 * @return array  datos de la Persona
 */

    public function getPersonas($idpersona){
        try{
            $consulta=$this->acceso->prepare("CALL spu_personas_obtener(?)");
            $consulta->execute(array($idpersona));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

/**
 * Elimina de manera lógica a una Persona en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */
    public function eliminarPersona($idpersona){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_personas_eliminar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idpersona));


        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }
}

?>