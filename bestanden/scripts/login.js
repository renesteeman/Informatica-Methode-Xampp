$(document).ready(function(){

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
			} else if (msg.includes('updated attempts')){
				window.location.href = '../index.php';
			} else if (msg.includes('captcha')){
				$("#captcha").removeClass("hide");

				window.alert(msg);

			} else {
				window.alert(msg);
			}

		});

		jqXHR.fail(function( jqXHR) {
		  alert("AJAX failed, contact admin");
		});
	});


});
