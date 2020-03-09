<?php
    
    include_once 'conexionDB.php';

    class restaurante extends conexionDB{

        public function GuardarTipo( $nom, $ur){

            $consulta="insert into tipocomida value(null,'".$nom."','".$ur."')";
            if( $this->conectar()->query($consulta) )
            echo "<div class='alert alert-success'>
                    <strong>Correcto!</strong> Los Datos se guardaron Corectamente.
                </div>";
            else
                echo "<div class='alert alert-danger'>
                        <strong>Error!</strong> Fallo al guardar los datos.
                    </div>";
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
                echo "<tr>
                        <td>" .$fila['idtipoComida']. "</td>
                        <td>" .$fila['nombre']. "</td>
                        <td><a href='modificarTipo.php?codigo=".$fila['idtipoComida']."'><span class='fa-edit fa'></span ></a></td>
                        <td><a href='eliminar.php?codigo=".$fila['idtipoComida']. "'><span class='fa-trash-o fa'></span></a></td>
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

        public function seleccionTipoComida(){

            $consulta = "Select * from tipocomida";
            $resultado = $this->conectar()->query($consulta);

            foreach($resultado as $fila){
                echo "
                    <li class='nav-item'>
                        <a class='nav-link' href='VerComida.php?codigo=".$fila['idtipoComida']."'>".$fila['nombre']."</a>
                    </li>
                ";
            }
        }

        public function seleccionComida( $codigo){

            $consulta = "Select * from comida where tipoComida = :id";
            $statement = $this->conectar()->prepare($consulta);
            $statement->execute(array(':id' => $codigo));

            $resultado = $statement->fetchAll();
            
           foreach($resultado as $fila){
                echo "
                <div class='card  my-4 p-10' style='width:300px'>
                    <img class='card-img-top' src=".$fila['fotografia']." style='width:300px; height: 300px ;'  alt='Card image'>
                    <div class='body-card'>
                        <h4 class='card-title'>".$fila['nombre']."</h4>
                        <p class='card-text'>Precio: $".$fila['precio']."</p>
                        <form id = 'Formulario' method = 'POST' action = '' >
                            <div class='form-group'>
                                <input type='hidden' class = 'form-control' name='id' placeholder='Id' value = ".openssl_encrypt($fila['idComida'],COD,KEY).">
                                <input type='hidden' class = 'form-control' name='nombre' placeholder='nombre' value =".openssl_encrypt($fila['nombre'],COD,KEY).">
                                <input type='hidden' class = 'form-control' name='precio' placeholder='nombre'value =".openssl_encrypt($fila['precio'],COD,KEY).">
                                <label for=''>Cantidad:</label>
                                <input type='number' value = '0' name='can' class='form-control my-2' id='' placeholder='ingresa la cantidad'>
                                <button type='submit' name = 'btnAccion' value = 'Agregar' class='btn btn-primary btn-block'>Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
                ";
            }
        }

        public function VentasDelDia(){
            $total = 0;
            $fechaActual = date('Y-m-d');

            $sql = "SELECT tiket.idVenta, comida.nombre,comida.precio, tiket.Cantidad,(comida.precio * tiket.Cantidad) as 'total' 
            FROM tiket INNER JOIN comida ON (comida.idComida = tiket.idcomida_2) 
            INNER JOIN venta ON (venta.id = tiket.idVenta) WHERE venta.Fecha = '".$fechaActual."';";
            $stm = $statement = $this->conectar()->prepare($sql);
            $stm->execute();

            $resultado = $stm->fetchAll();
            echo $sql;
            foreach($resultado as $fila){
                $total = $total + $fila['total'];
                echo "<tr>
                        <td>" .$fila['idVenta']. "</td>
                        <td>" .$fila['nombre']. "</td>
                        <td>" .$fila['precio']."</td>
                        <td>" .$fila['Cantidad']."</td>
                        <td>" .$fila['total']."</td>
                    </tr>";
            }
            
            echo "<tr>
                        <td colspan = '3' aling = 'right' > <h3> Total del dia </h3> </td>
                        <td colspan = '3' aling = 'right'> <h3>" .$total. "</h3> </td>
                    </tr>";
        }
    }

?>

