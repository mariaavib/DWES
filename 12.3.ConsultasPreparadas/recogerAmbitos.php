<?php
    class RecogerAmbitos{
        private $conexion;

        public function __construct() {
            require_once('db.php');
            $objConexion = new Db();
            $this->conexion= $objConexion->conexion;
        }

        public function recogerAmbitos(){
            $nombreAmbito = $_POST["nombAmbito"];
            print_r($nombreAmbito);
            $sql = 'INSERT INTO ambitos(nombre) VALUES (?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param('s',$nombre);

            foreach ($nombreAmbito as $nombre) {
                $stmt->execute();
            }
            
            $stmt->close();

            return "Ambitos guardados correctamentes";
        }

    }
    if (isset($_POST["nombAmbito"])) {
        $recoger = new RecogerAmbitos();
        echo $recoger->recogerAmbitos();
    }
?>