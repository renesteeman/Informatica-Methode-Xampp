$(document).ready(function(){
  datalist = $('#searchStudentDatalist');

  $('.searchInput').on('change', function(){
    input = $('.searchInput').val();
    //CALL AJAX for DB search

    jqXHR = $.ajax({
			method: "POST",
			url: '../scripts/searchStudentInfo.php',
			data: {input: input}
		});

		jqXHR.done(function(response) {
      response = JSON.parse(response);
      if(response.error.length > 0){
        alert(response.error);
      }

      info = response.info;
      console.log(info);

		});

		jqXHR.fail(function(jqXHR) {
		  alert("Er is iets mis gegaan met AJAX, de foutcode is " + jqXHR.status + " met als beschrijving " + jqXHR.statusText + ". Neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!");
		});
  })
  
  $('.searchInput').on('blur', function(){

  })
})
