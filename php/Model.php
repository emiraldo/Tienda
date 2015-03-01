<?php
	class Model{

			private $text;
			public function __construct(){
				$this->text = "Hola mundo php";
			}

			public function getText(){
				return $this->text;
			}
	}


?>