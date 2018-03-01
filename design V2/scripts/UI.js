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
		$(this).parent().parent().parent().next().slideToggle();
		$(this).parent().parent().parent().next().toggleClass("active");

		if($(this).parent().parent().parent().next().hasClass("active")){
			$(this).css("transform", "rotateX(180deg)")
		} else {
			$(this).css("transform", "rotateX(0deg)")
		}

	});
});
