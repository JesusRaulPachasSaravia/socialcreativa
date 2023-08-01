<?php

require_once 'Conexion.php';

class Verificar extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();       
    }



    public function verificarDNI($data = []){
        try{
          $sql = "CALL verificarDNI(?)";
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array(
            $data['dni']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function verificarCorreo($data = []){
        try{
          $sql = "CALL verificarCorreo(?)";
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array(
            $data['correo']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function verificarTelefono($data = []){
        try{
          $sql = "CALL verificarTelefono(?)";
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array(
            $data['telefono']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

    public function verificarUsuario($data = []){
        try{
          $sql = "CALL verificarUsuario(?)";
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array(
            $data['usuario']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }

  }

?>