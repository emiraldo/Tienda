<?php
class Db{
	protected static $connection;

	function db_connected(){

		if(!isset(self::$connection)){
			$config = parse_ini_file('config.ini');
			self::$connection = mysqli_connect('localhost', $config['user'], $config['password'], $config['dbname'])
		}
	}



}

?>