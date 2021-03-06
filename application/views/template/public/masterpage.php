<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--METATAGS-->
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta charset="utf-8" />
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo base_url(); ?>public/img/favicon.png" rel="shortcut icon" />
    <title>Nuevos CrediQ® | Todo Lo Que Necesitas Para Comprar Un Vehículo Nuevo</title>

    <!-- Resources bootstrap framework -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" async>

    <!-- Font Awesome icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">

    <!-- Style Theme Crediq Renting-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/public-style.css" async>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/look2/animate.css" async>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/look2/ui/jquery-ui.css" async>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.fancybox.css" async>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl.carousel.css" async>

    <!-- Jquery and resources-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous" async></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" async></script>
    <script src="<?php echo base_url(); ?>public/js/sweetalert.min.js" async></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.fancybox.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.cookie.min.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/owl.carousel.js" defer></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/actions.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js" charset="utf-8"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-34092069-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-34092069-3');
    </script>
    <script>
	/*
    function fillSpreadSheet() {
        var Name = document.getElementById("nombre-info").value;
        var Dui = document.getElementById("dui-info").value;
        var Email = document.getElementById("email-info").value;
        var Phone = document.getElementById("phone-info").value;
        var Marca = document.getElementById("marca-info").value;
        var Modelo = document.getElementById("modelo-info").value;
        var opcion = document.getElementById("opcion-info").value;
        var cuota = document.getElementById("cuota-info").value;
        var canal = "web";

        $.ajax({
            url: "https://script.google.com/macros/s/AKfycbz7cpb0mLEcHR87gdIyMoxFvpfZfse3ftlfKJgQjIwhs30eh7o/exec",
            data: {
                "Marca": Marca,
                "Modelo": Modelo,
                "Opción": opcion,
                "name": Name,
                "dui": Dui,
                "email": Email,
                "phone": Phone,
                "Cuota": cuota,
                "channel": canal
            },
            type: "POST",
            dataType: "json",
            success: function(msg) {
                console.log(msg);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
                console.log("xhr " + xhr);
                console.log(error);
            }
        });
    }
	*/


		  // ** Conversion OFFLINE = Google
			function getParam(p) {
			  var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
			  return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
			}

			function getExpiryRecord(value) {
			  var expiryPeriod = 90 * 24 * 60 * 60 * 1000; // caducidad de 90 días, en milisegundos

			  var expiryDate = new Date().getTime() + expiryPeriod;
			  return {
				value: value,
				expiryDate: expiryDate
			  };
			}

			function addGclid() {
			  var gclidParam = getParam('gclid');
			  var gclidFormFields = ['gclid-info']; // all possible gclid form field ids here
			  var gclidRecord = null;
			  var currGclidFormField;

			  var gclsrcParam = getParam('gclsrc');
			  var isGclsrcValid = !gclsrcParam || gclsrcParam.indexOf('aw') !== -1;

			  gclidFormFields.forEach(function (field) {
			  if (document.getElementById(field)) {
				  currGclidFormField = document.getElementById(field);
				}
			  });

			  if (gclidParam && isGclsrcValid) {
				gclidRecord = getExpiryRecord(gclidParam);
				localStorage.setItem('gclid', JSON.stringify(gclidRecord));
			  }

			  var gclid = gclidRecord || JSON.parse(localStorage.getItem('gclid'));
			  var isGclidValid = gclid && new Date().getTime() < gclid.expiryDate;

			  if (currGclidFormField && isGclidValid) {
				currGclidFormField.value = gclid.value;
			  }
			}

			window.addEventListener('load', addGclid);

    </script>

    <script>
        /* Open when someone clicks on the span element */
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }
        /* Close when someone clicks on the "x" symbol inside the overlay */
        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>
</head>

