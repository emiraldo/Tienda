<?php
	class View{
		private $model;
		private $controller;
		public function __construct(Model $model, Controller $controller){
			$this->model=$model;
			$this->controller=$controller;
		}

		public function  output(){
			return '<p>'.$this->model->getText().'</p>';
		}
	}

?>