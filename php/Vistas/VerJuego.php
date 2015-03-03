<!DOCTYPE html>
<html lang="es">
	<head>
 		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<script type="text/javascript" src="../../js/script.js"></script>
		<script type="text/javascript" src="../../js/jquery.js"></script>
		<title>Catalogo de VideoJuegos</title>	
	</head>
 		
 	<body>
		<header id='Titulo'>
			<h1>Prestamo de Videojuegos</h1>
		</header><!--Termina header del body-->
		<section id="Juegos">
			<?php
				require '../Controladores/Controller_Juegos.php';
				$id= $_GET["ID"];
				$cont = new Controller_Juegos();
				$datos = $cont->get_Juego($id);
				foreach ($datos as &$dato) {
					echo  "
						<header>
							<h1 id='TituloJuegoSelect'>".$dato["NOMBRE"]."</h1>
						</header>						
						<article id='SelectJuego'>
						<iframe class='youtube-player' type='text/html' id='Video' src='http://www.youtube.com/embed/".$dato["VIDEO"]."' frameborder='0'></iframe>
						<table  id='TablaInfo'>
							<tr >
								<td>
									<div aling=left>Cantidad:  ".$dato["CANTIDAD"]." </div>
									<div aling=left>Precio por dia: $".$dato["PRECIO"]."</div>
								</td>
								<td>
									<button type='button'>Alquilar</button>
								</td>
							</tr>
							<tr>
								<td>
									<p>Descripci&oacute;n:".$dato["DESCRIPCION"]."</p>
								</td>
								<td>
								</td>
							</tr>
							<tr>
								<td>
									<p>Categoria: ".$dato["CATEGORIA"]."</p>
								</td>
								<td>
								</td>								
							</tr>
						</table>



						

					</article>
					";
				}
				
			?>
		</table>
	</body>
</html>	