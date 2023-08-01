<?php

require_once "Conexion.php";

class Profesor extends Conexion{
    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }

/**
 * Lista las Profesores  activos 
 *  @return array Datos de los Profesores Activos
 */    

    public function listarProfesores(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_profesores_listar()");
            $consulta->execute();
            $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    
    public function listarAlumnos($idcurso){

        try{
            $consulta = $this->acceso->prepare("CALL spu_alumnos_listar(?)");
            $consulta->execute(array($idcurso));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

/**
 * Registra los nuevas  Profesores 
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */    

    public function registrarProfesores($datosGuardar=[]){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_profesores_crear(?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosGuardar['idpersona'],
            $datosGuardar['nom_banco'],
            $datosGuardar['num_cuenta'],
            $datosGuardar['tipo_cuenta']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }
/**
 * Actualiza los datos de los Profesores registrados en  SC
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */

    public function actualizarProfesores($datosActualizar=[]){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_profesores_editar(?,?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosActualizar['idprofesor'],
            $datosActualizar['idpersona'],
            $datosActualizar['nom_banco'],
            $datosActualizar['num_cuenta'],
            $datosActualizar['tipo_cuenta']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

/**
 * Obtiene los datos de un Profesor en especifico mediante su ID
 * @return array  datos del Profesor
 */

    public function getProfesores($idprofesor){
        try{
            $consulta=$this->acceso->prepare("CALL spu_profesores_obtener(?)");
            $consulta->execute(array($idprofesor));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

 /**
 * Elimina de manera lógica a un Profesor en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */

    public function eliminarProfesor($idprofesor){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_profesores_eliminar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idprofesor));
            
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
            return $respuesta;
    }


}


?>