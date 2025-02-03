<?php
    class MAmbitos{
        private $conexion;

        function __construct(){
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion = $objConexion->conexion;
        }

        public function extraer(){
            $sql = 'SELECT * FROM ambitos;';
            $resultado = $this->conexion->query($sql);    

            return $resultado;
        }

    }
?>