$(document).ready(function() {
	divOneResize();

});

// for the window resize
$(window).resize(function() {
	divOneResize();
});

function divOneResize() {
	var bodyheight = $(window).height();
    $("#one").css({height :  bodyheight});
}