$(document).ready(function(){
	var finished = 0;

	function updateQuizHeader(){
		var aantalVragenBeantwoord = $('input[type=checkbox]:checked').length;
		var aantalVragen = $('.vraagBalk').length;
		$('.quiz-bar').html(aantalVragenBeantwoord + ' uit ' + aantalVragen + ' vragen beantwoord');
	};

	updateQuizHeader();

	//make boxes uncheckable after submitting results
	$('input.single-select-checkbox[type="checkbox"]').on('change', function() {
		if(!finished){
			var checkBoxesQuestion = $(this).parent().parent().parent().find('input[type=checkbox]');
			$(checkBoxesQuestion).not(this).prop('checked', false);
			updateQuizHeader();
		} else {
			//revert 'check'
			if($(this).prop('checked', true)){
				$(this).prop('checked', false);
			} else {
				$(this).prop('checked', true);
			}
		}
	});

	$(".vraagBalk").click(function(){
		$(this).toggleClass("inactive");
		$(this).next(".antwoorden").first().slideToggle();
		$(this).nextAll(".vraagBalk").first().toggleClass("after-inactive");

		//klap uitleg niet uit als het nog niet getoond is, anders wel
		$uitleg = $(this).nextAll(".uitleg").first();
		if(uitleg.css("display") != "none"){
			$uitleg.slideToggle();
		}

	});

	$('.controleerAntwoordButton').click(function(){
		var aantalVragenBeantwoord = $('input[type=checkbox]:checked').length;
		var aantalVragen = $('.vraagBalk').length;
		var antwoorden = [];

		var url = window.location.href;
		var chapterLocation = url.search("H") + 1;
		var chapter = url.charAt(chapterLocation);

		for(i=0; i<aantalVragenBeantwoord;i++){
			var antwoord = $(this).prev().children('.antwoorden').find('input[type="checkbox"]:checked').parent().eq(i).text();
			antwoord = $.trim(antwoord);
			antwoorden.push(antwoord);
		}

		if(aantalVragen == aantalVragenBeantwoord){
			//sent the given answers to the quiz php
			jqXHR = $.ajax({
				method: "POST",
				url: '../../../scripts/quiz.php',
				data: {antwoorden: antwoorden, hoofdstuk: chapter}
			});

			jqXHR.done(function(msg) {
				console.log(msg);
				msg = JSON.parse(msg);
				var result = msg.result;
				var right = msg.right;
				var wrong = msg.wrong;
				var corrections = msg.corrections;
				var uitleg = msg.uitleg;
				var error = msg.error;
				finished = 1;

				window.alert(result);
				if(error != ''){
					window.alert(error);
				}

				right = Object.keys(right).map(function (key) { return right[key]; });

				for(var i=0; i<right.length; i++){
					var number = right[i];
					$('.vraagBalk').eq(number).next().find('input[type="checkbox"]:checked').next().addClass('right');
				}

				wrong = Object.keys(wrong).map(function (key) { return wrong[key]; });
				corrections = Object.keys(corrections).map(function (key) { return corrections[key]; });

				for(var i=0; i<wrong.length; i++){
					var number = wrong[i];
					$('.vraagBalk').eq(number).addClass('wrong');
					$('.vraagBalk').eq(number).next().find('input[type="checkbox"]:checked').next().addClass('wrong');

					$('.vraagBalk').eq(number).next().find('label:contains('+corrections[i]+')').children('.checkmark').addClass('right');
					$('.vraagBalk').eq(number).next().find('label:contains('+corrections[i]+')').children('.single-select-checkbox').prop('checked', true);
				}


				uitleg = Object.keys(uitleg).map(function (key) { return uitleg[key]; });

				for(var i=0; i<uitleg.length; i++){
					var Cuitleg = uitleg[i];
					$('.vraagBalk').eq(i).next().next().text(Cuitleg);
					$('.vraagBalk').eq(i).next().next().addClass('show');
				}

				$('html, body').animate({ scrollTop: 0 }, 'fast');

			});

			jqXHR.fail(function(jqXHR) {
				alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		  });

		} else {
			alert('Beantwoord eerst alle vragen');
		}
	});

});
