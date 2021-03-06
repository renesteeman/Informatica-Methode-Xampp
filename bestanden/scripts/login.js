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

	//login
	$('.loginForm').submit(function(event){
		event.preventDefault();

		var username = $("input[name='username']").val();
		var password = $("input[name='password']").val();
		var captchaShown = 1;

		if($('#captcha').hasClass('hide')){
			captchaShown = 0;
		}

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/login.php',
			data: {username: username, password: password, captchaShown: captchaShown}
		});

		jqXHR.done(function(msg) {
			if(msg.length == 0){
				window.location.href = '../index.php';
			} else if (includes(msg, 'updated attempts')){
				window.location.href = '../index.php';
			} else if (includes(msg, 'captcha')){
				$("#captcha").removeClass("hide");
				window.alert(msg);
			} else {
				window.alert(msg);
			}

		});

		jqXHR.fail(function(jqXHR) {
			alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
	  });
	});


});
