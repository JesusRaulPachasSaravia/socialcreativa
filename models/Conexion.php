<?php

/**Esta clase sera la encargada de realizar y compartir la conexion con la Base de Datos */
    class Conexion{

        //Atributo que almacena la conexion
        protected $pdo;

        /**
         * Método que accede al servidor de la DB
         * @return $cn ->conexion 
         */
        private function Conectar(){
            $cn = new PDO("mysql:host=localhost;port=3306;dbname=socialcreativa;charset=utf8", "root", "");
            return $cn;
        }

        
        /**Este método comparte el accesoa la DB
         * @return $pdo 
         */
        public function getConexion(){
            try {
                $pdo = $this->Conectar();

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $pdo;
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }

?>