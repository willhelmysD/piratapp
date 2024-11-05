<?php
require_once '../includes/class_users.php';
$consultar_user = new users();
$resultado  ="";
if(!empty($_POST['caso']) || !isset($_POST['caso'])){
    $caso = $_POST['caso'];
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $cc = $_POST['documento'];
    $tipo = $_POST['tipo'];
    switch ($caso) {
        case '1':
            $save1 = $consultar_user->agregar_usuario($nombre,$apellido,$cc,$tipo);
            if($save1){
                $resultado = "proceso exitoso!!!";
            }else{
                $resultado = "proceso fallido!!!";
            }
            break;
        case '2':
            $codigo = $_POST['id'];
            $update = $consultar_user->modificar_user($codigo, $nombre, $apellido, $cc,$tipo);
            if($update){
                $resultado = "proceso exitoso!!!";
            }else{
                $resultado = "proceso fallido!!!";
            }
            break;
        default:
            $resultado = "Caso desconocido!";
            break;
    }
    echo'<script type="text/javascript">
    alert("rta: '.$resultado.'");
    window.location.href="../usuarios_lista.php";
    </script>';    
    
}else{
    echo'<script type="text/javascript">
    alert("Todos los campos son requeridos");
    window.location.href="../usuarios_lista.php";
    </script>';    
    exit;    
}

