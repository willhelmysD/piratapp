<?php 
	include 'plantilla.html'; 
    startblock('article');
    $consultar_user = new users();
    $array_user = $consultar_user->listar_user();
    $tipos =  $consultar_user->listar_tipos();
    

?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-10 col-xl-10 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Usuarios</h3>
        <h6 class="font-weight-normal mb-0">Total de usuarios registrados: <span class="text-primary"><?php echo count($array_user)?></span></h6>
      </div>
      <div class="col-2 col-xl-2 mb-4 mb-xl-0">
        <button type="button" class="btn btn-success btn-sm"  data-bs-toggle="modal" data-bs-target="#modalNuevo">Nuevo Usuario</button>
      </div>      
    </div>
  </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">lista usuarios</h4>
                <p class="card-description"> Total<code>#<?php echo count($array_user)?></code></p>
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Rol</th>
                            <th>Documento</th>
                            <th>Estado</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($array_user as $item){
                                if($item['estado']==1){
                                  $estado = array("Activo","danger","Retirar",0);
                                }else{
                                  $estado = array("Retirado","success","Activar",1);
                                }
                                $cont++;
                        ?>
                        <tr>
                            <td><?php echo $cont?></td>
                            <td><?php echo $item['nombres']." ".$item['apellidos']?></td>
                            <td><?php echo $item['tipo']?></td>
                            <td><?php echo $item['cc']?></td>
                            <td><?php echo $estado[0]?></td>
                            <td>
                                <label class="badge badge-<?php echo $estado[1]?>"><?php echo $estado[2]?></label>
                                <label class="badge badge-info" onclick="detalleUser(2,'<?php echo $item['codigo']?>',
                                                                                      '<?php echo $item['nombres']?>',
                                                                                      '<?php echo $item['apellidos']?>',
                                                                                      '<?php echo $item['cc']?>',
                                                                                      '<?php echo $item['tipoID']?>')">info</label>
                            </td>
                        </tr>

                        <?php 
                            }
                        ?>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Editar usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUser" action="action/controlador_user.php" method="post">
          <input id="inputID" name="id" type="hidden">
          <input id="inputCaso" name="caso" type="hidden" value="2">
          <div class="form-group">
            <label for="inputNombres">Nombres</label>
            <input type="text" id="inputNombres" name="nombres" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputApellidos">Apellidos</label>
            <input type="text" id="inputApellidos" name="apellidos" class="form-control">
          </div>
          <div class="form-group">
            <label for="inputCc">Documento</label>
            <input type="text" id="inputCc" name="documento" class="form-control">
          </div> 
          <div class="form-group">
            <label for="inputTipo">Tipo</label>
            <select name="tipo" class="form-control form-select-sm" id="inputTipo">
              <option value="0">Seleccione un tipo</option>
              <?php 
                foreach($tipos as $item){
              ?>
                  <option value="<?php echo $item['nTipoID']?>"><?php echo $item['ctipo']?></option>
              <?php  } ?>
            </select>
          </div>                                         
          <button type="button" class="btn btn-primary" onclick="sendForm()">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Nuevo-->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUserNuevo" action="action/controlador_user.php" method="post">
          <input id="inputCaso" name="caso" type="hidden" value="1">
          <div class="form-group">
            <label for="inputNombres">Nombres</label>
            <input type="text" id="inputNombresNuevo" name="nombres" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputApellidos">Apellidos</label>
            <input type="text" id="inputApellidosNuevo" name="apellidos" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="inputCc">Documento</label>
            <input type="text" id="inputCcNuevo" name="documento" class="form-control form-control-sm">
          </div> 
          <div class="form-group">
            <label for="inputTipo">Tipo</label>
            <select name="tipo" class="form-control form-select-sm">
              <option value="0">Seleccione un tipo</option>
              <?php 
                $tipos =  $consultar_user->listar_tipos();
                foreach($tipos as $item){
              ?>
                  <option value="<?php echo $item['nTipoID']?>"><?php echo $item['ctipo']?></option>
              <?php  } ?>
            </select>
          </div>                        
          <button type="button" class="btn btn-primary" onclick="sendNuevoForm()">Crear</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php endblock() ?>
<script>
  function sendForm(){    
    let formulario = document.getElementById('formUser');
    let nombres = $('#inputNombres').val();
    let apellidos = $('#inputApellidos').val();
    let cc = $('#inputCc').val();
    
    if(nombres=="" || apellidos=="" || cc==""){
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos son requeridos',
        icon: 'error',
        confirmButtonText: 'Cool'
      })      
      return false;
    }
    formulario.submit();    
  }
  function sendNuevoForm(){    
    let formulario = document.getElementById('formUserNuevo');
    let nombres = $('#inputNombresNuevo').val();
    let apellidos = $('#inputApellidosNuevo').val();
    let cc = $('#inputCcNuevo').val();
    
    if(nombres=="" || apellidos=="" || cc==""){
      Swal.fire({
        title: 'Error!',
        text: 'Todos los campos son requeridos',
        icon: 'error',
        confirmButtonText: 'Cool'
      })      
      return false;
    }
    formulario.submit();    
  }

</script>