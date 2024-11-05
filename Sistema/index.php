<?php 
	include 'plantilla.html'; 
  $usuarios = new users;
  $drivers =  new driver();
  $lista_usuarios = $usuarios->listar_user();
  $lista_driver = $drivers->listar_driver();
?>
<?php startblock('article') ?>
  
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-4 mb-xl-0">
        <h3 class="font-weight-bold">Bienvenido Usuario</h3>
        <h6 class="font-weight-normal mb-0">Este es una pagina de pruebas  <span class="text-primary"><?php echo date('y-m-d')?></span></h6>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
      <div class="card-people mt-auto">
        <img src="assets/images/dashboard/people.svg" alt="people">
        <div class="weather-info">
          <div class="d-flex">
            <div class="ms-2">
              <h4 class="location font-weight-normal">UDI</h4>
              <h6 class="font-weight-normal">Electiva Profesional</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin transparent">
    <div class="row">
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-tale">
          <div class="card-body">
            <p class="mb-4">Usuarios</p>
            <p class="fs-30 mb-2"><?php echo count($lista_usuarios)?></p>
            <p>Usuarios totales</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4 stretch-card transparent">
        <div class="card card-dark-blue">
          <div class="card-body">
            <p class="mb-4">Driver</p>
            <p class="fs-30 mb-2"><?php echo count($lista_driver)?></p>
            <p>Driver totales</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endblock() ?>