<?php

require_once "Conexion.php";

/**Esta clase representa la categoria de los cursos */
class Categoria extends Conexion{

    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }


/**
 * Lista a las categorias de los cursos de SC
 * @return array categorias activas
 */

    public function listarCategorias(){
        try{
            $consulta= $this->acceso->prepare("CALL spu_categorias_listar()");
            $consulta->execute();
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }       
    }



/**
 * Registra las nuevas categorias de los cursos a ofrecerse por activos de SC 
 * @return array respuesta con la condicion de la operación
 */

    public function registrarCategorias($datosCategoria=[]){
        $respuesta=[
            "status"=>false,
            "message"=> ""
        ]; 
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_categorias_crear(?,?)");
            $respuesta["status"]= $consulta->execute(
                array(
                    $datosCategoria['idespecialidad'],
                    $datosCategoria['categoria']
                ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
            return $respuesta;
    }

/**
 * Actualiza las  categorias de los cursos que ofrece o estan por ofrecerse por SC 
 * @return array respuesta con la condicion de la operación
 */


    public function actualizarCategorias($datosCategoria=[]){
        $respuesta=[
            "status"=>false,
            "message"=> ""
        ]; 
        
        try{
            $consulta = $this->acceso->prepare("CALL spu_categorias_editar(?,?,?)");
            $respuesta["status"]= $consulta->execute(
                array(
                    $datosCategoria['idcategoria'],
                    $datosCategoria['idespecialidad'],
                    $datosCategoria['categoria']
                ));

        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
            return $respuesta;
    }

/**
 * Obtiene una  categoria  en especifico mediante su ID 
 * @return array datos de una categoria en especifico
 */

    public function getCategoria($idcategoria){
        try{
            $consulta =$this->acceso->prepare("CALL spu_categorias_obtener(?)");
            $consulta->execute(array($idcategoria));

            return $consulta->fetch(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

/**
 * Elimina de manera lógica a una categoria en especifico mediante su ID
 * @return array  respuesta con la condicion de la operación
 */


    public function eliminarCategoria($idcategoria){

        $respuesta =[
            "status" =>false,
            "message" => ""
        ];

        try{
            $consulta = $this->acceso->prepare("CALL spu_categorias_eliminar(?)"); 
            $respuesta["status"]=$consulta->execute(array($idcategoria));
            
        }catch(Exception $e){
            $respuesta["message"] = "No se pudo completar el proceso. Código de error:" .$e->getCode();
        }
            return $respuesta;
    }



}