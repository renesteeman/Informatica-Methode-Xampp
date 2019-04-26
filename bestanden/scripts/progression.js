$(document).ready(function(){

	//IE patch
	function includes(container, value) {
		var returnValue = false;
		var pos = container.indexOf(value);

		if (pos >= 0) {
			returnValue = true;
		}

		return returnValue;
	}

	var timeSpent = 0;
	var active = 1;
	var completed = 0;
	//TODO
	var tresholdSeconds = 60;
	var theory = 0;

	var title = $('.title-small').text();

	//check if it's theory
	if(!includes(title, '§')){
		theory = 0;
	} else {
		theory = 1;
	}

	function isReached(element) {
		var elementTop = $(element).offset().top;
		var elementBottom = elementTop + $(element).outerHeight();

		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();

		return (elementBottom < viewportBottom && elementBottom > viewportTop) || (elementBottom < viewportTop)
	}

	function updateProgress(){
		var element = $('.theorie-content');

		if(isReached(element)){
			completed = 1;

			var chapter_id = $('.title-small').children().first().attr('id');
			var paragraph = title.split('§')[1][0];

			var Nparagraphs = $('.ptile').length;

			//sent values of group via ajax to editGroupFront.php
			jqXHR = $.ajax({
				method: "POST",
				url: '../scripts/updateProgression.php',
				data: {chapter_id:chapter_id, paragraph:paragraph, Nparagraphs: Nparagraphs}
			});

			jqXHR.done(function(msg) {
				if(msg != ""){
					window.alert(msg);
				}
			});

			jqXHR.fail(function(jqXHR) {
				alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		  });

		}
	}

	if(completed == 0){

		window.onblur = function(){
			active = 0;
		}

		window.onfocus = function(){
			active = 1;
		}

		function updateTimeSpent(){
			if(active){
				timeSpent++;
				if(timeSpent>tresholdSeconds){
					updateProgress();
				}
			}

			if(!completed && theory){
				setTimeout(updateTimeSpent, 1000);
			}
		};

		updateTimeSpent();

	}
});
