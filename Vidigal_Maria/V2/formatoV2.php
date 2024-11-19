<?php
    class Formato{
        private $datos;
        public $caracteres;
        private $apellido;
        private $nombre;

        public function __construct(String $nombre='', String $apellidos='') {
            //le doy valor a las variables creadas en la clase
            $this->nombre=$nombre;
            $this->apellido=$apellidos;
            //Guardo en una variable el nombre y el apellido para ver los caracteres
            $this->datos = $apellidos.$nombre;
            //Guardo los caracteres en una variable publica para poder acceder desde fuera
            $this->caracteres = strlen($this->datos);
        }

        public function apellidoNombre(){
            return $this->apellido.', '.$this->nombre;  
        }

        public function nombreApellidos(){
            return $this->nombre.' '.$this->apellido;
        }
    }
    
?>