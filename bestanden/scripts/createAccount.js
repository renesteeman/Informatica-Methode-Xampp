$(document).ready(function(){
	$('.addKlas').children().val(' ');
	$('.addLeerlingen').children().val(' ');
	window.setTimeout(addItem, 100);

	function addItem(){
		$('.addKlas').children().val('');
		$('.addLeerlingen').children().val('');
	}

	$(".addklasButton").click(function(){
		var klas = $('.addKlas').children().val();
		var leerlingen = $('.addLeerlingen').children().val();
		if(klas!="" && leerlingen!=""){
			var paste = '<li><span class="list-item klas">'+ klas +'</span><span class="list-item leerlingen">'+ leerlingen +'</span><span class="delete">x</span></li>';
			$('.addKlas').children().val('');
			$('.addLeerlingen').children().val('');
			$(this).parent().prev().children().first().append(paste);
		}

	});

	$(".add-item").children().keypress(function(event){
		if(event.keyCode == 13){
			$('.addklasButton').click();
		}
		return event.keyCode != 13;
	});

	$(document).on('click',".delete",function(){
		$(this).parent().fadeOut();
		$(this).parent().remove();
	});

	$('.requestAccounts').submit(function(event){
		event.preventDefault();
	});

	function updatePrice(){
		var docenten = $('.Ndocenten').val();
		var leerlingen = 
	}

});
