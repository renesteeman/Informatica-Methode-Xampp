$(document).ready(function(){
	//update class
	//show students that correspond to class
	$('.klasSelector').change(function() {
		var klas = $('.klasSelector option:selected').val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/showStudentsAjax.php',
			data: {klas: klas}
		});

		jqXHR.done(function(msg) {
			$('.leerlingSelector').html(msg);
		});

		jqXHR.fail(function( jqXHR) {
		  alert("Er is een fout opgetreden met AJAX, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});
	})

	$('.changeClass').submit(function(event){
		event.preventDefault();

		var Nklas = $('input[name=Nclass]').val();
		var checkBoxesQuestion = $(this).find('input[type=checkbox]:checked');
		var namen = [];

		for(i=0; i<checkBoxesQuestion.length;i++){
			var naam = checkBoxesQuestion.eq(i).parent().text();
			naam = $.trim(naam);
			namen.push(naam);
		}

		//actually edit class
		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/changeClassAjax.php',
			data: {namen: namen, Nklas: Nklas}
		});

		jqXHR.done(function(msg) {
			alert(msg);
			var klas = $('.klasSelector option:selected').val();

			jqXHR = $.ajax({
				method: "POST",
				url: '../scripts/showStudentsAjax.php',
				data: {klas: klas}
			});

			jqXHR.done(function(msg) {
				$('.leerlingSelector').html(msg);
			});

			jqXHR.fail(function( jqXHR) {
			  alert("Er is een fout opgetreden met AJAX, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
			});
		});

		jqXHR.fail(function( jqXHR) {
		  alert("Er is een fout opgetreden met AJAX, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});

	});
});
