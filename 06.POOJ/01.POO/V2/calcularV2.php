<?php
//Buscar el mayor y el menor en una funcion
    class Calcular{

        public function cambiar(&$n1,&$n2){
            if($n1<$n2){
                $aux = $n1;
                $n1 = $n2;
                $n2 = $aux;
            }
        }

        public function sumar($n1,$n2){  
            return $n1 + $n2;
        }

        public function restar($n1,$n2){           
            return $n1-$n2;
        }
        public function multiplicar($n1,$n2){
            return $n1*$n2;
        }

        public function dividir($n1,$n2){
            return $n1 / $n2;
        }
    }
?>