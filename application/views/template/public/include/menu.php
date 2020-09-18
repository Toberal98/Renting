<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a href="<?php echo base_url() ?>renting" class="navbar-brand">
      <img src="<?php echo base_url(); ?>/public/img/public/logo.jpg" class="d-inline-block" alt="CrediQ" style="height:50px;" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="openNav()">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/informacion">¿Qué es renting?</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/particulares">Particulares</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/flotas">Flotas</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/catalogo">Catálogo</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>/public/pdf/ManualMiRenting.pdf" target="ManualRenting">Mi Renting</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/faqs">FAQ</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link text-center" href="<?php echo base_url() ?>renting/contacto">Contáctenos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Menu mobile -->
<div id="myNav" class="overlay">
  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <!-- Overlay content -->
  <div class="overlay-content">
    <img src="<?php echo base_url() ?>/public/img/public/nuevorenting.png" class="fluid-img w-25" />
    <a href="<?php echo base_url() ?>renting/flotas">Flotas</a>
    <a href="<?php echo base_url() ?>renting/particulares">Particulares</a>
    <a href="<?php echo base_url() ?>renting/catalogo">Catálogo Showroom</a>
    <a href="#">Mi Renting</a>
    <a href="#">FAQ</a>
    <a href="<?php echo base_url() ?>renting/contacto">Contáctenos</a>
  </div>
</div>