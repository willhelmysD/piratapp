<?php 
    sleep(1);
    require_once '../includes/class_users.php';
    $consultar_user = new users();  
    $tipos =  $consultar_user->listar_tipos();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <h4 class="card-title text-center">Formulario Nuevo Usuario</h4>
            <p class="card-description">Todos los campos son requeridos!</p>

            <form id="formUserNuevo" action="action/controlador_user.php" method="post">
                <input id="inputCaso" name="caso" type="hidden" value="1">
                <div class="form-group">
                    <label for="inputNombresNuevo">Nombres</label>
                    <input type="text" id="inputNombresNuevo" name="nombres" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="inputApellidos">Apellidos</label>
                    <input type="text" id="inputApellidosNuevo" name="apellidos" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="inputCc_Nuevo">Documento</label>
                    <input type="text" id="inputCcNuevo" name="documento" class="form-control form-control-sm">
                </div> 
                <div class="form-group">
                    <label for="inputTipoNuevo">Tipo</label>
                    <select name="tipo" id="inputTipoNuevo" class="form-control form-select-sm">
                    <option value="0">Seleccione un tipo</option>
                    <?php 
                        $tipos =  $consultar_user->listar_tipos();
                        foreach($tipos as $item){
                    ?>
                        <option value="<?php echo $item['nTipoID']?>"><?php echo $item['ctipo']?></option>
                    <?php  } ?>
                    </select>
                </div>                        
                <button type="button" class="btn btn-primary" onclick="sendFormAjax()">Crear</button>
                </form>
            </div>
        </div>

    </div>

</div>

