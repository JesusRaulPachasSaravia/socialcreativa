<?php

require_once "Conexion.php";

/**
 * Esta clase reprsenta a un Aula de SC
 */
class Aula extends Conexion{

    private $acceso;


    public function __construct()
    {
            $this->acceso=parent::getConexion();
    }

/**
 * Lista las aulas activas y en condiciones de ser usadas para dictar los cursos 
 *  @return array aulas disponibles 
 */

    public function listarAulas(){

        try{
            $consulta =$this->acceso->prepare("CALL spu_aulas_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra las nuevas aulas 
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */    

    public function registrarAulas($datosAulas=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_aulas_crear(?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosAulas['numaula'],
            $datosAulas['aforo'],
            $datosAulas['ubicacion']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    } 

/**
 * Actualiza las Aulas de SC
 * 
 * @return array  respuesta con la condicion de la operación
 * 
 */

    public function actualizarAulas($datosAulas=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_aulas_editar(?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosAulas['idaula'],
            $datosAulas['numaula'],
            $datosAulas['aforo'],
            $datosAulas['ubicacion']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    } 

/**
 * Obtiene los datos de un Aula en especifico mediante su ID
 * @return array  datos del Aula
 */

    public function getAula($idaula){
        try{
            $consulta = $this->acceso->prepare("CALL spu_aulas_obtener(?)");
            $consulta->execute(array($idaula));
            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Elimina de manera lógica a un Aula en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */

    public function eliminarAulas($idaula){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta= $this->acceso->prepare("CALL spu_aulas_eliminar(?)");
            $respuesta["status"]=$consulta->execute(array($idaula));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }
    


}