<style>
    .norenting {
        display: none;
    }

    .incompra.incompra {
        display: inline;
    }

    .norenting .info-renting {
        opacity: 0;
    }
</style>
<div class="row" id="result">
    <?php
        foreach ($products as $car) :
        $condi = "";
        if ($car['renting_aplica'] == "no") {
            $condi = "norenting";
        }
        $name = strtolower($car['marca'] . " " . $car['modelo']);
        $name = ucwords($name);
        $compra = $moneda . number_format($car['cuota_compra'], 2);
        $renting = $moneda . number_format($car['cuota_renting'], 2);
        ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 animated zoomIn 
            <?php echo $etiqueta; ?> <?php echo $condi; ?>" onclick="llenarInfoCar('<?php echo $car['id_automovil']; ?>','<?php echo $renting; ?>','<?php echo $compra; ?>','<?php echo $car['marca']; ?>', '<?php echo $car['modelo']; ?>')">
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
                <div class="explorer">
                    <button>Solicitar información <i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    <?php
    //fin del bucle para mostrar los carros.
    endforeach;
    ?>
</div>