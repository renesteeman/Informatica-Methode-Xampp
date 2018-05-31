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

			$('.addKlas').children().focus();
			updatePrice();
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
		var leerlingen = 0;

		var leerlingenItems = $('.leerlingen');

		for(var i=0; i<leerlingenItems.length; i++){
			leerlingen += parseInt(leerlingenItems.eq(i).text());
		}

		var Pdocenten = docenten * 30;
		var Pleerlingen = leerlingen * 15;
		var Ptotaal = Pdocenten + Pleerlingen;

		if(docenten!=0){
			$('.Pdocenten').removeClass('hide');
			$('.Pdocenten').children('.aantal').text(docenten);
			$('.Pdocenten').children('.prijs').text('€' + Pdocenten);
		} else {
			$('.Pdocenten').addClass('hide');
		}

		if(leerlingen!=0){
			$('.Pleerlingen').removeClass('hide');
			$('.Pleerlingen').children('.aantal').text(leerlingen);
			$('.Pleerlingen').children('.prijs').text('€' + Pleerlingen);
		} else {
			$('.Pleerlingen').addClass('hide');
		}

		if(Ptotaal!=0){
			$('.totaal').removeClass('hide');
			$('.totaal').children('.Tprijs').text('Totaal prijs: €' + Ptotaal);
		} else {
			$('.totaal').addClass('hide');
		}

	}

	$('.Ndocenten').keyup(function(){
		updatePrice();
	});

	$('.delete').click(function(){
		updatePrice();
	});


});
