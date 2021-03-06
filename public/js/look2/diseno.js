﻿
var diseno = {
	rangeSlider : function(){
		if($('#slider-range-year').length){ 
		
		// Range Year
		var rangeYear = $("#slider-range-year");
		
		rangeYear.slider({
		  range: true,
		  min: 2006,
		  max: 2017,
		  values: [ 2006, 2017 ],
		  slide: function( event, ui ) {
			$("#year").val(ui.values[0] + " - " + ui.values[1]);
		  }
		});
		$("#year").val(rangeYear.slider("values", 0) + " - " + rangeYear.slider("values", 1 ));
		
		// Range Amount
		var rangeAmount = $("#slider-range-amount");
                
                // Range Amount HN
		var rangeAmountHN = $("#slider-range-amount-hn");
                
                
                 // Range Amount CR
		var rangeAmountCR = $("#slider-range-amount-cr");
		
		function addCommas(nStr){
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}
		/*MODIFICADO POR GGONZALEZ 21/07/2015 -  INI*/
		rangeAmount.slider({
		  range: true,
		  min: 0,
		  max: 150000,
		  step: 2000,
		  values: [ 0, 150000 ], 
		  slide: function( event, ui ) {
			//$( "#amount" ).val( ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 
			//" - $ " + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );		 
		  }
		});		 
		 //$("#amount").val(rangeAmount.slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
            //" - $ " + rangeAmount.slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    
    
    
    rangeAmountHN.slider({
		  range: true,
		  min: 0,
		  max: 100000000,
		  step: 2000,
		  values: [ 0, 100000000 ], 
		  slide: function( event, ui ) {
		//	$( "#amounthn" ).val( ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 
		//	 ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );		 
		  }
		});		 
		//$("#amounthn").val(rangeAmountHN.slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
        //    " - " + rangeAmountHN.slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    
    
    
    
    rangeAmountCR.slider({
		  range: true,
		  min: 0,
		  max: 100000000,
		  step: 2000,
		  values: [ 0, 100000000 ], 
		  slide: function( event, ui ) {
		//	$( "#amountcr" ).val( ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + 
		//	" - ₡ " + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );		 
		  }
		});		 
		//$("#amountcr").val(rangeAmountCR.slider( "values", 0 ).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") +
       //     " - ₡ " + rangeAmountCR.slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
		}
	},
	/*MODIFICADO POR GGONZALEZ 21/07/2015 -  FIN*/
	menuMobile : function(){
		$('.menu-mobile').on('click', function(e){
			e.preventDefault();
			$('header').find('.column9 nav').slideToggle();
		});
	},
	referente : function(){
		if($('.formDatos').length){
			
			var checkbox = $('.formDatos').find('.referCheckbox'); 
			
			$('.formDatos .hidden').show();
			
			$(checkbox).change(function(){
				if(this.checked){
					$('.formDatos .hidden').fadeIn();	
				} else {
					$('.formDatos .hidden').fadeOut();	
				}
			}); 
		}
	},
	
	fadeContent : function(){
		content = $(".column10 ul.car-list li:gt(3), .blueContent div").fadeTo(0, 0); 

		$(window).scroll(function(d,h) {
			content.each(function(i) {
				a = $(this).offset().top + $(this).height();
				b = $(window).scrollTop() + $(window).height();
				if (a < b) $(this).fadeTo(500,1);
			});
		});	
	},
	
	myAccount : function(){
		$('.top .myAcc').on('click', function(){
			$('.top .sub-menu').slideToggle();
		});		
	},
	
	thumbs : function(){
		if($('.thumbs').length) {
			
			$('.thumbs li').each(function() {
				$(this).on('click', function(){
					var mostrar = $(this).find('img').attr('src');
					
					$('.figure').find('a').attr('href', mostrar);
					$('.figure').find('img').attr('src', mostrar);
				});            	
            });	
		}
	},
	
	displayList : function(){
		if($('.filters-content').length){
			 
			$('.data-list').hide();			
			
			$('.filters-content .display-blocks').on('click', function(){
				$('.filters-content a').removeClass('selected');
				$(this).addClass('selected');
				$('.data-list').hide();
				$('ul.car-list').fadeIn();
				
			});
			$('.filters-content .display-list').on('click', function(){
				$('.filters-content a').removeClass('selected');
				$(this).addClass('selected');
				$('ul.car-list').hide();
				$('.data-list').fadeIn();
				
			});
		}
	},

	accordion : function(){
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.display === "block") {
					panel.style.display = "none";
				} else {
					panel.style.display = "block";
				}
			});
		}
	}
}

$(document).ready(function(e) {
	diseno.myAccount();
	//diseno.fadeContent();
	diseno.displayList();
    diseno.rangeSlider();
	diseno.menuMobile();
	diseno.referente();
	diseno.thumbs();
	diseno.accordion();
	
	if($('.fancybox').length){ $('.fancybox').fancybox(); }
	
	$(window).load(function() {
        if($('#slider').length){ $('#slider').nivoSlider(); }
    });
});