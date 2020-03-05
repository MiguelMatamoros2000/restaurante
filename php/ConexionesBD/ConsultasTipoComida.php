<?php
 
    require_once('..//ConexionesBD/consultas.php');
    $obj = new restaurante();

    if( $_POST ){
        $v1=$_POST['nombre'];
        $v2=$_POST['foto'];
        $obj -> GuardarTipo( $v1, $v2 );
    }else{

    }

    echo json_encode("<table><tr>
       <th>Nombre</th>
       <th>Modificar</th>
       <th>Eliminar</th>".
       $obj->seleccion().
       "</table>" )

?>

