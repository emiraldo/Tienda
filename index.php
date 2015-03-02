<!DOCTYPE html>
<html lang="es">
	<head>
 		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<title>Catalogo de VideoJuegos</title>	
	</head>
 		
	<body>
		<header id='Titulo'>
			<h1>Prestamo de Videojuegos</h1>
		</header><!--Termina header del body-->
		<section id="Juegos">
			<header id='TituloJuegoSelect'>
				<h1>Prestamo de VideoJuegos</h1>
			</header>
					<?php
						require 'php/Controladores/Controller_Juegos.php';
						$cont = new Controller_Juegos();
						$datos = $cont->get_Datos();
						foreach ($datos as &$dato) {
							echo  "
								<article class='Producto'>
									<img class='ImagenJuego' src='".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
									<div class='Text'>Cantidad:  ".$dato["CANTIDAD"]." </div>
									<div class='Text'>Precio por dia: $".$dato["PRECIO"]."</div>
								</article>
									";
						}
					?>
		</section>
	</body>	
	<aside>

	</aside>
	<footer>

	</footer>
</html>


