<?php
include_once 'test/class_cliente.php';

$name = $_POST['name'];
$last = $_POST['last'];
$add = $_POST['add'];
$nei = $_POST['nei'];
$cel = $_POST['cel'];

$clientes =  new Cliente();
$save =  $clientes->agregar_cliente($name,$last,$add,$nei,$cel);
echo $save;