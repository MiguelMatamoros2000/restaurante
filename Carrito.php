<?php
    include_once './/php/ConexionesBD/config.php';
    include_once './/php/ConexionesBD/conexionDB.php';
    $obj = new conexionDB();

    session_start();
    //evaluamos el boto

    $Mensaje ="";// esta variable nos servira para regresar un mensaje
    
    //Evalumos el voton que esta actuando
    if(isset($_POST['btnAccion'])){

        //Psamos evaluamos el valor del boton
        switch($_POST['btnAccion']){

            case'Agregar':
                //Evaluamos los datos
                if( is_numeric(openssl_decrypt($_POST['id'],COD,KEY)) ){
                    $id = openssl_decrypt($_POST['id'],COD,KEY);
                    $Mensaje = 'OK ID correcto'.$id;
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

                if( is_string(openssl_decrypt($_POST['nombre'],COD,KEY)) ){
                    $nombre = openssl_decrypt($_POST['nombre'],COD,KEY);
                }else{

                }

                if( is_numeric(openssl_decrypt($_POST['precio'],COD,KEY)) ){
                    $precio = openssl_decrypt($_POST['precio'],COD,KEY);
                    $cantidad = $_POST['can'];
                    $Mensaje = 'OK ID correcto'.$id;
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

                if (!isset($_SESSION['CARRITO'])) {
                    $producto = array(
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'PRE' => $precio,
                        'CAN' => $cantidad,
                    );

                    $_SESSION['CARRITO'][0] = $producto;
                } else {
                    $numProductos = count($_SESSION['CARRITO']);

                    $producto = array(
                        'ID' => $id,
                        'NOMBRE' => $nombre,
                        'PRE' => $precio,
                        'CAN' => $cantidad,
                    );

                    $_SESSION['CARRITO'][$numProductos] = $producto;
                }
                
                $Mensaje = print_r( $_SESSION,true);
            break;

            case 'Eliminar':

                if( is_numeric($_POST['id']) ){
                    $idel = $_POST['id'];

                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID'] == $idel){
                            unset($_SESSION['CARRITO'][$indice]);
                        }
                    }
                }else{
                    $Mensaje = 'OK ID correcto'.$id;
                }

            break;

            case 'Guardar':
                foreach($_SESSION['CARRITO'] as $ind=>$prod){
                    $statement = $obj->conectar()->prepare("insert into tipocomida value(null,'".$prod['ID']."','".$prod['CAN']."','".$prod['PRE']."')");
                    $statement->execute();
                }
            break;
        };

    }
?>