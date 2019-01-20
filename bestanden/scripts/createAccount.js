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

		//get data to send via AJAX
		var schoolnaam = $('.schoolnaam').val();
		var Ndocenten = $('.Ndocenten').val();

		var klassen = [];
		var klasElementen = $('.klas');
		var leerlingElementen = $('.leerlingen');

		for(var i=0; i<klasElementen.length; i++){
			var klas = klasElementen.eq(i).text();
			var leerlingen = leerlingElementen.eq(i).text();

			var push = [klas, leerlingen];

			klassen.push(push);
		}

		//Give php the info it needs (via AJAX)
		jqXHR = $.ajax({
			method: "POST",
			url: "requestAccounts.php",
			data: {schoolnaam:schoolnaam, Ndocenten:Ndocenten, klassen:klassen},
		});
		jqXHR.done(function(msg){
			$('.main').html(msg);
		});
		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
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

		if(docenten>=0){
			$('.Pdocenten').removeClass('hide');
			$('.Pdocenten').children('.aantal').text(docenten);
			$('.Pdocenten').children('.prijs').text('€' + Pdocenten);
		} else {
			$('.Pdocenten').addClass('hide');
			Pdocenten = 0;
		}

		if(leerlingen>=0){
			$('.Pleerlingen').removeClass('hide');
			$('.Pleerlingen').children('.aantal').text(leerlingen);
			$('.Pleerlingen').children('.prijs').text('€' + Pleerlingen);
		} else {
			$('.Pleerlingen').addClass('hide');
			Pleerlingen = 0;
		}

		if(Ptotaal>0){
			$('.totaal').removeClass('hide');
			$('.totaal').children('.Tprijs').text('Totaalprijs: €' + Ptotaal);
		} else {
			$('.totaal').addClass('hide');
			Ptotaal = 0;
		}

	}

	$('.Ndocenten').keyup(function(){
		updatePrice();
	});

	$(document).on('click',".delete", function(){
		updatePrice();
	});

});
