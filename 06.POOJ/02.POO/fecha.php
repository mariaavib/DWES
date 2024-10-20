<?php
    class Fecha{
        private $meses;
        private $anio;
        private $mes;
        private $dia;

        public function __construct(String $fecha="0000-00-00"){
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
            /*Divide la clase en año,mes y dia*/
            list ($this->anio, $this->mes, $this->dia) = explode("-", $fecha); 
            /*Convierte el mes a entero*/
            $this->mes=intval($this->mes);
            /*Si es bisiesto cambiar el mes de febrero de dias*/
            if($this -> bisiesto()){
                $this->meses[2]["dias"]=29;
            }
        }

        public function convertir_fecha(){
            return $this->dia.'/'.$this->meses[$this->mes]["nombre"].'/'.$this->anio."<br>";
        }

        /*Comprobar si el año es bisiesto*/
        public function bisiesto(){
            if(($this -> anio % 4 == 0 && $this -> anio % 100 != 0) || $this -> anio % 400 == 0){
                return true;
            }
            return false;
        }

        /*Mostrar el nombre del mes y los dias que tiene*/
        public function mostrar(){
            return $this->meses[$this->mes]["nombre"]." tiene ".$this->meses[$this->mes]["dias"]." dias";
        }
    }
?>