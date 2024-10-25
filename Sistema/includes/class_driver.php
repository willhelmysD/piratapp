<?php    
require_once ('conn.php');
class driver extends conectarDB{		

	public function driver(){				
		parent::__construct();
	}

	public function listar_driver(){
		$sql="select * from vDrivers";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;			
		return $resultados;
	}	

	public function agregar_driver($nombre,$apellido,$cc,$nacimiento,$cel){
		$query_save="Insert into tDriver(cNombre,cApellido,cCc,dNacimiento,cCel) value(:nombre,:apellido,:cc,:nacimiento,:cel)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);    			 	
		$guardar->bindParam(':apellido', $apellido);    			 			
		$guardar->bindParam(':cc', $cc);    			 			
		$guardar->bindParam(':nacimiento', $nacimiento);    			 			
		$guardar->bindParam(':cel', $cel);    			 							
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_driver($id,$nombre,$apellido,$cc,$nacimiento,$cel){		
		$query_modify="update tDriver set cNombre = :nombre, cApellido = :apellido, cCc = :cc, dNacimiento = :nacimiento, cCel = :cel where nDriverID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);		
		$modificar->bindParam(':apellido', $apellido);		
		$modificar->bindParam(':cc', $cc);		
		$modificar->bindParam(':nacimiento', $nacimiento);    			 			
		$modificar->bindParam(':cel', $cel);    				
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
		//$this->conn_db=null;				
	}	

	public function estado_driver($id,$estado){
		$query_modify="update tDriver set lEstado = :estado where nDriverID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':estado', $estado);			
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
		//$this->conn_db=null;				
	}

	public function detalle_driver($id){
		$sql="select * from TDriver where nDriverID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
		//$this->conn_db = null;
	}

	
	public function detalle_vehiculo($id){
		$sql="select * from tVehiculo where nDriverFK = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
		//$this->conn_db = null;
	}
	public function agregar_vehiculo($placa,$cc,$marca,$modelo,$driver){
		$query_save="Insert into tVehiculo(cPlaca,cCc,cMarca,cModelo,nDriverFK) value(:placa,:cc,:marca,:modelo,:driver)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':placa', $placa);    			 	
		$guardar->bindParam(':cc', $cc);    			 			
		$guardar->bindParam(':marca', $marca);    			 			
		$guardar->bindParam(':modelo', $modelo);    			 			
		$guardar->bindParam(':driver', $driver);    			 							
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}	

	public function modificar_vehiculo($placa,$cc,$marca,$modelo,$driver){
		$query_modify="update tVehiculo set cPlaca = :placa, cCc = :cc, cMarca = :marca, cModelo = :modelo where nDriverFK = :id";
		$modificar=$this->conn_db->prepare($query_modify);		
		$modificar->bindParam(':placa', $placa);    			 	
		$modificar->bindParam(':cc', $cc);    			 			
		$modificar->bindParam(':marca', $marca);    			 			
		$modificar->bindParam(':modelo', $modelo);    			 			
		$modificar->bindParam(':id', $driver);    			 							
		$modificar->execute();
		$result =true;
		$modificar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}

}