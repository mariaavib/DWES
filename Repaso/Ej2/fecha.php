<?php
    class Fecha{
        private $meses;//array que guarda los meses;
        private $dd;
        private $mm;
        private $aa;

        //crear el array
        public function __construct(string $fecha='0000-00-00') {
            $this->meses=[
                1 => ["nombre" => "Enero","dias"=>"31"],
                2 => ["nombre" => "Febrero","dias"=>"28"],
                3 => ["nombre" => "Marzo","dias"=>"31"],
                4 => ["nombre" => "Abril","dias"=>"30"],
                5 => ["nombre" => "Mayo","dias"=>"31"],
                6 => ["nombre" => "Junio","dias"=>"30"],
                7 => ["nombre" => "Julio","dias"=>"31"],
                8 => ["nombre" => "Agosto","dias"=>"31"],
                9 => ["nombre" => "Septiembre","dias"=>"30"],
                10 => ["nombre" => "Octubre","dias"=>"31"],
                11 => ["nombre" => "Noviembre","dias"=>"30"],
                12 => ["nombre" => "Diciembre","dias"=>"31"]
            ];
            //dividir la fecha en dd, mm,aa
            list ($this->aa, $this->mm, $this->dd) = explode("-", $fecha); 
            //pasar meses a entero
            $this->mm=intval($this->mm);
            //cambiar el mes de febrero
            if($this->bisiesto()){
                $this->meses[2]["dias"]=29;
            }
        }

        //convertir la fecha
        public function convertir(){
            return $this->dd.'/'.$this->meses[$this->mm]["nombre"].'/'.$this->aa;//return $this->dd.'/'.$this->mm.'/'.$this->aa; esta mal tengo que acceder al array
        }

        public function bisiesto(){
            if(($this -> aa % 4 == 0 && $this -> aa % 100 != 0) || $this -> aa % 400 == 0){
                return true;
            }
            return false;
        }

        public function mostrar(){
            return $this->dd.'/'.$this->meses[$this->mm]["nombre"].'/'.$this->aa;
        }

        public function dias(){
            return $this->meses[$this->mm]["nombre"].' tiene '.$this->meses[$this->mm]["dias"].' dias';
        }
    }
?>