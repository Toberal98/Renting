<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            responsiveClass: true,
            navText:["<div class='nav-btn prev-slide'><i class='fas fa-arrow-left'></div>","<div class='nav-btn next-slide'><i class='fas fa-arrow-right'></i></div>"],
            autoplay: true,
            loop: true,
            autoplayTimeout: 3000,
            margin: 5,
            responsive: {
                0: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        });
    });
</script>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>public/img/public/intro4.png" class="rounded-bottom d-block w-100" alt="...">
            <div class="carousel-caption caption-custom col-md-5 d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">
                <h1>Renting <br>flotas</h1>
                <div class="divider-head">
                    <div class="hr-line" style="border-color: #fff"></div>
                    <div class="hr-icon text-white">+</div>
                </div>
                <h4>Renting Flotas es una solución integral que resuelve los problemas logísticos y de transporte que las empresas enfrentan, mejorando la disponibilidad de su flota. Con Renting CrediQ tienes las herramientas para simplificar tu operación, mejorando la administración y obteniendo beneficios financieros y fiscales.</h4>
            </div>
        </div>
    </div>
</div>

<div class="no-gutters row px-2">
    <div class="mt-5 d-block d-xs-block d-sm-block d-md-block d-lg-none d-xl-none">
        <h1 class="title-head">Renting <br> empresas <br> flota</h1>
        <div class="divider-head">
            <div class="hr-line"></div>
            <div class="hr-icon">+</div>
        </div>
        <p>Renting Flotas es una solución integral que resuelve los problemas logísticos y de transporte que las empresas enfrentan, mejorando la disponibilidad de su flota. Con Renting CrediQ tienes las herramientas para simplificar tu operación, mejorando la administración y obteniendo beneficios financieros y fiscales.</p>
    </div>
</div>

<div class="row no-gutters pt-5 mt-5">
    <div class="col-md-6 p-2">
        <div class="section-head">
            <h1 class="title-head mt-n5">¿Como funciona?</h1>
            <div class="divider-head">
                <div class="hr-line"></div>
                <div class="hr-icon">+</div>
            </div>
            <p>
                CrediQ te asesora con expertos de las marcas y modelos de Grupo Q, en conjunto con nuestro asesores de Renting, para configurar el producto que se adecue a tus necesidades de negocio.
            </p>
            <p>
                Luego de contratarlo, se te asigna un Ejecutivo de Flota que será tu socio en la administración de esta, contribuyendo a:
                <ul class="bullet-list">
                    <li>Asesoría y capacitación en manejo defensivo</li>
                    <li>Coordinación en mantenimiento programado de tu flota</li>
                    <li>Coordinación en caso de siniestros</li>
                    <li>Seguimiento de la disponibilidad de la flota, a través de la revisión en conjunto de indicadores claves y/o reportes a demanda, para la toma de decisiones preventivas y correctivas</li>
                    <li>Asesoría en la entrega y devolución de flota, entre otras</li>
                </ul>
            </p>
        </div>
    </div>
    <div class="col-md-6">
    <video class="img-head img-fluid rounded shadow" src="<?php echo base_url() ?>public/img/videos/noviembre.mp4" width="100%" height="800" type="video/mp4" autoplay controls></video>
    </div>
</div>

<div class="row justify-content-center no-gutters pt-5 mt-3 mb-5">
    <div class="col-md-10 col-lg-10 col-xl-10 p-2">
        <div class="section-head">
            <h1 class="title-head text-center">Ventajas competitivas</h1>
            <div class="divider-head text-center">
                <div class="hr-line"></div>
                <div class="hr-icon">+</div>
            </div>
            <p class="text-center">
                Renting CrediQ permite que te enfoques en tu negocio, preocupándote solo en la utilización de tu flota, ofreciéndote las siguientes ventajas competitivas:
            </p>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="card-ventajas">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja1.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Mantener una flota eficiente y moderna.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja2.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Enfoque en los temas logísticos de la empresa y no en el vehículo.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja3.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    No se reduce la capacidad de endeudamiento de la empresa.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja4.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Mantenimiento de agencia.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja5.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Renting es un gasto deducible de renta.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-ventajas">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja6.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    No se requiere inversión inicial, por lo que no se ve afectado tu flujo de caja
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja7.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Descarga operativa y administrativa por el manejo y mantenimiento de la flota
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja8.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Flota de vehículos acorde a tus necesidades operativas.
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja9.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Control y seguimiento de la flota y conductores en tiempo real
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item rounded m-1">
                            <div class="row no-gutters text-center align-items-center">
                                <div class="col-lg-2">
                                    <img src="<?php echo base_url(); ?>public/img/public/ventaja10.svg" />
                                </div>
                                <div class="col-lg-10 text-md-left text-lg-left text-xl-left">
                                    Nos convertimos en tu aliado estratégico.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section-head">
            <h1 class="title-head text-center">¿Qué incluye Renting <br> flotas?</h1>
            <div class="divider-head text-center">
                <div class="hr-line"></div>
                <div class="hr-icon">+</div>
            </div>
            <p class="text-center">
                Cada empresa puede diseñar su plan de Renting personalizado y lo más importante, acorde a su necesidades actuales, pero asegurando la escalabilidad. Renting CrediQ incluye:
            </p>
        </div>

        <div class="owl-carousel owl-theme owl-responsive">
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg1.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Mantenimientos preventivos y/o correctivos.</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg2.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Capacitación para reducción de riesgos</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg3.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Score de conducción de tu equipo de motoristas.</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg4.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Diligencia en la administración de las multas de tránsito.</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg5.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Vehículos nuevos adecuados a tu operación.</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg6.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Todo en una sola cuota</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg7.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Reporte integral de conducción y ubicación de flota</h5>
                    </div>
                </div>
            </div>
            <div>
                <div class="card rounded text-white text-center">
                    <img src="<?php echo base_url() ?>public/img/public/incluyeimg8.png" class="rounded card-img" alt="...">
                    <div class="card-img-overlay h-100 d-flex flex-column justify-content-end">
                        <h5 class="card-title font-weight-bold">Sistema de seguridad GPS y de monitoreo de manejo DriveQ.</h5>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-head">
            <h1 class="title-head text-center">¿Cómo adquirir tu <br> Renting flotas?</h1>
            <div class="divider-head text-center">
                <div class="hr-line"></div>
                <div class="hr-icon">+</div>
            </div>
            <p class="text-center">
                Renting Flotas tiene soluciones para todo tamaño de empresa, solicita un cita con nuestros especialistas en el tema, y con gusto coordinamos una visita para presentarte el productor.
            </p>
            <center>
                <a href="<?php echo base_url() ?>renting/contacto" class="custom-btn mt-5">Contáctanos</a>
            </center>
        </div>
    </div>
</div>