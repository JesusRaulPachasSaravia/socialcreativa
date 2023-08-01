<?php

require_once "Conexion.php";


class Pagos extends Conexion{


    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }



    public function listarPagos(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_pagos_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function listarDeudores(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_listar_deudores()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function pagar($datosPago=[]){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];
        
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_pagos_pagar(?,?,?,?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosPago['idusuario'],
            $datosPago['idtipopago'],
            $datosPago['idmatricula'],
            $datosPago['importe'],
            $datosPago['porcentajedescuento'],
            $datosPago['observacion']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }



    public function descuentosPagos($datosPago=[]){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_pagos_descuento(?,?,?)");
            $respuesta["status"]=$consulta->execute(
            array(
            $datosPago['idpago'],
            $datosPago['porcentajedescuento'],
            $datosPago['_descuento']
            ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;

    }

    public function datosPagosObtener($data = []){
        try{
            $consulta = $this->acceso->prepare("CALL spu_datos_pagosObtener(?,?)");
            $consulta ->execute(array(
                $data['tipodoc'], 
                $data['nrodoc'] 
            ));

             return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

}


?>