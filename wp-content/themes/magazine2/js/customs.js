jQuery(document).ready(function($) {


	/************ TM HIDE *************/
    $(window).scroll( function(){

        $('.tm_hide').each( function(i){
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
				if( bottom_of_window > bottom_of_object ){                
					$(this).animate({'opacity':'1'},100);                    
				}
        }); 
    });


	/************ BX SLIDER *************/
	$('.tm_magzslider').show().bxSlider({
		pager: false,
		speed: 800,
		pause: 6000,
		auto: true,
		captions: true
	});

	/************ BX SLIDER BIG *************/
	$('.tm_magzslider_big').show().bxSlider({
		pager: false,
		captions: true,
		minSlides: 3,
		maxSlides: 4,
		moveSlides: 1,
		slideWidth: 371,
		slideMargin: 20
	});


	/************ GALLERY SWIPEBOX *************/
	$(".swipebox").swipebox({
		useCSS : true,
		hideBarsDelay : 0
	});


	/************ NEWS TICKER *************/
	$('#js-news').ticker({
		titleText: 'Breaking News'
	});


	/************ RESPONSIVE MENU *************/
		$('#navigasi_menu_reseponsive ul.sub-menu li a').show().each(function(index, item) {
	        $(this).text('- ' + $(this).text());
	    });
		   
	      $("<select />").appendTo("nav");
	      
	      $("<option />", {
	         "selected": "selected",
	         "value"   : "",
	         "text"    : "Go to..."
	      }).appendTo("nav select");
	      
	      $("nav a").each(function() {
	       var el = $(this);
	       $("<option />", {
	           "value"   : el.attr("href"),
	           "text"    : el.text()
	       }).appendTo("nav select");
	      });
	      
	      $("nav select").change(function() {
	        window.location = $(this).find("option:selected").val();
	      });
	    
		 $('#navigasi_menu_reseponsive').remove();


	/************ SEARCH *************/
	$('input:text').each(function(){
	        var txtval = $(this).val();
	        $(this).focus(function(){
	            if($(this).val() == txtval){
	                $(this).val('')
	            }
	        });
	        $(this).blur(function(){
	            if($(this).val() == ""){
	                $(this).val(txtval);
	            }
	        });
	 });


	/************ SCROLL TO TOP *************/
	$(window).scroll(function() { 
		if($(this).scrollTop() != 0) { $('#backtotop').fadeIn(); } else { $('#backtotop').fadeOut(); } }); $('#backtotop').click(function() { $('body,html').animate({scrollTop:0},1000); 
	}); 

});