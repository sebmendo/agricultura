
$('body').scrollspy({target: ".navbar", offset: 50}); 


$("#navbar-collapse a").on('click', function(event) {
	event.preventDefault();

	//stores current hash
	var hash = this.hash;
	animateScroll(this);
});

$(".btn-default").on('click', function(event) {
	event.preventDefault();
	animateScroll(this);
});

function animateScroll(item) {
	var hash = item.hash;

	$('html, body').animate({
		scrollTop:$(hash).offset().top
	}, 800, function(){

		window.location.hash = hash;
	});
}