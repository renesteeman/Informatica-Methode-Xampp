//reset password

event.preventDefault();

var email = $('input[name=email]').val();

//Give php the info it needs (via AJAX)
jqXHR = $.ajax({
  method: "POST",
  url: "resetPassword.php",
  data: {email: email}
});
jqXHR.done(function(response) {
  response = JSON.parse(response);
  alert(response.msg);

  //if there isn't an error, redirect
  if(!response.error){
    window.location.href = '../';
  }

});
jqXHR.fail(function(jqXHR) {
  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
});
