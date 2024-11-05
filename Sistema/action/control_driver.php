<?php
    require_once '../includes/class_driver.php';    
    $consultar = new driver();
    function validar($array){
        $cont = 0;
        foreach($_POST as $fila){
            if($fila==null){
                $cont++;
            }else if($fila==0){
                $cont++;
            }else if($fila==''){
                $cont++;
            }
        }
        return $cont;
    }

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                $validar =  validar($_POST);
                if($validar==0){
                //nuevo
                //validacion 
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $doc = $_POST['doc'];
                    $cel = $_POST['cel'];
                    $nacio = $_POST['nacio'];

                    $placa = $_POST['placa'];
                    $cc = $_POST['cc'];
                    $marca = $_POST['marca'];
                    $modelo = $_POST['modelo'];

                    $maren = $consultar->agregar_driver($nombre,$apellido,$doc,$nacio,$cel);
                    if($maren){
                        $juanjo = $consultar->agregar_vehiculo($placa,$cc,$marca,$modelo,$maren);
                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../driver_lista.php";
                        </script>';    
                    }else{
                        echo'<script type="text/javascript">
                        alert("Proceso Fallo");
                        window.location.href="../driver_lista.php";
                        </script>';    
                    }                    
                }else{
                    echo'<script type="text/javascript">
                    alert("Todos los campos son requeridos");
                    window.location.href="../driver_lista.php";
                    </script>';    
                }
                break;
                case '2':
                    $validar =  validar($_POST);
                    if($validar==0){
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $doc = $_POST['doc'];
                        $cel = $_POST['cel'];
                        $nacio = $_POST['nacio'];
    
                        $placa = $_POST['placa'];
                        $cc = $_POST['cc'];
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $id = $_POST['id'];

                        $modificar_driver = $consultar->modificar_driver($id,$nombre,$apellido,$doc,$nacio,$cel);
                        $modificar_vehiculo = $consultar->modificar_vehiculo($placa,$cc,$marca,$modelo,$id);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../driver_editar.php?ID='.$id.'";
                        </script>'; 


                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../driver_editar.php?ID='.$_POST['id'].'";
                        </script>';                          
                    }	                    

                    break;
                case '3':
                    //estado
                    $ID = $_POST['id'];
                    $estado = $_POST['estado'];
                    $mayra = $consultar->estado_driver($ID,$estado);
                    echo'<script type="text/javascript">
                    alert("estado Cambiado");
                    window.location.href="../driver_lista.php";
                    </script>';                        
                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../driver_lista.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../driver_lista.php";
        </script>';    
        exit;
    }