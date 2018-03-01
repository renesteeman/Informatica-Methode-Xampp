$(document).ready(function(){
	//burger icon
	$(".burger-icon").click(function(){
		$(".nav-burger").toggleClass("active");
	});

	//chapter tiles
	$(".tile").click(function(){
		$(this).siblings().toggle();
		$(this).toggleClass("active");

	});

	$("select").click(function(){
		if($('select[name=newGroup]').val()!=''){
			$(this).removeClass("defaultSelect");
		} else {
			$(this).toggleClass("defaultSelect");
		}
	});

	var shown = true;
	$(".arrow").click(function () {

	    if (!shown) {
		    $('.classContent').fadeIn();
	    }else{
	        $('.classContent').fadeOut();
	    }
	    shown = !shown;

	})


});
