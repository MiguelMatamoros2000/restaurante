<?php
include_once 'Carrito.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</head>

<body>
    <div class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-toggler" href="">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <?php
                        require_once './/php/ConexionesBD/consultas.php';

                        $obj = new restaurante();

                        $obj->seleccionTipoComida();
                     ?>
                </li>
            </ul>
        </div>
    </div>

    <div class="container my-3">
        <h3>Carrito</h3>
        <?php 
            $columnas = "";
            $TotalCompra = 0;

            if( !empty( $_SESSION['CARRITO'] ) ){

                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    $columnas.=" <tr>
                                <td width='40%'>".$producto['NOMBRE']."</td>
                                <td width='15%'>".$producto['CAN']."</td>
                                <td width='20%'>".$producto['PRE']."</td>
                                <td width='20%'>".number_format($producto['PRE'] * $producto['CAN'],2 )."</td>
                                <td width='5%'>
                                <form action='' method='post'>
                                    <input type = 'hidden' name = 'id' placeholder='ID' value = ".$producto['ID']." >
                                    <button name = 'btnAccion' value = 'Eliminar' class ='btn btn-danger' type = 'submit'>Eliminar</button></td>
                                </form>
                            </tr>";
                            $TotalCompra = $TotalCompra + ( $producto['PRE'] * $producto['CAN']);
                }

        echo "<table class='table table-striped table-linght table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <td>Contenido del carrito</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width='40%''>Descripcion</th>
                        <th width='15%'>Cantidad</th>
                        <th width='20%'>Precio</th>
                        <th width='20%''>Total</th>
                        <th width='5%'>--</th>
                    </tr>".
                    $columnas
                    ."<tr>
                        <td colspan = '3' aling = 'right'> <h3>Total :</h3> </td>
                        <td aling = 'right'> <h3>".number_format($TotalCompra,2)."</h3></td>
                        <td></td>
                    </tr>
                </tbody>
        </table>";
        
            }else{
                echo"<div class='alert alert-light'>
                    <strong>Mensaje!</strong> El carrrito esta vacio alert.
                  </div>";
            }

            
        ?>
    </div>

</body>

</html>