<?php
    require_once '../includes/class_driver.php';    
    $consultar = new driver();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['apellido']) && !empty($_POST['apellido'])) &&
                    (isset($_POST['doc']) && !empty($_POST['doc'])) &&
                    (isset($_POST['cel']) && !empty($_POST['cel'])) &&
                    (isset($_POST['nacio']) && !empty($_POST['nacio'])) &&
                    (isset($_POST['placa']) && !empty($_POST['placa'])) &&
                    (isset($_POST['cc']) && !empty($_POST['cc'])) &&
                    (isset($_POST['marca']) && !empty($_POST['marca'])) &&
                    (isset($_POST['modelo']) && !empty($_POST['modelo']))){	
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
                    if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['apellido']) && !empty($_POST['apellido'])) &&
                    (isset($_POST['doc']) && !empty($_POST['doc'])) &&
                    (isset($_POST['cel']) && !empty($_POST['cel'])) &&
                    (isset($_POST['nacio']) && !empty($_POST['nacio'])) &&
                    (isset($_POST['placa']) && !empty($_POST['placa'])) &&
                    (isset($_POST['cc']) && !empty($_POST['cc'])) &&
                    (isset($_POST['marca']) && !empty($_POST['marca'])) &&
                    (isset($_POST['modelo']) && !empty($_POST['modelo'])) &&
                    (isset($_POST['id']) && !empty($_POST['id'])) 
                    ){
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
                        window.location.href="../driver_nuevo.php";
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