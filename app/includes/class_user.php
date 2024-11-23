<?php    
require_once ('conn.php');
class User extends conectarDB{		

	public function User(){				
		parent::__construct();
	}
	public function agregar_cliente($nick,$pass){
		try{
			$query_save="insert into tlogin(cUser,cPassword) value(:nick,:pass)";
			$guardar=$this->conn_db->prepare($query_save);		
			$guardar->bindParam(':nick', $nick);    			 	
			$guardar->bindParam(':pass', $pass); 
			$guardar->execute();
			$result = $this->conn_db->lastInsertId();
			$guardar->closeCursor();			
			return $result;
        }catch(Exception $e){
			$customMessage = "Hubo un problema al guardar el usuario. Por favor, verifica los datos e intenta nuevamente. codigo error: ".$e->getCode();
			//error_log("Error: " . $e->getMessage() . " Código: " . $e->getCode(), 3, '/path/to/error.log');
			return $customMessage;
        }
	}

	public function detalle_cliente($nick){
		$sql="select * from tlogin where cUser = :nick";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':nick', $nick);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		return $resultados;		
	}

	/*
	public function listar_user(){
		$sql="select * from vUsers";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();	
		return $resultados;
	}	

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