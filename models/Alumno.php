<?php
require_once "Conexion.php";

/**
 * Esta clase representa a un alumno de SC
 */
class Alumno extends Conexion{

    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }

/**
 * Lista a los alumnos activos de SC 
 * @return array información de los alumnos activos
 */
    public function listarAlumnos(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_alumnos_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


/**
 * Actualiza los datos de los alumnos activos en SC
 * @return array respuesta con la condicion de la operación
 */
    public function actualizarAlumnos($datosAlumnos = []){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_alumnos_editar(?,?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosAlumnos['idmatricula'],
            $datosAlumnos['idalumno'],
            $datosAlumnos['idapoderado'],
            $datosAlumnos['parentesco'],
            $datosAlumnos['observacion']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;

    }


    
// /**
//  * Obtiene los datos de un alumno en especifico mediante su ID
//  * @return array  datos del alumno
//  */
//     public function getAlumno($idalumno){

//         try{
//             $consulta=$this->acceso->prepare("CALL spu_alumnos_obtener(?)");
//             $consulta->execute(array($idalumno));

//             return $consulta->fetch(PDO::FETCH_ASSOC);

//         }catch(Exception $e){
//             die($e->getMessage());
//         }
//     }


    // public function contarAlumnosEntreFechas($fechas=[]){

    //     try{
    //         $consulta = $this->acceso->prepare("CALL spu_contarAlumnosEntreFechas(?,?)");
    //         $consulta->execute(array(
    //             $fechas['_fechaDesde'],
    //             $fechas['_fechaHasta']
    //         ));
    //         $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
    //         return $datos;

    //     }catch(Exception $e){
    //         die($e->getMessage());
    //     }
    // }


    public function contarAlumnosPorCurso(){
        try{
            $consulta = $this->acceso->prepare("CALL spu_contarAlumnosPorCurso()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

}


