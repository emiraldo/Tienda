<?php
	require ('../Modelos/Model_Juego.php');
	require ('../Modelos/Db.php');	

	class Controller_Ver_Juego{
		private $juego;
		private $datos;		
		
		public function __construct(){		
			$this->juego=new Model_Juego();	
		}

		function get_Datos($id){
			$this->datos=$this->juego->get_juego($id);
			return $this->datos;
		}
		
	}


?>