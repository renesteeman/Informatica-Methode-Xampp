$(document).ready(function(){
	$('.addKlas').children().val(' ');
	$('.addLeerlingen').children().val(' ');
	window.setTimeout(addItem, 100);

	function addItem(){
		$('.addKlas').children().val('');
		$('.addLeerlingen').children().val('');
	}

	$(".plus-sign").click(function(){
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
			$('.plus-sign').click();
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
		var schoolNaam = $('input[name=schoolNaam]').val();
		var schoolAdres = $('input[name=schoolAdres]').val();
		var schoolPostcode = $('input[name=schoolPostcode]').val();
		var schoolPlaats = $('input[name=schoolPlaats]').val();
		var schoolTelefoonnummer = $('input[name=schoolTelefoonnummer]').val();
		var docentNaam = $('input[name=docentNaam]').val();
		var docentTelefoonnummer = $('input[name=docentTelefoonnummer]').val();
		var Ndocenten = $('input[name=Ndocenten]').val();

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
			data: {schoolNaam:schoolNaam, schoolAdres:schoolAdres, schoolPostcode:schoolPostcode, schoolPlaats:schoolPlaats, schoolTelefoonnummer:schoolTelefoonnummer, docentNaam:docentNaam, docentTelefoonnummer:docentTelefoonnummer, Ndocenten:Ndocenten, klassen:klassen},
		});
		jqXHR.done(function(response){
			response = JSON.parse(response);

      window.alert(response.msg);

      //if there isn't an error, redirect, else stay on page
      if(!response.error){
        window.location.href = '../index.php';
      }

		});
		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
	});

	function updatePrice(){
		var Ndocenten = $('input[name=Ndocenten]').val();
		var Nleerlingen = 0;

		var leerlingenItems = $('.leerlingen');

		for(var i=0; i<leerlingenItems.length; i++){
			Nleerlingen += parseInt(leerlingenItems.eq(i).text());
		}

		var Pdocenten = Ndocenten * 30;
		var Pleerlingen = Nleerlingen * 10;
		var Ptotaal = Pdocenten + Pleerlingen;

		if(Ptotaal>0){
			$('.priceOverview').removeClass('hide');
			$('.priceOverview').text('Totaalprijs: €' + Ptotaal);
		} else {
			$('.priceOverview').addClass('hide');
			Ptotaal = 0;
		}

	}

	$('input[name=Ndocenten]').keyup(function(){
		updatePrice();
	});

	$(document).on('click',".delete", function(){
		updatePrice();
	});

	$(document).on('click',".add-item", function(){
		updatePrice();
	});

});
