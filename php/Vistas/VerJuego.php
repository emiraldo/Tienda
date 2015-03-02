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
			<header >
				<h1>Prestamo de VideoJuegos</h1>
			</header>
			<?php
				require '../Controladores/Controller_Ver_Juego.php';
				$id= $_GET["ID"];
				$cont = new Controller_Ver_Juego();
				$datos = $cont->get_Datos($id);
				foreach ($datos as &$dato) {
					echo  "
					<article>
						<header>".$dato["NOMBRE"]."</header>						
						<iframe class='youtube-player' type='text/html' id='Video' src='http://www.youtube.com/embed/".$dato["VIDEO"]."' frameborder='0'></iframe>
						<table BORDER=1>
							<tr>
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
							</tr>
							<tr>
								<td>
									<p>Categoria: ".$dato["CATEGORIA"]."</p>
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