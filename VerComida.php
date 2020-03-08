<?php
 include_once 'Carrito.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>
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
                    <a class="nav-link" href="PaginaCarrito.php">
                        <ion-icon name="cart-outline" size="large"></ion-icon>
                    (<?php 
                        echo ( empty($_SESSION['CARRITO']) )?0:count($_SESSION['CARRITO']);
                    ?>)</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container p-3">
        <div class="row justify-content-center">
            <?php
                require_once './/php/ConexionesBD/consultas.php';

                $obj = new restaurante();

                try{
                    $var = $_GET['codigo']; //resive el valor de una variabl
                }catch(PDOEception $e){ 
    
                }

                echo $Mensaje;
                
                $obj->seleccionComida( $var);

                
            ?>
        </div>
    </div>

</body>

</html>