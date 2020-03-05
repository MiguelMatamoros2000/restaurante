<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta</title>
    <link rel="stylesheet" href=".//css/cuerpocomida.css">
</head>
<body>
    <div class="cabeza">
        <nav class="barra"></nav>
    </div>
    
    <div class="cuerpo">
        <form action="">
            <?php
                require_once(".//php/ConexionesBD/consultas.php");
                $obj = new restaurante();

                $obj->seleccionComida();
            ?>
        </form>
    </div>
</body>
</html>