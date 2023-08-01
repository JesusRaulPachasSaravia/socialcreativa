<?php

require_once 'Conexion.php';

class Desbloqueo extends Conexion{
    private $acceso;

    public function __CONSTRUCT(){
        $this->acceso = parent::getConexion();       
    }

    public function registrarDesbloqueo($data = []){   
        try{
            $consulta = $this->acceso->prepare("CALL spu_desbloqueos_registrar(?,?,?)");
            $consulta->execute(array(
                $data['idusuario'], 
                $data['email'], 
                $data['codigodesbloqueo'] 
            ));

            return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarTiempo($data = []){
        try{
          $sql = "CALL spu_desbloqueos_validartiempo(?)";
          $consulta = $this->acceso->prepare($sql);
          $consulta->execute(array(
            $data['idusuario']
          ));
    
          return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
    }



    public function validarCodigo($data = []){
        try{
            $consulta = $this->acceso->prepare("CALL spu_desbloqueo_validar(?,?)");
            $consulta ->execute(array(
                $data['idusuario'], 
                $data['codigodesbloqueo'] 
            ));

             return $consulta->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }


      
  public function actualizarClave($data = []){
    $resultado = ["status" => false];
    try{
      $sql = "CALL spu_desbloqueos_actualizarpassword(?,?)";
      $consulta = $this->acceso->prepare($sql);
      $resultado["status"] = $consulta->execute(array(
        $data['idusuario'],
        $data['claveacceso']
      ));
      return $resultado;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }




  }

?>