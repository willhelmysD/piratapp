<?php 
	include 'plantilla.html'; 
    startblock('article');
    $consultar = new driver();
    $array_driver = $consultar->listar_driver();
?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Nuevo Driver</h3>
        <h6 class="font-weight-normal mb-0"></span></h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Formulario nuevo Driver</h4>
                <p class="card-description">Este es un formulario de ingreso de un nuevo driver</p>
          
                <form id="formNuevoDriver" action="action/control_driver.php" method="post"> 
                  <input name="caso" value="1">
                  <label>Nombre:</label>
                  <input id="" type="" name="nombre">
                  <label>Apellido:</label>
                  <input id="" type="" name="apellido">
                  <label>Doc:</label>
                  <input id="" type="" name="doc">
                  <label>nacio:</label>
                  <input id="" type="date" name="nacio">
                  <label>cel:</label>
                  <input id="" type="" name="cel">
                  <hr>
                  <label>placa:</label>
                  <input id="" type="" name="placa">
                  <label>cc:</label>
                  <input id="" type="" name="cc">
                  <label>Marca:</label>
                  <input id="" type="" name="marca">
                  <label>Modelo:</label>
                  <input id="" type="" name="modelo">
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