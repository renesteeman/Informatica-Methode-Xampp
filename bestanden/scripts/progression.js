$(document).ready(function(){
	var timeSpent = 0;
	var active = 1;
	var completed = 0;
	var aantalSeconden = 1;

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
				if(timeSpent>aantalSeconden){
					updateProgress();
				}
			}
			if(!completed){
				setTimeout(updateTimeSpent, 1000);
			}
		};

		updateTimeSpent();

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

				var title = $('.title-small').text();
				title = title.trim();
				var chapter = title[1];
				var paragraph = title[4];

				var Nparagraphs = $('.ptile').length;

				//sent values of group via ajax to editGroupFront.php
				jqXHR = $.ajax({
					method: "POST",
					url: '../../../scripts/updateProgression.php',
					data: {chapter:chapter, paragraph:paragraph, Nparagraphs: Nparagraphs}
				});

				jqXHR.done(function(msg) {
					if(msg != ""){
						window.alert(msg);
					}
				});

				jqXHR.fail(function(jqXHR) {
				  alert("AJAX failed, contact admin");
			  });

			}
		}
	}
});
