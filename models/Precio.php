<?php

require_once 'Conexion.php';

class Precio extends Conexion{

    private $acceso;

    public function __construct(){
        $this->acceso=parent::getConexion();
    }

    public function listarPrecios(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_precios_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function registrarPrecios($datosPrecios = []){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_precios_crear(?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosPrecios['idcurso'],
            $datosPrecios['porcentajedescuento'],
            $datosPrecios['monto']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;

    }




    public function eliminarPrecios($idPrecio){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta= $this->acceso->prepare("CALL spu_precios_eliminar(?)");
            $respuesta["status"]=$consulta->execute(array($idPrecio));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }
    





}