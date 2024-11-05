<?php 
	include 'plantilla.html'; 
?>
<?php startblock('article') ?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Pagina prueba</h3>    
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form id="form-test" method="post" action="action/test.php">
            <div class="mb-3">
                <label for="inputNombre">Nombre</label>            
                <input id="inputNombre" name="nombre" class="form-control form-control-sm" type="text">
            </div>

            <div class="mb-3">
                <label for="inputCantidad">cantidad</label>            
                <input id="inputCantidad" name="cantidad" class="form-control form-control-sm" type="number">
            </div>

            <div class="mb-3">
                <label for="selecTipo">tipo</label>            
                <select name="tipo" id="selectTipo" class="form-select form-select-sm">
                    <option value="0">Seleccione</option>
                    <option value="5000">Grande</option>
                    <option value="3000">Mediano</option>
                    <option value="1500">Pequeño</option>
                </select>
            </div>            

            <div class="mb-3">
                <button class="btn btn-success btn-sm col-12" type="button" onclick="enviar_test()">Enviar</button>
            </div>

        </form>
    </div>
    <div class="col-md-6">
        <div id="spinner" style="display:none;">
            <h2>Enviando</h2>
        </div>
    </div>
</div>

<?php endblock() ?>
<script>
    function enviar_test(){
        var formulario = $('#form-test');
        var nombre = $('#inputNombre').val();
        var cantidad = $('#inputCantidad').val();
        var tipo = $('#selectTipo').val();
        var spinner = $('#spinner');

        if(nombre=="" || cantidad ==0 || tipo ==0){
            Swal.fire({
                title: "Error!",
                text: "Todos los campos son requeridos!!",
                icon: "error"
            });
            return false;
        }
        
        formulario.hide()
        spinner.show();
            
        setTimeout(function() {        

            //alert('Formulario enviado!');
            formulario.submit();     
            formulario.show()  
            spinner.hide();         
        }, 5000); 

        alert("exito!");
        
        

    }

    var formData = new FormData(document.getElementById("form"));
    formData.append("dato", "valor");
    $.ajax({
        url:'',  
        type: 'POST',
        data:{'cc':check,'cantidad':cantidad},
        beforeSend: function(){
            //spinner
        },         
        success: function(data){ 
            $("#respuesta").html(data);                                    
        }       
    });






</script>