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

	$(".Arrow").click(function(){
		$(this).parent().parent().next().slideToggle();
		$(this).parent().parent().next().toggleClass("active");

		$(this).toggleClass("active");

	});

	$(".bar-s").click(function(){
		$(this).next().slideToggle();
	});
});
