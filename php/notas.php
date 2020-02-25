<?php

        
public $conn;

public function __construct(){

    $this->conn = new mysqli(HOST,USER,PASS,DBNAME);//pasamos los parametros de la conexion
}

public function conectar(){
    //comparamos la variable conexion para detectar errores
    if($this->conn->connect_error){

        die("Connection failed".$conn->connect_error);
    }else{
        
        echo"conexion exitosa";
    }
}

public function consultarTiposComida(){

    $result = $this->conn->query('SELECT * FROM  tipocomida');

    if($result->num_rows > 0){

        while( $row = $result->fetch_assoc() ){
            echo "
            <div class='card'>
            <div class='imbox'>
                <img src='{$row["fotografia"]}' alt=''>
            </div>
            
        </div>

            ";
        }
    }
}

public function GuardarTipo( $nom, $ur){

    $sql = "INSERT INTO tipocomida( 'nombre', 'fotografia') VALUES ( '$nom' , '$ur');";
    echo $sql;
    $result = $this->conn->query($sql);
}
}
//creamos una clase objetos

?>