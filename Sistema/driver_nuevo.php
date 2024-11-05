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
                  <input name="caso" value="1" type="hidden">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                          <label for="inputNombre">Nombre:</label>
                          <input id="inputNombre" type="text" name="nombre" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                          <label for="inputApellido">Apellido:</label>
                          <input id="inputApellido" type="text" name="apellido" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                          <label for="inputDoc">Documento:</label>
                          <input id="inputDoc" type="text" name="doc" class="form-control form-control-sm">
                        </div>
                    </div>  
                    <div class="col-md-4">
                        <div class="mb-3">
                          <label for="inputNacio">nacio:</label>
                          <input id="inputNacio" type="date" name="nacio" class="form-control form-control-sm">                        
                        </div> 
                    </div> 
                    <div class="col-md-4">
                        <div class="mb-3">
                          <label for="inputCelular">cel:</label>
                          <input id="inputCelular" type="text" name="cel" class="form-control form-control-sm">
                        </div> 
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                          <label for="placa">placa:</label>
                          <input id="inputPlaca" type="text" name="placa" class="form-control form-control-sm">
                        </div> 
                    </div> 
                    <div class="col-md-3">
                        <div class="mb-3">
                          <label for="inputCC">cc:</label>
                          <input id="inputCC" type="text" name="cc" class="form-control form-control-sm">
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                          <label for="inputMarca">Marca:</label>
                          <input id="inputMarca" type="text" name="marca" class="form-control form-control-sm">
                        </div> 
                    </div> 
                    <div class="col-md-3">
                        <div class="mb-3">
                          <label for="inputModelo">Modelo:</label>
                          <input id="inputModelo" type="text" name="modelo" class="form-control form-control-sm">
                        </div> 
                    </div>                                                                                                      
                  </div>
                  <button type="button" class="btn btn-sm btn-info" onclick="nuevoDriver()">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php endblock() ?>
<script>
  function nuevoDriver(){    

    let formulario = document.getElementById('formNuevoDriver');
    let nombre = $('#inputNombre').val();
    let apellido = $('#inputApellido').val();
    let doc = $('#inputDoc').val();
    let nacio = $('#inputNacio').val();
    let celular = $('#inputCelular').val();

    let placa = $('#inputPlaca').val();
    let cc = $('#inputCC').val();
    let modelo = $('#inputModelo').val();
    let marca = $('#inputMarca').val();

    if(nombre=="" || apellido=="" || doc=="" || nacio=="" || celular==""){
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos del conductor son requeridos!!!',
        icon: 'error'
      })      
      return false ;
    } 
    
    if(placa=="" || cc=="" || modelo=="" || marca==""){
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos del vehiculo son requeridos!!!',
        icon: 'error'
      })      
      return false ;
    } 
    formulario.submit();
  }
</script>