<?php
require_once '../includes/class_users.php';
$consultar_user = new users();

if(!empty($_POST['caso']) || !isset($_POST['caso'])){
    $caso = $_POST['caso'];
    $codigo = $_POST['id'];
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $cc = $_POST['documento'];


    switch ($caso) {
        case '1':
            //$save1  driver
            //save2->consultar->guardarVehivulo($placa,$cc,$marca,$modelo,$save1)  

            break
        case '2':
            $update = $consultar_user->modificar_user($codigo, $nombre, $apellido, $cc);
            if($update){
                echo "proceso exitoso!!!";
            }else{
                echo "proceso fallido!!!";
            }
            
            break;
        
        default:
            # code...
            break;
    }


    echo'<script type="text/javascript">
    alert("Tarea Guardada");
    window.location.href="../usuarios_lista.php";
    </script>';    
    
}else{
    echo'<script type="text/javascript">
    alert("Todos los campos son requeridos");
    window.location.href="../usuarios_lista.php";
    </script>';    
    exit;    
}
?>
