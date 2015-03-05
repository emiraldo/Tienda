<?php
	require ('../Modelos/Model_Juego.php');
	require ('../Modelos/Db.php');	
	class Controller_Juegos{

		private $juego;
		private $datos;
		
		function __construct(){
			$this->juego=new Model_Juego();
		}

		function get_Juegos(){
			$this->datos=$this->juego->get_juegos();
			return $this->datos;
		}

		function get_Juego($id){
			$this->datos=$this->juego->get_juego($id);
			return $this->datos;
		}

		function set_Juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria){
			$this->datos = $this->juego->set_juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			return $this->datos;
		}		
	}

	if(isset($_POST["registrar"])){
	if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['cantidad']) && !empty($_POST['plataforma']) && !empty($_POST['video']) && !empty($_POST['imagen']) && !empty($_POST['categoria1'])) {		
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$plataforma=$_POST['plataforma'];
		$imagen=$_POST['imagen'];
		$video=$_POST['video'];
		$categoria=$_POST['categoria1'];
		$registro = new Controller_Juegos();		
		$result=$registro->set_Juego($nombre, $descripcion, $precio, $cantidad, $plataforma, $imagen, $video, $categoria);
			if($result){
					echo "
						<script>
							alert('Cuenta Correctamente Creada')
							window.location.href = '../Vistas/AgregarJuegos.php'
						</script>";	
				} else {
		 			$mensaje = "Error al ingresar datos de la informacion!";
				}
			} else {
				$mensaje = "Error en los datos ingresados!";
			}

		} else {
		 	$mensaje = "Todos los campos no deben de estar vacios!";
		}
	if (!empty($mensaje)) {
		echo "
			<script>
				alert('".$mensaje."')
				window.location.href = '../Vistas/AgregarJuegos.php'
			</script>";		
	}
	
?>