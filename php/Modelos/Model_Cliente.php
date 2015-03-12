<?php



class Model_Cliente{
	private $db;
	private $clientes;
	
	public function __construct(){
		$this->db=new Db();
		$this->clientes=array();
		
	}

	public function set_cliente($cedula, $nombre, $apellido, $telefono, $user, $pass){
		$query = "Insert into CLIENTE (CEDULA, NOMBRE, APELLIDO, TELEFONO, USER, PASS) values ('$cedula','$nombre','$apellido','$telefono','$user','$pass');";
		$this->clientes=$this->db->db_query($query);
		return $this->clientes;
	}

	public function get_clientes(){
		$this->clientes=$this->db->db_select("Select * from CLIENTE");
		return $this->clientes;
	}

	public function get_cliente($id){
		$this->cliente=$this->db->db_select("Select * from CLIENTE where CEDULA=".$id.";");
		return $this->cliente;
	}

	public function get_cliente1($user){
		$this->cliente=$this->db->db_select("Select * from CLIENTE where USER='".$user."';");
		return $this->cliente;
	}

}

?>