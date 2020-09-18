<?php $moneda = $this->session->userdata('moneda'); ?>

<div class="content">
    <div class="container12">
        <div class="row">
            <div class="column12">
                <h3>Veh&iacute;culos<span></span></h3>
                <p class="title-sec">Modelos de Autos</p>
                <br>
                <form method="post" action="<?php echo base_url().'index.php/savedata/saveModelo'?>" id="formularioAdd"
                    style="display: none;"">
                    <h3>Agregar nuevo modelo:</h3>
                      <div class=" col-md-5">
                    <label class="form-label">Nombre de Modelo:</label>
                    <input type="text" id="nombreAdd" name="nombre" autocomplete="off" required>

                    <br><br>
                    <label class="form-label">Marca:</label>
                    <select id="marcaAdd" name="marca" required>
                        <option value="">Seleccione..</option>
                        <?php
                              foreach ($marcas as $marca):
                              ?>
                        <option value="<?php echo $marca['id_marca']; ?>"><?php echo $marca['nombre']; ?></option>
                        <?php
                              endforeach;
                              ?>
                    </select>

                    <br><br>
            </div>

            <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Configuracion ProductID:</h4>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="productID" style="margin-right: 23px;">Pais: </label>
                                    <select id="ProductID" style="min-width: 176px;" name="pais" class="form-control" required>
                                        <option value="">Seleccione..</option>
                                        <?php
            						foreach ($pais as $paises) :
            						?>
                                        <option value="<?php echo $paises[0]; ?>"><?php echo $paises[1]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                <label for="idMarca" style="margin-right: 4px;">Marca:</label>
                                    <select id="idMarca" style="min-width: 176px;" name="marcas" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="productID">Modelo:</label>
                                    <select id="idModelo" style="min-width: 176px;" name="modelo" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="idMarca">Codigo:</label>
                                    <select id="idCodigo" style="min-width: 176px;;" name="codigo" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="column12">
                <button type="submit" onclick="" style="width: 200px;"> Guardar</button>
                <button type="button" onclick="cancelar();"
                    style="width: 200px; background-color:#90A4AE">Cancelar</button>

            </div>
            </form>

            <form method="post" action="<?php echo base_url().'index.php/savedata/updateModelo'?>" id="formularioMod"
                style="display: none;">
                <h3>Modificar Modelo</h3>
                <div class="col-md-5">
                <input type="text" id="idMod" name="id" class="hidden" required>
                <label class="form-label">Nombre de Modelo:</label>
                <input type="text" id="nombreMod" name="nombre" required>

                <br><br>
                <label class="form-label">Marca:</label>
                <select id="marcaMod" name="marca" required>
                    <option value="">..Seleccione</option>
                    <?php
                            foreach ($marcas as $marca):
                            ?>
                    <option value="<?php echo $marca['id_marca']; ?>"><?php echo $marca['nombre']; ?></option>
                    <?php
                            endforeach;
                    ?>
                </select>

                </div>

                <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Configuracion ProductID:</h4>
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="paisSeleccionado" style="margin-right: 23px;">Pais: </label>
                                    <select id="paisSeleccionado" style="min-width: 176px;" name="pais" class="form-control" required>
                                        <option value="">Seleccione..</option>
                                        <?php
            						foreach ($pais as $paises) :
            						?>
                                        <option value="<?php echo $paises[0]; ?>"><?php echo $paises[1]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                <label for="marcam" style="margin-right: 4px;">Marca:</label>
                                    <select id="marcam" style="min-width: 176px;" name="marcas" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="modelom">Modelo:</label>
                                    <select id="modelom" style="min-width: 176px;" name="modelo" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="codigom">Codigo:</label>
                                    <select id="codigom" style="min-width: 176px;;" name="codigo" class="form-control" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" style="width: 200px;"> Modificar</button>
                <button type="button" onclick="cancelar();" style="width: 200px; background-color:#90A4AE">
                    Cancelar</button>
            </form>
            <div id="listado">
                <p><a href="#" class="nuevo" onclick="openformAdd();" target="_top">Nuevo Modelo</a></p>
                <div class="tabla">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Id</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Opciones</th>
                        </tr>


                        <?php
                            if (isset($modelos)) {
                                foreach ($modelos as $model) :
                            ?>
                        <tr class="t_gris<?php echo $v; ?>">
                            <td><?php echo $model['id_modelo']; ?></td>
                            <td><?php echo $model['nombre']; ?></td>
                            <td><?php echo $model['marca']; ?></td>
                            <td>
                                <a href="#" onclick="openformMod(
                                    '<?php echo $model['id_modelo']; ?>',
                                    '<?php echo $model['nombre']; ?>',
                                    '<?php echo $model['id_marca']; ?>',
                                    '<?php echo $model['pais'];?>',
                                    '<?php echo $model['marcas'];?>',
                                    '<?php echo $model['modelo'];?>',
                                    '<?php echo $model['productID'];?>');">Editar
                                </a>
                            </td>
                        </tr>
                        <?php
                                endforeach;
                            }
                            ?>

                    </table>

                </div>
                <?php if($pagination){
                        echo $pagination;
                    }
                    ?>
            </div>
        </div>
    </div>