<body>
    <div id="loading" class="loading" style="display:none">Loading&#8230;</div>
    <div class="row no-gutters justify-content-center">
        <!-- Ancho maximo -->
        <?php if (isset($fullscreen)) : ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-12 col-xl-12">

                <?php $this->load->view('template/public/include/menu.php'); ?>

                <?php
                    if (isset($page)) :
                        $this->load->view($page);
                    endif;
                    ?>


                <?php $this->load->view('template/public/include/footer.php'); ?>
            </div>

        <?php else : ?>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                <?php
                    $this->load->view('template/public/include/menu.php');
                    ?>
                <?php
                    if (isset($page)) :
                        $this->load->view($page);
                    endif;
                    ?>
                <?php $this->load->view('template/public/include/footer.php'); ?>
            </div>
        <?php endif; ?>
    </div>
    <script>
  	  window.addEventListener('load', function(){
  		var timer1 = setInterval(function(){
  		  if(document.referrer.indexOf('catalogo') != -1){
  			var mensaje = document.querySelector('.swal-title');
  			if (mensaje != null) {
  				if(mensaje.innerText.indexOf('Completado!') != -1){
  				  gtag('event', 'submit', {
  					'event_category' : 'form',
  					'event_label' : 'catalogo'
  				  });
  				  clearInterval(timer1)
  				}
  			}
  		  }
  		  if(document.referrer.indexOf('contacto') != -1){
  			var mensaje = document.querySelector('.swal-title');
  			if (mensaje != null) {
  				if(mensaje.innerText.indexOf('Completado!') != -1){
  				  gtag('event', 'submit', {
  					'event_category' : 'form',
  					'event_label' : 'contacto'
  				  });
  				  clearInterval(timer1)
  				}
  			}
  		  }
  		},700);
  	  });
  	</script>
</body>


