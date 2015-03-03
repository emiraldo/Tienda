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
	}
	
?>