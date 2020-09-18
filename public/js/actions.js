/*Filter by Characteristics*/
function mostrar(campo){
      if(campo=='I'){
 		$(".precio_extranjero").show();
      }else{
      	$(".precio_extranjero").hide();
      }
}

function clearText(field){
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

function ingresos(tipo){
	
	if(tipo=='Asalariado'){
		$('.asalariado').show();
		$('.profesional').hide();
		$('.jubilado').hide();
		$('.cargo').show();
	}
	
	if(tipo=='Profesional'){
		$('.asalariado').hide();
		$('.profesional').show();
		$('.jubilado').hide();
		$('.cargo').show();
	}
	
	if(tipo=='Jubilado'){
		$('.asalariado').hide();
		$('.profesional').hide();
		$('.jubilado').show();
		$('.cargo').hide();
	}
	
}

function sort_val(valor){
	$('#sort').val(valor);
}

function tipo_val(valor){
	$('#tipo').val(valor);
}

function rangoVal(valor){
	$('#rango').val(valor);
}

$(document).ready(function(){
    $('#exampleModalCenter').modal('show');


    $('#pausarVideo').click(function(){ //agrego la funcion click a las etiquetas "button" para que al cerrar el modal pongan pausa al video, como vez utilice la etiqueta <video> y con el id del div utilizo la función pause();
      $('#video').get(0).pause();
    });

	// $('#cheque').click(function(){
	// 	if($('#cheque').is(':checked') == true){
	// 		$('#enviarForm').prop('disabled', true);
	// 		$('#enviarContacto').prop('disabled', true);
	// 		$('#btn_solicitar_info').prop('disabled', true);
  //
	// 	}else{
	// 		$('#enviarForm').removeAttr('disabled');
	// 		$('#enviarContacto').removeAttr('disabled');
	// 		$('#btn_solicitar_info').removeAttr('disabled');
	// 	}
	// })
  //
	// $('#xt1').click(function(){
	// 	if($('#xt1').is(':checked') == true){
	// 		$('#enviarForm').removeAttr('disabled');
	// 		$('#enviarContacto').removeAttr('disabled');
	// 		$('#btn_solicitar_info').removeAttr('disabled');
  //
	// 	}else{
	// 		$('#enviarForm').prop('disabled', true);
	// 		$('#enviarContacto').prop('disabled', true);
	// 		$('#btn_solicitar_info').prop('disabled', true);
	// 	}
	// })
})





