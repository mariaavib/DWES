<?php
//Crear la clase
    class Calcular{
        //creamos dos variables para guardar el mayor y el menor
        private $my;
        private $mn;

        //recibimos como atributos en el constructor las dos variables
        public function __construct(int $n1=0,int $n2) {
            if($n1<=$n2){
                //asignamos las variables
                $this->my = $n2;
                $this->mn = $n1;
            }else{
                $this->my = $n1;
                $this->mn = $n2;
            }
        }

        //hacemos las funciones para sumar,restar,dividir...

        public function sumar(){
            return $this->my +  $this->mn;
        }

        public function restar(){
            return $this->my -  $this->mn;
        }

        public function multiplicar(){
            return $this->my *  $this->mn;
        }

        public function dividir(){
            return $this->my /  $this->mn;
        }
    }
?>