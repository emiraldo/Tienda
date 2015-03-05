<?php
session_start();
if(!isset($_SESSION["user"])){
		// echo "Session is set"; // for testing purposes
		header("Location: ../../index.php");
}
?>
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
			<header id='TituloJuegoSelect'>
				<h1>Historial VideoJuegos Alquilados</h1>
			</header>
					<?php
						require '../Controladores/Controller_Prestamo.php';
						require '../Controladores/Controller_Cliente.php';
						require '../Controladores/Controller_Juegos.php';
						$clien = new Controller_Cliente();
						$cont = new Controller_Prestamo();
						$jueg = new Controller_Juegos();
						$cliente = $clien->getCliente1($_SESSION["user"]);
						$cliente = $cliente[0];
						$datos = $cont->get_Prestamo($cliente["CEDULA"]);
						
						foreach ($datos as &$dato) {
							$juego=$jueg->get_Juego($dato["IDJUEGO"]);
							$juego=$juego[0];
								echo  "
									<article class='Producto'>
										<img class='ImagenJuego' src='../../".$juego["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$juego["IDJUEGO"]."></img>
										<div class='Text'>Cantidad:  ".$juego["CANTIDAD"]." </div>
										<div class='Text'>Precio por dia: $".$juego["PRECIO"]."</div>
									</article>
										";
							
						}
					?>
		</section>
	</body>	
	<aside>
		
		<?php
			require '../Controladores/Controller_Categoria.php';
			if(isset($_SESSION["user"])){
				echo "
					<div id='infoUser'>USER: ".$_SESSION['user']."
					<br>
					<a href='Inicio.php' >INICIO</a>
					<br>
					<a href='../Controladores/logout.php' >CERRAR SESION</a></div>
				";

			}
			echo "<h1>CATEGORIAS</h1>
			<ul id='Categorias'>
			";
			$cate = new Controller_Categoria();
			$datos = $cate->get_Categorias();
			foreach ($datos as &$dato) {
				echo  "<li ><a href='InicioCategoria.php?ID=".$dato["ID"]."' >".$dato["DESCRIPCION"]."</a></li>";
			}

		?>
			<li ><a href='Inicio.php' >TODAS</a></li>
		</ul>


	</aside>
	<footer>

	</footer>
</html>