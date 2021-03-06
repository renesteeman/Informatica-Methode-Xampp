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

		jqXHR.fail(function(jqXHR) {
		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});
	})

	$('.deleteStudents').submit(function(event){
		event.preventDefault();

		var password = $("input[name='password']").val();

		var checkBoxesQuestion = $(this).find('input[type=checkbox]:checked');
		var namen = [];

		for(i=0; i<checkBoxesQuestion.length;i++){
			var naam = checkBoxesQuestion.eq(i).parent().text();
			naam = $.trim(naam);
			namen.push(naam);
		}

		//actually delete accounts
		if (confirm("Weet u zeker dat u deze accounts wilt verwijderen? U kunt deze actie niet terugdraaien.")){
			jqXHR = $.ajax({
				method: "POST",
				url: '../scripts/deleteStudentsAjax.php',
				data: {namen: namen, password: password}
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

				jqXHR.fail(function(jqXHR) {
					alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
			  });

			});

			jqXHR.fail(function(jqXHR) {
				alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		  });
		} else {
			alert("Het verwijderen van de accounts is geanuleerd.");
		}

	});
});
