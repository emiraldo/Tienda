<?php
	require ('php/Modelos/Model_Juego.php');
	require ('php/Modelos/Db.php');	
	class Controller_Juegos{

		private $IdJuego;
		private $funcion=0;
		private $juego;
		private $datos;
		
		function __construct(){
			$this->juego=new Model_Juego();
		}

		function get_Datos(){
			$this->datos=$this->juego->get_juegos();
			return $this->datos;
		}		
	}
	
?>