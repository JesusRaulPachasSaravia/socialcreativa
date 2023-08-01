<?php

require_once "Conexion.php";

/**Esta clase representa los horarios de los cursos brindados por SC */
class Horario extends Conexion{

    private $acceso;

    public function __construct()
    {
        $this->acceso= parent::getConexion();
    }

/**
 * Lista los horarios de los cursos 
 * @return array  horarios disponibles
 */

    public function listarHorarios(){
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_horarios_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarCursosSinHorarios(){
        
        try{
            $consulta = $this->acceso->prepare("CALL ObtenerCursosSinHorarios()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra a los nuevos horarios de los cursos
* 
* @return array  respuesta con la condicion de la operación
* 
*/
    public function registrarHorarios($datosHorarios=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_horarios_crear(?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosHorarios['idcurso'],
                $datosHorarios['dia'],
                $datosHorarios['horainicio'],
                $datosHorarios['horafin']
                ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;


    }

    public function listarHorarioUsuarios($idusuario){

        try{
            $consulta=$this->acceso->prepare("CALL spu_horarios_listarHorariosUsuario(?)");
            $consulta->execute(array($idusuario));

            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarHorarioProfesores($idprofesor){

        try{
            $consulta=$this->acceso->prepare("CALL spu_horarios_listarHorariosProfesores(?)");
            $consulta->execute(array($idprofesor));

            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


/**
 * Actualiza los datos (horas y días)  de los cursos 
 * @return array respuesta con la condicion de la operación
 */    
    public function actualizarHorarios($datosHorarios=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_horarios_editar(?,?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosHorarios['idhorario'],
                $datosHorarios['idcurso'],
                $datosHorarios['dia'],
                $datosHorarios['horainicio'],
                $datosHorarios['horafin']
                ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;

    }

/**
 * Obtiene los datos de un horario en especifico mediante su ID
 * @return array  datos del horario
 */
    public function getHorario($idhorario){

        try{
            $consulta=$this->acceso->prepare("CALL spu_horarios_obtener(?)");
            $consulta->execute(array($idhorario));

            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


/**
 * Elimina de manera lógica un horario en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */

    public function eliminarHorario($idhorario){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_horarios_eliminar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idhorario));
            
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
            return $respuesta;
    }

}