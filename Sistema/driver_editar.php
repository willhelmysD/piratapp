<?php 
	include 'plantilla.html'; 
    startblock('article');
    $ID = $_GET['ID'];
    $consultar_driver = new driver();
    $driver = $consultar_driver->detalle_driver($ID);
    if($driver){
        $vehiculo = $consultar_driver->detalle_vehiculos($driver['nDriverID']);
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
                  <input name="caso" value="2" type="hidden">
                  <input name="id" value="<?php echo $driver['nDriverID']?>" type="hidden">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="mb-4">
                          <label for="inputNombre">Nombre:</label>
                          <input id="inputNombre" type="text" name="nombre" value="<?php echo $driver['cNombre']?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                          <label for="inputApellido">Apellido:</label>
                          <input id="inputApellido" type="text" name="apellido" value="<?php echo $driver['cApellido']?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                          <label for="inputDoc">Doc:</label>
                          <input id="inputDoc" type="text" name="doc" value="<?php echo $driver['cCc']?>" class="form-control form-control-sm">                        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                          <label for="inputCelular">Celular:</label>
                          <input id="inputCelular" type="text" name="cel" value="<?php echo $driver['cCel']?>" class="form-control form-control-sm">                        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                          <label for="inputNacio">Nacimiento:</label>
                          <input id="inputNacio" type="date" name="nacio" value="<?php echo $driver['dNacimiento']?>" class="form-control form-control-sm">                        
                        </div>
                    </div>                 
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="inputPlaca">placa:</label>
                        <input id="inputPlaca" type="text" name="placa" value="<?php echo $vehiculo['cPlaca']?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="inputCc">cc:</label>
                        <input id="inputCc" type="text" name="cc" value="<?php echo $vehiculo['cCc']?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="inputMarca">Marca:</label>
                        <input id="inputMarca" type="text" name="marca" value="<?php echo $vehiculo['cMarca']?>" class="form-control form-control-sm">
                      </div>
                    </div>    
                    <div class="col-md-3">
                      <div class="mb-4">
                        <label for="inputModelo">Modelo:</label>
                        <input id="inputModelo" type="text" name="modelo" value="<?php echo $vehiculo['cModelo']?>" class="form-control form-control-sm">
                      </div>  
                    </div>                                   
                  </div>
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