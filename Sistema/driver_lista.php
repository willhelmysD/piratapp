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
        <h3 class="font-weight-bold">Lista Driver</h3>
        <h6 class="font-weight-normal mb-0">Este es el total de driver <span class="text-primary"><?php echo count($array_driver)?></span></h6>
      </div>
    </div>
  </div>
</div>
 
<div class="row justify-content-center">
    <div class="col-md-10 col-xs-12 grid-margin stretch-card">    
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">lista usuarios</h4>
                <p class="card-description"> Total<code>#<?php echo count($array_driver)?></code></p>

                <?php 
                    if(count($array_driver)!=0){                    
                ?>

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>	
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Ced</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Funcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($array_driver as $item){
                                $cont++;

                        ?>
                        <tr>
                            <td><?php echo $cont?></td>
                            <td><?php echo $item['nombre']." ".$item['apellido']?></td>
                            <td><?php echo $item['cc']?></td>
                            <td><?php echo $item['marca']?></td>
                            <td><?php echo $item['modelo']?></td>
                            <td>
                              <?php if($item['estado']==1){ ?>
                                  <label class="btn btn-outline-danger btn-sm" onclick="estadoDriver(3,'<?php echo $item['codigo']?>',0)">Cambiar Estado</label>
                              <?php }else{ ?>
                              <label class="btn btn-outline-success btn-sm" onclick="estadoDriver(3,'<?php echo $item['codigo']?>',1)">Cambiar Estado</label>
                                <?php } ?>
                                <a class="btn btn-outline-info btn-sm btn-sm" href="driver_editar.php?ID=<?php echo $item['codigo']?>">Editar Perfil</a>

                            </td>
                        </tr>

                        <?php 
                            }
                        ?>

                    </tbody>
                    </table>
                </div>

                <?php 
                    }else{
                        echo "<h2 class='text-warning'>No hay usuarios registrados!!!</h2>";
                    } 
                ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalEstado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Estado</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="formUser" action="action/control_driver.php" method="post">
                    <h1>Deseas cambiar el estado del driver?</h1>
                  <input id="inputEstadoID" name="id" type="hidden">
                  <input id="inputEstadoCaso" name="caso" type="hidden">
                  <input id="inputEstado" name="estado" type="hidden">
                  <button type="submit" class="btn btn-primary" onclick="sendEstado()">Enviar</button>
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