<?php 
	include 'plantilla.html'; 
    $consultar = new users();
    $array_user = $consultar->listar_user();    
?>
<?php startblock('article') ?>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Lista Driver</h3>
        <h6 class="font-weight-normal mb-0">Este es el total de driver <span class="text-primary"><?php echo count($array_user)?></span></h6>
      </div>
    </div>
  </div>
</div>

<div class="row mb-3">
    <div class="col-md-6" style="text-align:end">
        <button class="btn btn-primary btn-xs text-white" onclick="ver_file()">Archivos</button>
        <button class="btn btn-info btn-xs text-white" onclick="ver_nuevo()">Nuevo Usuario</button>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xs-12 grid-margin stretch-card">            
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">lista usuarios</h4>
                <p class="card-description"> Total<code>#<?php echo count($array_user)?></code></p>

                <?php 
                    if(count($array_user)!=0){                    
                ?>

                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>	
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Funcion</th>
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
                            <td>
                              <?php if($item['estado']==1){ ?>
                                  <label class="btn btn-outline-danger btn-xs" onclick="estadoDriver(3,'<?php echo $item['codigo']?>',0)">Estado</label>
                              <?php }else{ ?>
                              <label class="btn btn-outline-success btn-xs" onclick="estadoDriver(3,'<?php echo $item['codigo']?>',1)">Estado</label>
                                <?php } ?>
                                <a class="btn btn-outline-info btn-sm btn-xs" onclick="ver_perfil(<?php echo $item['codigo']?>)">Perfil</a>
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
    </div>
    <div class="col-md-6">
        <div id="panel"></div>
        <div id="spinner" style="display:none">
            <div class="row" style="text-align:center">
                <div class="col-md-12">
                    <i class="fa fa-spinner fa-pulse fa-5x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>
<script>
    function ver_perfil(codigo){
        $.ajax({
		    url:'ajax/perfil.php',
		    type: 'POST',
		    data:{'id':codigo},
            beforeSend: function() {
                $('#panel').html('');
			    $('#spinner').css('display','block');
            },					
            success: function(data){ 
                $('#panel').html(data);	
                $('#spinner').css('display','none');
            } 		
	    });
    }

    function ver_nuevo(){
        $.ajax({
		    url:'ajax/nuevo.php',
            beforeSend: function() {
                $('#panel').html('');
			    $('#spinner').css('display','block');
            },					
            success: function(data){ 
                $('#panel').html(data);	
                $('#spinner').css('display','none');
            } 		
	    });
    }   
    
    function ver_file(){
        $.ajax({
		    url:'ajax/file.php',
            beforeSend: function() {
                $('#panel').html('');
			    $('#spinner').css('display','block');
            },					
            success: function(data){ 
                $('#panel').html(data);	
                $('#spinner').css('display','none');
            } 		
	    });
    }   


    function enviar_file(){

        var formData = new FormData(document.getElementById("form-file"));
        formData.append("dato", "valor");
        $.ajax({
            url:'ajax/file.php',        
            type: "post",
            dataType: "html",
            data: formData,
            beforeSend: function(){
                $('#spinner').css('display','block');
            },        
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
            $('#spinner').css('display','none');
            //
            $('#panel').html(data);	
            //alert(data);            
        });   

    } 

    function sendFormAjax(){

        let nombre = $('#inputNombresNuevo').val();
        let apellido = $('#inputApellidosNuevo').val();
        let doc = $('#inputCcNuevo').val();

        if(nombre=="" || apellido=="" || doc==""){
        Swal.fire({
            title: 'Error!',
            text: 'Todos los campos son requeridos!!!',
            icon: 'error'
        })      
        return false ;
        }

        var formData = new FormData(document.getElementById("formUserNuevo"));
        formData.append("dato", "valor");
        $.ajax({
            url:'action/controlador_user.php',        
            type: "post",
            dataType: "html",
            data: formData,
            beforeSend: function(){
                $('#spinner').css('display','block');
            },        
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data){
            $('#spinner').css('display','none');
            //
            alert(data);            
        });        
    }
</script>