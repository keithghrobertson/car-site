$(document).ready(function() {
	divOneResize();

	//clicking down arrow brings you past the fold
	$('#scroll-down').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $('#two').offset().top
		}, 1000);
	});
	
	var navOpen = false;
	
	$('#nav-button').click(function(){
		if(navOpen == false){
			$("#nav").animate({left: '0'},{speed : 2000, easing: 'easeInOutCirc'});
			$("#page-wrapper").animate({left: '260px'},{speed : 2000, easing: 'easeInOutCirc'});
			navOpen = true;
		}else{
			$("#nav").animate({left: '-260px'},{speed : 200, easing: 'easeInOutCirc'});
			$("#page-wrapper").animate({left: '0px'},{speed : 2000, easing: 'easeInOutCirc'});
			navOpen = false;
		}
	});//end click
	
    $('section[data-type="background"]').each(function(){
        var $bgobj = $(this); // assigning the object
     
        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
             
            // Put together our final background position
            var coords = '50% '+ yPos + 'px';
 
            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        }); 
    });    
	
	
});//end .ready


// for the window resize
$(window).resize(function() {
	divOneResize();
});

function divOneResize() {
	var bodyheight = $(window).height();
    $("#one").css({height :  bodyheight});
}
