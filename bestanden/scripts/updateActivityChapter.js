$(document).ready(function(){

  function executeAjax(){
    jqXHR = $.ajax({
  		method: "POST",
  		url: '../../../scripts/updateActivity.php'
  	})

    jqXHR.done(function(msg) {
  		if(msg.length > 0){
        alert(msg);
      }
  	})

  	jqXHR.fail(function(jqXHR) {
  	  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
  	})

    setTimeout(executeAjax, 60000);
  }

  executeAjax();
})
