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
				<h1>Prestamo de VideoJuegos</h1>
			</header>
					<?php
						require '../Controladores/Controller_Juegos.php';
						$cont = new Controller_Juegos();
						$datos = $cont->get_Juegos();
						
						foreach ($datos as &$dato) {
							if($dato["IDCATEGORIA"] == $_GET["ID"]){
								echo  "
									<article class='Producto'>
										<img class='ImagenJuego' src='../../".$dato["IMAGEN"]."''  onclick='DescripcionJuego(this.id)' id=".$dato["IDJUEGO"]."></img>
										<div class='Text'>Cantidad:  ".$dato["CANTIDAD"]." </div>
										<div class='Text'>Precio por dia: $".$dato["PRECIO"]."</div>
									</article>
										";
							}
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
					<a href='../Controladores/logout.php' >OPCIONES USUARIO</a>
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