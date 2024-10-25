<?php 
	include 'plantilla.html'; 
    startblock('article');
    $ID = $_GET['ID'];
    $consultar_driver = new driver();
    $driver = $consultar_driver->detalle_driver($ID);
    if($driver){
        $vehiculo = $consultar_driver->detalle_vehiculo($ID);
    }else{
        echo'<script type="text/javascript">
        alert("driver no reconocido");
        window.location.href="driver_lista.php";
        </script>';         
    }
?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Editar Driver</h3>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario Detalles Driver</h4>
                <p class="card-description">Formulario de actualizacion de datos del driver</code></p>

                <form id="formNuevoDriver" action="action/control_driver.php" method="post"> 
                  <input name="caso" value="2">
                  <input name="id" value="<?php echo $driver['nDriverID']?>">
                  <label>Nombre:</label>
                  <input id="" type="" name="nombre" value="<?php echo $driver['cNombre']?>">
                  <label>Apellido:</label>
                  <input id="" type="" name="apellido" value="<?php echo $driver['cApellido']?>">
                  <label>Doc:</label>
                  <input id="" type="" name="doc" value="<?php echo $driver['cCc']?>">
                  <label>nacio:</label>
                  <input id="" type="date" name="nacio" value="<?php echo $driver['dNacimiento']?>">
                  <label>cel:</label>
                  <input id="" type="" name="cel" value="<?php echo $driver['cCel']?>">
                  <hr>
                  <label>placa:</label>
                  <input id="" type="" name="placa" value="<?php echo $vehiculo['cPlaca']?>">
                  <label>cc:</label>
                  <input id="" type="" name="cc" value="<?php echo $vehiculo['cCc']?>">
                  <label>Marca:</label>
                  <input id="" type="" name="marca" value="<?php echo $vehiculo['cMarca']?>">
                  <label>Modelo:</label>
                  <input id="" type="" name="modelo" value="<?php echo $vehiculo['cModelo']?>">
                  <a href="driver_lista" class="btn btn-sm btn-warning">Volver</a>
                  <button type="submit" class="btn btn-sm btn-info">Enviar</button>
                </form>

            </div>
        </div>
        
    </div>
</div>




<?php endblock() ?>
<script>
  function sendForm(){    
    let formulario = document.getElementById('formUser');
    let nombres = $('#inputNombres').val();
    alert(nombres);
    if(nombres==""){
      Swal.fire({
        title: 'Error!',
        text: 'Do you want to continue',
        icon: 'error',
        confirmButtonText: 'Cool'
      })      
      alert("no se admiten campos nulos");
      return false;
    }
    formulario.submit();    
  }
</script>