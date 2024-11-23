<?php 
    include_once 'test/class_cliente.php';
    $clientes =  new Cliente();
    $lista = $clientes->listar_cliente();
    var_dump($lista);
?>

<form action="servicio_insertar.php" method="post">
    <input type="text" name="name">
    <input type="text" name="last">
    <input type="text" name="add">
    <input type="text" name="nei">
    <input type="text" name="cel">
    
    <button type="submit">enviar</button>


</form>

