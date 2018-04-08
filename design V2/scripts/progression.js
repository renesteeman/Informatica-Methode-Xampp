$(document).ready(function(){
	var timeSpent = 0;
	var active = 1;

	window.onblur = function(){
		active = 0;
	}

	window.onfocus = function(){
		active = 1;
	}

	function updateTimeSpent(){
		if(active == 1){
			timeSpent++;
			if(timeSpent>0){
				updateProgress();
			}
		}
		setTimeout(updateTimeSpent, 1000);
	};

	updateTimeSpent();

	function isInViewport(element) {
		var elementTop = $(element).offset().top;
	    var elementBottom = elementTop + $(element).outerHeight();
		console.log(elementBottom);

	    var viewportTop = $(window).scrollTop();
	    var viewportBottom = viewportTop + $(window).height();
		console.log(viewportBottom);

		console.log($(window).height());

		return elementBottom < viewportBottom && elementBottom > viewportTop
	}

	function updateProgress(){
		var element = $('.theorie-content');
		if(isInViewport(element)){
			console.log('visible');
		}
	}






});
