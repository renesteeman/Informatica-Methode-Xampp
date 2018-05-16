$(document).ready(function(){

	//prepare captcha
	var onloadCallback = function() {
		grecaptcha.render('captcha', {
			'sitekey' : 'your_site_key'
		});
	};

	//login
	$('.loginForm').submit(function(event){
		event.preventDefault();

		var username = $("input[name='username']").val();
		var password = $("input[name='password']").val();

		jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/login.php',
			data: {username: username, password: password}
		});

		jqXHR.done(function(msg) {

			if(msg.length == 0){
				window.location.href = '../pages/index.php';
			} else if (msg.includes('updated attempts')){
				window.location.href = '../pages/index.php';
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
