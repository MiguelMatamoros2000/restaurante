<?php
    
    include_once 'conexionDB.php';

    class restaurante extends conexionDB{

        public function GuardarTipo( $nom, $ur){

            $consulta="insert into tipocomida value(null,'".$nom."','".$ur."')";
            if( $this->conectar()->query($consulta) )
            echo "Datos guardados";
            else
            echo "Fallo el guardados";
        }

        public function  buscar( $x ){
            $consulta="select * from tipocomida where idtipoComida ='".$x."'";
            $result = $this->conectar()->query($consulta);
            foreach(  $result as $fila){
                $row = $fila;
            } 
            return $row;
        }

        public function modificar( $var, $nom, $ur){

            $consulta="update tipocomida set nombre = '".$nom."', fotografia = '".$ur."' where idtipoComida = '".$var."'";
            echo $consulta;
            if( $this->conectar()->query($consulta) )
            echo "modificacon exitosa";
            else
            echo "Fallo la modificacon";
        }

        public function eliminar( $id ){

            $consulta = "delete from tipocomida where idtipoComida = '".$id."'";
            if($result = $this->conectar()->query($consulta))
            echo "Eliminacion exitosa";

        }

        public function seleccion(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "<tr>";
                    echo "<td>" .$fila['nombre']. "</td>
                       <td><a href='modificarTipo.php?codigo=".$fila['idtipoComida']."'><span class='fa-edit fa'>0</span ></a></td>
                       <td><a href='eliminar.php?codigo=".$fila['idtipoComida']. "'><span class='fa-trash-o fa'>1</span></a></td>
                    </tr>";
            }
        }

        public function seleccionTipo(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "
                    <div class='card'>
				        <div class='imgBX'>
					        <img src=".$fila['fotografia'].">
				        </div>
				    <div class='contentBx'>
					    <div class='content'>
						    <h2>".$fila['nombre']."</h2>
						    <a href='VerComida.php?codigo=".$fila['idtipoComida']."'>Ver platillos</a>
					    </div>
				    </div>
			    </div>
                ";
            }
        }

        public function seleccionComida(){

            $consulta = "Select * from comida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "
                    <div class='carta'>
                        <div class='cara caraUno'>
                            <div class='conetnido'>
                                <h1>'".$fila['nombre']."'</h1>
                                <p>'".$fila['precio']."'</p>
                                <label for=''>Cantidad :</label>
                                <input type='number' name='' id=''>
                                <br>
                                <button type='submit' >Agregar</button>
                             </div>
                        </div>
                        <div class='cara caraDos'>
                            <img src= alt=''>
                        </div>
                    </div>
                ";
            }
        }
    }

?>

