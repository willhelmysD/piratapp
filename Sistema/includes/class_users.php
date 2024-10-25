<?php    
require_once ('conn.php');
class users extends conectarDB{		

	public function users(){				
		parent::__construct();
	}

	public function listar_user(){
		$sql="select * from vUsers";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
		$this->conn_db=null;			
	}	

	public function modificar_user($id,$nombre,$apellido,$cedula){
		$query_modify="update tUsers set cNombre = :nombre, cApellido = :apellido, cCc = :cc where nUserID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);		
		$modificar->bindParam(':apellido', $apellido);		
		$modificar->bindParam(':cc', $cedula);		
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		return $result;
		$this->conn_db=null;				
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
		$this->conn_db=null;				
	}


    //vista... consulta anidada

	public function detallar_tipo($id){
		$sql="select * from TTipo where nTipoID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;
		$this->conn_db = null;
	}

	public function agregar_inmueble($numero,$piso,$tipo){
		$query_save="Insert into inmueble(numero,piso,tipo) value(:numero,:piso,:tipo)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':numero', $numero);    			 	
		$guardar->bindParam(':piso', $piso);    			 			
		$guardar->bindParam(':tipo', $tipo);    			 			
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		$this->conn_db=null;			
	}





}