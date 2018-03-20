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
		$(this).toggleClass("active");
		$(this).next().next().toggleClass("after-active");
	});

	$(".theorie-answers").slideToggle(0);

	$('.addLid').children().val(' ');
	window.setTimeout(addLid, 100);

	function addLid(){
		$('.addLid').children().val('');
	}

	$(".addLidButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="lid">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".addLid").children().first().keypress(function(event){
		if(event.keyCode == 13){
			$('.addLidButton').click();
		}
		return event.keyCode != 13;
	});

	$(document).on('click',".delete",function(){
		$(this).parent().fadeOut();
		$(this).parent().remove();
	});

	$('.createGroupForm').submit(function(event){
		event.preventDefault();

		var Gnaam = $('input[name=Gnaam]').val();
		var Gomschrijving = $('textarea[name=Gomschrijving]').val();
		var Glink = $('input[name=Glink]').val();

		var Gleden = [];
		$('.ledenLijst>ul>li>.lid').each(function(index){
			Gleden.push($(this).text());
		});

		var password = $('input[name=password]').val();

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "createGroupAjax.php",
			data: {Gnaam: Gnaam, Gomschrijving: Gomschrijving, Glink: Glink, Gleden: Gleden, password: password}
		});
		jqXHR.done(function( msg ) {
			alert(msg);
		});
		jqXHR.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});

	});

	$(".Edit").click(function(){

		var groupname = $(this).parent().parent().parent().children().first().children().first().text();


		//sent values of group via ajax to editGroupFront.php
		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/editGroupSetSession.php',
			data: {groupname: groupname}
		});
		jqXHR.done(function(msg) {
			alert(msg);
			window.location.href = '../scripts/editGroupFront.php';
		});
		jqXHR.fail(function( jqXHR) {
		  alert( "AJAX failed, contact admin" );
		});

	});
});
