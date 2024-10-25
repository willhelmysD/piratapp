<?php 
		require_once '../includes/class_inmuble.php';  
	if(
		(isset($_POST['numero']) && !empty($_POST['numero'])) &&
		(isset($_POST['piso']) && !empty($_POST['piso'])) &&
		(isset($_POST['tipo']) && !empty($_POST['tipo']))
	){	

		$numero = $_POST['numero'];
		$piso = $_POST['piso'];
		$tipo = $_POST['tipo'];

		$inmueble_class =  new Inmueble();
		$operar = $inmueble_class->agregar_inmueble($numero,$piso,$tipo);

		header('Location: ../inmueble_lista.php');



	}else{
		echo "datos nulos";
	}
?>