<?php

require_once "Conexion.php";

/**Esta clase representa los cursos ue ofrece SC */
class Curso extends Conexion{

   private $acceso;


   public function __construct()
   {
    $this->acceso=parent::getConexion();
   }

/**
 * Lista los cursos segun su estado
* @return array  cursos segun su estado
 */
   public function listarCursos($estado){

    try{
        $consulta = $this->acceso->prepare("CALL spu_cursos_listarPorEstado(?)");
        $consulta->execute(array($estado));
        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
        return $datos;

    }catch(Exception $e){
        die($e->getMessage());
    }  

   }
   public function validarVacantesCursos($idcurso){

    try{
        $consulta = $this->acceso->prepare("CALL spu_validar_vacantes(?)");
        $consulta->execute(array($idcurso));
        $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
        return $datos;

    }catch(Exception $e){
        die($e->getMessage());
    }  

   }

/**
 * Registra los nuevos cursos que SC ofrecera
 * @return array  respuesta con la condicion de la operación
 */
   public function registrarCursos($datosCurso = []){

    $respuesta =[
        "status" =>false,
        "message" => ""
    ];

    try{
        $consulta = $this->acceso->prepare("CALL spu_cursos_crear(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta["status"]= $consulta->execute(
            array(
                $datosCurso['idcategoria'],
                $datosCurso['idprofesor'],
                $datosCurso['idaula'],
                $datosCurso['titulo'],
                $datosCurso['descripcion'],
                $datosCurso['nivel'],
                $datosCurso['edadminima'],
                $datosCurso['edadmaxima'],
                $datosCurso['vacantes'],
                $datosCurso['totalhoras'],
                $datosCurso['precio'],
                $datosCurso['imagen'],
                $datosCurso['fecha_inicio'],
                $datosCurso['fecha_fin']
            ));

    }catch(Exception $e){
        $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
    }
        return $respuesta;

   }

/**
 * Actualiza los cursos que ofrece SC
 * @return array  respuesta con la condicion de la operación
 */

   public function actualizarCursos($datosCurso = []){

    $respuesta =[
        "status" =>false,
        "message" => ""
    ];

    try{
        $consulta = $this->acceso->prepare("CALL spu_cursos_editar(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta["status"]= $consulta->execute(
            array(
                $datosCurso['idcurso'],
                $datosCurso['idcategoria'],
                $datosCurso['idprofesor'],
                $datosCurso['idaula'],
                $datosCurso['titulo'],
                $datosCurso['descripcion'],
                $datosCurso['nivel'],
                $datosCurso['edadminima'],
                $datosCurso['edadmaxima'],
                $datosCurso['vacantes'],
                $datosCurso['totalhoras'],
                $datosCurso['precio'],
                $datosCurso['fecha_inicio'],
                $datosCurso['fecha_fin']
            ));

    }catch(Exception $e){
        $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
    }
        return $respuesta;

   }

/**
 * Ontiene un curso en especifico mediante su ID
 * @return array datos del curso buscado
 */

   public function getCurso($idcurso){

        try{
            $consulta=$this->acceso->prepare("CALL spu_cursos_obtener(?)");
            $consulta->execute(array($idcurso));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Elimina un curso en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */


    public function eliminarCurso($idcurso){
       
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];
        try{

            $consulta = $this->acceso->prepare("CALL spu_cursos_eliminar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idcurso));
     
        

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }

}


