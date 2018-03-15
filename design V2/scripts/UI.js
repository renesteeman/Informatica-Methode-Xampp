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

		var naam = $('input[name=Gnaam]').val();
		var omschrijving = $('textarea[name=Gomschrijving]').val();
		var link = $('input[name=Glink]').val();

		var leden = [];
		$('.ledenLijst>ul>li>.lid').each(function(index){
			leden.push($(this).text());
		});

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "createGroupAjax.php",
			data: {naam: naam, omschrijving: omschrijving, link: link, leden: leden}
		})
		jqXHR.done(function( msg ) {
				alert( "Data Saved: " + msg );
			});
		jqXHR.fail(function( jqXHR, textStatus ) {
			  alert( "Request failed: " + textStatus );
			});

	});
});
