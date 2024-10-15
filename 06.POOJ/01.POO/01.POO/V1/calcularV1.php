<?php
//Buscar el mayor y el menor en el constructor
    class Calcular{
        private $may;
        private $men;

        public function __construct(int $n1=0, int $n2=0){
            if($n1<=$n2){
                $this->may=$n2;
                $this->men=$n1;
            }else{
                $this->may=$n1;
                $this->men=$n2;
            }
        }
        
        public function sumar(){
            return $this->may + $this->men;
        }

        public function restar(){
            return $this->may-$this->men;
        }
        public function multiplicar(){
            return $this->may*$this->men;
        }

        public function dividir(){
            return $this->may / $this->men;
        }
    }
?>