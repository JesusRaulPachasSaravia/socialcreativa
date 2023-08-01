<?php

require_once "Conexion.php";


class TipoPago extends Conexion{


    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }



    public function listarTipoPagos(){

        try{
            $consulta = $this->acceso->prepare("CALL spu_tipospago_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    




}


?>