<?php


    if( $_POST ){
        $v1=$_POST['nombre'];
        $v2=$_POST['foto'];
        echo json_encode('Hola');
    }else{
        echo json_encode('mal');
    }

?>

