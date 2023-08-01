<?php

require_once "Conexion.php";

/**Esta clase representa la categoria de las habilidades que tienen los profesores
*/
class Categoria_Habilidad extends Conexion{
    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }

/**
 * Obtiene los datos de las categorias de habilidades activas 
* @return array  datos de las categorias de habilidades
 */

    public function listarCategoriaHabilidades(){

        try{
            $consulta=$this->acceso->prepare("CALL spu_categoriasHabi_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Registra a las nuevas categorias de las habilidades
* 
* @return array  respuesta con la condicion de la operación
* 
*/

    public function registrarCategoriaHabilidades($categoria_habilidad){
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];   
        try{
            $consulta=$this->acceso->prepare("CALL spu_categoriasHabi_crear(?)");
            $respuesta["status"]=$consulta->execute(array(
                $categoria_habilidad['categoria_habilida']
             ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();

        }
        return $respuesta;


    }

    /**
 * Actualiza a las  categorias de las habilidades
* 
* @return array  respuesta con la condicion de la operación
* 
*/

    public function actualizarCategoriaHabilidades($datosGuardar=[]){
        
        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta=$this->acceso->prepare("CALL spu_categoriasHabi_editar(?,?)");
            $respuesta["status"]=$consulta->execute(
                array(
                $datosGuardar['idcategoria_habi'],
                $datosGuardar['categoria_habilida']
             ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;

    }

/**
 * Obtiene los datos de una categoria de habilidad en especifico mediante su ID
 * @return array  datos de la categoria de habilidad
 */

    public function getCategoriaHabilidades($idcategoria_habi){

        try{
            $consulta = $this->acceso->prepare('CALL spu_categoriasHabi_obtener(?)');
            $consulta->execute(array($idcategoria_habi));
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die($e->getMessage());
        }

    }
/**
 * Elimina de manera lógica a una categoria de habilidad en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */
    public function eliminarCategoriaHabilidades($idcategoria_habi){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare('CALL spu_categoriasHabi_eliminar(?)');
            $respuesta["status"]=$consulta->execute(array($idcategoria_habi));
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
        return $respuesta;
    }




}


?>