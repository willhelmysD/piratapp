<?php 
	include 'plantilla.html'; 
    startblock('article');
    $consultar_user = new users();
    $array_user = $consultar_user->listar_user();
?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Lista Usuarios</h3>
        <h6 class="font-weight-normal mb-0">Este es el total de usuarios <span class="text-primary"><?php echo count($array_user)?></span></h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
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
                            <th>Ultimo Ingreso</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($array_user as $item){
                                $cont++;
                        ?>
                        <tr>
                            <td><?php echo $cont?></td>
                            <td><?php echo $item['nombres']." ".$item['apellidos']?></td>
                            <td><?php echo $item['tipo']?></td>
                            <td><?php echo $item['cc']?></td>
                            <td></td>
                            <td>
                                <label class="badge badge-danger">del</label>
                                <label class="badge badge-warning">up</label>
                                <label class="badge badge-info" onclick="detalleUser(2,'<?php echo $item['codigo']?>',
                                                                                      '<?php echo $item['nombres']?>',
                                                                                      '<?php echo $item['apellidos']?>',
                                                                                      '<?php echo $item['cc']?>')">info</label>
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
            
<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUser" action="action/controlador_user.php" method="post">
          <input id="inputID" name="id" type="hidden">
          <input id="inputCaso" name="caso" type="hidden">
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
          <button type="button" class="btn btn-primary" onclick="sendForm()">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
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