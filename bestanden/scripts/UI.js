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

	//burger icon
	$(".burger-icon").click(function(){
		$(".nav-burger").toggleClass("active");
	});

	//IE detection
	function isIE() {
		return ((navigator.appName == 'Microsoft Internet Explorer') || ((navigator.appName == 'Netscape') && (new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null)));
	}

	if (isIE()){
		$('.chapter-tiles').addClass("IE");
	}

	//chapter tiles
	$(".tile").click(function(){
		$(this).siblings().hide();
		$(this).addClass("active");

		if($(window).width() < 1400){
			//go to selected tile (for smaller devices)
			var pos = $(this).position();
			var y = pos.top;

			$('html, body').animate({
	      scrollTop: y - 120
	    }, 'fast');
		}
	});

	$(document).on("click", ".closeTile", function(){
		$(this).parents(".tile").siblings().show();
		$(this).parents(".tile").removeClass('active');
	});

	//if the text doesn't fit in the tile, make it fit
	function responsiveTile(element){
		//if there's overflow -> edit css
		if(element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth){
			if($(window).width() > 650){
				$(element).css('line-height', '2rem');
				$(element).children().find('.tile-chapter').css('padding-top', '5.5rem');
			} else if ($(window).width() < 650){
				$(element).css('line-height', '2rem');
				$(element).children().find('.tile-chapter').css('padding-top', '3rem');
			}
		}
	}

	//check on start and on window resize
	$('.tile').each(function(){
		responsiveTile(this);
	});

	$(window).on('resize', function(){
		$('.tile').each(function(){
			responsiveTile(this);
		});
	});

	$(".select").click(function(){
		if($('select[name=newGroup]').val()!=''){
			$(this).removeClass("defaultSelect");
		} else {
			$(this).toggleClass("defaultSelect");
		}
	});

	$(document).on('click', '.Arrow', function(){
		$(this).parent().parent().next().slideToggle();
		$(this).parent().parent().next().toggleClass("active");

		$(this).toggleClass("active");
	});

	//paragraph
	$(".bar-s").click(function(){
		$(this).next().slideToggle();
		$(this).toggleClass("folded");
		$(this).next().next().toggleClass("after-folded");
	});

	$(".theorie-answers").siblings().last().next().slideUp(0);
	$(".theorie-answers").siblings().last().toggleClass("folded");

	//edit lists
	$('.add-item').children().val(' ');
	window.setTimeout(addLid, 100);

	function addLid(){
		$('.add-item').children().val('');
	}

	$(".addLidButton").click(function(){
		var name = $(this).prev().children().val();
		if(name!=""){
			var paste = '<li><span class="list-item">'+ name +'</span><span class="delete">x</span></li>'
			$(this).prev().children().val('');
			$(this).parent().prev().children().first().append(paste);
		}
	});

	$(".add-item").children().first().keypress(function(event){
		if(event.keyCode == 13){
			$('.addLidButton').click();
		}
		return event.keyCode != 13;
	});

	$(document).on('click',".delete",function(){
		$(this).parent().fadeOut();
		$(this).parent().remove();
	});

	//edit group sent data for preperation and open the editing page
  $(".editGroup").click(function(){
    var groupname = $(this).parent().parent().parent().children().first().children().first().text();

    //sent values of group via ajax to editGroupFront.php
    jqXHR = $.ajax({
      method: "POST",
      url: '../scripts/editGroupSetSession.php',
      data: {groupname: groupname}
    });
    jqXHR.done(function() {
      window.location.href = '../scripts/editGroupFront.php';
    });
		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });

  });

	$(".goToTop").click(function(){
		//Go to the top of the page after clicking the arrow
		$("html, body").animate({scrollTop: 0}, "fast");
	});

});
