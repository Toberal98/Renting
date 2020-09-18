
<div class="row" style="margin-top: -20px;">
    <div class="col-md-2">
        <h3 style="position: relative; top: 20%; transform: translateY(-20%); -webkit-transform: translateY(-20%);">
            Encuentra tu auto
        </h3>
    </div>   
    <div class="col-md-10">
        <?php $this->load->view('template/filtro_marcas.php'); ?>
    </div>    
</div>
<div class="clearflix"></div>
<div class="row">
    <div class="col-md-2">
        <?php
            $this->load->view('template/filtro.php');
        ?>
    </div>
    <div class="col-md-10" style="margin-top:-12px;">
        <?php
            $this->load->view('template/ajax/ver_bloques.php');
        ?>
    </div>
</div>