<!-- Formulario para solicitar informacion del auto -->
<div id="information-car" style="display:none; width:850px;">
    <div class="padding">
        <div class="rowb">
            <form action="<?php echo base_url() ?>index.php/ajax/enviarMail" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Solicitar información</h2>
                        <p style="text-align:justify;">
                            Solicita tu crédito ahora de forma fácil y rápida, llenando
                            este formulario para que puedas recibir toda la asesoría
                            correspondiente por parte de uno de nuestros agentes.
                        </p>
                        <br>
                    </div>
                </div>
                <input type="text" id="auto-info" name="auto" hidden>
                <input type="text" id="opcion-info" name="opcion" hidden>
                <input type="text" id="cuota-info" name="cuota" hidden>
                <input type="text" id="marca-info" name="marca" hidden>
                <input type="text" id="modelo-info" name="modelo" hidden>
				        <input type="text" id="gclid-info" name="gclid-info" value="" hidden>
                <input type="text" name="channel" value="web" hidden>
                <div class="row">
                    <div class="col-md-8">
                        <label style="display:block;"><i class="fas fa-user"></i> Nombre:</label>
                        <input type="text" style="display:block; width:80%" id="nombre-info" name="name" required="Campo Requerido" />
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label style="display:block;"><i class="fas fa-map-marker-alt"></i> Ciudad:</label>
                        <input type="text" style="display:block; width:100%" id="dui-info" name="dui" required="Campo Requerido" />
                    </div>
                    <div class="col-md-5">
                        <label style="display:block;"><i class="fas fa-mobile"></i> Teléfono:</label>
                        <input type="tel" style="display:block; width:100%" id="phone-info" class="phone-info" name="phone" required="Campo Requerido" />
                    </div>

                    <div class="col-md-8">
                        <label style="display:block;"><i class="fas fa-envelope"></i> Email:</label>
                        <input type="email" style="display:block; width:80%" id="email-info" name="email"  required="Campo requerido o no valido" />
                    </div>
                    <div class="col-md-12">
                        <br><label style="width:90%"><input type="checkbox" checked />
                            Autorizo a CREDIQ S.A. DE C.V. a utilizar mi información personal para uso interno, tales como promociones, ofertas, etc., siempre y cuando no comparta información con terceras personas.
                        </label><br><br>

                        <label style="width:90%"><input type="checkbox" checked />
                            No autorizo CREDIQ S.A. de C.V. a utilizar mi información personal para ningún otro propósito más que para ser enviada a CrediQ.
                        </label><br><br>

                        <label style="width:90%"><input type="checkbox" checked />
                            Autorizo a CREDIQ S.A. DE C.V., en adelante las "Las Empresas" para que consulten mi comportamiento crediticio para la concesión de este Contrato de RENTING para efectos de análisis con entidades especializadas en la prestación de servicios de información o burós de crédito, incluyendo aquellas que recolecten, registran, procesan, distribuyen datos, referentes al comportamiento de pago de las personas y ofrecen servicios de información de base de datos.
                        </label><br><br>

                        <label style="width:90%"><strong>NOTA:</strong> al remitir esta solicitud autorizo a CrediQ para realizar consulta sobre mi comportamiento e historial de pago.
                        </label><br><br><br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="width:60%;">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
      <?php if($this->session->flashdata('msg')): ?>
          swal("Completado!", "<?php echo $this->session->flashdata('msg'); ?>", "success");
      <?php endif; ?>
        $('.phone-info').mask('9999-9999');

        <?php if($_SESSION['data'] != NULL|| $_SESSION['data']=''): ?>
        console.log('<? echo $_SESSION['data']; ?>');
        console.log('<?echo $_SESSION['res']; ?>');

        <?php
          endif;
          session_destroy();
          $_SESSION['data'] = NULL;
          $_SESSION['res'] = NULL;
        ?>

        $('#solicitud-form').submit(function(e){
          e.preventDefault();
          nombre           =   $('#nombre').val();
          email            =   $('#email').val();
          telefono         =   $('#tel').val();
          pais             =   $('#pais').val();
          channel          =   $('#channel').val();
          opcion           =   $('#contacto').val();
          button           =   $('#button-input').val();

          $.ajax({
            url: "<?php echo base_url(); ?>index.php/ajax/enviarMail",
            type: "POST",
            data: {
            'nombre' : nombre,
            'email'  : email,
            'phone'  : telefono,
            'pais'   : pais,
            'channel': channel,
            'opcion' : opcion,
            'button' : button,
            },
            success: function(msg) {
              console.log("Mensaje:"+ msg);
              swal("Good job!", "Mensaje Enviado con Exito", "success");
              $('#solicitud-form')[0].reset();
            },
            error: function(xhr, status, error) {
              console.log("xhr " + xhr);
              console.log("error" + error);
            }
          })
        })
    });

    function llenarInfoCar(auto, renting, compra, marca, modelo) {
        var tipoCuota = $("input[name='tipo_cuota']:checked").val();
        if (tipoCuota == "renting") {
            $("#opcion-info").val("renting");
            $("#cuota-info").val(renting);
        } else {
            $("#opcion-info").val("compra");
            $("#cuota-info").val(compra);
        }

        $("#auto-info").val(auto);
        $("#marca-info").val(marca);
        $("#modelo-info").val(modelo);



		// Enviamos interacción anónima a SAP Marketing
		// Primero obtenemos la credencial
		$.ajax({
			url: "<?php echo base_url() ?>index.php/ajax/interaccionAnonima",
			type: "POST",
			data: {
			'id':auto,
			'renting':renting,
			'marca':marca,
			'modelo':modelo,
			},
			success: function(msg) {
			  var token = msg;
			  console.log("Mensaje:"+ token);
			},
			error: function(xhr, status, error) {
			  console.log("xhr " + xhr);
        console.log("error" + error);
			}
		});

		$.fancybox.open({
			src: '#information-car',
			type: 'inline',
			opts: {

				afterShow: function(instance, current) {
					console.info('done!');

				}
			}
		});
  }







</script>


</html>
