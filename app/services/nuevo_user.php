<?php
include_once '../includes/class_user.php';
if(isset($_POST['nick']) || isset($_POST['nick'])){
    if(!empty($_POST['nick']) || !empty($_POST['pass'])){
        $nick = $_POST['nick'];
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $User =  new User();
        $save =  $User->agregar_cliente($nick,$pass_hash);
        echo "1";
    }else{
        echo "Campos nulos";
    }
}else{
    echo "Datos no validos!";
}
