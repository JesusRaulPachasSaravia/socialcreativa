<?php
require_once "Conexion.php";

/**Esta clase representa las habilidades que poseen los profesores */
class Habilidad extends Conexion{

    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }
/**
 * Lista las habilidades de los profesores de SC 
 * @return array información de las habilidades de los profesores
 */

    public function listarHabilidades(){

        try{
            $consulta= $this->acceso->prepare("CALL spu_habilidades_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra nuevas habilidades de los profesores de SC
* 
* @return array  respuesta con la condicion de la operación
* 
*/

    public function  registrarHabilidades($datosHabilidad=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_habilidades_crear(?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosHabilidad['idcategoria_habi'],
                $datosHabilidad['idprofesor'],
                $datosHabilidad['habilidad'],
                $datosHabilidad['comentario']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza las habilidades de los profesores de  SC
 * @return array respuesta con la condicion de la operación
 */
    public function  actualizarHabilidades($datosHabilidad=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_habilidades_editar(?,?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosHabilidad['idhabilidades'],
                $datosHabilidad['idcategoria_habi'],
                $datosHabilidad['idprofesor'],
                $datosHabilidad['habilidad'],
                $datosHabilidad['comentario']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Obtiene una habilidad en especifico mediante su ID
 * @return array respuesta con la condicion de la operación
 */

    public function getHabilidad($idhabilidades){

        try{
            $consulta = $this->acceso->prepare('CALL spu_habilidades_obtener(?)');
            $consulta->execute(array($idhabilidades));
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }

    }


/**
 * Elimina de manera lógica una habilidad en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */
    public function eliminarHabilidad($idhabilidades){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare('CALL spu_habilidades_eliminar(?)');
            $respuesta["status"]=$consulta->execute(array($idhabilidades));
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

}

?>