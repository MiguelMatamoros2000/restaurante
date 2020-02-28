<?php
    //traemos la conexion
    require_once ('conexio.php');

    class restaurante{
        
        public $conn;

        public function __construct(){

            try{
                $this->conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
            }catch( consultasEception $e){
                echo "Error: ". $e->getMessage();
            }
        }

        public function conectar(){
            //comparamos la variable conexion para detectar errores
        }

        public function GuardarTipo( $nom, $ur){

            $consulta="insert into tipocomida value(null,'".$nom."','".$ur."')";
            if( $this->conn->query($consulta) )
            echo "<script>alert('Datos guardados');</script>";
            else
            echo "<script>alert('Fallo el guardados');</script>";
        }

        public function  buscar( $x ){
            $consulta="select * from tipocomida where idtipoComida ='".$x."'";
            $result = $this->conn->query($consulta);
            foreach(  $result as $fila){
                $row = $fila;
            } 
            return $row;
        }

        public function modificar( $var, $nom, $ur){

            $consulta="update tipocomida set nombre = '".$nom."', fotografia = '".$ur."' where idtipoComida = '".$var."'";
            echo $consulta;
            if( $this->conn->query($consulta) )
            echo "modificacon exitosa";
            else
            echo "Fallo la modificacon";
        }

        public function eliminar( $id ){

            $consulta = "delete from tipocomida where idtipoComida = '".$id."'";
            if($result = $this->conn->query($consulta))
            echo "Eliminacion exitosa";

        }

        public function seleccion(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conn->query($consulta);

            foreach($resultado as $fila){
                echo "<tr>";
                    echo "<td>" .$fila['nombre']. "</td>
                       <td><a href='modificarTipo.php?codigo=".$fila['idtipoComida']."'><span class='fa-edit fa'>0</span ></a></td>
                       <td><a href='eliminar.php?codigo=".$fila['idtipoComida']. "'><span class='fa-trash-o fa'>1</span></a></td>
                    </tr>";
            }
        }
    }
    //creamos una clase objetos

?>

