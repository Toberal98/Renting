<?php $moneda = $this->session->userdata('moneda'); ?>

<button class="accordion animated">Cuota</button>
<div class="panel-accordion center pt-4 pl-3 pr-3">
    
    <div class="radio-group" style="display: none">
        <!--No tocar-->
        <input type="radio" id="option-renting" name="tipo_cuota" value="renting" alt="renting" checked="checked"><label for="option-renting">Renting</label>
        <!--<input type="radio" id="option-compra" name="tipo_cuota" value="compra" alt="compra" ><label for="option-compra">Compra</label>-->
    </div>
    <!--No tocar-->
    <input type="number" id="cuoMin" min="1" placeholder="Renting Desde" class="text-center" style="height:30px; width:100%"><br><br>
    <input type="number" id="cuoMax" min="1" placeholder="Renting Hasta" class="text-center" style="height:30px; width:100%"><br><br>
</div>
<button class="accordion animated">Categorias</button>
<div class="panel-accordion">

    <ul class="lista-categorias pl-4">
        <li><label><input type="radio" id="tipo" name="tipo" value="" checked="checked" /> <i class="fas fa-list"></i> Todos</label></li>
        <?php
        foreach ($categorias as $cat) :
            ?>
            <li><label><input type="radio" id="tipo" name="tipo" value="<?php echo $cat['id_tipo_vehiculo']; ?>" /> <i class="<?php echo $cat['icon']; ?>"> </i> <?php echo $cat['nombre']; ?> </label></li>
        <?php
        endforeach;
        ?>
    </ul>
</div>

<div class="accordion-movil pb-3">
    <button class="accordion">Marca</button>
    <div class="panel-accordion">
        <div class="row section-marca">
            <div class="row-marca col-4 col-xs-4 col-sm-12 col-md-12 col-lg-12">
                <div class="container-marca mobile ripple">
                    <center>
                        <h4 class="marca-img animated zoomInUp faster">Todos</h4>
                        <input type="radio" name="marca" value="">
                        <span></span>
                    </center>
                </div>
            </div>
            <?php
            foreach ($marcas as $marca) :
                ?>
                <div class="row-marca col-4 col-xs-4 col-sm-3 col-md-12 col-lg-6">
                    <div class="container-marca mobile ripple">
                        <center>
                            <img class="marca-img animated zoomInUp faster" src="<?php echo base_url(); ?>imagenes\logos\<?php echo $marca['foto'] ?>" alt="<?php echo $marca['nombre'] ?>">
                            <input type="radio" name="marca" value="<?php echo $marca['id_marca']; ?>">
                            <span></span>
                        </center>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
<div class="d-inline text-center mb-3">
    <button style="width:48%" class="btn btn-danger" id="btnsearch" class="shadow">Buscar</button>
    <button style="width:48%" class="btn btn-dark" onclick="limpiar();">Limpiar</button>
</div>
<br>
<script>
    $(document).ready(function(){
        pagina = 0;
    });

    function buscar() {
        
        $("#msg-none").hide();
        var pass = false;
        var categoriaID = $("input[name='tipo']:checked").val();
        var tipoCuota = $("input[name='tipo_cuota']:checked").val();
        var cuoMin = $("#cuoMin").val();
        var cuoMax = $("#cuoMax").val();
        var marca = $("input[name='marca']:checked").val();

        if (cuoMin != "" && cuoMax != "") {
            cuoMin = parseFloat(cuoMin);
            cuoMax = parseFloat(cuoMax);
            if (cuoMin > cuoMax) {
                swal({
                    title: "Error",
                    text: "La cuota o renting (Minima) no puede ser mayor a la cuota o renting (Mayor)!",
                    icon: "error"
                });
                return;
            } else if (cuoMin == cuoMax) {
                swal({
                    title: "Error",
                    text: "La cuota o renting (Minima y Mayor) no pueden ser iguales!",
                    icon: "error"
                });
                return;
            }
        }

        console.log(categoriaID);
        console.log(tipoCuota);
        console.log(cuoMin);
        console.log(cuoMax);
        console.log(marca);

        $("#loading").show();
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/site/filtrarAutosByAjax",
            method: "POST",
            data: {
                categoria: categoriaID,
                tipoCuota: tipoCuota,
                cuoMin: cuoMin,
                cuoMax: cuoMax,
                marcas: marca 
            },
            success: function(data) {

                if (!data) {
                    $("#msg-none").show();
                }
                $('#result').html("");
                $('#result').append(data);
                $("#loading").hide();
            }
        });
    }

    function limpiar() {
        $('#cuoMin').val("");
        $('#cuoMax').val("");
        $("[name=marca]").filter("[value='']").prop("checked", true);
        $("[name=tipo]").filter("[value='']").prop("checked", true);
        $("[name=tipo_cuota]").filter("[value='renting']").prop("checked", true);
        $('#cuoMin').attr("placeholder", "Renting Desde");
        $('#cuoMax').attr("placeholder", "Renting Hasta");
    }

    function moveToResult() {
        var pbtn = $('#btnsearch').offset();
        var presult = $('#result').offset();
        if (pbtn.top < presult.top) {
            window.location.replace("#result");
        }
    }

    $("#btnsearch").click(function() {
        /*pagina = 0;*/
        moveToResult();
        buscar();
    });

    $("#option-compra").click(function() {
        $(".norenting").show();
        $(".info-cuota").show();
        $(".info-renting").hide();
        $('#cuoMin').attr("placeholder", "Cuota Desde");
        $('#cuoMax').attr("placeholder", "Cuota Hasta");
    });

    $("#option-renting").click(function() {
        $(".norenting").hide("slow");
        $(".info-renting").show();
        $(".info-cuota").hide();
        $('#cuoMin').attr("placeholder", "Renting Desde");
        $('#cuoMax').attr("placeholder", "Renting Hasta");
    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("open-accordion");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>