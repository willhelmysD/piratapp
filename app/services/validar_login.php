<?php
include_once '../includes/class_user.php';
if(isset($_POST['nick']) || isset($_POST['nick'])){
    if(!empty($_POST['nick']) || !empty($_POST['pass'])){
        $nick = $_POST['nick'];
        $pass = $_POST['pass'];
        $User =  new User();
        $save =  $User->detalle_cliente($nick); 
        if($save){
            if(password_verify($pass,$save['cPassword'])) {
                echo "1";
            }else{
                echo "Contraseña equivocada";
            }
        }else{
            echo "Usuario no registrado!";
        }
    }else{
        echo "Campos Vacios!";
    }
}else{
    echo "Campos Nulos!";
}
