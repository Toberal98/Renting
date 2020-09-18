<h1 class="title-head text-center pt-5">Contáctenos</h1>


<div class="no-gutters row justify-content-center">
    <form class="p-2 col-md-8 col-lg-7 col-xl-6"  id="solicitud-form">
        <input type="hidden" name="pais" id="pais" value="<?php echo $this->session->userdata('pais'); ?>">
        <input type="hidden" name="channel" id="channel" value="web">
        <input type="hidden" name="opcion" id="contacto" value="contacto">
        <input type="hidden" id="button-input" name="button" value="Contacto">
        <input type="hidden" id="venta" name="venta" value="1">
        <div class="row">
            <div class="col-xl-12">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="name" class="form-control" required>
            </div>
        </div>
        <div class="pt-3" style="display: none;">
            <div class="col-xl-12">
                <label for="dui">CIUDAD</label>
                <input type="text" id="dui" name="dui" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <label for="tel">TELÉFONO</label>
                <input type="text" id="tel" name="phone" class="form-control phone-info" required>
            </div>
        </div>
        <div class="text-center pt-5 pb-5">
            <button type="submit" class=" btn custom-btn">Enviar</button>
        </div>
    </form>
</div>

<div class="bg-white rounded mb-5 pt-5 pb-5 content-contact">
    <div class="no-gutters row">
        <div class="col-md-6">
            <img class="img-head img-fluid" src="<?php echo base_url() ?>public/img/public/contact.png" />
        </div>
        <div class="col-md-6 p-2">
            <h4>Centro de Negocios y Oficinas Centrales</h4>
            <p>Boulevard Los Próceres, Calle Los Héroes poniente, Edificio CrediQ, San Salvador, El Salvador.</p>
            <h4>Autolote CrediQ</h4>
            <p>Boulevard Los Próceres, contiguo a Dollar City, San Salvador, El Salvador.</p>
            <h4>Autolote de Durazno</h4>
            <p>Avenida Las Amapolas y Calle Los Duraznos, Frente a talleres de Nissan San Salvador, El Salvador.</p>
            <h4>Centro de Servicio CREDIQ</h4>
            <p>Agencia CrediQ Centro Comercial La Gran Vía.</p>
            <!--<h4>Punto de Recepción de Pago</h4>
            <p>
                <ul>
                    <li>CrediQ La Gran Vía y Centro de Negocios CrediQ</li>
                    <li>Autoservicio en Autolote CrediQ</li>
                    <li>Tigo Money</li>
                    <li>Medios electrónicos de Davivienda.</li>
                    <li>Toda la red de PuntoExpress, aplican pagos en efectivo y menores a $500</li>
                    <li>Citi a través de su red de sucursales presentando el carnet de colector o vía Netbanking.</li>
                </ul>
            </p>-->
            <h4>Call Center</h4>
            <p>Nuestro número telefónico de atención al cliente es el PBX: (+503) 2248-6400 opción 2 y el horario de servicio es de lunes a viernes de 8:00 a.m. a 6:00 p.m. y sábados de 8:00 a.m. a 12:30 p.m.</p>
        </div>
    </div>
</div>
