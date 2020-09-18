<div class="bg-white mt-4">
    <div class="container-fluid">
        <h1 class="title-head text-center pt-5">Catálogo</h1>
        <hr class="divider-head" style="width: 30%">
        <p class="text-center">Encuentra tu auto</p>

        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('template/public/filtro_marcas.php'); ?>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <?php
                $this->load->view('template/public/filtro.php');
                ?>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                <?php
                $this->load->view('template/public/ver_bloques.php');
                ?>
            </div>
        </div>
    </div>
</div>