</div>
</div>

<script type="text/javascript">
    function openformAdd() {
        $('#listado').hide();
        $('#formularioAdd').show();
        $('#nombre').val('');
        $('#marca').val('');
    }
    function openformMod($id, $nom, $vis, $pais, $marcas, $modelo, $productID) {
        $('#listado').hide();
        $('#formularioAdd').hide();
        $('#formularioMod').show();
        $('#idMod').val($id);
        $('#nombreMod').val($nom);
        $('#marcaMod').val($vis);
        $('#paisSeleccionado').val($pais);


        $.ajax({
            url: "<?php echo base_url() ?>index.php/ajax/cargarMarca",
            type: "POST",
            data: { 'pais': $pais },
            success: function (msg) {
                console.log("Mensaje:" + msg);
                var marca = JSON.parse(msg);
                var option = '';
                option += '<option value="">Seleccionar</option>';
                for (var i = 0; i < marca.length; i++) {
                    for (var j = 0; j < 1; j++) {
                        option += '<option value="' + marca[i][j] + '">' + marca[i][j + 1] + '</option>';
                    }
                }
                console.log("marca" + marca[1][0]);
                $('#marcam').empty();
                $('#marcam').append(option);
                $('#marcam').val($marcas);

            },
            error: function (xhr, status, error) {
                console.log("xhr " + xhr);
                console.log("error" + error);
            }
        })

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ajax/cargarModelo",
            type: "POST",
            data: { 'pais': $pais, 'marca': $marcas },
            success: function (msg) {
                console.log("Mensaje:" + msg);
                var modelo = JSON.parse(msg);
                var option = '';
                option += '<option value="">Seleccionar</option>';
                for (var i = 0; i < modelo.length; i++) {
                    for (var j = 0; j < 1; j++) {
                        option += '<option value="' + modelo[i][j] + '">' + modelo[i][j + 1] + '</option>';
                    }
                }
                console.log("modelo" + modelo[1][0]);
                $('#modelom').empty();
                $('#modelom').append(option);
                $('#modelom').val($modelo);

            },
            error: function (xhr, status, error) {
                console.log("xhr " + xhr);
                console.log("error" + error);
            }
        });

        $.ajax({
            url: "<?php echo base_url() ?>index.php/ajax/cargarVersiones",
            type: "POST",
            data: { 'pais': $pais, 'marca': $marcas, 'modelo': $modelo },
            success: function (msg) {
                console.log("Mensaje:" + msg);
                var version = JSON.parse(msg);
                var option = '';
                option += '<option value="">Seleccionar</option>';
                jQuery.each(version, function (i, val) {
                    option += '<option value="' + val.codigo + '">' + val.nombre + '</option>';
                });

                $('#codigom').empty();
                $('#codigom').append(option);
                $('#codigom').val($productID);

            },
            error: function (xhr, status, error) {
                console.log("xhr " + xhr);
                console.log("error" + error);
            }
        });


    }
    function cancelar() {
        $('#formularioAdd').hide();
        $('#formularioMod').hide();
        $('#listado').show();
    }

    $(document).ready(function () {
        $('#ProductID').on('change', function () {
            var id_pais = $('#ProductID').val();

            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarMarca",
                type: "POST",
                data: { 'pais': id_pais },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var marca = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar...</option>';
                    for (var i = 0; i < marca.length; i++) {
                        for (var j = 0; j < 1; j++) {
                            option += '<option value="' + marca[i][j] + '">' + marca[i][j + 1] + '</option>';
                        }
                    }
                    console.log("marca" + marca[1][0]);
                    $('#idMarca').empty();
                    $('#idMarca').append(option);

                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            })
        });

        $('#idMarca').on('change', function () {
            var id_marca = $('#idMarca').val();
            var id_pais = $('#ProductID').val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarModelo",
                type: "POST",
                data: { 'pais': id_pais, 'marca': id_marca },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var modelo = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar...</option>';
                    for (var i = 0; i < modelo.length; i++) {
                        for (var j = 0; j < 1; j++) {
                            option += '<option value="' + modelo[i][j] + '">' + modelo[i][j + 1] + '</option>';
                        }
                    }
                    console.log("modelo" + modelo[1][0]);
                    $('#idModelo').empty();
                    $('#idModelo').append(option);

                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            });
        });

        $('#idModelo').on('change', function () {
            var id_marca = $('#idMarca').val();
            var id_pais = $('#ProductID').val();
            var id_modelo = $('#idModelo').val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarVersiones",
                type: "POST",
                data: { 'pais': id_pais, 'marca': id_marca, 'modelo': id_modelo },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var version = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar...</option>';
                    jQuery.each(version, function (i, val) {
                        option += '<option value="' + val.codigo + '">' + val.nombre + '</option>';
                    });

                    $('#idCodigo').empty();
                    $('#idCodigo').append(option);

                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            });
        });


        //======================================================================================================================================
        $('#paisSeleccionado').on('change', function () {
            var id_pais = $('#paisSeleccionado').val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarMarca",
                type: "POST",
                data: { 'pais': id_pais },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var marca = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar</option>';
                    for (var i = 0; i < marca.length; i++) {
                        for (var j = 0; j < 1; j++) {
                            option += '<option value="' + marca[i][j] + '">' + marca[i][j + 1] + '</option>';
                        }
                    }
                    console.log("marca" + marca[1][0]);
                    $('#marcam').empty();
                    $('#marcam').append(option);


                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            })
        });

        $('#marcam').on('change', function () {
            var id_marca = $('#marcam').val();
            var id_pais = $('#paisSeleccionado').val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarModelo",
                type: "POST",
                data: { 'pais': id_pais, 'marca': id_marca },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var modelo = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar</option>';
                    for (var i = 0; i < modelo.length; i++) {
                        for (var j = 0; j < 1; j++) {
                            option += '<option value="' + modelo[i][j] + '">' + modelo[i][j + 1] + '</option>';
                        }
                    }
                    console.log("modelo" + modelo[1][0]);
                    $('#modelom').empty();
                    $('#modelom').append(option);


                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            });
        });

        $('#modelom').on('change', function () {
            var id_marca = $('#marcam').val();
            var id_pais = $('#paisSeleccionado').val();
            var id_modelo = $('#modelom').val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/ajax/cargarVersiones",
                type: "POST",
                data: { 'pais': id_pais, 'marca': id_marca, 'modelo': id_modelo },
                success: function (msg) {
                    console.log("Mensaje:" + msg);
                    var version = JSON.parse(msg);
                    var option = '';
                    option += '<option value="">Seleccionar</option>';
                    jQuery.each(version, function (i, val) {
                        option += '<option value="' + val.codigo + '">' + val.nombre + '</option>';
                    });

                    $('#codigom').empty();
                    $('#codigom').append(option);

                },
                error: function (xhr, status, error) {
                    console.log("xhr " + xhr);
                    console.log("error" + error);
                }
            });
        });

    });

</script>