<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurante</title>
	<link rel="stylesheet" href=".//css/style.css">
</head>

<body>
	<div class="container">
		<h1>Hola</h1>
		<?php
		        require_once(".//php/ConexionesBD/consultas.php");
				$obj = new restaurante();
		
				$obj->seleccionTipo();
		?>
	</div>
</body>

</html>