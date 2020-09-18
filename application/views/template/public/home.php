<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url(); ?>public/img/public/carousel0.png" alt="Los Angeles" class="w-100" style="border-radius: 0 0 0.5rem 0.5rem">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>public/img/public/carousel2.png" alt="Chicago" class="w-100" style="border-radius: 0 0 0.5rem 0.5rem">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>public/img/public/carousel1.png" alt="New York" class="w-100" style="border-radius: 0 0 0.5rem 0.5rem">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url(); ?>public/img/public/carousel3.png" alt="New York" class="w-100"  style="border-radius: 0 0 0.5rem 0.5rem" >
    </div>
  </div>
</div>

  <div class="row no-gutters mt-md-5 pt-md-5">
    <div class="col-md-6 p-1 align-self-center">
      <h1 class="title-head pt-5 pb-2">¿Qué es Renting?</h1>
      <p class="description-head pb-5">
        Es la forma de estrenar carro nuevo frecuentemente sin necesidad de comprarlo, pagando una cuota que lo incluye todo, sin primas, pagos extras, simplemente lo adquieres con una cuota fija y te olvidas de todo
      </p>
    </div>
    <div class="col-md-6 p-1">

      <video class="img-head img-fluid rounded " src="<?php echo base_url() ?>public/img/videos/renting.mp4" width="100%" height="100%" type="video/mp4"  controls style="min-height: 448px; border-radius: 0.5rem !important;"></video>
    </div>
  </div>
  <div class="row no-gutters">
    <div class="col-md-6 p-1">
      <img class="img-head img-fluid rounded shadow" src="<?php echo base_url() ?>public/img/public/block2.png" />
    </div>
    <div class="col-md-6 p-1">
      <img class="img-head img-fluid rounded shadow" src="<?php echo base_url() ?>public/img/public/block3.png" />
    </div>
  </div>

  <div class="section-head pt-5">
    <p class="title-head-sm mx-auto">Descubre el vehículo perfecto para tí</p>
    <div class="divider-head" style="width: 50%">
      <div class="hr-line"></div>
      <div class="hr-icon">+</div>
    </div>
    <p class="description-head-sm mx-auto">Obtén todos los beneficios de tener un vehículo y despreocupate de lo demás.</p>
  </div>

  <div class="row no-gutters">
    <div class="col-sm-6 col-md-3 col-lg-3 pl-2 pr-2">
      <div class="block-discover rounded shadow">
        <img src="<?php echo base_url() ?>public/img/public/discover1.svg" />
        <span class="pl-5 pr-5 pt-2">Renovás tu carro constantemente</span>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 pl-2 pr-2">
      <div class="block-discover rounded shadow">
        <img src="<?php echo base_url() ?>public/img/public/discover2.svg" />
        <span class="pl-5 pr-5 pt-2">Beneficio por ser buen conductor</span>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 pl-2 pr-2">
      <div class="block-discover rounded shadow">
        <img src="<?php echo base_url() ?>public/img/public/discover3.svg" />
        <span class="pl-5 pr-5 pt-2">Mantenimiento preventivo y seguro incluido</span>
      </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 pl-2 pr-2">
      <div class="block-discover rounded shadow">
        <img src="<?php echo base_url() ?>public/img/public/discover4.svg" />
        <span class="pl-5 pr-5 pt-2">Te despreocupas de tener que vender tu carro</span>
      </div>
    </div>
  </div>

  <div class="section-head pt-5">
    <p class="title-head-sm mx-auto">Descubre el vehículo perfecto para tí</p>
    <div class="divider-head col-12 col-xs-12 col-sm-12 col-md-7">
      <div class="hr-line"></div>
      <div class="hr-icon">+</div>
    </div>
  </div>

  <div class="section-show px-3 rounded">
    <div class="row">
      <?php
      foreach ($cars as $car) :
        $name = strtolower($car['marca'] . " " . $car['modelo']);
        $name = ucwords($name);
        $compra = $moneda . number_format($car['cuota_compra'], 2);
        $renting = $moneda . number_format($car['cuota_renting'], 2);
        ?>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 animated zoomIn" onclick="window.location.href = '<?php echo base_url(); ?>renting/catalogo'">
          <div class="car-item">
            <div class="row pt-2 px-2">
              <div class="col-7">
                <div class="informacion">
                  <span class="name"><?php echo $name; ?></span>
                  <span class="tipo"><?php echo $car['tipo']; ?></span>
                </div>
              </div>
              <div class="col-5">
                <div class="aranceles">
                  <div class="info-cuota" style="display: none;">
                    <span style="display:inline">Cuota Desde</span>
                    <span class="price"><?php echo $compra; ?></span>
                    /Mes
                  </div>
                  <div class="info-renting">
                    <span style="display:inline">Renting Desde</span>
                    <span class="price"><?php echo $renting; ?></span>
                    /Diario
                  </div>
                </div>
              </div>
            </div>
            <img class="img-responsive" src="<?php echo base_url(); ?>index.php/site/getImage?id=<?php echo $car['id_automovil'] ?>" alt="<?php echo $titulo_auto; ?>">
          </div>
        </div>
        </a>
      <?php
      //fin del bucle para mostrar los carros.
      endforeach;
      ?>
    </div>
    <p class="description-head-sm mx-auto mt-3 mb-4">Puedes ver más modelos y elegir uno acorde a tus necesidades desde nuestro catálogo</p>
    <center>
      <a href="<?php echo base_url(); ?>renting/catalogo" class="custom-btn">Ver Catálogo</a>
    </center>

  </div>

  <div class="section-head py-5">
    <p class="title-head-sm mx-auto">¿Quieres saber más sobre renting?</p>
    <div class="divider-head col-md-7">
      <div class="hr-line"></div>
      <div class="hr-icon">+</div>
    </div>
    <center>
      <a href="<?php echo base_url() ?>renting/contacto" class="custom-btn">Contáctenos</a>
    </center>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h5 class="modal-title" id="exampleModalLongTitle">ATENCION!!</h5></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <video autoplay class="img-head img-fluid rounded" id="video" src="<?php echo base_url() ?>public/img/videos/creditos.mp4" muted="muted" height="100%" width="100%"></video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="pausarVideo">Close</button>
      </div>
    </div>
  </div>
</div>
