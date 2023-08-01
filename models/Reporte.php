<?php

require_once "Conexion.php";

class Reporte extends Conexion{


    private $acceso;

    public function __construct()
    {
        $this->acceso=parent::getConexion();
    }


    public function contarAlumnosPorFechas(int $mesMatricula){

        try{
            $consulta = $this->acceso->prepare("CALL spu_contarAlumnosPorFechas(?)");
            $consulta->execute(array($mesMatricula));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }



// . Cantidad de alumnos inscritos por cursos (mensual).
    public function contarAlumnosMensualEntreFechas($datos = []){

        try{
            $consulta = $this->acceso->prepare("CALL spu_cantidad_alumnos_porTaller(?,?,?)");
            $consulta->execute(
                array(
                    $datos['mesDesde'],
                    $datos['mesHasta'],
                    $datos['anio']
            ));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }



// Cantidad de dinero recaudado por curso mensual

    public function cantidadDineroRecaudadoMensualEntreFechas($datos = []){

        try{
            $consulta = $this->acceso->prepare("CALL spu_cursos_dineroRecaudado(?,?,?)");
            $consulta->execute(
                array(
                    $datos['mesDesde'],
                    $datos['mesHasta'],
                    $datos['anio']
            ));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }


    // Taller con poca afluencia de inscritos
    public function cursosPocosInscritosEntreFechas($datos = []){

        try{
            $consulta = $this->acceso->prepare(" CALL spu_cursos_pocaAfluencia(?,?,?)");
            $consulta->execute(
                array(
                    $datos['mesDesde'],
                    $datos['mesHasta'],
                    $datos['anio']
            ));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }





// Comparaciones sobre qué taller tuvo más inscritos
    public function cursoMasInscritosEntreFechas($datos = []){

        try{
            $consulta = $this->acceso->prepare("CALL spu_curso_masInscritos(?,?,?)");
            $consulta->execute(
                array(
                    $datos['mesDesde'],
                    $datos['mesHasta'],
                    $datos['anio']
            ));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }


// Comparaciones sobre qué taller tuvo más ingresos
    public function cursosMayorIngreso($datos = []){

        try{
            $consulta = $this->acceso->prepare("CALL spu_taller_mayorIngreso(?,?)");
            $consulta->execute(
                array(
                    $datos['mes'],
                    $datos['anio']
            ));
            $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;

        }catch(Exception $e){
            die($e->getMessage());
        }

    }


    public function ingresoTotalMensualPorCurso( int $mesPago){
        try{
            $consulta = $this->acceso->prepare("CALL spu_pagos_totalPagosproMes(?)");
            $consulta->execute(array($mesPago));
            return $consulta->fetchAll(PDO::FETCH_ASSOC);

        }catch(Exception $e){
            die($e->getMessage());
        }
    }



}