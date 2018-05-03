$(document).ready(function(){
	//quiz
	function updateQuizHeader(){
		var aantalVragenBeantwoord = $('input[type=checkbox]:checked').length;
		var aantalVragen = $('.vraagBalk').length;
		$('.quiz-bar').html(aantalVragenBeantwoord + ' uit ' + aantalVragen + ' vragen beantwoord');
	};

	updateQuizHeader();

	$('input.single-select-checkbox[type="checkbox"]').on('change', function() {
		var checkBoxesQuestion = $(this).parent().parent().parent().find('input[type=checkbox]');
		$(checkBoxesQuestion).not(this).prop('checked', false);
		updateQuizHeader();
	});

	$(".vraagBalk").click(function(){
		$(this).next().slideToggle();
		$(this).toggleClass("active");
		$(this).next().next().toggleClass("after-active");
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
				var error = msg.error;

				window.alert(result);
				if(error != ''){
					window.alert(error);
				}

				right = Object.keys(right).map(function (key) { return right[key]; });

				for(var i=0; i<right.length; i++){
					var number = right[i];
					$('.vraagBalk').eq(number).next().find('input[type="checkbox"]:checked').next().css('background-color', 'rgb(0, 130, 70)');
				}

				wrong = Object.keys(wrong).map(function (key) { return wrong[key]; });

				for(var i=0; i<wrong.length; i++){
					var number = wrong[i];
					$('.vraagBalk').eq(number).css('background-color', 'rgb(160, 30, 30)');
					$('.vraagBalk').eq(number).next().find('input[type="checkbox"]:checked').next().css('background-color', 'rgb(160, 30, 30)');
					
				}

			});

			jqXHR.fail(function( jqXHR) {
				alert("AJAX failed, contact admin");
			});

		} else {
			alert('Beantwoord eerst alle vragen');
		}
	});

});
