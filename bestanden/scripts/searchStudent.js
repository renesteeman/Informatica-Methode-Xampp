$(document).ready(function(){
  $('.searchInput').on('focus', function(){
    $('.searchInput').on('keyup', function(){
      input = $('.searchInput').val();
      alert(input);
      //CALL AJAX for DB search
      /*
      jqXHR = $.ajax({
  			method: "POST",
  			url: '../scripts/searchStudentName.php',
  			data: {input: input}
  		});

  		jqXHR.done(function(msg) {
  			alert('AJAX succesfull');
  		});

  		jqXHR.fail(function(jqXHR) {
  		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
  		}); */

    })
  })
  $('.searchInput').on('blur', function(){

  })
})
