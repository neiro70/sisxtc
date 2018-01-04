<?php
class MySQL{
	private $conexion;
	private $total_consultas;
	 function __construct($schema="") {

		if (! isset ( $this->conexion )) {
			
			//$schema="xtc";
			$schema="u801037716_xtc";
			// Create connection
			//$this->conexion = new mysqli("localhost", "root", "jm4rt1n3z", $schema);
			$this->conexion = new mysqli("localhost", "u801037716_xtc", "jm4rt1n3z", $schema);
			//mysql_query("SET NAMES 'utf8'");
			// Check connection
			if ($this->conexion->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
				

		}
	}
	

	
	public function getConexion() {
		return $this->conexion;
	}

	
	public function closeSession(){
		$this->conexion->close();
	}

	
	
	
	
}
?>