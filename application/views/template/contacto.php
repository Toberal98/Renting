
<!-- Inicio Contacto *********************************************************************************************************************** -->
<div class="contenth1">
    <div class="container12">
        <div class="row">
            <div class="column4"><img src="<?php echo base_url(); ?>public/img/contact-us.jpg" alt=""/></div>
            <div class="column8">
                <h1>Cont&aacute;ctenos<span></span></h1>
                 <form action="<?php echo base_url(); ?>index.php/ajax/enviarMail" method="Post" id="solicitud-form" onsubmit="fillSpreadSheet()">
                    <input type="hidden" name="pais" value="<?php echo $this->session->userdata('pais'); ?>">
                    <input type="hidden" name="channel" value="web">
                    <input type="hidden" id="button-input" name="button" value="Contacto">
                    <input type="hidden" id="venta" name="venta" value="1">

                    <div class="form">
                        <label style="width:90%;"><span>Nombre:</span> <input type="text" id="nombre-info" name="name" required="required"/>
                        </label>

                        <label style="width:90%;"><span>Dui/Identificación (Sin guiones):</span> <input maxlength="9" type="text" id="dui-info" name="dui" required="true" /></label><br/>

                        <label><span>Email:</span> <input type="email" id="email-info" name="email" required="true"/>
                        </label><br/>

                        <label><span>Teléfono:</span> <input type="text" id="phone-info" name="phone phone-info" required="true"/>
                        </label><br>
                        <div class="clearfix"></div>
                        <label style="float:right;"><button type="submit">Enviar</button></label>
                        <div class="clearfix"></div>

                        <input type="hidden" id="nameCopy" name="nameCopy" />
                        <input type="hidden" id="duiCopy" name="nameCopy" />
                        <input type="hidden" id="emailCopy" name="emailCopy"/>
                        <input type="hidden" id="phoneCopy" name="phoneCopy"/>
                        <input type="hidden" id="autoCopy" name="automovil" value="Solicitando información desde contáctenos" >
                        <input type="hidden" id="vendedorCopy" name="vendedor" value="Formulario Contáctenos">
                        <input type="hidden" id="venta" name="venta" value="1">
                    </div>
                 </form>

              <?php
              /*MODIFICADO POR GGONZALEZ - 22/05/2015 - INI*/
                 $pais= $this->session->userdata('pais');

                 if ($pais == 1){

                 ?>

                <div class="contacto">
                    <h4>Edificio CrediQ</h4>
                    <p>Boulevard Los Próceres, Calle Los Héroes poniente, San Salvador, El Salvador.</p>

                    <h4>Autolote CrediQ</h4>
                    <p>Boulevard Los Próceres, contiguo a Dollar City, San Salvador, El Salvador.</p>

                    <h4>Agencia Gran Via</h4>
                    <p>Centro Comercial Gran Via, contiguo a parqueo techado.</p>

                    <h4>Punto de Recepción de Pago</h4>
                    <ul>
                        <li>Agencia Gran Via</li>
                        <li>Edificio CrediQ</li>
                        <li>Autolote CrediQ</li>
                        <li>Caja Nissan, Arbol de la Paz</li>
                        <li>Caja Grupo Q Repuestos, Santa Elena</li>
                        <li>Caja Agromosa, Santa Ana</li>
                        <li>Sucursal Grupo Q Nissan, San Miguel
                        APP CrediQ, a través de tarjetas de crédito de Banco Davivienda o Banco Agricola</li>
                        <li>Red de Punto Express</li>
                        <li>Red AKI</li>
                        <li>Sucursales Banco Agricola o Ebanca</li>
                        <li>Sucursales Banco Promerica o Promerica en linea</li>
                        <li>Sucursales Banco Cuscatlan o Netbanking</li>
                        <li>Medios electrónicos de Banco Davivienda</li>
                        <li>Sucursales de la Red Fedecredito</li>
                        <li>Pagos con tarjeta de crédito de Banco Agricola, Banco Cuscatlan, Banco Davivienda y Banco Promerica a través de plataformas en linea de cada banco</li>
                    </ul>
                    <h4>Call Center</h4>
                    <p>Nuestro número telefónico de atención al cliente es el (503) 2248-6400 opción 2 y el horario de servicio es de lunes a viernes de 8:00 a.m. a 6:00 p.m. y sábados de 8:00 a.m. a 12:00 p.m</p>

                </div>

            </div>
        </div>
    </div>
</div>

 <?php
 }

 elseif ($pais == 2){

      ?>

     <div class="contacto">
                    <h4>Centro de Negocios y Oficinas Centrales</h4>
                    <p>Contiguo a la Plaza de La Uruca, San José, Costa Rica. [<a href="<?php echo base_url();?>site/agencias/4" class="fancybox fancybox.iframe">ver mapa</a>]</p>

                    <!--ESTA SECCION SE DEBE EDITAR CON LA INFO DE COSTA RICA, SE HARA CUANDO SE MIGRE EL SITIO A CR, GGONZALEZ 22/05/2015-->

                    <h4>Centro de Servicio CREDIQ</h4>
                    <p>Agencia CrediQ Centro Comercial Las Cascadas.</p>


                    <h4>Punto de Recepci&oacute;n de Pago</h4>
                    <ul>
                        <li>CrediQ Las Cascadas y Centro de Negocios CrediQ</li>
                        <li>Autoservicio en Autolote CrediQ</li>
                        <li>Tigo Money</li>
                        <li>Medios electr&oacute;nicos de Davivienda.</li>
                        <li>Toda la red de PuntoExpress, aplican pagos en efectivo y menores a $500</li>
                        <li>Citi a trav&eacute;s de su red de sucursales presentando el carnet de colector o v&iacute;a Netbanking.</li>

                    </ul>


                    <h4>Call Center</h4>
                    <p>Nuestro n&uacute;mero telef&oacute;nico de atenci&oacute;n al cliente es el (503) 2252-0555 y el horario de servicio es de lunes a viernes de 8:00 a.m. a 6:00 p.m. y s&aacute;bados de 8:00 a.m. a 12:30 p.m.&nbsp;</p>
                </div>

            </div>
        </div>
    </div>
</div>
 <?php
 }
elseif ($pais == 3){

      ?>

     <div class="contacto">
                    <h4>Oficinas Principal CrediQ </h4>
                    <p>Boulevar Centro Am&eacute;rica, Frente a Plaza Miraflores Tegucigalpa M.D.C. [<a href="<?php echo base_url();?>site/agencias/3" class="fancybox fancybox.iframe">ver mapa</a>]</p>

                    <h4>Centro de Servicio CREDIQ</h4>
                    <p>Plaza Record, Centro Comercial Record, Boulevard San Juan Bosco</p>


                    <h4>Punto de Recepci&oacute;n de Pago</h4>
                    <ul>
                        <li>Oficina Principal CrediQ</li>
                        <li>Plaza Record</li>
                        <li>Davivienda</li>
                        <li>Banco Atl&aacute;ntida</li>
                    </ul>


                    <h4>Informaci&oacute;n</h4>
                    <p>Para mayor informaci&oacute;n escribanos a <a href="mailto:info@usadoscrediq.com">info@usadoscrediq.com</a></p>
                </div>

            </div>
        </div>
    </div>
</div>

 <?php
 }

   /*MODIFICADO POR GGONZALEZ - 22/05/2015 - FIN*/
      ?>
