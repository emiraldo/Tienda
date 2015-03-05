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
			<?php
				require '../Controladores/Controller_Juegos.php';
				require '../Controladores/Controller_Categoria.php';
				$id= $_GET["ID"];
				$cate = new Controller_Categoria();
				$cont = new Controller_Juegos();
				$datos = $cont->get_Juego($id);
				$categori = $cate->get_Categorias();
				foreach ($datos as &$dato) {
					foreach ($categori as &$catego){
					if($catego["ID"] == $dato["IDCATEGORIA"])
					echo  "
						<header>
							<h1 id='TituloJuegoSelect'>".$dato["NOMBRE"]."</h1>
						</header>						
						<article id='SelectJuego'>
						<iframe class='youtube-player' type='text/html' id='Video' src='http://www.youtube.com/embed/".$dato["VIDEO"]."' frameborder='0'></iframe>
						<table  id='TablaInfo' >
							<tr >
								<td>
									<div aling=left>Cantidad:  ".$dato["CANTIDAD"]." </div>
									<div aling=left>Precio por dia: $".$dato["PRECIO"]."</div>
                   					<label for='tiempo'>Tiempo Prestamo: 
                    				<input type='number' name='tiempo' id='tiempo' value='' Style='width:40Px' /></label>
                    				<button type='button' onclick='Alquilar(".$dato["IDJUEGO"].",\"".$_SESSION['user']."\", ".$dato["PRECIO"].")' >Alquilar</button>
								</td>
							</tr>
							<tr>
								<td>
									<p>Descripci&oacute;n:".$dato["DESCRIPCION"]." </p>
								</td>
							</tr>
							<tr>
								<td>
									<p> Plataforma:".$dato["PLATAFORMA"]."<br>
									Categoria: ".$catego["DESCRIPCION"]."</p>
								</td>								
							</tr>
						</table>
						
					</article>
					";
				}
				}
				
			?>
		</table>
	</section>
	</body>
	<aside>
		<?php
			if(isset($_SESSION["user"])){
				echo "
					<p>USER: ".$_SESSION['user']."</p>
					<a href='../Controladores/logout.php' >CERRAR SESION</a>
				";
			}
		?>

	</aside>
	<footer>

	</footer>
</html>	