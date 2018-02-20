$(document).ready(function(){
	$(".burger-icon").click(function(){
		$(".nav-burger").toggleClass("active");
	});

	$(".tile").click(function(){
		$(".tile").not(this).toggle();
		$(this).toggleClass("active");

	});

});
