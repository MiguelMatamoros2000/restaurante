<?php
    //traemos la conexion
    require_once ('conexio.php');

    class restaurante{

        define public $conn;

        public function conexion(){
            try{

                $this->conn = new mysqli(HOST);

            }catch{

            }
        }
    }

?>

