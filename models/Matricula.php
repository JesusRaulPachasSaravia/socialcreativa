<?php

require_once 'Conexion.php';

class Matricula extends Conexion{


    private $acceso;

    public function __construct(){
        $this->acceso=parent::getConexion();
    }


    public function listarMatriculas($idcurso){

        try{
            $consulta = $this->acceso->prepare("CALL spu_matriculas_listar(?)");
            $consulta->execute(array($idcurso));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }



    public function registrarMatricula($datosMatricula=[]){
        try{
            $consulta = $this->acceso->prepare("CALL spu_matriculas_crear(?,?,?,?,?)");
            $consulta->execute(
            array(
            $datosMatricula['idalumno'],
            $datosMatricula['idapoderado'],
            $datosMatricula['parentesco'],
            $datosMatricula['idcurso'],
            $datosMatricula['observacion']

            ));
            
            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }



    public function matricular($idMatricula){

        try{
            $consulta = $this->acceso->prepare("CALL spu_matriculas_matricular(?)"); 
            $consulta->execute(array($idMatricula));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function getMatricula($idMatricula){

        try{
            $consulta=$this->acceso->prepare("CALL spu_matriculas_obtener(?)");
            $consulta->execute(array($idMatricula));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }

    }



    public function getInfoPersona($data = []){

        try{
            $consulta = $this->acceso->prepare("CALL spu_alumnos_obtener(?,?)");
            $consulta->execute(array(
               $data['nrodocumento'], 
               $data['tipodoc'] 
           ));

           return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
       }

    }

}

?>