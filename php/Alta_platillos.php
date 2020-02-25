<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class = "cabecera">
        <nav>
        </nav>
    </div>

    <div class="cuerpo">  
        <form action="Alta_platillos.php" method="POST">

            <label for="text">Nombre</label>
            <input type="text" name="nombres" placeholder="Ingrese el nombre"><br>

            <label for=""> url de la fotografia </label>
            <input type="text" name="foto" id="" placeholder = "ingresa el url"> <br>

            <button type="submit" >Guardar</button>
        </form>
        
    <?php
        $nom = $_POST['nombres'];
        $url = $_POST['foto'];

        require_once('consultas.php');

        $obj = new restaurante();

        $obj -> GuardarTipo( $nom, $url );

    ?>

    </div>
</body>

</html>