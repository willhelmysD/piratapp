<?php    
require_once ('conn.php');
class Cliente extends conectarDB{		

	public function Cliente(){				
		parent::__construct();
	}

	public function listar_cliente(){
		$sql="select * from tcliente";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();	
		return $resultados;
	}	


	public function agregar_cliente($name,$last,$add,$nei,$cel){
		$query_save="Insert into tcliente(cNombres,cApellidos,cDireccion,cBarrio,cCelular) value(:n,:a,:d,:b,:c)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':n', $name);    			 	
		$guardar->bindParam(':a', $last);    			 			
		$guardar->bindParam(':d', $add);
		$guardar->bindParam(':b', $nei);   
		$guardar->bindParam(':c', $cel);  			 			    			 							   			 			    			 							
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();			
		return $result;
	}
/*
	public function listar_tipos(){
		$sql="select * from ttipo";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();	
		return $resultados;
	}	



	public function modificar_user($id,$nombre,$apellido,$cedula,$tipo){
		$query_modify="update tUsers set cNombre = :nombre, cApellido = :apellido, cCc = :cc, nTipoID = :tipo where nUserID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);		
		$modificar->bindParam(':apellido', $apellido);		
		$modificar->bindParam(':cc', $cedula);	
		$modificar->bindParam(':tipo', $tipo);
		$modificar->execute();					
		$result =true;		
		return $result;				
	}	

	public function detalle_user($id){
		$sql="select * from tusers where nUserID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;		
	}
	public function estado_user($id,$estado){
		$query_modify="update tUsers set lEstado = :estado where nUserID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':estado', $estado);			
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
	}
	public function detallar_tipo($id){
		$sql="select * from TTipo where nTipoID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();		
		return $resultados;
	}
*/
}