$(document).ready(function(){   
    jQuery('input[placeholder], textarea[placeholder]').placeholder();

    $('.bxslider').bxSlider({
    	  auto: true,
    	mode: 'fade',  
        autoHover: true,  
        pause: 5000 
    });

    $('.slider').bxSlider({
    	
    	auto: true,
    	pager: false,
    	slideWidth: 110,
	    minSlides: 5,
	    maxSlides: 5,
	    slideMargin: 5
    	
    	
    /*	auto: true,
    	mode: 'fade',
    	 pause: 5000, 
    	pager: false,
    	slideWidth: 110,
	    minSlides: 5,
	    maxSlides: 5,
	    slideMargin: 5*/
	    
	    
	    
    });
});


