<div id="myMarcas" class="row justify-content-center">

    <div class="col-md-1">
        <div class="container-marca">
            <center>
                <h4 class="marca-img animated zoomInUp faster" style="padding-top:28px">TODOS</h4>
                <input type="radio" name="marca" value="" onclick="filtrarbymarca();">
                <span></span>
            </center>
        </div>
    </div>
    <?php
    foreach ($marcas as $marca) :
        ?>
        <div class="col-md-1">
            <div class="container-marca ripple">
                <center>
                    <img class="marca-img animated zoomInUp faster" src="<?php echo base_url(); ?>imagenes/logos/<?php echo $marca['foto'] ?>" alt="<?php echo $marca['nombre'] ?>">
                    <input type="radio" name="marca" value="<?php echo $marca['id_marca']; ?>" onclick="filtrarbymarca();">
                    <span></span>
                </center>
            </div>
        </div>
    <?php
    endforeach;
    ?>
</div>

<!-- SCRIPT JS para refinal la busqueda mediante las marcas -->
<script>
    function filtrarbymarca() {
        pagina = 0;
        moveToResult();
        buscar();
    }
</script>