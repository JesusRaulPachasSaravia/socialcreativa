<?php



require_once "Conexion.php";

/**Esta clase representa la especialidad  que tendra la categoria de cada curso */

class Especialidad extends Conexion{

    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }

/**
 * Lista las especialidades disponibles activos de SC 
 * @return array información de las especialidades disponibles
 */

    public function listarEspecialidades(){
        try{
            $consulta= $this->acceso->prepare("CALL spu_especialidades_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Regustra nuevas especialidades  
 * @return array respuesta con la condicion de la operación
 */

    public function registrarEspecialidades($datosEspecialidades=[]){

        $respuesta=[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_especialidades_crear(?,?)");
            $respuesta["status"]= $consulta->execute(array(
                $datosEspecialidades['nomespecialidad'],
                $datosEspecialidades['comentario']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Actualiza los datos de las especialidades disponibles en SC
 * @return array respuesta con la condicion de la operación
 */

    public function actualizarEspecialidades($datosGuardar=[]){
        $respuesta=[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_especialidades_editar(?,?,?)");
            $respuesta["status"]= $consulta->execute(array(
                $datosGuardar['idespecialidad'],
                $datosGuardar['nomespecialidad'],
                $datosGuardar['comentario']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

 /**
 * Obtiene los datos de una especialidad en especifico mediante su ID
 * @return array  datos de la especialidad
 */
    
    public function getEspecialidad($idespecialidad){
        try{
            $consulta = $this->acceso->prepare("CALL spu_especialidades_obtener(?)");
            $consulta->execute(array($idespecialidad));
            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Elimina de manera lógica una especialidad en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */
    public function eliminarEspecialidad($idespecialidad){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta= $this->acceso->prepare("CALL spu_especialidades_eliminar(?)");
            $respuesta["status"]=$consulta->execute(array($idespecialidad));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

}