<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href=".//css/cabecera.css">
    <link rel="stylesheet" href=".//css/cuerpo.css">
</head>
<body>
    <div class="cabeza">
        <nav class="navegacion">
            <ul>
                <li><a href=""></a></li>
            </ul>
        </nav>
    </div>

    <div class="Cuerpo">
        <div class="contenedor">
            <?php
                require_once('.//php/consultas.php');

                $obj = new restaurante();

                $obj -> consultarTiposComida();
            ?>
        </div>
    </div>

    

    <div class="pie"></div>
</body>
</html>