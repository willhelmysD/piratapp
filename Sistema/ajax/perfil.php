<?php
    sleep(1);
    require_once '../includes/class_users.php';
    $ID = $_POST['id'];
    $consultar = new users();
    $driver = $consultar->detalle_user($ID);
    var_dump($driver);