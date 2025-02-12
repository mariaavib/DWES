<?php
    class MRecoger{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function recogerAmbitos($nombreAmbito){
            //print_r($nombreAmbito);
            try{
                $sql = 'INSERT INTO ambitos(nombre) VALUES (?)';
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param('s',$nombre);

                foreach ($nombreAmbito as $nombre) {
                    if(!$stmt->execute()){
                        throw new Exception("Error al insertar: " . $stmt->error);
                    }
                    
                }

                $stmt->close();

            } catch (mysqli_sql_exception $e) {
                echo "Error en la consulta: " . $e->getMessage() . "<br>";
                echo "Código de error: " . $e->getCode();
                echo $e->getCode();
                if($e->getCode()=='1062'){
                    return '1062';
                }

            }
            
            return 'c';
        }

    }
?>