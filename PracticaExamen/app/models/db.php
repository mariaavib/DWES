<?php
    class Db{
        private $servidor;
        private $usuario;
        private $passw;
        private $basedatos;
        public $conexion;

        public function __construct(){
            require_once(CONFIG."configdb.php");

            $this->servidor = SERVIDOR;
            $this->usuario = USUARIO;
            $this->passw = PASSW;
            $this->basedatos = BASEDATOS;

            $this->conexion = new mysqli($this->servidor, $this->usuario, $this->passw, $this->basedatos);

            $this->conexion -> set_charset("utf8");
            $controlador = new mysqli_driver();
            $controlador -> report_mode = MYSQLI_REPORT_OFF;
        }
    }
?>