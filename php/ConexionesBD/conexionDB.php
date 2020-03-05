<?php

require_once('config.php');

class conexionDB{

    public $conn;

    public function conectar(){
        //comparamos la variable conexion para detectar errores
        try{
            $this->conexion = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
        }catch( consultasEception $e){
            echo "Error: ". $e->getMessage();
        }
    }
}
?>